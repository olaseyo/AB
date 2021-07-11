<?php
namespace App\Models\Adapters;
require_once(__DIR__.'../../Customer.php');
require_once(__DIR__.'../../Contracts/CustomerInterface.php');
use App\Models\Contracts\CustomerInterface;
use App\Models\Customer;
class CustomerAdapter implements CustomerInterface{
	public $customer;

	//class constructor
	function __construct(Customer $customer){
		$this->customer=$customer;
	}
	
    public function getById($id){
       return $this->customer->getById($id);
    }

    public function getByPhone($phone){
      return $this->customer->getByPhone($phone);
   }

    public function get(){
        return $this->customer->get();
     }

     public function create(array $data){
        return $this->customer->create($data);
     }

     public function update($data,$conditions){
        return $this->customer->updateUser($data,$conditions);
     }

     public function delete($conditions){
        return $this->customer->deleteUser($conditions);
     }
     public function getQuery($query){
      return $this->customer->getQuery($query);
   }
}
?>
