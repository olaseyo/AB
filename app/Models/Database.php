<?php
namespace App\Models;
require_once(__DIR__.'../../Config/config.php');
class Database {
	public  $num_rows = 0;
	private  $instance = null;
	public  $connect;
	protected  $db_data;
	public function __construct() {
			$this->connect=null;
			
	}

	public  function getInstance() {
		( !$this->instance ? $this->instance = new self() : false );
		//return $this->$instance;
	}

	/**
	 * This checks if a row exists in a provided column and row
	 * @param string $table 
	 * @param string $column 
	 * @param string $data 
	 * @return string column data if found, else returns false
	 */
	public  function checkRow( $table, $column, $data ) {
		$this->getInstance();
		try {
			$q = $this->connect->prepare ( "SELECT `{$column}` FROM `{$table}` WHERE `{$column}` = :s" );
			$q->execute ( array (
				':s' => $data 
				));
			if ( $q->rowCount () > 0 ) {
				while( $row = $q->fetch( \PDO::FETCH_ASSOC ) ) {
					return $row[ $column ]; break;
				}
			}
			else {
				return false;
			}
		}
		catch( \PDOException $e ) {
			$this->error_die ( $e->getMessage () );
		}
	}

	/**
	 * This handles the database error messages
	 * @param string $message
	 * @return string
	 */
	protected  function error_die( $message ) {
		return die ( '<strong>DATABASE ERROR:</strong> ' . $message );
	}

	/**
	 * Inserts data into database
	 * 
	 * @param string $table Table name to insert data
	 * @param array $array Array of columns as key and value to insert as value
	 * 
	 * @return integer Returns the last insert ID
	 */
	public  function insert( $table, array $array ) {
		$this->getInstance();
		// Must be an array with data
		if ( !is_array ( $array ) )
			echo $this->error_die ( 'Insert second argument must be array' ); 
		elseif ( !$array )
			echo $this->error_die ( 'Nothing to insert :/' );

		//Gather the columns and implode them separating with comma(,)
		$columns = implode ( ', ', array_keys ( $array ) );

		//Generate placeholders to match the amount of submitted columns
		for( $i = 1; $i <= count( $array ); $i++ ) {
			$data[] = ':data' . $i;
		}

		//Implode the placeholders and separate with comma(,)
		$replace = implode( ", ", $data );

		//Now combine generated placeholders with the values passed
		$data = array_combine( $data, array_values ( $array ) );

		//Data is ready, now insert it!
		try {
			$in = $this->connect->prepare( "INSERT INTO " . $table . " ( " . $columns . " ) VALUES ( " . $replace . " )" );
			$in->execute( $data );
			return $this->connect->lastInsertId();
		}
		catch ( \PDOException $e ) {
			$this->error_die ( $e->getMessage() );
		}
	}

	/**
	 * Private method to generate part of SQL Queries used in other methods
	 * 
	 * @param array $array An array of column as key and value 
	 * @param string $statement Format to arrange the query to
	 * 
	 * @return array
	 */
	private  function do_stuff( array $array, $statement = '{key} = {value}' ) {

		// Generate random placeholders to avoid conflict of existing
		foreach ( $array as $key ) {
			$r[] = ':' . substr ( sha1 ( $key ), 0, 5);
		}

		// Combine generated placeholders with columns
		$replace = array_combine ( array_keys ( $array ), $r );

		// Combine generated placeholders with values
		$joined_data = array_combine ( $r, array_values ( $array ) );

		// Building the query to format needed in $statement
		foreach ( $replace as $key => $value ) {
			$state = str_replace ( '{key}', $key, $statement );
			$state = str_replace ( '{value}', $value, $state );
			$build_query[] =  $state;
		} 

		$return[] = $build_query;
		$return[] = $replace;
		$return[] = $joined_data;
		return $return;
	}


	/**
	 * Deletes row(s) from database
	 * 
	 * @param string $table Table to delete data from
	 * @param array $data Delete a row corresponding to the values in this parameter
	 * @param string $merge If multiple arrays are supplied in $data then set what to merge those values
	 * 
	 * @return bool
	 */
	public  function delete( $table, array $data = array(), $merge = ' AND ' ) {
		$this->getInstance();
		// Build query format
		$code = $this->do_stuff( $data, '{key} = {value}' );

		//Delete data
		try {
			$sql = "DELETE FROM `{$table}` WHERE " . implode( ' ' . $merge . ' ', $code[0] );
			$q = $this->connect->prepare( $sql );
			$q->execute( $code[ 2 ] );
			return true;
		}
		catch( \PDOException $e ) {
			$this->error_die( $e->getMessage() );
		} 
	}
	

	/**
	 * Updates row(s) in a database
	 *
	 * @param string $table Table name to update
	 * @param array $data Array of columns to modify
	 * @param array $where Arrays of matching relation
	 * 
	 * @return bool
	 */
	public  function update( $table, array $data, array $where, $merge = 'AND' ) {
		$this->getInstance();
		// No data supplied?
		if ( !$data && !$where )
			trigger_error( 'Nothing to update :/' );

		// Build queries
		$to_update = $this->do_stuff ( $data, '{key} = {value}' );
		$other_queries = $this->do_stuff ( $where, '{key} = {value}' );
		$sql = "UPDATE {$table} SET " . implode ( ', ', $to_update[0] ) . " WHERE " . implode ( ' ' . $merge . ' ', $other_queries [0] );
		$total_value = array_merge ( $to_update [ 2 ], $other_queries [ 2 ] );
		
		// Update row(s)
		try {
			$q = $this->connect->prepare ( $sql );
			$q->execute ( $total_value );
			return true;
		}
		catch ( \PDOException $e ) {
			$this->error_die ( $e->getMessage () );
		}
	}

	/**
	 * Get rows from database
	 * 
	 * @param string $sql SQL SELECT Query 
	 * @param array $values Placeholders used in $sql
	 * 
	 * @return array
	 */
	public  function getResults( $sql, array $values = array() ) {
		$this->getInstance();
		try {
			// Pass $sql and $values directly the database
			$q = $this->connect->prepare($sql);
			$q->execute( $values );
			$this->num_rows = $q->rowCount();

			if( $q->rowCount() <= 0 ) {
				return array();
			}
			else {
				while( $row = $q->fetch( \PDO::FETCH_ASSOC ) ) {
					$r[] = $row;
				}
				return $r;
			}
		}
		catch( \PDOException $e ) {
			$this->error_die( $e->getMessage() );
		}
	}

	/**
	 * Get a single row from database
	 * 
	 * @param string $sql  SQL SELECT Query
	 * @param array $values Placeholders for values supplied in $sql, if any
	 * 
	 * @return array
	 */
	public  function getRow( $sql, array $values = array() ) {
		//$this->getInstance();
		try {
			$q = $this->connect->prepare( $sql );
			$q->execute( $values );
			$this->num_rows = $q->rowCount();

			if( $q->rowCount() <= 0 ) {
				return array();
			}
			else {
				while( $row = $q->fetch( \PDO::FETCH_ASSOC ) ) {
					return $row; break;
				}
			}
		}
		catch( \PDOException $e ) {
			$this->error_die( $e->getMessage() );
		}
	}

	/**
	 * Passes queries directly to databse without filtering, DON'T PASS DATA HERE!
	 * 
	 * @param $sql SQL Query
	 * 
	 * @return array
	 */
	public  function query( $sql ) {
		//$this->getInstance();
		try {
			$q = $this->connect->query( $sql );
			return $q;
		}
		catch( \PDOException $e ) {
			$this->error_die( $e->getMessage() );
		}
	}
}
