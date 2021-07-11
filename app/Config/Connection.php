<?php
namespace App\Config;
require_once(__DIR__.'../../Config/config.php');
class Connection {
	public  $num_rows = 0;
	private  $instance = null;
	public  $connect;
	protected  $db_data;
	public function __construct() {
		// Load database data
		$this->db_data = array(
			'host' =>DB_HOST,
			'user' =>DB_USER,
			'password' =>DB_PASSWORD,
			'name' =>DATABASE
			);
	}

	public function openConnection(){
		try {
			
			//Connecting to database
			$this->connect = new \PDO ('mysql:host=' . $this->db_data[ 'host' ] . '; dbname=' . $this->db_data[ 'name' ], $this->db_data[ 'user' ] , $this->db_data[ 'password' ] );
			//Exception Error mode set
			$this->connect->setAttribute ( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
		}
		catch ( \PDOException $e ) {
			$this->error_die ( $e->getMessage () );
		}
		return $this->connect;
	}
}