<?php
//namespace App\Controllers;
require_once('Controller.php');
use App\Models\Database;
use App\Models\TravelSchedule as TravelScheduleModel;
use App\Models\Adapters\TravelScheduleAdapter;

use App\Models\Bus as BusModel;
use App\Models\Adapters\BusAdapter;

use App\Models\Driver as DriverModel;
use App\Models\Adapters\DriverAdapter;
class TravelSchedule extends Controller{
  private $travel_schedule;
  private $driver;
  private $bus;
  function __construct(){
    $this->travel_schedule=new TravelScheduleAdapter(new TravelScheduleModel());
    $this->driver=new DriverAdapter(new DriverModel());
    $this->bus=new BusAdapter(new BusModel());
  }
  public function index(){
    $data['data']=$this->travel_schedule->get();
    $this->view('TravelSchedule/index',$data);
  }

 
  
  public function create(){
    $data['data']['drivers']=$this->driver->getAvailableDrivers();
    $data['data']['buses']=$this->bus->getAvailableBuses();
    $this->view('TravelSchedule/create',$data);
  }
  
  public function edit($user_id){
    $id=base64_decode($user_id);
    $data['data']=$this->travel_schedule->getById($id);
    $data['data']['drivers']=$this->driver->get();
    $data['data']['buses']=$this->bus->get();
    $this->view('TravelSchedule/edit',$data);
  }
  
  public function update(){
    $data['data']=$this->setValues();
    $errors=$this->validate(array('name','class','reg_no','total_seat','user_id'));
    if(count($errors)<1){
      $result=$this->travel_schedule->update($data['data'],['id'=>$data['data']['id']]);
      $data['response']=($result)? ["success"=>"TravelSchedule update succefully"]:["error"=>"And error occurred while updating bus"];
      $data['data']=$this->travel_schedule->getById($data['data']['id']);
    }else{
      $data['response']['error']="The following are require ".implode(',',$errors);	
    }
    $this->view('TravelSchedule/edit',$data);
  }
  
  public function store(){
    $data['data']=$this->setValues();
    $bus=$this->bus->getById($data['data']['bus_id']);
    $errors=$this->validate(array('starting_point','destination','departure_time','estimated_arrival_time','fare_amount','remark'));
    if(count($errors)<1){
      $data['data']['total_seat']=$bus['total_seat'];
      $result=$this->travel_schedule->create($data['data']);
      $this->driver->update(['busy'=>1],['id'=>$data['data']['driver_id']]);
      $this->bus->update(['busy'=>1],['id'=>$data['data']['bus_id']]);
      $this->Redirect('TravelSchedule/Index');
      $data['response']=($result)? ["success"=>"TravelSchedule created succefully"]:["error"=>"And error occurred while creating bus"];
    }else{
      $data['response']['error']="The following are require ".implode(',',$errors);	
    }
    $data['data']['drivers']=$this->driver->getAvailableDrivers();
    $data['data']['buses']=$this->bus->getAvailableBuses();
    $this->view('TravelSchedule/create',$data);
  }
  
  public function destroy($schedule_id,$driver_id,$bus_id){
    $id=base64_decode($schedule_id);
    $driver_id=base64_decode($driver_id);
    $bus_id=base64_decode($bus_id);
    $result=$this->travel_schedule->delete(array('id'=>$id));
    $data['data']=$this->travel_schedule->get();
    $this->driver->update(['busy'=>0],['id'=>$driver_id]);
    $this->bus->update(['busy'=>0],['id'=>$bus_id]);

    $data['response']=($result)? ["success"=>"TravelSchedule deleted succefully"]:["error"=>"And error occurred while deleting bus"];
    $this->view('TravelSchedule/index',$data);
  }
  public function getRecord(){
    $data=$this->travel_schedule->getQuery('travel_schedules');
    echo '<div class="data">'.$data['id'].'</div>';
  }
  public function getDestination(){
    $data=$this->travel_schedule->getQuery('travel_schedules');
    echo '<div class="data">'.$data['destination'].'</div>';
  }
}