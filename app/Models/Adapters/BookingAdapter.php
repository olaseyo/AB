<?php
namespace App\Models\Adapters;
require_once(__DIR__.'../../Booking.php');
require_once(__DIR__.'../../Contracts/BookingInterface.php');
use App\Models\Contracts\BookingInterface;
use App\Models\Booking;
class BookingAdapter implements BookingInterface{
	public $booking;

	//class constructor
	function __construct(Booking $booking){
		$this->booking=$booking;
	}
	
    public function getById($id){
       return $this->booking->getById($id);
    }

    public function get(){
        return $this->booking->get();
     }

     public function create(array $data){
        return $this->booking->create($data);
     }

     public function update($data,$conditions){
        return $this->booking->update($data,$conditions);
     }

     public function delete($conditions){
        return $this->booking->delete($conditions);
     }
     public function getQuery($query){
      return $this->booking->getQuery($query);
   }
}
?>
