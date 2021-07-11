<?php
require_once('Controller.php');
use App\Models\User as UserModel;
use App\Models\Customer as CustomerModel;
use App\Models\Booking as BookingModel;
use App\Models\Bus as BusModel;
use App\Models\Database;
use App\Models\Adapters\UserAdapter;
use App\Models\Adapters\CustomerAdapter;
use App\Models\Adapters\BookingAdapter;
use App\Models\Adapters\BusAdapter;

class Dashboard extends Controller{
	private $user,$customer,$booking,$bus;
function __construct(){
	$this->user=new UserAdapter(new UserModel());
	$this->customer=new CustomerAdapter(new CustomerModel());
	$this->booking=new BookingAdapter(new BookingModel());
	$this->bus=new BusAdapter(new BusModel());
	
}
	public function Index(){
	$data['users']=$this->user->getUsers();
	$data['customers']=$this->customer->get();
	$data['buses']=$this->bus->get();
	$data['bookings']=$this->booking->get();
	$this->view('dashboard',$data);
	}

}