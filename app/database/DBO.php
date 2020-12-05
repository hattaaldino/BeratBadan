<?php

class DBO{
	public $con;
	public $stmt;

	public function connect(){
		$this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if(mysqli_connect_errno()){
			die("Failed to connect to database : " . mysqli_connect_error());
		}

		return $this->con;
	}

	public function query($query){
		$this->stmt = $this->con->prepare($query);
	}

	public function execute() {
		return $this->stmt->execute();
	}

	public function resultSet() {
		return $this->stmt->fetchAll(MYSQLI_ASSOC); 
	} 

	public function preparedResult(){
		$meta = $this->stmt->result_metadata();
		while ($field = $meta->fetch_field())
		{
			$params[] = &$row[$field->name];
		}

		call_user_func_array(array($this->stmt, 'bind_result'), $params);

		$result = [];
		while ($this->stmt->fetch()) {
			foreach($row as $key => $val)
			{
				$c[$key] = $val;
			}
			$result[] = $c;
		}

		return $result;
	}

	public function close(){
		$this->stmt->close();
	}
}

?>