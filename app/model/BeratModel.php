<?php 

class BeratModel {
    private $db;

    function __construct(){
        $this->db = new DBO();
        $this->db->connect();
    }

    public function addBBHarian($tanggal, $max, $min){
        $this->db->query('INSERT INTO berat VALUES (?, ?, ?)');
        $this->db->stmt->bind_param('sii', $tanggal, $max, $min);
        $this->db->execute();
    }

    public function getAllBB(){
        $this->db->query('SELECT * FROM berat ORDER BY tanggal DESC');

        return $this->db->resultSet();
    }

    public function getBBbyTanggal($tanggal){
        $this->db->query('SELECT * FROM berat WHERE tanggal = ?');
        $this->db->stmt->bind_param('s', $tanggal);
        $this->db->stmt->bind_result($tanggal_result);

        $this->db->singleResult();

        return $tanggal_result;
    }
}
?>