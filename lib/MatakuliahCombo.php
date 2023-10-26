<?php
/*
Filename : lib/MatakuliahCombo.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
$id = null; // Set a default value for $id
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
include("../controllers/Matakuliah.php");
$obj = new MatakuliahController();
$obj->getDataCombo($id);
?>