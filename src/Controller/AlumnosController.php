<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Alumnos Controller
 *
 *
 * @method \App\Model\Entity\Alumno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlumnosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $alumnos = [];

        $this->set([
                'response' => $alumnos,
                '_serialize' => ['response']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $alumno = $this->Alumnos->get($id, [
            'contain' => []
        ]);

        $this->set('alumno', $alumno);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $alumno = $this->Alumnos->newEntity();
        if ($this->request->is('post')) {
            $alumno = $this->Alumnos->patchEntity($alumno, $this->request->getData());
            if ($this->Alumnos->save($alumno)) {
                $this->Flash->success(__('The alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('alumno'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $alumno = $this->Alumnos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $alumno = $this->Alumnos->patchEntity($alumno, $this->request->getData());
            if ($this->Alumnos->save($alumno)) {
                $this->Flash->success(__('The alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('alumno'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alumno = $this->Alumnos->get($id);
        if ($this->Alumnos->delete($alumno)) {
            $this->Flash->success(__('The alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The alumno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


   
}
