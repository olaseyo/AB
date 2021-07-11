<?php
namespace App\Models\Contracts;
interface TravelScheduleInterface{
    public function getById($id);
    public function get();
    public function getDestinations();
    public function getDestinationBuses($destination);
    public function getFare($travel_schedule_id);
    public function create(array $attribute);
    public function update(array $data,array $conditions);
    public function delete(array $conditions);
    public function getQuery($query);
}
?>
