<?php
namespace App\Models\Adapters;
require_once(__DIR__.'../../Driver.php');
require_once(__DIR__.'../../Contracts/DriverInterface.php');
use App\Models\Contracts\DriverInterface;
use App\Models\Driver;
class DriverAdapter implements DriverInterface{
	public $driver;

	//class constructor
	function __construct(Driver $driver){
		$this->driver=$driver;
	}
	
    public function getById($id){
       return $this->driver->getById($id);
    }

    public function get(){
        return $this->driver->get();
     }

     public function getAvailableDrivers(){
      return $this->driver->getAvailableDrivers();
   }

     public function create(array $data){
        return $this->driver->create($data);
     }

     public function update($data,$conditions){
        return $this->driver->update($data,$conditions);
     }

     public function delete($conditions){
        return $this->driver->delete($conditions);
     }
     public function getQuery($query){
      return $this->driver->getQuery($query);
   }
}
?>
