<!DOCTYPE html>

<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['sv_id'])){
header("location: ../../index.html");
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FlexiCOMM | Tasks</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
	
	<!-- Calendar for date range -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<style>
        .scroll-box {
            overflow-y: scroll;
				height: 400px;
            padding: 1rem
        }
	</style>
</head>

<body class="theme-green">
<?php include '../supervisor/include/menu.php'?>

    <section class="content">
        <div class="container-fluid">
           <div class="body">
				<ol class="breadcrumb">
					<li>
						<a href="../../pages/examples/employee_home.php">
							<i class="material-icons">home</i> Home
						</a>
					</li>
					<li>
						<a href="../../pages/tables/employee_view_project_list.php">
							<i class="material-icons">library_books</i> Assignments
						</a>
					</li>
					<li class="active">
						<i class="material-icons">details</i> Assignment Details
					</li>
				</ol>
			 </div>
                      
            <!-- Tabs With Custom Animations -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
							 <h2><center><strong> TASKS LIST</strong></center></h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li role="presentation" class="active"><a href="#home_animation_2" data-toggle="tab"> <i class="material-icons">person</i>SUPERVISOR</a></li>
                                        <li role="presentation"><a href="#profile_animation_2" data-toggle="tab"> <i class="material-icons">group</i>STAFF</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
									
                                        <div role="tabpanel" class="tab-pane animated fadeInRight active" id="home_animation_2">

                                            <b>
											<a class="btn btn-success pull-right" data-toggle="modal" data-target="#addProject"><span class='glyphicon glyphicon-plus' aria-hidden='true'></span>NEW ASSIGNMENT</a>
											</b>
                                            <p>
											

											<!-- Exportable Table -->
											<div class="row clearfix">
											
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="card">
																											
														<div class="body">
														<div class = "table-responsive">

															<table class="table table-bordered table-striped table-hover dataTable js-exportable" id="task_table">
															<thead>
																<tr>
																	<th  width="5%">No.</th>
																	<th width="10%">Assignment</th>
																	<th width="15%">Tasks</th>
																	<th width="15%">Start Date</th>
																	<th width="15%">Due Date</th>
																	<th width="10%">Status</th>
																	<th width="25%">Issues</th>
																	<th width="25%">Solutions</th>
																	<th width="15%">Action</th>
																</tr>
																</tr>
															</thead>

															<tbody>
																<?php
																include 'database.php';
																$abc=$_SESSION['sv_id'];

																$sql = "SELECT task.task_id,task.task_title, task.task_status, task.task_created, task.task_due_date, task.task_description, task.task_comment, project.project_id, project.project_name, supervisor.sv_id
																		FROM task,project, supervisor
																		WHERE task.project_id = project.project_id
																		AND task.sv_id = supervisor.sv_id
																		AND  task.sv_id = '$abc'";
																$result = $conn->query($sql);
																if ($result->num_rows > 0) {
																	// output data of each row
																	$x=1;
																	while($row = $result->fetch_assoc()) {
																		$task_id = $row['task_id'];
																		$task_title = $row['task_title'];
																		$project_name = $row['project_name'];
																		$task_status = $row['task_status'];

																		if($task_status == 'Delayed'){
																			$alert = "<div class='badge bg-red'>
																			<strong>$task_status</strong>
																			</div>";
																		}else if($task_status == 'In Progress'){
																			$alert = "<div class='badge bg-blue'>
																			<strong>$task_status</strong>
																			</div>";
																		}else {
																			$alert = $alert = "<div class='badge bg-green'>
																			<strong>$task_status</strong>
																			</div>";
																		}

																		$task_created = $row['task_created'];
																		$task_due_date = $row['task_due_date'];
																		$task_description = $row['task_description'];
																		$task_comment = $row['task_comment'];
																?>
																		<tr>
																			<td><?php echo $x; ?></td>
																			<td><?php echo $project_name; ?></td>
																			<td><?php echo $task_title; ?></td>
																			<td><?php echo date('d-m-Y', strtotime($row['task_created'])); ?></td>
																			<td><?php echo date('d-m-Y', strtotime($row['task_due_date'])); ?></td>
																			
																			<td><?php echo $alert;

																			if ($task_status == "Completed"){
																			}
																			else{


																			$sql2 = "UPDATE task
																				SET task_status =
																				CASE
																					 WHEN NOW() > task_due_date THEN 'Delayed'
																					 WHEN NOW() < task_due_date THEN 'In Progress'
																				END
																				WHERE task_id = $task_id
																				";

																			$result2 = $conn -> query($sql2);

																			}
																			?></td>
																			<td><?php echo nl2br($task_description); ?></td>
																			<td><?php echo nl2br($task_comment); ?></td>


																		<td>
																			<div class='btn-btn'>
																				<a href="#defaultModal<?php echo $task_id;?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
																				<a href="#delete<?php echo $task_id;?>" data-toggle="modal"><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
																				<a href="#complete<?php echo $task_id;?>" data-toggle="modal"><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button></a>

																			</div>
																		</td>



																 <!-- Update Task List -->
																	<div class="modal fade" id="defaultModal<?php echo $task_id; ?>" tabindex="-1" role="dialog">
																		<div class="modal-dialog" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																					<h4 class="modal-title" id="defaultModalLabel"><center>EDIT TASK</h4>
																				</div>
																				<div class="modal-body">

																					<form method="post" class="form-horizontal" role="form">
																						<input type="hidden" name="edit_task_id" value="<?php echo $task_id; ?>">
																						<input type="hidden" name="edit_employee_id" value="<?php echo $employee_id;  ?>">

																						<div class="row clearfix">
																							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																								<label for="task_title">Task Details</label>
																							</div>
																							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																								<div class="form-group">
																									<div class="form-line">
																										<input type="text" id="task_title" name="task_title" value="<?php echo $task_title; ?>" class="form-control" placeholder="Enter Tasks Title" required>
																									</div>
																								</div>
																							</div>
																						</div>
																						
																						<div class="row clearfix">
																							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																								<label for="task_created">Start Date</label>
																							</div>
																							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																								<div class="form-group">
																									<div class="form-line">
																										<input type="date" id="task_created" name="task_created" value="<?php echo $before30=date('Y-m-d', strtotime("$task_created")); ?>" class="form-control date" placeholder="Ex: 30/07/2018">
																									</div>
																								</div>
																							</div>
																						</div>

																						<div class="row clearfix">
																							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																								<label for="task_due_date">Due Date</label>
																							</div>
																							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																								<div class="form-group">
																									<div class="form-line">
																										<input type="date" id="task_due_date" name="task_due_date" value="<?php echo $before30=date('Y-m-d', strtotime("$task_due_date")); ?>" class="form-control date" placeholder="Ex: 30/07/2018">
																									</div>
																								</div>
																							</div>
																						</div>

																						<div class="row clearfix">
																							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																								<label for="task_description">Issues</label>
																							</div>
																							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																								<div class="form-group">
																									<div class="form-line">
																									<textarea name="task_description" id="task_description" cols="30" rows="5" class="form-control no-resize" placeholder="Enter Issues"><?php echo $task_description; ?></textarea>
																									</div>
																								</div>
																							</div>
																						</div>

																						<div class="row clearfix">
																							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																								<label for="task_comment">Solutions</label>
																							</div>
																							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																								<div class="form-group">
																									<div class="form-line">
																									<textarea name="task_comment" id="task_comment" cols="30" rows="5" class="form-control no-resize" placeholder="Enter Solutions"><?php echo $task_comment; ?></textarea>
																									</div>
																								</div>
																							</div>
																						</div>

																						<div class="modal-footer">
																							<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																							<button type="submit" class="btn btn-success waves-effect" name="update_task"><span class="glyphicon glyphicon-edit"></span>SAVE</button>
																						</div>
																					</form>
																				</div>
																			</div>
																		</div>
																	</div>


																	<!-- Delete Task List -->
																	<div class="modal fade" id="delete<?php echo $task_id; ?>" tabindex="-1" role="dialog">
																		<div class="modal-dialog" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																					<h4 class="modal-title" id="defaultModalLabel"><center>DELETE TASK</center></h4>
																				</div>
																				<div class="modal-body">

																					<form method="post" class="form-horizontal" role="form">
																						<input type="hidden" name="delete_id" value="<?php echo $task_id; ?>">

																							<p><strong>Are you sure you want to delete <?php echo $task_title; ?> ?</strong></p>


																						<div class="modal-footer">
																							<button type="button" class="btn btn-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																							<button type="submit" class="btn btn-danger waves-effect" name="delete"><span class="glyphicon glyphicon-trash"></span>DELETE</button>
																						</div>
																					</form>
																				</div>
																			</div>
																		</div>
																	</div>


																	<!-- Complete Task List -->
																	<div class="modal fade" id="complete<?php echo $task_id; ?>" tabindex="-1" role="dialog">
																		<div class="modal-dialog" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																					<h4 class="modal-title" id="defaultModalLabel"><center>COMPLETE TASK</center></h4>
																				</div>
																				<div class="modal-body">
																					<form method="post" class="form-horizontal" role="form">
																						<input type="hidden" name="edit_task_complete" value="<?php echo $task_id; ?>">
																						<p><strong>Change status <?php echo $task_title; ?> to <font color = 'green'>Completed</font>?</strong></p>
																						<div class="modal-footer">
																							<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																							<button type="submit" class="btn btn-success waves-effect" name="complete"><span class="glyphicon glyphicon-ok"></span>YES</button>
																						</div>
																					</form>
																				</div>
																			</div>
																		</div>
																	</div>

																<?php
																$x++;}

																//Update Task
																if(isset($_POST['update_task'])){
																	$edit_task_id = $_POST['edit_task_id'];
																	//$task_id = $_POST['task_id'];
																	//$edit_employee_id = $_POST['edit_employee_id'];
																	$project_name = $_POST['project_name'];
																	$task_title = $_POST['task_title'];
																	$task_created = $_POST['task_created'];
																	$task_due_date = $_POST['task_due_date'];
																	$task_description = $_POST['task_description'];
																	$task_comment = $_POST['task_comment'];
																	$sql = "UPDATE task SET
																		task_title='$task_title',
																		task_created='$task_created',
																		task_due_date='$task_due_date',
																		task_description='$task_description',
																		task_comment='$task_comment'
																	   WHERE task_id='$edit_task_id' ";
																	if ($conn->query($sql) === TRUE) {
																		echo '<script>window.location.href="employee_open_task.php"</script>';
																	} else {
																		echo "Error updating record: " . $conn->error;
																	}
																}

																//Complete Task
																if(isset($_POST['complete'])){
																	$edit_task_complete = $_POST['edit_task_complete'];
																	//$task_id = $_POST['task_id'];
																	//$edit_employee_id = $_POST['edit_employee_id'];
																	$project_name = $_POST['project_name'];
																	$task_title = $_POST['task_title'];
																	$task_due_date = $_POST['task_due_date'];
																	$task_description = $_POST['task_description'];
																	$task_comment = $_POST['task_comment'];
																	$sql = "UPDATE task SET
																		task_status='Completed'

																	   WHERE task_id='$edit_task_complete' ";
																	if ($conn->query($sql) === TRUE) {
																		echo '<script>window.location.href="employee_open_task.php"</script>';
																	} else {
																		echo "Error updating record: " . $conn->error;
																	}
																}


																// Delete Task
																if(isset($_POST['delete'])){

																	$delete_id = $_POST['delete_id'];
																	$sql = "DELETE FROM task WHERE task_id='$delete_id' ";
																	if ($conn->query($sql) === TRUE) {
																		echo '<script>window.location.href="employee_open_task.php"</script>';
																		} else {
																			echo "Error deleting record: " . $conn->error;
																		}
																	}

															}
																?>

															<!-- Add New Task -->
															<div class="modal fade" id="addProject" tabindex="-1" role="dialog">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h4 class="modal-title" id="defaultModalLabel"><center>ADD NEW TASK</center></h4>
																		</div>
																		<div class="modal-body">
																		<form action = "employee_add_task.php" method="post" class="form-horizontal" role="form">
																			<div class="row clearfix">

																			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																				<label for="task_title">Assignment</label>
																			</div>

																				 <div class="col-sm-10">
																					<select name='project_id' class="form-control show-tick" id="project_id">
																						<option value='' selected='selected'>-- Please select --</option>
																						<?php
																						include "database.php";
																						$t = "select * from project ";
																						$result2 = $conn -> query($t);
																						while ($row = $result2 -> fetch_assoc()){

																							echo "<option value='".$row['project_id']."'>".$row['project_name']."</option>";
																						}
																						?>
																					</select>
																				</div>
																			</div>

																			<div class="row clearfix">
																				<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																					<label for="task_title">Task Details</label>
																				</div>
																				<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																					<div class="form-group">
																						<div class="form-line">
																							<input type="text" name="task_title" class="form-control" placeholder="Enter Task Details">
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="row clearfix">
																				<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																					<label for="task_created">Start Date</label>
																				</div>
																				<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																					<div class="form-group">
																						<div class="form-line">
																							<input type="date" name="task_created" class="form-control date">
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="row clearfix">
																				<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																					<label for="task_due_date">Due Date</label>
																				</div>
																				<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																					<div class="form-group">
																						<div class="form-line">
																							<input type="date" name="task_due_date" class="form-control">
																						</div>
																					</div>
																				</div>
																			</div>


																			<div class="row clearfix">
																				<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																					<label for="task_description">Issues</label>
																				</div>
																				<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																					<div class="form-group">
																						<div class="form-line">
																						<textarea name="task_description" cols="30" rows="5" class="form-control no-resize" placeholder="Enter Task Issues"></textarea>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="modal-footer">
																			<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																			<button type="submit" class="btn btn-success waves-effect"><span class="glyphicon glyphicon-plus"></span>SUBMIT</button>
																			</div>
																		</form>
																		</div>

																	</div>
																</div>
															</div>
															</tbody>
															</table>
														</div>
														</div>
													</div>
												</div>
										</div>
										<!-- #END# Exportable Table -->                                            
										</p>
                                        </div>
										
                                        <div role="tabpanel" class="tab-pane animated fadeInRight" id="profile_animation_2">
                                            <b>Staff involved in same assignment</b>
                                            <p>
												<!-- Exportable Table -->
												<div class="row clearfix">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="card">

															<div class="body">
															<div class="table-responsive">
																<table class="table table-bordered table-striped table-hover dataTable js-exportable">
																	<thead>
																		<tr>
																			<th width="5%">No.</th>
																			<th width="15%">Staff</th>
																			<th width="20%">Tasks</th>
																			<th width="15%">Start Date</th>
																			<th width="15%">Due Date</th>
																			<th width="15%">Status</th>
																			<th width="25%">Issues</th>
																			<th width="25%">Solutions</th>
																			<th width="10%">Action</th>
																		</tr>
																	</thead>

																	<tbody>

																	<?php
																		include 'database.php';

																		if (mysqli_connect_errno())
																		  {
																		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
																		  }

																		$abc = $_SESSION['sv_id'];
																		
																		$sqlsv = "SELECT project_id FROM task WHERE sv_id='$abc'";
																				$res = $conn->query($sqlsv); 
																				while($rowsv = $res->fetch_assoc()){
																					echo "task.project_id = '". $rowsv['project_id']."' or ";
																				}
																				
																		$sql = "SELECT employee.employee_name, task.task_id,task.task_title, task.task_status, task.task_created, task.task_due_date, task.task_description, task.task_comment, project.project_id, project.project_name, employee.employee_id
																				FROM task, project, employee
																				WHERE task.project_id = project.project_id
																				AND task.employee_id = employee.employee_id
																				AND "."";
																				
																		$result = $conn->query($sql);
																		if ($result->num_rows > 0) {
																			// output data of each row
																			$x=1;
																			while($row = $result->fetch_assoc()) {
																				$task_id = $row['task_id'];
																				$employee_name = $row['employee_name'];
																				$task_title = $row['task_title'];
																				$project_name = $row['project_name'];
																				$task_status = $row['task_status'];

																				if($task_status == 'Delayed'){
																					$alert = "<div class='badge bg-red'>
																					<strong>$task_status</strong>
																					</div>";

																					}else if($task_status == 'In Progress'){
																						$alert = "<div class='badge bg-blue'>
																						<strong>$task_status</strong>
																						</div>";

																					}else {
																						$alert = "<div class='badge bg-green'>
																						<strong>$task_status</strong>
																						</div>";
																					}

																				$task_created = $row['task_created'];    
																				$task_due_date = $row['task_due_date'];
																				$task_description = $row['task_description'];
																				$task_comment = $row['task_comment'];
																		?>
																		<tr>
																			<td><?php echo $x; ?></td>
																			<td><?php echo $employee_name; ?></td>
																			<td><?php echo $task_title; ?></td>
																			<td><?php echo $task_created; ?></td>
																			<td><?php echo $task_due_date; ?></td>
																			<td><?php echo $alert; ?></td>
																			<td><?php echo nl2br($task_description); ?></td>
																			<td><?php echo nl2br($task_comment); ?></td>
																			<td>
																				<div>
																					<a href="#defaultModal<?php echo $task_id;?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
																					<a href="#delete<?php echo $task_id;?>" data-toggle="modal"><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
																				</div>
																			</td>
																		</tr>
																	   <!-- Update Task List -->
																		<div class="modal fade" id="defaultModal<?php echo $task_id; ?>" tabindex="-1" role="dialog">
																			<div class="modal-dialog" role="document">
																				<div class="modal-content">
																					<div class="modal-header">
																						<h4 class="modal-title" id="defaultModalLabel"><center>EDIT TASK</center></h4>
																					</div>
																					<div class="modal-body">

																						<form method="post" class="form-horizontal" role="form" action="">
																							<input type="hidden" name="edit_task_id" value="<?php echo $task_id;  ?>">
																							<input type="hidden" name="edit_employee_id" value="<?php echo $employee_id;  ?>">


																							<div class="row clearfix">
																								<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																									<label for="task_title">Tasks</label>
																								</div>
																								<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																									<div class="form-group">
																										<div class="form-line">
																											<?php echo $task_title; ?>
																										</div>
																									</div>
																								</div>
																							</div>

																							<div class="row clearfix">
																								<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																									<label for="task_due_date">Due Date</label>
																								</div>
																								<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																									<div class="form-group">
																										<div class="form-line">
																											<?php echo $before30=date('Y-m-d', strtotime("$task_due_date")); ?>
																										</div>
																									</div>
																								</div>
																							</div>

																							<div class="row clearfix">
																								<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																									<label for="task_description">Issues</label>
																								</div>
																								<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																									<div class="form-group">
																										<div class="form-line">

																										<textarea name="task_description" readonly id="task_description" cols="30" rows="5" class="form-control no-resize" placeholder=""><?php echo $task_description; ?></textarea>
																										</div>
																									</div>
																								</div>
																							</div>

																							<div class="row clearfix">
																								<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																									<label for="task_comment">Solutions</label>
																								</div>
																								<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																									<div class="form-group">
																										<div class="form-line">
																										<textarea name="task_comment" id="task_comment" cols="30" rows="5" class="form-control no-resize" placeholder="Enter Solutions"><?php echo $task_comment; ?></textarea>
																										</div>
																									</div>
																								</div>
																							</div>

																							<div class="modal-footer">
																								<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																								<button type="submit" class="btn btn-success waves-effect" name="update_task"><span class="glyphicon glyphicon-edit"></span>SAVE</button>
																							</div>
																						</form>
																					</div>
																				</div>
																			</div>
																		</div>

																		 <!-- Delete Project List -->
																			<div class="modal fade" id="delete<?php echo $task_id; ?>" tabindex="-1" role="dialog">
																				<div class="modal-dialog" role="document">
																					<div class="modal-content">
																						<div class="modal-header">
																							<h4 class="modal-title" id="defaultModalLabel"><center>DELETE TASK</center></h4>
																						</div>
																						<div class="modal-body">

																							<form method="post" class="form-horizontal" role="form">
																								<input type="hidden" name="delete_id" value="<?php echo $task_id; ?>">
																								<div class="alert bg-red">
																									<p><strong>Are you sure you want to delete <?php echo $task_title; ?> ?</strong></p>
																								</div>

																								<div class="modal-footer">

																									<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																									<button type="submit" class="btn btn-danger waves-effect" name="delete"><span class="glyphicon glyphicon-trash"></span>DELETE</button>
																								  </div>
																								</form>
																						</div>
																					</div>
																				</div>
																			</div>
																			
																		<?php
																		$x++;}

																		//Update Tasks
																		if(isset($_POST['update_task'])){
																			$edit_task_id = $_POST['edit_task_id'];
																			//$task_id = $_POST['task_id'];
																			//$edit_employee_id = $_POST['edit_employee_id'];
																			$project_name = $_POST['project_name'];
																			$task_title = $_POST['task_title'];
																			$task_due_date = $_POST['task_due_date'];
																			$task_description = $_POST['task_description'];
																			$task_comment = $_POST['task_comment'];
																			$sql = "UPDATE task SET
																				task_comment='$task_comment'
																			   WHERE task_id='$edit_task_id' ";
																			if ($conn->query($sql) === TRUE) {
																				echo "<script>alert('*Solution Added*');window.location.href='javascript:history.back(-1);'</script>";
																			} else {
																				echo "Error updating record: " . $conn->error;
																			}
																		}
																		 if(isset($_POST['delete'])){
																		// sql to delete a record
																		$delete_id = $_POST['delete_id'];
																		$sql = "DELETE FROM task WHERE task_id='$delete_id' ";
																		if ($conn->query($sql) === TRUE) {
																			echo '<script>window.location.href="../../pages/tables/manager_view_project_list.php"</script>';
																			} else {
																				echo "Error deleting record: " . $conn->error;
																				}
																			}
																	}
																		?>
																	</tbody>
																</table>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- #END# Exportable Table -->                                            
												</p>
									
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Custom Animations -->
        </div>
    </section>

	<!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
	
		<!-- Date Range -->
	
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

	<script>
		$(document).ready(function(){
			$.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
			});
			$(function(){
                $("#from_date").datepicker();
                $("#to_date").datepicker();
			});
			$('#filter').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date != '' && to_date != '')
                {
					$.ajax({
						url:"sv_filter_assignment.php",
						method:"POST",
						data:{from_date:from_date, to_date:to_date},
						success:function(data)
						{
							$('#assignment_table').html(data);
						}
					});
                }
                else
                {
                    alert("Please Select Date");
                }
			});
		});
	</script>

</body>
</html>