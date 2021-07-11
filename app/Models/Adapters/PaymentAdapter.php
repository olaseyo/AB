<?php
namespace App\Models\Adapters;
require_once(__DIR__.'../../Payment.php');
require_once(__DIR__.'../../Contracts/PaymentInterface.php');
use App\Models\Contracts\PaymentInterface;
use App\Models\Payment;
class PaymentAdapter implements PaymentInterface{
	public $payment;

	//class constructor
	function __construct(Payment $payment){
		$this->payment=$payment;
	}
	
    public function getById($id){
       return $this->payment->getById($id);
    }

    public function get(){
        return $this->payment->get();
     }

     public function create(array $data){
        return $this->payment->create($data);
     }

     public function update($data,$conditions){
        return $this->payment->update($data,$conditions);
     }

     public function delete($conditions){
        return $this->payment->delete($conditions);
     }
     public function getQuery($query){
      return $this->payment->getQuery($query);
   }
}
?>
