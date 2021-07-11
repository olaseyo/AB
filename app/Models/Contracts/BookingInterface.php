<?php
namespace App\Models\Contracts;
interface BookingInterface{
    public function getById($id);
    public function get();
    public function create(array $attribute);
    public function update(array $data,array $conditions);
    public function delete(array $conditions);
    public function getQuery($query);
}
?>
