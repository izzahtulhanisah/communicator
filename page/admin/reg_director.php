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

$manager_id = $_POST['manager_id'];
$manager_password = $_POST['manager_password'];

$sql = "INSERT INTO manager (manager_id, manager_password)
	  VALUES ('$manager_id','$manager_password')";
$result = mysqli_query($conn,$sql);

header("Location: director.php");

?>
