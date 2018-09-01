
<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['employee_id'])){
header("location: ../../index.html");
}
?>
<?php
// Create connection
include "database.php";

$abc=$_SESSION['employee_id'];
if(isset($_POST['employee_name'])){
	$a = $_POST['employee_name'];
	$b = $_POST['employee_department'];
	$c = $_POST['employee_position'];
	$d = $_POST['employee_email'];
	$e = $_POST['employee_phoneno'];
	$f = $_POST['employee_address'];

	$sql = "UPDATE employee SET
				employee_name='$a',
				employee_department='$b',
				employee_position='$c',
				employee_email='$d',
				employee_phoneno= '$e',
				employee_address= '$f'
			WHERE employee_id='$abc'";

	$result = mysqli_query($conn,$sql);
}

header('Location: employee_view_profile.php');
?>
