<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['admin_id'])){
header("location: ../../index.html");
}
?>


<?php

// Create connection
include "database.php";

$sv_id = $_POST['sv_id'];
$sv_password = $_POST['sv_password'];

$sql = "INSERT INTO supervisor (sv_id, sv_password)
	  VALUES ('$sv_id','$sv_password')";
$result = mysqli_query($conn,$sql);

header("Location: manager.php");

?>
