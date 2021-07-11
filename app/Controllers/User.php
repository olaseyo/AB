<?php
//namespace App\Controllers;
require_once('Controller.php');
use App\Models\User as UserModel;
use App\Models\Database;
use App\Models\Adapters\UserAdapter;
class User extends Controller{
  private $user;
  function __construct(){
    $this->user=new UserAdapter(new UserModel());
  }
  public function index(){
    $data['data']=$this->user->getUsers();
    $this->view('User/index',$data);
  }
  
  public function create(){
    $this->view('User/create');
  }
  
  public function edit($user_id){
    $id=base64_decode($user_id);
    $data['data']=$this->user->getUserById($id);
    $this->view('User/edit',$data);
  }
  
  public function update(){
    $data['data']=$this->setValues();
    $errors=$this->validate(array('username','fullname','status','email','contact'));
    if(!empty($data['data']['password'])){
      $data['data']['password']=md5($data['data']['password']);
    }else{
      unset($data['data']['password']);
    }
    if(count($errors)<1 && count($data['data'])>0){
      $result=$this->user->updateUser($data['data'],['id'=>$data['data']['id']]);
      $data['response']=($result)? ["success"=>"User update succefully"]:["error"=>"And error occurred while updating user"];
      $data['data']=$this->user->getUserById($data['data']['id']);
      $this->Redirect('User/Index');
    }else{
      $data['response']['error']="The following are require ".implode(',',$errors);	
    }
    $this->view('User/edit',$data);
  }
  
  public function store(){
    $data=$this->setValues();
    $errors=$this->validate(array('username','password','fullname','status','email','contact'));
    $data['password']=md5($data['password']);
    if(count($errors)<1){
      $result=$this->user->createUser($data);
      $data['response']=($result)? ["success"=>"User created successfully"]:["error"=>"And error occurred while creating user"];
    }else{
      $data['response']['error']="The following are require ".implode(',',$errors);	
    }
    $this->view('User/create',$data);
  }
  
  public function destroy($user_id){
    $id=base64_decode($user_id);
    $data['data']=$this->user->getUsers();
    $result=$this->user->deleteUser(array('id'=>$id));
    $data['response']=($result)? ["success"=>"User deleted succefully"]:["error"=>"And error occurred while deleting user"];
    $this->view('User/index',$data);
  }

  public function getRecord(){
    $data=$this->user->getQuery('users');
    echo '<div class="data">'.$data['id'].'</div>';
  }
}