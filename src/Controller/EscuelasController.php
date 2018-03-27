<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
        require_once(ROOT . DS . 'vendor' . DS . 'php-excel-reader' . DS . "SpreadsheetReader.php");

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

    public function test(){
        $this->autoRender = false;  

        $persona = TableRegistry::get('Personas');
        $t = $persona->find('list',['keyField'=>'id','valueField'=>'nombre'])->toArray();;

        $r = [];
        foreach ($t as $key => $c) {
            $r[] = "update personas set nombre='".ucwords($c)."' where id={$key}";
        }
        echo implode(';', $r);
        return;
    $Reader = new \SpreadsheetReader('D:\Documents\esteban-vazquez\b.xlsx');
    $Sheets = $Reader -> Sheets();

    $Reader -> ChangeSheet(0);

   
        $eventos = TableRegistry::get('Eventos');

        $eventos = $eventos->find()
                    ->contain(['Escuelas'])    
                    ->toArray();

        foreach ($eventos as $key => $value) {
                       $y[$value['escuela']['nombre']] = $value['id'];
                    }            

        // pr($y);

        $data = [];
        $pp = [];
        foreach($Reader as $key => $fields ){
            // if($key!=0){
                

            //     $mod = str_replace(' ','',ucfirst(strtolower(($fields[14]))));    
            //     if(in_array($mod, ['Eventbrite','Evenbrite','Evebrite','Evenbtite','Evenbirte','Evenbite'])){
            //         $volvera = 4;
            //     }else{
            //         if(in_array($mod, ['Transferencia','Transfarencia'])){
            //             $volvera = 5;
            //         }else{
            //             if(in_array($mod, ['Efectivo'])){
            //                 $volvera = 3;
            //             }else{
            //                 if(in_array($mod, ['Credito'])){
            //                     $volvera = 1;
            //                 }else{
            //                     if($mod==''){
            //                         $volver = null;
            //                     }else{
            //                     $volvera = 2;   
                                    
            //                     } 
            //                 }
            //             }
            //         }
            //     }

            //     $data[$key] = ['monto'=>$fields[13],
            //                    'fecha'=>date('Y-m-d',strtotime($fields[0])),
            //                     'modalidad_pago_id'=>$volvera];
                
                

                
            //     $data[$key]['alumnos_evento']['alumno']['nombre']= $fields[1];
            //     $data[$key]['alumnos_evento']['alumno']['email']= $fields[2];
            //     $data[$key]['alumnos_evento']['alumno']['telefono']= $fields[3];
            //     $data[$key]['alumnos_evento']['alumno']['dni']= str_replace(' ','',str_replace('.', '', $fields[4]));
                
            //     $data[$key]['alumnos_evento']['evento_id'] = $y[str_replace("\n", '', $fields[5])];

                
            //     $data[$key]['alumnos_evento']['tutore']['nombre']= $fields[9];
            //     $data[$key]['alumnos_evento']['tutore']['telefono']= $fields[10];
            //     $data[$key]['alumnos_evento']['tutore']['email']= $fields[11];
            // }

            if(strtoupper($fields[4])=='43157277')
                $pp[] = $key;

            if($key==430) break;
        } 

        echo json_encode($pp);
        return;
        // pr($data);
        // return ;
        // In a controller
        $alumnos_eventos = TableRegistry::get('Entregas');


        
        // die();
        $entities = $alumnos_eventos->newEntities($data,['associated'=>['AlumnosEventos'=>['associated'=>['Alumno','Tutore']]]]);
        
        foreach ($entities as $entity) {
            // Save entity
            $alumnos_eventos->save($entity);
        }    

    }

    public function test1(){
        $this->autoRender = false;
        return;
        $escuelas = TableRegistry::get('Escuelas');
        $r = $escuelas->find('list',['keyField'=>'id','valueField'=>'nombre'])->toArray();
        // INSERT INTO `eventos` (`id`, `nombre`, `modelo`, `model_id`, `tipo_evento_id`, `fecha`, `horario`, `precio`, `activo`, `created`, `modified`, `eliminado`) 
        $v = [];            
            foreach($r as $key=> $p){ 

                $v[] = "(NULL, 'Egresados {$p} 2018', NULL, {$key}, 1, NULL, NULL, 0, 1, NULL, NULL, 0)";

            }
        

        pr(implode(',', $v));
    }

    public function test2(){
        $this->autoRender = false;




    }
}
