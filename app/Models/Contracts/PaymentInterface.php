<?php
namespace App\Models\Contracts;
interface PaymentInterface{
    public function getById($id);
    public function get();
    public function create(array $attribute);
    public function update(array $data,array $conditions);
    public function delete(array $conditions);
    public function getQuery($query);
}
?>
