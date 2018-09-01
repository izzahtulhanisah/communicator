<?php
session_start();
// from form
$manager_id=$_POST['manager_id'];
$manager_password=$_POST['manager_password'];

// Create connection
include "database.php";

$sql="SELECT * FROM manager WHERE manager_id='$manager_id' and manager_password='$manager_password'";
$result = mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

// If result matched $manager_id and $manager_password, table row must be 1 row
if($count==1){

    // SAVE SESSION VARIABLES AND REDIRECT TO "page"
    $_SESSION['manager_id'] = $manager_id;
    $_SESSION['manager_password'] = $manager_password;
    header("location:manager_home.php");
    exit;
}
else {
    echo "Wrong Username or Password";
}
?>
