<?php
//namespace App\Controllers;
@session_start();

spl_autoload_register(function($className) {
	//print_r($className);die;
	//require_once(__DIR__.'../../Models/'.$className.'.php');
});

spl_autoload_register(function($className) {
	//require_once(__DIR__.'../../Models/Contracts/'.$className.'.php');
});

spl_autoload_register(function($className) {
	//require_once(__DIR__.'../../Models/Adapters/'.$className.'.php');
});

require_once(__DIR__.'../../Config/Connection.php');
require_once(__DIR__.'../../Models/User.php');
require_once(__DIR__.'../../Models/Contracts/UserInterface.php');
require_once(__DIR__.'../../Models/Adapters/UserAdapter.php');

require_once(__DIR__.'../../Models/Booking.php');
require_once(__DIR__.'../../Models/Contracts/BookingInterface.php');
require_once(__DIR__.'../../Models/Adapters/BookingAdapter.php');

require_once(__DIR__.'../../Models/Bus.php');
require_once(__DIR__.'../../Models/Contracts/BusInterface.php');
require_once(__DIR__.'../../Models/Adapters/BusAdapter.php');


require_once(__DIR__.'../../Models/Customer.php');
require_once(__DIR__.'../../Models/Contracts/CustomerInterface.php');
require_once(__DIR__.'../../Models/Adapters/CustomerAdapter.php');


require_once(__DIR__.'../../Models/Driver.php');
require_once(__DIR__.'../../Models/Contracts/DriverInterface.php');
require_once(__DIR__.'../../Models/Adapters/DriverAdapter.php');


require_once(__DIR__.'../../Models/Payment.php');
require_once(__DIR__.'../../Models/Contracts/PaymentInterface.php');
require_once(__DIR__.'../../Models/Adapters/PaymentAdapter.php');

require_once(__DIR__.'../../Models/TravelSchedule.php');
require_once(__DIR__.'../../Models/Contracts/TravelScheduleInterface.php');
require_once(__DIR__.'../../Models/Adapters/TravelScheduleAdapter.php');

class Controller{
function __construct(){
	
}
public function view($view, $data = []) {
	require_once __DIR__.'../../Views/'.$view.'.php';

}

public function Redirect($route){
	
	header('location:'.BASE_URL.'/'.$route);
}
public function Index(){
	return $this->view('index');
}
public function Escape($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  public function setValues(){
	$values = [];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		foreach ($_POST as $key=>$value) {
				$values[$key] = $this->Escape($value);
		}
	}
	return $values;
  }
  function validate(array $rules){
	$errors = [];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		foreach ($rules as $rule) {
			if (empty($_POST[$rule])) {
				$errors[] = $rule;
			} 
		}
	}
	return $errors;
	}
}
?>
