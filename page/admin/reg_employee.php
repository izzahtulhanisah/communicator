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
// Check connection
$employee_id = $_POST['employee_id'];
$employee_password = $_POST['employee_password'];

$sql = "INSERT INTO employee (employee_id, employee_password)
	  VALUES ('$employee_id','$employee_password')";
$result = mysqli_query($conn,$sql);

header("Location: staff.php");

?>
