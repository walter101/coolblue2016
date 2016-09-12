<?php

class MysqlDatabase{
	
	public $connection;
	
	//constructor runs on initiation
	function __construct(){
		$this->open_connection();
	}
	
	// open connection
	public function open_connection(){
		$this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		if(mysqli_connect_error()){
			die("Database connection failed". mysql_error(). "(". mysqli_errno() .")" );	
		}
	}
	
	// query database ( doe de query, controleer of de query goed is, return resultaat)
	public function query($sql){
		$result = mysqli_query($this->connection, $sql);
		$this->confirm_query($result);
		return $result;
	}
	
	// escape string voor die de database in gaat (beveiliging)
	public function escape_value($string){
		$escaped_string = mysqli_real_escape_string($this->connection, $string);
		return $escaped_string;
	}

	public function fetch_array($result){
		return mysqli_fetch_array($result);
	}
	
	// kijk of query goed is of stop hele process DIE()	
	private function confirm_query($result){
		if(!($result)) { die("Database query failed"); }
	}
	
	// return num of rows for this resultset
	public function num_rows($result_set){
		return mysqli_num_rows($result_set);	
	}
	
	// get last inserted id 
	public function insert_id(){
		return mysqli_insert_id($this->connection);	
	}
	
	public function affected_rows(){
		return mysqli_affected_rows($this->connection);	
	}
	
	// close connection	( controleer of er een verbinding is, verbreek die, vernietig de $conenction)
	public function close_connection(){
			if(isset($this->connection)){
				mysqli_close($this->connection);
				unset($this->connection);	
			}
	}
	
}

$database = new MysqlDatabase();
?>