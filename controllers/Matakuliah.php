<?php
/*
Filename : controllers/Matakuliah.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
include_once('../models/MatakuliahModel.php');
class MatakuliahController
{
    private $model;
    public function __construct()
    {
        $this->model = new MatakuliahModel();
    }
    public function addMatakuliah($kodemk,$namamk,$sks)
    {
        return $this->model->addMatakuliah($kodemk,$namamk,$sks);
    }
    public function getMatakuliah($id)
    {
        return $this->model->getMatakuliah($id);
    }
    public function Show($id)
    {
        $rows = $this->model->getMatakuliah($id);
        foreach($rows as $row){
            $val = $row['namamk'];
        }
        return $val;
    }
    public function updateMatakuliah($id,$kodemk,$namamk,$sks)
    {
        return $this->model->updateMatakuliah($id,$kodemk,$namamk,$sks);
    }
    public function deleteMatakuliah($id)
    {
        return $this->model->deleteMatakuliah($id);
    }
    public function getMatakuliahList()
    {
        return $this->model->getMatakuliahList();
    }
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}