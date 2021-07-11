<?php
namespace App\Models\Adapters;
require_once(__DIR__.'../../TravelSchedule.php');
require_once(__DIR__.'../../Contracts/TravelScheduleInterface.php');
use App\Models\Contracts\TravelScheduleInterface;
use App\Models\TravelSchedule;
class TravelScheduleAdapter implements TravelScheduleInterface{
	public $travel;

	//class constructor
	function __construct(TravelSchedule $travel){
		$this->travel=$travel;
	}
	
    public function getById($id){
       return $this->travel->getById($id);
    }

    public function get(){
        return $this->travel->get();
     }

     public function create(array $data){
        return $this->travel->create($data);
     }

     public function update($data,$conditions){
        return $this->travel->update($data,$conditions);
     }

     public function delete($conditions){
        return $this->travel->delete($conditions);
     }
     
     public function getDestinations(){
      return $this->travel->getDestinations();
  }
  public function getDestinationBuses($destination){
      return $this->travel->getDestinationBuses($destination);
  }
  public function getFare($travel_schedule_id){
      return $this->travel->getFare($travel_schedule_id);
  }
  public function getQuery($query){
   return $this->travel->getQuery($query);
}
}
?>
