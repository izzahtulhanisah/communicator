
<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['manager_id'])){
header("location: ../../index.html");
}
?>
<?php
// Create connection
include "database.php";

$abc=$_SESSION['manager_id'];
if(isset($_POST['manager_name'])){
	$a = $_POST['manager_name'];
	$d = $_POST['manager_email'];
	$e = $_POST['manager_phoneno'];
	$f = $_POST['manager_address'];
	//$g = $_POST['ID'];

	$sql = "UPDATE manager SET
				manager_name='$a',
				manager_email='$d',
				manager_phoneno= '$e',
				manager_address= '$f'
			WHERE manager_id='$abc'";

	$result = mysqli_query($conn,$sql);
}

header('Location: manager_view_profile.php');
?>
