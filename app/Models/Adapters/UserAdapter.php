<?php
namespace App\Models\Adapters;
require_once(__DIR__.'../../User.php');
require_once(__DIR__.'../../Contracts/UserInterface.php');
use App\Models\Contracts\UserInterface;
use App\Models\User;
class UserAdapter implements UserInterface{
	public $user;

	//class constructor
	function __construct(User $user){
		$this->user=$user;
	}
	
    public function getUserById($id){
       return $this->user->getUserById($id);
    }

    public function getUsers(){
        return $this->user->getUsers();
     }

     public function createUser(array $data){
        return $this->user->createUser($data);
     }

     public function updateUser($data,$conditions){
        return $this->user->updateUser($data,$conditions);
     }

     public function deleteUser($conditions){
        return $this->user->deleteUser($conditions);
     }
     public function login($username,$password){
      return $this->user->login($username,$password);
   }
   public function getQuery($query){
      return $this->user->getQuery($query);
   }
   
}
?>
