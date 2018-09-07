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

$project_name = $_POST['project_name'];
$project_description = $_POST['project_description'];
$project_status = $_POST['project_status'];
$project_date_created = $_POST['project_date_created'];
$project_due_date = $_POST['project_due_date'];
$sv_id = $_POST['sv_id'];


$sql = "INSERT INTO project (project_name, project_description, project_date_created, project_due_date, project_status, sv_id)
	  VALUES ('$project_name','$project_description', '$project_date_created', '$project_due_date', 'In Progress', '$sv_id')";
$result = mysqli_query($conn,$sql);

header('Location: manager_view_project_list.php');

?>
