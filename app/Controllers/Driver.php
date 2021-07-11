<?php
//namespace App\Controllers;
require_once('Controller.php');
use App\Models\Driver as DriverModel;
use App\Models\Database;
use App\Models\Adapters\DriverAdapter;
class Driver extends Controller{
  private $driver;
  function __construct(){
    $this->driver=new DriverAdapter(new DriverModel());
  }
  public function index(){
    $data['data']=$this->driver->get();
    $this->view('Driver/index',$data);
  }
  
  public function create(){
    $this->view('Driver/create');
  }
  
  public function edit($user_id){
    $id=base64_decode($user_id);
    $data['data']=$this->driver->getById($id);
    $this->view('Driver/edit',$data);
  }
  
  public function update(){
    $data['data']=$this->setValues();
    $errors=$this->validate(array('fullname','contact','user_id'));
    if(count($errors)<1){
      $result=$this->driver->update($data['data'],['id'=>$data['data']['id']]);
      $data['response']=($result)? ["success"=>"Driver update succefully"]:["error"=>"And error occurred while updating driver"];
      $data['data']=$this->driver->getById($data['data']['id']);
    }else{
      $data['response']['error']="The following are require ".implode(',',$errors);	
    }
    $this->view('Driver/edit',$data);
  }
  
  public function store(){
    $data['data']=$this->setValues();
    $errors=$this->validate(array('fullname','contact','user_id'));
    if(count($errors)<1){
      $result=$this->driver->create($data['data']);
      $data['response']=($result)? ["success"=>"Driver created succefully"]:["error"=>"And error occurred while creating driver"];
    }else{
      $data['response']['error']="The following are require ".implode(',',$errors);	
    }
    $this->view('Driver/create',$data);
  }
  
  public function destroy($user_id){
    $id=base64_decode($user_id);
    $result=$this->driver->delete(array('id'=>$id));
    $data['data']=$this->driver->get();
    $data['response']=($result)? ["success"=>"Driver deleted succefully"]:["error"=>"And error occurred while deleting driver"];
    $this->view('Driver/index',$data);
  }
  public function getRecord(){
    $data=$this->driver->getQuery('drivers');
    echo '<div class="data">'.$data['id'].'</div>';
  }
}