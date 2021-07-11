<?php
namespace App\Models\Adapters;
require_once(__DIR__.'../../Bus.php');
require_once(__DIR__.'../../Contracts/BusInterface.php');
use App\Models\Contracts\BusInterface;
use App\Models\Bus;
class BusAdapter implements BusInterface{
	public $bus;

	//class constructor
	function __construct(Bus $bus){
		$this->bus=$bus;
	}
	
    public function getById($id){
       return $this->bus->getById($id);
    }

    public function get(){
        return $this->bus->get();
     }

     public function create(array $data){
        return $this->bus->create($data);
     }

     public function update($data,$conditions){
        return $this->bus->update($data,$conditions);
     }

     public function delete($conditions){
        return $this->bus->delete($conditions);
     }
     public function getAvailableBuses(){
      return $this->bus->getAvailableBuses();
     }
     public function getQuery($query){
      return $this->bus->getQuery($query);
   }
}
?>
