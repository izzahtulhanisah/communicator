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
$company_name = $_POST['company_name'];
$company_email = $_POST['company_email'];
$company_phoneno=$_POST['company_phoneno'];
$company_website=$_POST['company_website'];
$company_industry=$_POST['company_industry'];
$company_address=$_POST['company_address'];

$sql = "INSERT INTO company (company_name, company_email, company_phoneno, company_website, company_industry, company_address)
	  VALUES ('$company_name','$company_email','$company_phoneno','$company_website','$company_industry','$company_address')";
$result = mysqli_query($conn,$sql);

header("Location: company_details.php");

?>
