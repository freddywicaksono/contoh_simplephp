<?php
$filename = getFilename();
if($filename=="add.php" || $filename=="edit.php" || $filename=="delete.php"){
    $width=5;
} else {
    $width=10;
}
?>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-<?php echo $width; ?> col-md-<?php echo $width; ?> col-sm-<?php echo $width; ?>">
                <div style="margin-top:20px">
                    <div class="card">
                        <!-- the index container -->
                        <div class="body table-responsive">
                            <div class="panel panel-default">
                                <div class="panel-body" id="primary-content">