<?php
namespace App\Models;
use App\Models\Model;
use App\Config\Connection;
require_once('Model.php');
class TravelSchedule extends Model{
	public $database;
	protected $table="travel_schedules";
	function __construct(){
		$this->database=new Database();//$database;
		$connection_obj=new Connection();
		$this->database->connect=$connection_obj->openConnection();
	}
	
    public function get(){
        return $this->database->getResults( "SELECT *,drivers.id as driver_id,buses.id as bus_id FROM ".$this->table." JOIN drivers on drivers.id=travel_schedules.driver_id JOIN buses on buses.id=travel_schedules.bus_id" );
    }

    public function getById($id){
        return $this->database->getRow( "SELECT * FROM ".$this->table." where id=$id" );
    }

    public function create($data){
        return $this->database->insert($this->table,$data);
    }

    public function update(array $data,array $conditions){
        return $this->database->update($this->table,$data,$conditions);
    }

    public function delete(array $conditions){
        return $this->database->delete($this->table,$conditions);
    }
    public function getDestinations(){
        return $this->database->getResults( "SELECT distinct(destination) FROM ".$this->table."" );
    }
    public function getDestinationBuses($destination){
        return $this->database->getResults( "SELECT *,travel_schedules.id as schedule_id FROM ".$this->table." JOIN buses on buses.id=travel_schedules.bus_id where destination LIKE '%".$destination."%' and travel_schedules.total_seat >0");
    }
    public function getFare($travel_schedule_id){
        if(!empty($travel_schedule_id)){
        return $this->database->getRow( "SELECT * FROM ".$this->table." where id=".$travel_schedule_id."");
        }
        return false;
    }
    public function getQuery($table){
        
        return $this->database->getRow("SELECT * FROM ".$table." order by id DESC");
    }
    
}
?>
