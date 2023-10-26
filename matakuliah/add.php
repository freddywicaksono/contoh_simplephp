<?php
include("../controllers/Matakuliah.php");
include("../lib/functions.php");
$obj = new MatakuliahController();
$msg=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $kodemk = $_POST["kodemk"];
    $namamk = $_POST["namamk"];
    $sks = $_POST["sks"];
    // Insert the database record using your controller's method
    $dat = $obj->addMatakuliah($kodemk,$namamk,$sks);
    $msg = getJSON($dat);
}
include("../layouts/header.php");
include("../layouts/upper_block.php");
?>

<?php 
if($msg===true){ 
    echo '<div class="alert alert-success" style="display: block" id="message_success">Insert Data Berhasil</div>';
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'matakuliah/">';
} elseif($msg===false) {
    echo '<div class="alert alert-danger" style="display: block" id="message_error">Insert Gagal</div>'; 
} else {
}

?>
<div class="header icon-and-heading fs-1">
<i class="zmdi zmdi-view-dashboard zmdi-hc-4x"></i>
    <h2><strong>Matakuliah</strong> <small>Add New Data</small> </h2>
</div>
<hr/>
<form name="formAdd" method="POST" action="">
    <div class="form-group">
            <label>kodemk:</label>
            <input type="text" class="form-control" name="kodemk"  />
        </div>
    <div class="form-group">
            <label>namamk:</label>
            <input type="text" class="form-control" name="namamk"  />
        </div>
    <div class="form-group">
    <label>sks:</label>
        <select id="sks" name="sks" style="width:150px" 
class="form-control">
            <option value="">--pilih--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="6">6</option>
        </select>
    </div>
    <button class="save btn btn-large btn-info" type="submit">Save</button>
    <a href="#index" class="btn btn-large btn-default">Cancel</a>
</form>
<?php
include("../layouts/lower_block.php");
include("../layouts/footer.php");
?>                            