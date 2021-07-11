<?php
namespace App\Models;
use App\Models\Model;
use App\Config\Connection;
require_once('Model.php');
class User extends Model{
	public $database;
	function __construct(){
		$this->database=new Database();//$database;
		$connection_obj=new Connection();
		$this->database->connect=$connection_obj->openConnection();
	}
	

    public function getUsers(){
        return $this->database->getResults( "SELECT * FROM `users`" );
    }

    public function getQuery($table){
        return $this->database->getRow("SELECT * FROM ".$table." order by id DESC");
    }

	public function getUserById($id){
        return $this->database->getRow("SELECT * FROM `users` where id=$id");
    }

    public function createUser($data){
        return $this->database->insert('users',$data);
    }

    public function updateUser(array $data,array $conditions){
        return $this->database->update( 'users',$data,$conditions);

    }

    public function deleteUser(array $conditions){
        return $this->database->delete('users',$conditions);
    }

	//logs user in
	function Login($username,$password){
		$hashp=md5($password);
		$response=array();
		$result=$this->database->getRow( "SELECT * FROM `users` where username='$username' and `password`='$hashp'");
		if (count($result)>0){
			$_SESSION['id']=$result['id'];
			$_SESSION['username']=$result['username'];
			$_SESSION['is_admin']=$result['is_admin'];
			$_SESSION['status']=$result['status'];
			$_SESSION['token']=MD5(uniqid());
			return true;
		}
		else{
			return false;
		}
	}

}
?>
