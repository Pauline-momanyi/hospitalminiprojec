<?php
include '../database/database_controller.php';
$dbc  = new DatabaseController();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $verified_status = $_GET['status'];
    $dbc->toggle_verified_status($id,$verified_status);

    echo  "<script>alert('Verification status toggled');window.history.back()</script>";
}