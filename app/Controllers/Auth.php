<?php
//namespace App\Controllers;
require_once('Controller.php');
use App\Models\User;
use App\Models\Database;
use App\Models\Adapters\UserAdapter;
class Auth extends Controller{
	private $user;
function __construct(){
	$this->user=new UserAdapter(new User());
	
}

public function login(){
	$result=$this->user->login($_POST['username'],$_POST['password']);
    //print_r($result);die;
    if($result){
        $this->Redirect('Dashboard/Index');
    }else{
        $data['error']="Login Failed. Please Check your credentials and try again";
        $this->view('index',$data);
    }
	//
	}
}
?>
