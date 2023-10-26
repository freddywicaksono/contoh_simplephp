<?php
include("../controllers/Matakuliah.php");
include("../lib/functions.php");
$obj = new MatakuliahController();
if(isset($_GET["id"])){
    $id=$_GET["id"];
}
$msg=null;
if (isset($_POST['submitted'])==1 && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form was submitted, process the update here
    $id = $_POST['id'];
    
    // delete the database record using your controller's method
    $dat = $obj->deleteMatakuliah($id);
    $msg = getJSON($dat);
    
}
$rows = $obj->getMatakuliah($id);
include("../layouts/header.php");
include("../layouts/upper_block.php");

if($msg===true){ 
    echo '<div class="alert alert-success" style="display: block" id="message_success">Insert Data Berhasil</div>';
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'matakuliah/">';
} elseif($msg===false) {
    echo '<div class="alert alert-danger" style="display: block" id="message_error">Insert Gagal</div>'; 
} else {
}

?>
<div class="header icon-and-heading">
<i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
<h2><strong>Matakuliah</strong> <small>Delete Data</small> </h2>
</div>
<hr/>
<form name="formDelete" method="POST" action="">
    <input type="hidden" class="form-control" name="submitted" value="1"/>
    <dl class="row mt-1">
    <?php foreach ($rows as $row): ?>
    
        <dt class="col-sm-3">ID:</dt><dd class="col-sm-9"><?php echo $row['id']; ?></dd>
        <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly />
    
    <dt class="col-sm-3">kodemk:</dt><dd class="col-sm-9"><?php echo $row['kodemk']; ?></dd>
    <dt class="col-sm-3">namamk:</dt><dd class="col-sm-9"><?php echo $row['namamk']; ?></dd>
    <dt class="col-sm-3">sks:</dt><dd class="col-sm-9"><?php echo $row['sks']; ?></dd>
        <?php endforeach; ?>
    </dl>
    <button class="btn btn-large btn-danger" type="submit">Delete</button>
    <a href="#index" class="btn btn-large btn-default">Cancel</a>
</form>
                                       
<?php
include("../layouts/lower_block.php");
include("../layouts/footer.php");
?>                          