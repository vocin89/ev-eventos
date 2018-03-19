<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Escuelas Controller
 *
 * @property \App\Model\Table\EscuelasTable $Escuelas
 *
 * @method \App\Model\Entity\Escuela[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EscuelasController extends AppController
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
        $escuelas = $this->Escuelas->find()->select(['id','nombre']);

         $this->set([
                'response' => $escuelas,
                '_serialize' => ['response']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Escuela id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $escuela = $this->Escuelas->get($id, [
            'contain' => []
        ]);

        $this->set('escuela', $escuela);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $escuela = $this->Escuelas->newEntity();
        $escuela = $this->Escuelas->patchEntity($escuela, $this->request->getData());
    
        if ($this->Escuelas->save($escuela)) {
            $response = ['status'=>'OK','body'=>$escuela];  
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
     * @param string|null $id Escuela id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $escuela = $this->Escuelas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $escuela = $this->Escuelas->patchEntity($escuela, $this->request->getData());
            if ($this->Escuelas->save($escuela)) {
                $this->Flash->success(__('The escuela has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The escuela could not be saved. Please, try again.'));
        }
        $this->set(compact('escuela'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Escuela id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $escuela = $this->Escuelas->get($id);
        if ($this->Escuelas->delete($escuela)) {
            $this->Flash->success(__('The escuela has been deleted.'));
        } else {
            $this->Flash->error(__('The escuela could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
