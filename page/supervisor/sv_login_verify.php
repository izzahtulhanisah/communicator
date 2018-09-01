<?php
session_start();
// from form 
$sv_id=$_POST['sv_id']; 
$sv_password=$_POST['sv_password']; 

// Check connection
include 'database.php';

$sql="SELECT * FROM supervisor WHERE sv_id='$sv_id' and sv_password='$sv_password'";
$result = mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

// If result matched $manager_id and $manager_password, table row must be 1 row
if($count==1){

    // SAVE SESSION VARIABLES AND REDIRECT TO "page"
    $_SESSION['sv_id'] = $sv_id;
    $_SESSION['sv_password'] = $sv_password;
    header("location:sv_home.php");
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