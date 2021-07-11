<?php
namespace App\Models;
use App\Models\Model;
use App\Config\Connection;
require_once('Model.php');
class Payment extends Model{
	public $database;
	protected $table="payments";
        function __construct(){
            $this->database=new Database();//$database;
            $connection_obj=new Connection();
            $this->database->connect=$connection_obj->openConnection();
        }
	
    public function get(){
        return $this->database->getResults( "SELECT * FROM ".$this->table."" );
    }

    public function getById($id){
        return $this->database->getRow( "SELECT * FROM ".$this->table." where id=$id" );
    }

    public function create($data){
        return $this->database->insert($this->table,$data);
    }

    public function update(array $data,array $conditions){
        return $this->database->update($this->table,$data,$conditions);

    }

    public function delete(array $conditions){
        return $this->database->delete($this->table,$conditions);
    }
    public function getQuery($table){
        return $this->database->getRow("SELECT * FROM ".$table." order by id DESC");
    }
}
?>
