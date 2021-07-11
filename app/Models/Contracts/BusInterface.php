<?php
namespace App\Models\Contracts;
interface BusInterface{
    public function getById($id);
    public function get();
    public function create(array $attribute);
    public function update(array $data,array $conditions);
    public function delete(array $conditions);
    public function getAvailableBuses();
    public function getQuery($query);
}
?>
