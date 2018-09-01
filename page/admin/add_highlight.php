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

$highlight_date = $_POST['highlight_date'];
$highlight_message = $_POST['highlight_message'];
$highlight_status = $_POST['highlight_status'];
$admin_id = $_SESSION['admin_id'];

$sql = "INSERT INTO highlight (highlight_date, highlight_message, highlight_status, admin_id)
	  VALUES (NOW(),'$highlight_message','$highlight_status','$admin_id')";
$result = mysqli_query($conn,$sql);

header('Location: admin_home.php');

?>
