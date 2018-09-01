<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['sv_id'])){
header("location: ../../index.html");
}
?>


<?php

// Create connection
include 'database.php';


$highlight_date = $_POST['highlight_date'];
$highlight_message = $_POST['highlight_message'];
$highlight_status = $_POST['highlight_status'];
//$manager_id = $_SESSION['manager_id'];

$sql = "INSERT INTO highlight (highlight_date, highlight_message, highlight_status)
	  VALUES (NOW(),'$highlight_message','$highlight_status')";
$result = mysqli_query($conn,$sql);

header('Location: sv_home.php');

?>
