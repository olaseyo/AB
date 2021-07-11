<?php
require_once('Controller.php');
use App\Models\Database;
use App\Models\Booking as BookingModel;
use App\Models\Adapters\BookingAdapter;
use App\Models\Payment as PaymentModel;
use App\Models\Adapters\PaymentAdapter;
use App\Models\TravelSchedule as TravelScheduleModel;
use App\Models\Adapters\TravelScheduleAdapter;
use App\Models\Customer as CustomerModel;
use App\Models\Adapters\CustomerAdapter;
class Booking extends Controller{
  private $booking;
  private $payment;
  private $travel_schedule;
  private $customer;
  function __construct(){
    $this->booking=new BookingAdapter(new BookingModel());
    $this->payment=new PaymentAdapter(new PaymentModel());
    $this->travel_schedule=new TravelScheduleAdapter(new TravelScheduleModel());
    $this->customer=new CustomerAdapter(new CustomerModel());
  }
  public function index(){
    $data['data']=$this->booking->get();
    //print_r($data['data']);die;
    $this->view('Booking/index',$data);
  }
  

  public function create($destination="",$schedule_id=0){
    $destination=base64_decode($destination);
    $schedule_id=base64_decode($schedule_id);
    $destinations=$this->travel_schedule->getDestinations();
    $buses=$this->travel_schedule->getDestinationBuses($destination);
    $fare=$this->travel_schedule->getFare($schedule_id);
    $data['data']['destination']=$destinations;
    $data['data']['buses']=$buses;
    $data['data']['fare']=$fare;
    $this->view('Booking/create',$data);
  }
  
  public function edit($user_id){
    $id=base64_decode($user_id);
    $data['data']=$this->booking->getById($id);
    $this->view('Booking/edit',$data);
  }
  
  public function update(){
    $data['data']=$this->setValues();
    $errors=$this->validate(array('name','class','reg_no','total_seat','user_id'));
    if(count($errors)<1){
      $result=$this->booking->update($data['data'],['id'=>$data['data']['id']]);
      $data['response']=($result)? ["success"=>"Bus update succefully"]:["error"=>"And error occurred while updating bus"];
      $data['data']=$this->booking->getById($data['data']['id']);
    }else{
      $data['response']['error']="The following are require ".implode(',',$errors);	
    }
    $this->view('Booking/edit',$data);
  }
  
  public function getCustomer($phone){
    $customer=$this->customer->getByPhone($phone);
    if(!$customer){
      return $this->customer->create(['phone'=>$phone,'user_id'=>$_SESSION['id']]);
    }else{
      return $customer['id'];
    }
  }

  public function reduceSeatNumber($schedule_id,$total_seat){
      $travel_schedule=$this->travel_schedule->getById($schedule_id);
    if($travel_schedule){
      $remaining_seat=($travel_schedule['total_seat']<$total_seat)? $total_seat:$travel_schedule['total_seat']-$total_seat;
      if($travel_schedule['total_seat']>$total_seat){
      $this->travel_schedule->update(['total_seat'=>$remaining_seat],['id'=>$schedule_id]);
      }
    }
    return $remaining_seat;
  }

  public function store(){
    $data['data']=$this->setValues();
    $destinations=$this->travel_schedule->getDestinations();
     $customer_id= $this->getCustomer($data['data']['phone']);
      unset($data['data']['phone']);
      unset($data['data']['driver_id']);
      unset($data['data']['bus_id']);
      $data['data']['customer_id']=$customer_id;
      $data['data']['code']=uniqid('AD');
      $remaining_seat_number=$this->reduceSeatNumber($data['data']['schedule_id'],$data['data']['number_of_seat']);
      if($remaining_seat_number>$data['data']['number_of_seat']){
        $result=$this->booking->create($data['data']);
        $_SESSION['booking_id']=$result;
        $data['response']=($result)? ["success"=>"Booking created succefully"]:["error"=>"And error occurred while creating booking"];
        $this->Redirect('Booking/pay');
      }else{
        $data['response']['error']=$data['data']['number_of_seat']." Seat(s) not available";
      }
      $data['data']['destination']=$destinations;
      $this->view('Booking/create',$data);

  }

  public function pay(){
      $booking=$this->booking->getById($_SESSION['booking_id']);
      $data['data']['booking']=$booking;
      $this->view('Booking/payment',$data);
}
public function confirm(){
      $data['data']=$this->setValues();
      $result=$this->payment->create($data['data']);
      $data['data']['booking']=$this->booking->getById($_SESSION['booking_id']);
      $data['response']=($result)? ["success"=>"Payment made succefully"]:["error"=>"And error occurred while making payment"];
    $this->view('Booking/payment',$data);
}
public function getRecord(){
  $data=$this->user->getQuery('bookings');
  echo '<div class="data">'.$data['id'].'</div>';
}
}