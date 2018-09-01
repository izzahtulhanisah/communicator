<?php
session_start();
// from form
$employee_id=$_POST['employee_id'];
$employee_password=$_POST['employee_password'];

// Create connection
include "database.php";

$sql="SELECT * FROM employee WHERE employee_id='$employee_id' and employee_password='$employee_password'";
$result = mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

// If result matched $employee_id and $employee_password, table row must be 1 row
if($count==1){

    // SAVE SESSION VARIABLES AND REDIRECT TO "page"
    $_SESSION['employee_id'] = $employee_id;
    $_SESSION['employee_password'] = $employee_password;
    header("location:employee_home.php");
    exit;
}
else {
    echo "<script>alert('Wrong username or password');
	window.location = '../../index.html';</script>";
}
?>
