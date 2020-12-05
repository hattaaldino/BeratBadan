<?php 
require_once APPATH .  "app/database/DBO.php";

class BeratBadan {
    private $db;

    function __construct(){
        $this->db = new DBO();
        $this->db->connect();
    }

    public function addBBHarian($id, $tanggal, $max, $min){
        $this->db->query('INSERT INTO berat VALUES (?, ?, ?, ?)');
        $this->db->stmt->bind_param('isii', $id, $tanggal, $max, $min);

        return $this->db->execute();
    }

    public function getAllBB($id){
        $this->db->query('SELECT * FROM berat WHERE user_id = ? ORDER BY tanggal DESC');
        $this->db->stmt->bind_param('i', $id);
        
        if($this->db->execute()){
            $result = $this->db->preparedResult();
            return $result;
        }
        
        return null;
    }

    public function getBB($id, $tanggal){
        $this->db->query('SELECT * FROM berat WHERE user_id = ? AND tanggal = ?');
        $this->db->stmt->bind_param('is', $id, $tanggal);

        if($this->db->execute()){
            $result = $this->db->preparedResult();
            return $result;
        }
        
        return null;
    }

}
?>