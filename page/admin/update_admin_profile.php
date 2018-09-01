
<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['admin_id'])){
header("location: ../../index.html");
}
?>
<?php
// Create connection
include 'database.php';

$abc=$_SESSION['admin_id'];
if(isset($_POST['admin_name'])){
	$a = $_POST['admin_name'];
	$d = $_POST['admin_email'];
	$e = $_POST['admin_phone'];
	$f = $_POST['admin_address'];
	$g = $_POST['admin_department'];
	$h = $_POST['admin_position'];

	$sql = "UPDATE admin SET
				admin_name='$a',
				admin_email='$d',
				admin_phone= '$e',
				admin_address= '$f',
				admin_department = '$g',
				admin_position = '$h'
			WHERE admin_id='$abc'";

	$result = mysqli_query($conn,$sql);
}

header('Location: admin_view_profile.php');
?>
