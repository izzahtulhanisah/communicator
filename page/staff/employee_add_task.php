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

$task_title = $_POST['task_title'];
$task_created = $_POST['task_created'];
$task_due_date = $_POST['task_due_date'];
$task_description = $_POST['task_description'];
$project_id = $_POST['project_id'];
//$sv_id = $_POST['sv_id'];
$employee_id = $_SESSION['employee_id'];

$t = "select project_id,sv_id from project where project_id= '$project_id'";
$result2 = $conn -> query($t);
$row=mysqli_fetch_assoc($result2);
$sv_id = $row['sv_id'];

$sql = "INSERT INTO task (task_title, task_created, task_status, task_due_date, task_description, project_id, employee_id,sv_id)
	  VALUES ('$task_title','$task_created','In Progress','$task_due_date','$task_description','$project_id','$employee_id','$sv_id')";
$result = mysqli_query($conn,$sql);

header('Location: employee_open_task.php');

?>
