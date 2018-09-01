
<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['sv_id'])){
header("location: ../../index.html");
}
?>
<?php
// Create connection
include 'database.php';

$abc=$_SESSION['sv_id'];
if(isset($_POST['sv_name'])){
	$a = $_POST['sv_name'];
	$d = $_POST['sv_email'];
	$e = $_POST['sv_phoneno'];
	$f = $_POST['sv_address'];
	$g = $_POST['sv_department'];

	$sql = "UPDATE supervisor SET
				sv_name='$a',
				sv_email='$d',
				sv_phoneno= '$e',
				sv_address= '$f',
				sv_department = '$g'
			WHERE sv_id='$abc'";

	$result = mysqli_query($conn,$sql);
}

header('Location: sv_view_profile.php');
?>
