
<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['admin_id'])){
header("location: ../../index.html");
}
?>
<?php
// Create connection
include 'database.php';

//$abc=$_SESSION['company_id'];
if(isset($_POST['company_name'])){
	$a = $_POST['company_name'];
	$d = $_POST['company_email'];
	$e = $_POST['company_phoneno'];
	$f = $_POST['company_address'];
	$g = $_POST['company_industry'];
	$h = $_POST['company_website'];

	$sql = "UPDATE company SET
				company_name='$a',
				company_email='$d',
				company_phoneno= '$e',
				company_address= '$f',
				company_industry = '$g',
				company_website = '$h'
			";

	$result = mysqli_query($conn,$sql);
}

header('Location: company_details.php');
?>
