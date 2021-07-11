<?php
namespace App\Models\Contracts;
interface UserInterface{
    public function getUserById($id);
    public function getUsers();
    public function createUser(array $attribute);
    public function updateUser(array $data,array $conditions);
    public function deleteUser(array $conditions);
    public function login($username,$password);
    public function getQuery($query);
}

?>
