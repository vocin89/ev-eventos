<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoEventos Controller
 *
 * @property \App\Model\Table\TipoEventosTable $TipoEventos
 *
 * @method \App\Model\Entity\TipoEvento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoEventosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Models']
        ];
        $tipoEventos = $this->paginate($this->TipoEventos);

        $this->set(compact('tipoEventos'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Evento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoEvento = $this->TipoEventos->get($id, [
            'contain' => ['Models', 'Eventos']
        ]);

        $this->set('tipoEvento', $tipoEvento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoEvento = $this->TipoEventos->newEntity();
        if ($this->request->is('post')) {
            $tipoEvento = $this->TipoEventos->patchEntity($tipoEvento, $this->request->getData());
            if ($this->TipoEventos->save($tipoEvento)) {
                $this->Flash->success(__('The tipo evento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo evento could not be saved. Please, try again.'));
        }
        $models = $this->TipoEventos->Models->find('list', ['limit' => 200]);
        $this->set(compact('tipoEvento', 'models'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Evento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoEvento = $this->TipoEventos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoEvento = $this->TipoEventos->patchEntity($tipoEvento, $this->request->getData());
            if ($this->TipoEventos->save($tipoEvento)) {
                $this->Flash->success(__('The tipo evento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo evento could not be saved. Please, try again.'));
        }
        $models = $this->TipoEventos->Models->find('list', ['limit' => 200]);
        $this->set(compact('tipoEvento', 'models'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Evento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoEvento = $this->TipoEventos->get($id);
        if ($this->TipoEventos->delete($tipoEvento)) {
            $this->Flash->success(__('The tipo evento has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo evento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
