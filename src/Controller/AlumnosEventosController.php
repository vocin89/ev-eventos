<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * AlumnosEventos Controller
 *
 * @property \App\Model\Table\AlumnosEventosTable $AlumnosEventos
 *
 * @method \App\Model\Entity\AlumnosEvento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlumnosEventosController extends AppController
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
        $this->paginate = [
            'contain' => ['Alumno', 'Tutore', 'Eventos', 'Modalidades']
        ];
        $alumnosEventos = $this->paginate($this->AlumnosEventos);

        $this->set(compact('alumnosEventos'));
    }

    /**
     * View method
     *
     * @param string|null $id Alumnos Evento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $alumnosEvento = $this->AlumnosEventos->get($id, [
            'contain' => ['Alumno', 'Tutore', 'Eventos', 'Modalidades', 'Entregas']
        ]);

        $this->set('alumnosEvento', $alumnosEvento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->request->is('GET')){ 
            $this->autoRender  = false;
            $alumnos_eventos = TableRegistry::get('ModalidadPago');
            $alumnos_eventos = $alumnos_eventos->find('list',['keyField'=>'id','valueField'=>'nombre']);        

            $this->response->body(json_encode(['modalidad_pago'=>$alumnos_eventos]));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Alumnos Evento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $alumnosEvento = $this->AlumnosEventos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $alumnosEvento = $this->AlumnosEventos->patchEntity($alumnosEvento, $this->request->getData());
            if ($this->AlumnosEventos->save($alumnosEvento)) {
                $this->Flash->success(__('The alumnos evento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alumnos evento could not be saved. Please, try again.'));
        }
        $alumno = $this->AlumnosEventos->Alumno->find('list', ['limit' => 200]);
        $tutore = $this->AlumnosEventos->Tutore->find('list', ['limit' => 200]);
        $eventos = $this->AlumnosEventos->Eventos->find('list', ['limit' => 200]);
        $modalidades = $this->AlumnosEventos->Modalidades->find('list', ['limit' => 200]);
        $this->set(compact('alumnosEvento', 'alumno', 'tutore', 'eventos', 'modalidades'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Alumnos Evento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alumnosEvento = $this->AlumnosEventos->get($id);
        if ($this->AlumnosEventos->delete($alumnosEvento)) {
            $this->Flash->success(__('The alumnos evento has been deleted.'));
        } else {
            $this->Flash->error(__('The alumnos evento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
