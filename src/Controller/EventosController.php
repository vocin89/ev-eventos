<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * Eventos Controller
 *
 * @property \App\Model\Table\EventosTable $Eventos
 *
 * @method \App\Model\Entity\Evento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventosController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $eventos = $this->Eventos->find()
        ->select(['eventos.id','eventos.nombre','eventos.tipo_evento_id','tipo_eventos.nombre','eventos.fecha','eventos.horario','eventos.precio_adulto','eventos.precio_ninio','escuelas.nombre'])
        ->join([
            'table' => 'escuelas',
            'type' => 'LEFT',
            'conditions' => 'escuelas.id = eventos.model_id',
        ])
        ->join([
            'table' => 'tipo_eventos',
            'type' => 'LEFT',
            'conditions' => 'tipo_eventos.id = eventos.tipo_evento_id',
        ]);
        
        

        $this->set([
                'response' => $eventos,
                '_serialize' => ['response']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $evento = $this->Eventos->get($id, [
            'contain' => ['Models', 'TipoEventos', 'AlumnosInvitados', 'Mesas', 'PersonasTipoMenus']
        ]);

        $this->set('evento', $evento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->data['fecha'] = date('Y-m-d',strtotime($this->request->data['fecha']));
        $this->request->data['horario'] = date('h:m',strtotime($this->request->data['horario']));

        $evento = $this->Eventos->newEntity($this->request->data);  
        if ($this->Eventos->save($evento)) {
            $response = ['status'=>'OK','body'=>$evento];  
        }else{
            $response = ['status'=>'ERROR'];                  
        }

        $this->set([
                'response' => $response,
                '_serialize' => ['response']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $evento = $this->Eventos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evento = $this->Eventos->patchEntity($evento, $this->request->getData());
            if ($this->Eventos->save($evento)) {
                $this->Flash->success(__('The evento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The evento could not be saved. Please, try again.'));
        }
        $models = $this->Eventos->Models->find('list', ['limit' => 200]);
        $tipoEventos = $this->Eventos->TipoEventos->find('list', ['limit' => 200]);
        $this->set(compact('evento', 'models', 'tipoEventos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $evento = $this->Eventos->get($id);
        if ($this->Eventos->delete($evento)) {
            $this->Flash->success(__('The evento has been deleted.'));
        } else {
            $this->Flash->error(__('The evento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function listA($id = null){
        $this->autoRender = false;

        $bd = ConnectionManager::get('default');                   
        $id = 1;

        $query="SELECT 
                    e.nombre as evento_nombre,
                    ev.id as id,
                    al.id as id_alumno,
                    al.nombre as egresado,
                    al.email,
                    al.telefono,
                    al.dni,
                    tut.nombre as tutor,
                    ifnull(sum(en.monto),0) as monto_total
                FROM
                alumnos_eventos ev
                STRAIGHT_JOIN eventos e on e.id = ev.evento_id
                STRAIGHT_JOIN personas al on al.id = ev.alumno_id
                STRAIGHT_JOIN personas tut on tut.id = ev.tutor_id
                LEFT JOIN entregas en on en.alumnos_evento_id = ev.id

                WHERE ev.evento_id = {$id}
                GROUP BY ev.id";        
              
        $response=$bd->query($query)->fetchAll('assoc');
        // $evento = TableRegistry::get('Eventos');
        // $eventos = $evento->get($id,['contain'=>['AlumnosEventos'=>function($t){
        //                                             return $t->contain(['Alumno'=>function($q){
        //                                                                 return $q->select(['egresado'=>'Alumno.nombre']);
        //                                                              },
        //                                                              'Tutore'=>function($q){
        //                                                                 return $q->select(['tutor'=>'Tutore.nombre']);
        //                                                              },
        //                                                              'Entregas'=>function($q){

        //                                                                 return $q->select(['alumnos_evento_id',
        //                                                                                    'monto_total'=>'SUM(monto)'])
        //                                                                 ->group('Entregas.alumnos_evento_id');

        //                                                             }])
        //                                             ->select(['AlumnosEventos.evento_id','AlumnosEventos.id']);
        //                                          }]])
        //                                  ->toArray();
        



        // pr($response);
        // die();
        $this->response->body(json_encode(['response'=>$response]));
    }
}
