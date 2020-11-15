<?php
require_once '../Constant.php';

class DBO{
	private $con;
	public $stmt;

	function __construct(){

	}

	public function connect(){
		$this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if(mysqli_connect_errno()){
			echo "Failed to connect to database : " . mysqli_connect_error();
		}

		return $this->con;
	}

	public function query($query){
		$this->stmt = $this->con->prepare($query);
	}

	public function execute() {
		$this->stmt->execute();
	}

	public function resultSet() {
		return $this->stmt->fetchAll(MYSQLI_ASSOC); 
	} 

	public function singleResult(){
		return $this->stmt->fetch(MYSQLI_ASSOC); 
	}
}

?>