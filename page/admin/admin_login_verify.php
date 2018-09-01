<?php
session_start();
// from form 
$admin_id=$_POST['admin_id']; 
$admin_password=$_POST['admin_password']; 

// Check connection
include 'database.php';

$sql="SELECT * FROM admin WHERE admin_id='$admin_id' and admin_password='$admin_password'";
$result = mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

// If result matched $manager_id and $manager_password, table row must be 1 row
if($count==1){

    // SAVE SESSION VARIABLES AND REDIRECT TO "page"
    $_SESSION['admin_id'] = $admin_id;
    $_SESSION['admin_password'] = $admin_password;
    header("location:admin_home.php");
    exit;
}
else {
    echo "<script>alert('Wrong username or password');
	window.location = '../../index.html';</script>";
}
// If result matched $myusername and $mypassword, table row must be 1 row
/*if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("a");
session_register("b"); 
header("location: manager_home.php");
}
else {
echo "Wrong manager ID or Password";
}*/

?>