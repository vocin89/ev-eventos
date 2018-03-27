<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Entregas Controller
 *
 * @property \App\Model\Table\EntregasTable $Entregas
 *
 * @method \App\Model\Entity\Entrega[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EntregasController extends AppController
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
            'contain' => ['ModalidadPagos', 'AlumnosEventos', 'Users']
        ];
        $entregas = $this->paginate($this->Entregas);

        $this->set(compact('entregas'));
    }

    /**
     * View method
     *
     * @param string|null $id Entrega id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entrega = $this->Entregas->get($id, [
            'contain' => ['ModalidadPagos', 'AlumnosEventos', 'Users']
        ]);

        $this->set('entrega', $entrega);
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
     * @param string|null $id Entrega id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entrega = $this->Entregas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entrega = $this->Entregas->patchEntity($entrega, $this->request->getData());
            if ($this->Entregas->save($entrega)) {
                $this->Flash->success(__('The entrega has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The entrega could not be saved. Please, try again.'));
        }
        $modalidadPagos = $this->Entregas->ModalidadPagos->find('list', ['limit' => 200]);
        $alumnosEventos = $this->Entregas->AlumnosEventos->find('list', ['limit' => 200]);
        $users = $this->Entregas->Users->find('list', ['limit' => 200]);
        $this->set(compact('entrega', 'modalidadPagos', 'alumnosEventos', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Entrega id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entrega = $this->Entregas->get($id);
        if ($this->Entregas->delete($entrega)) {
            $this->Flash->success(__('The entrega has been deleted.'));
        } else {
            $this->Flash->error(__('The entrega could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
