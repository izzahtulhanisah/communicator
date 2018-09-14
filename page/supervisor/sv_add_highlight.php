<?php
/*session_start();
//error_reporting(0);
if(!isset($_SESSION['sv_id'])){
header("location: ../../index.html");
}*/
?>


<?php

if(isset($_POST["user"]))

{
include 'database.php';

$user = mysqli_real_escape_string($conn, $_POST["user"]);
$highlight_date = mysqli_real_escape_string($conn,$_POST['highlight_date']);
$highlight_message = mysqli_real_escape_string($conn,$_POST['highlight_message']);
$highlight_status = mysqli_real_escape_string($conn,$_POST['highlight_status']);
//$manager_id = $_SESSION['manager_id'];

$sql = "INSERT INTO highlight (highlight_date, highlight_message, highlight_status,user)
	  VALUES (NOW(),'$highlight_message','$highlight_status','$user')";
$result = mysqli_query($conn,$sql);

header('Location: sv_home.php');
}
?>
