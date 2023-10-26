<?php
/*
Filename : MatakuliahModel.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
include_once('../db/database.php');
class MatakuliahModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function addMatakuliah($kodemk,$namamk,$sks)
    {
        $sql = "INSERT INTO matakuliah (kodemk, namamk, sks) VALUES (:kodemk,:namamk,:sks)";
        $params = array(
          ":kodemk" => $kodemk,
          ":namamk" => $namamk,
          ":sks" => $sks);
        $result= $this->db->executeQuery($sql, $params);
        // Check if the insert was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Insert successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Insert failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }
    public function getMatakuliah($id)
    {
        $sql = "SELECT * FROM matakuliah WHERE id = :id";
        $params = array(":id" => $id);
        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateMatakuliah($id,$kodemk,$namamk,$sks)
    {
        $sql = "UPDATE matakuliah SET kodemk = :kodemk, namamk = :namamk, sks = :sks WHERE id = :id";
        $params = array(
          ":kodemk" => $kodemk,
          ":namamk" => $namamk,
          ":sks" => $sks,
          ":id" => $id
        );
    
        // Execute the query
        $result = $this->db->executeQuery($sql, $params);
    
        // Check if the update was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Update successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Update failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }
    
    public function deleteMatakuliah($id)
    {
        $sql = "DELETE FROM matakuliah WHERE id = :id";
        $params = array(":id" => $id);
        $result = $this->db->executeQuery($sql, $params);
        // Check if the delete was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Delete successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Delete failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }
    public function getMatakuliahList()
    {
        $sql = 'SELECT * FROM matakuliah';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDataCombo()
    {
        $sql = 'SELECT * FROM matakuliah';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}