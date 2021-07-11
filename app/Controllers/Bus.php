<?php
//namespace App\Controllers;
require_once('Controller.php');
use App\Models\Bus as BusModel;
use App\Models\Database;
use App\Models\Adapters\BusAdapter;
class Bus extends Controller{
  private $bus;
  function __construct(){
    $this->bus=new BusAdapter(new BusModel());
  }
  public function index(){
    $data['data']=$this->bus->get();
    $this->view('Bus/index',$data);
  }
  
  public function create(){
    $this->view('Bus/create');
  }
  
  public function edit($user_id){
    $id=base64_decode($user_id);
    $data['data']=$this->bus->getById($id);
    $this->view('Bus/edit',$data);
  }
  
  public function update(){
    $data['data']=$this->setValues();
    $errors=$this->validate(array('name','class','reg_no','total_seat','user_id'));
    if(count($errors)<1){
      $result=$this->bus->update($data['data'],['id'=>$data['data']['id']]);
      $data['response']=($result)? ["success"=>"Bus update succefully"]:["error"=>"And error occurred while updating bus"];
      $data['data']=$this->bus->getById($data['data']['id']);
    }else{
      $data['response']['error']="The following are require ".implode(',',$errors);	
    }
    $this->view('Bus/edit',$data);
  }
  
  public function store(){
    $data['data']=$this->setValues();
    $errors=$this->validate(array('name','class','reg_no','total_seat','user_id'));
    if(count($errors)<1){
      $result=$this->bus->create($data['data']);
      $data['response']=($result)? ["success"=>"Bus created succefully"]:["error"=>"And error occurred while creating bus"];
    }else{
      $data['response']['error']="The following are require ".implode(',',$errors);	
    }
    $this->view('Bus/create',$data);
  }
  
  public function destroy($user_id){
    $id=base64_decode($user_id);
    $result=$this->bus->delete(array('id'=>$id));
    $data['data']=$this->bus->get();
    $data['response']=($result)? ["success"=>"Bus deleted succefully"]:["error"=>"And error occurred while deleting bus"];
    $this->view('Bus/index',$data);
  }
  public function getRecord(){
    $data=$this->bus->getQuery('buses');
    echo '<div class="data">'.$data['id'].'</div>';
  }
}