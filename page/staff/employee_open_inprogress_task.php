<!DOCTYPE html>

<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['employee_id'])){
header("location: ../../index.html");
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FLEXICOMM | In Progress Tasks</title>
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

	<!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />

	<!-- Bootstrap Select Css
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />-->
</head>

<body class="theme-green">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../../page/staff/employee_home.php">Flexi<b>COMMUNICATOR</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <!-- Notifications -->
                   <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>

							 <?php
								include "database.php";
								
								$abc=$_SESSION['employee_id'];
								$sql  = '
										SELECT employee_id,task_status, COUNT(*)
										 AS count
										 FROM task
										 WHERE task_status="delayed"
										 AND employee_id = "'.$_SESSION['employee_id'].'"
										 ';

										 $result=mysqli_query($conn,$sql);
											if($result)
											{
												while($row=mysqli_fetch_assoc($result))
												{
													echo '<span class="label-count">'.$row['count'].'</span>';
												}
											}
							?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="employee_open_delay_task.php">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">date_range</i>
                                            </div>
                                            <div class="menu-info">

													<?php
														include "database.php";
														$t = "SELECT employee_id,task_status, COUNT(*)
															  AS count
															  FROM task
															  WHERE task_status='delayed'
															  AND employee_id = '".$_SESSION['employee_id']."'
															  '";
														$result=mysqli_query($conn,$sql);

														if($result)
														{
															while($row=mysqli_fetch_assoc($result))
															{
														echo '<h4>';
														 echo '
																 You have '.$row['count'].' delayed task
																';
																echo '<h4>';
														 }}
													?>

                                               <p>
                                                    <i class="material-icons">access_time</i>
                                                </p>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->

                    <!-- <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <!-- <img src="../../images/user.png" width="48" height="48" alt="User" /> -->
                </div>

				<?php

					include "database.php";

					$abc=$_SESSION['employee_id'];
					$sql = mysqli_query($conn,"SELECT * FROM employee WHERE employee_id = '$abc'");
					$row = mysqli_fetch_array($sql);
					$employee_id=$row['employee_id'];
					$employee_name=$row['employee_name'];
					$employee_email=$row['employee_email'];
				?>

                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $employee_name; ?></div>
                    <div class="email"><?php echo $employee_email; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="employee_update_profile.php"><i class="material-icons">person</i>Edit Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="#changepass" data-toggle="modal"><i class="material-icons">create</i>Edit Password</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="employee_logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="../../page/staff/employee_home.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Profile</span>
                        </a>
						<ul class="ml-menu">
							<li>
                                <a href="../../page/staff/employee_view_profile.php">Your Profile</a>
                            </li>
							<li>
                                <a href="../../page/staff/employee_question.php">Edit Secret Answers</a>
                            </li>
                        </ul>
                    </li>
					
					<li>
                        <a href="../../page/staff/employee_view_project_list.php">
                            <i class="material-icons">library_books</i>
                            <span>Assignments</span>
                        </a>
                    </li>

					<li class="active">
                        <a href="../../page/staff/employee_open_task.php">
                            <i class="material-icons">date_range</i>
                            <span>Tasks</span>
                        </a>
                    </li>
					
					<li>
                        <a href="../../page/staff/admin_contact.php">
                            <i class="material-icons">help_outline</i>
                            <span>Need Help</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    <a href="javascript:void(0);">Powered by <a href= "http://flexcility.com/"><img src="../../images/flexcility.png" alt="Flexcility Logo" width="100" height="20"> </a></a>.
                </div>
                <div class="version">
                    &copy; 2018 <b>Beta Version</b>

                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        
    </section>

    <section class="content">
        <div class="container-fluid">

		 <div class="body">

			<ol class="breadcrumb">
				<li>
					<a href="../../page/staff/employee_home.php">
						<i class="material-icons">home</i> Home
					</a>
				</li>
				<li>
					<a href="../../page/staff/employee_open_task.php">
					<i class="material-icons">date_range</i> Tasks
					</a>
				</li>

				<li class="active">
					<i class="material-icons">insert_invitation</i> In Progress Tasks
				</li>
			</ol>

		</div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix bg-blue-grey">
                            <h2><b><center>
                                TASKS LIST (IN PROGRESS)
                                </button>
                            <center></b></h2>
                        </div>
                        <div class="body">
                          <div class = "table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
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
									include "database.php";

									$result2 = $conn -> query($sql2);
									$abc=$_SESSION['employee_id'];

									$sql = "SELECT task.task_id,task.task_title, task.task_status, task.task_created, task.task_due_date, task.task_description, task.task_comment, project.project_id, project.project_name, employee.employee_id
											FROM task,project, employee
											WHERE task.project_id = project.project_id
											AND task.employee_id = employee.employee_id
											AND task.task_status = 'In Progress'
											AND  task.employee_id = '$abc'
											ORDER BY task_due_date ASC";
											
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
														<h4 class="modal-title" id="defaultModalLabel"><center>EDIT TASK</center></h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="edit_task_id" value="<?php echo $task_id; ?>">
															<input type="hidden" name="edit_employee_id" value="<?php echo $employee_id;  ?>">

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="task_title">Tasks</label>
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

									 <!-- Delete Project List -->
										<div class="modal fade" id="delete<?php echo $task_id; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="defaultModalLabel"><center>DELETE PROJECT</center></h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="delete_id" value="<?php echo $task_id; ?>">

																<p><strong>Are you sure you want to delete <?php echo $task_title; ?> ?</strong></p>


															<div class="modal-footer">
																<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
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
											echo '<script>window.location.href="employee_open_delay_task.php"</script>';
										} else {
											echo "Error updating record: " . $conn->error;
										}
									}

									//Complete Task
									if(isset($_POST['complete'])){
										$edit_task_complete = $_POST['edit_task_complete'];
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
										// sql to delete a record
										$delete_id = $_POST['delete_id'];
										$sql = "DELETE FROM task WHERE task_id='$delete_id' ";
										if ($conn->query($sql) === TRUE) {
											echo '<script>window.location.href="employee_open_delay_task.php"</script>';
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
												<h4 class="modal-title" id="defaultModalLabel">Add New Task</h4>
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
															<label for="task_title">Task</label>
														</div>
														<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
															<div class="form-group">
																<div class="form-line">
																	<input type="text" name="task_title" class="form-control" placeholder="Enter Your Task">
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
													<button type="button" class="btn btn-info waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
													<button type="submit" class="btn btn-danger waves-effect"><span class="glyphicon glyphicon-plus"></span>ADD NEW</button>
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
            <!-- #END# Exportable Table -->

            <!-- Update Password -->
			<div class="modal fade" id="changepass" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="defaultModalLabel"><center>CHANGE PASSWORD</center></h4>
						</div>
						<div class="modal-body">

							<form method="post" class="form-horizontal" role="form">
								<input type="hidden" name="edit_id" value="<?php echo $employee_id; ?>">


								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="employee_password">Current Password</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="password" id="employee_password" name="employee_password" value="" class="form-control" placeholder="Enter Current Password">
											</div>
										</div>
									</div>
								</div>

								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="password1">New Password</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="password" id="password1" name="password1" value="" class="form-control" placeholder="Enter New Password">
											</div>
										</div>
									</div>
								</div>

								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="password2">Confirm Password</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="password" id="password2" name="password2" value="" class="form-control" placeholder="Enter Confirm Password">
											</div>
										</div>
									</div>
								</div>
									<input type="hidden" name="employee_id" value="<?php echo $_SESSION['employee_id']; ?>"  />

								<div class="modal-footer">
									<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
									<button type="submit" class="btn btn-success waves-effect" name="update_password"><span class="glyphicon glyphicon-edit"></span>SAVE</button>
								</div>

							<?php

								if(isset($_POST['update_password'])){
									include "database.php";
		
									$employee_id = mysqli_real_escape_string($conn,$_POST['employee_id']);
									$password1 = mysqli_real_escape_string($conn,$_POST['password1']);
									$password2 = mysqli_real_escape_string($conn,$_POST['password2']);
									$employee_password = mysqli_real_escape_string($conn,$_POST['employee_password']);

									$select = "SELECT * FROM employee WHERE employee_id = '$employee_id' ";
									$result = $conn->query($select);
									while($row = $result->fetch_assoc()){
										$password = $row["employee_password"];
									}

									if($employee_password == $password){
										if($password1===$password2){
											$query = "UPDATE employee SET employee_id= '$employee_id', employee_password='$password1' WHERE  employee_id='$employee_id'  ";
											$result = $conn->query($query);
										}
										else{
											echo "<script type = \"text/javascript\">
														alert(\"Password Not Match\");
														window.location = (\"employee_home.php\")
													</script>";
										}
									}
									else{
										echo "<script type = \"text/javascript\">
														alert(\"Wrong Password\");
														window.location = (\"employee_home.php\")
													</script>";
									}
								}
							?>

							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../pages/plugins/bootstrap-select/js/bootstrap-select.js"></script>

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

	 <!-- Select Plugin Js
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>-->
</body>

</html>
