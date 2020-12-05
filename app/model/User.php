<?php
require_once APPATH .  "app/database/DBO.php";

class User{
    private $db;

    function __construct(){
        $this->db = new DBO();
        $this->db->connect();
    }

    public function addUser($username, $password){
        $this->db->query('INSERT INTO user (username, password) VALUES (?, ?)');
        $this->db->stmt->bind_param('ss', $username, $password);
        
        if($this->db->execute())
            return $this->db->con->insert_id;
        else
            return null;
    }

    public function getUser($username){
        $this->db->query('SELECT * FROM user WHERE username = ?');
        $this->db->stmt->bind_param('s', $username);

        if($this->db->execute()){
            $result = $this->db->preparedResult();
            return $result;
        }

        return null;
    }

    public function getAllUser(){
        $this->db->query('SELECT * FROM user');
        if($this->db->execute()){
            $result = $this->db->preparedResult();
            return $result;
        }

        return null;
    }
}
?>