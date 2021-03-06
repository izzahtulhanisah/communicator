<!DOCTYPE html>

<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['admin_id'])){
header("location: ../../index.html");
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FlexiCOMM| Assignment List</title>
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
                <a class="navbar-brand" href="../../page/admin/admin_home.php">Flexi<b>COMMUNICATOR</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <!-- Notifications -->
                    
                    <!-- #END# Notifications -->
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
				include 'database.php';

					if (mysqli_connect_errno())
					  {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					  }
					$abc=$_SESSION['admin_id'];
					$sql = mysqli_query($conn,"SELECT * FROM admin WHERE admin_id = '$abc'");
					$row = mysqli_fetch_array($sql);
					$admin_id=$row['admin_id'];
					$admin_name=$row['admin_name'];
					$admin_email=$row['admin_email'];
				?>

                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $admin_name; ?></div>
                    <div class="email"><?php echo $admin_email; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="admin_update_profile.php"><i class="material-icons">person</i>Edit Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="#changepass" data-toggle="modal"><i class="material-icons">create</i>Edit Password</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="admin_logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="../../page/admin/admin_home.php">
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
                                <a href="../../page/admin/admin_view_profile.php">Your Profile</a>
                            </li>
							<li>
                                <a href="../../page/admin/admin_question.php">Edit Secret Answers</a>
                            </li>
                        </ul>
                    </li>
					
					<li>
                        <a href="../../page/admin/company_details.php">
                            <i class="material-icons">account_balance</i>
                            <span>Company</span>
                        </a>
                    </li>
					
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">edit</i>
                            <span>Registration</span>
                        </a>
						<ul class="ml-menu">
							<li>
                                <a href="../../page/admin/admin_register_director.php">Director</a>
                            </li>
							<li>
                                <a href="../../page/admin/admin_register_manager.php">Manager</a>
                            </li>
							<li>
                                <a href="../../page/admin/admin_register_staff.php">Staff</a>
                            </li>
                        </ul>
                    </li>
					
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">group_add</i>
                            <span>Users</span>
                        </a>
                        <ul class="ml-menu">
							<li>
                                <a href="../../page/admin/director.php">Director</a>
                            </li>
							<li>
                                <a href="../../page/admin/manager.php">Manager</a>
                            </li>
                            <li>
                                <a href="../../page/admin/staff.php">Staff</a>
                            </li>
							

                        </ul>
                    </li>
					
					<li>
                        <a href="https://goo.gl/forms/qiNY9XG76N9iZUuy2">
                            <i class="material-icons">feedback</i>
                            <span>Feedback</span>
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
                    &copy; 2018 <b>Beta Version </b>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <!-- #END# Right Sidebar -->
    </section>


    <section class="content">
        <div class="container-fluid">

		 <div class="body">

			<ol class="breadcrumb">
				<li>
					<a href="../../page/admin/admin_home.php">
						<i class="material-icons">home</i> Home
					</a>
				</li>
				<li>
					<a href="../../page/admin/admin_view_project_list.php">
						<i class="material-icons">library_books</i> Assignment
					</a>
				</li>
			</ol>

		</div>
             <!--<div class="block-header">
                <h2>
                    JQUERY DATATABLES
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div>-->

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
							 <h2><center><strong> ASSIGNMENT LIST</strong></center></h2>
                        </div>
                        <div class="header clearfix">

                                <div class="col-md-3">
								<input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
								</div>
								<div class="col-md-3">
								<input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" /> 								
								</div>
								<div class="btn-group" role='group' aria-label='...'>
								<input type="button" name="filter" id="filter" value="SEARCH" class="btn btn-info" />
								</div>
								
								<!--<a class="btn btn-success pull-right" data-toggle="modal" data-target="#addProject"><span class='glyphicon glyphicon-plus' aria-hidden='true'></span>NEW ASSIGNMENT</a>-->
                        </div>
                        <div class="body">
						<div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="assignment_table">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
										<th width="10%">Assignment</th>
										<th width="25%">Description</th>
										<th width="15%">Start Date</th>
										<th width="15%">Due Date</th>
										<th width="10%">Status</th>
										<!--<th width="15%">Action</th>-->
									</tr>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
									include "database.php";

									/*$sql2 = "UPDATE project
										SET project_status =
										CASE
											 WHEN NOW() > project_due_date THEN 'Delayed'
											 WHEN NOW() < project_due_date THEN 'In Progress'
										END ";
									$result2 = $conn -> query($sql2);*/

									$sql = "SELECT * from project ORDER BY project_due_date ASC ";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										// output data of each row
										$x=1;
										while($row = $result->fetch_assoc()) {
											$project_id = $row['project_id'];
											$project_name = $row['project_name'];
											$project_description = $row['project_description'];
											$project_date_created = $row['project_date_created'];
											$project_due_date = $row['project_due_date'];
											$project_status = $row['project_status'];

											if($project_status == 'Delayed'){
												$alert = "<div class='badge bg-red'>
												<strong>$project_status</strong>
												</div>";

											}else if($project_status == 'In Progress'){
												$alert = "<div class='badge bg-blue'>
												<strong>$project_status</strong>
												</div>";

											}else {
												$alert = $alert = "<div class='badge bg-green'>
												<strong>$project_status</strong>
												</div>";
												}

											echo "<tr>
													<td>$x</td>
													<td>$project_name</td>
													";
									?>

											<td><?php echo $project_description; ?></td>
											<td><?php echo $project_date_created; ?></td>
											<td><?php echo $project_due_date; ?></td>
											<td><?php echo $alert;

												if ($project_status == "Completed"){
												}
												else{

													$sql2 = "UPDATE project
															SET project_status =
															CASE
																WHEN NOW() > project_due_date THEN 'Delayed'
																WHEN NOW() < project_due_date THEN 'In Progress'
																END
																WHERE project_id = $project_id
																";

													$result2 = $conn -> query($sql2);
												}
												?>
											</td>
											<!--<td>
												<div>
													<a href="#defaultModal<?php echo $project_id;?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
													<a href="#delete<?php echo $project_id;?>" data-toggle="modal"><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
													<a href="#complete<?php echo $project_id;?>" data-toggle="modal"><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button></a>
												</div>
											</td>-->



									 <!-- Update Project List -->
										<div class="modal fade" id="defaultModal<?php echo $project_id; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="defaultModalLabel"><center>EDIT ASSIGNMENT</center></h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="edit_id" value="<?php echo $project_id; ?>">


															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="project_name">Title</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="text" id="project_name" name="project_name" value="<?php echo $project_name; ?>" class="form-control" placeholder="Enter Assignment Title">
																		</div>
																	</div>
																</div>
															</div>

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="project_description">Description</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="text" id="project_description" name="project_description" value="<?php echo $project_description; ?>" class="form-control" placeholder="Enter Project Description">
																		</div>
																	</div>
																</div>
															</div>

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="project_date_created">Start Date</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="date" id="project_date_created" name="project_date_created" value="<?php echo $before30=date('Y-m-d', strtotime("$project_date_created")); ?>" class="form-control date" placeholder="Ex: 30/07/2018">
																		</div>
																	</div>
																</div>
															</div>

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="project_due_date">Due Date</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="date" id="project_due_date" name="project_due_date" value="<?php echo $before30=date('Y-m-d', strtotime("$project_due_date")); ?>" class="form-control">
																		</div>
																	</div>
																</div>
															</div>

															<div class="modal-footer">
																<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																<button type="submit" class="btn btn-success waves-effect" name="update_project"><span class="glyphicon glyphicon-edit"></span>SAVE</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>


									 <!-- Delete Project List -->
										<div class="modal fade" id="delete<?php echo $project_id; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="defaultModalLabel"><center>DELETE ASSIGNMENT</center></h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="delete_id" value="<?php echo $project_id; ?>">

																<p><strong>Are you sure you want to delete <?php echo $project_name; ?> ?</strong></p>


															<div class="modal-footer">
																<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																<button type="submit" class="btn btn-danger waves-effect" name="delete"><span class="glyphicon glyphicon-trash"></span>DELETE</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>

									<!-- Complete Project List -->
										<div class="modal fade" id="complete<?php echo $project_id; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="defaultModalLabel"><center>COMPLETE ASSIGNMENT</center></h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="edit_project_complete" value="<?php echo $project_id; ?>">

																<p><strong>Change status <?php echo $project_name; ?> to <font color = 'green'>Completed</font>?</strong></p>


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

									//Update Project
									if(isset($_POST['update_project'])){
										$edit_id = $_POST['edit_id'];
										$project_name = $_POST['project_name'];
										$project_description = $_POST['project_description'];
										$project_date_created = $_POST['project_date_created'];
										$project_due_date = $_POST['project_due_date'];
										$project_status = $_POST['project_status'];

										//$item_code = $_POST['item_code'];
										//$item_category = $_POST['item_category'];
										//$item_description = $_POST['item_description'];
										$sql = "UPDATE project SET
											project_name='$project_name',
											project_description='$project_description',
											project_date_created='$project_date_created',
											project_due_date='$project_due_date',
											project_status='$project_status'
											WHERE project_id='$edit_id' ";
										if ($conn->query($sql) === TRUE) {
											echo '<script>window.location.href="manager_view_project_list.php"</script>';
										} else {
											echo "Error updating record: " . $conn->error;
										}
									}

									//Complete Project
									if(isset($_POST['complete'])){
										$edit_project_complete = $_POST['edit_project_complete'];
										$project_name = $_POST['project_name'];
										$project_description = $_POST['project_description'];
										$project_date_created = $_POST['project_date_created'];
										$project_due_date = $_POST['project_due_date'];
										$project_status = $_POST['project_status'];
										$sql = "UPDATE project SET
											project_status='Completed'

										   WHERE project_id='$edit_project_complete' ";
										if ($conn->query($sql) === TRUE) {
											echo '<script>window.location.href="manager_view_project_list.php"</script>';
										} else {
											echo "Error updating record: " . $conn->error;
										}
									}


									if(isset($_POST['delete'])){
										// sql to delete a record
										$delete_id = $_POST['delete_id'];
										$sql = "DELETE FROM project WHERE project_id='$delete_id' ";
										if ($conn->query($sql) === TRUE) {
											echo '<script>window.location.href="manager_view_project_list.php"</script>';
											} else {
												echo "Error deleting record: " . $conn->error;
											}
										}

								}
									?>

								<!-- Add New Project -->
								<div class="modal fade" id="addProject" tabindex="-1" role="dialog">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="defaultModalLabel"><center>ADD NEW ASSIGNMENT</center></h4>
											</div>
											<div class="modal-body">
														<form action = "manager_add_project.php" method="post" class="form-horizontal" role="form">
															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="project_name">Title</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="text" name="project_name" class="form-control" placeholder="Enter Assignment Title">
																		</div>
																	</div>
																</div>
															</div>

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="project_description">Description</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																		<textarea name="project_description" cols="30" rows="5" class="form-control no-resize" placeholder="Enter Assignment Description" required></textarea>
																		</div>
																	</div>
																</div>
															</div>

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="project_date_created">Start Date</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="date" name="project_date_created" class="form-control date">
																		</div>
																	</div>
																</div>
															</div>

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="project_due_date">Due Date</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="date" name="project_due_date" class="form-control">
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
			
			<!-- Update Password -->
				<div class="modal fade" id="changepass" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="defaultModalLabel"><center>CHANGE PASSWORD</center></h4>
						</div>
						<div class="modal-body">

							<form method="post" class="form-horizontal" role="form">
								<input type="hidden" name="edit_id" value="<?php echo $admin_id; ?>">


								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="admin_password">Current Password</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="password" id="admin_password" name="admin_password" value="" class="form-control" placeholder="Enter Current Password">
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
									<input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_id']; ?>"  />

								<div class="modal-footer">
									<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
									<button type="submit" class="btn btn-success waves-effect" name="update_password"><span class="glyphicon glyphicon-edit"></span>SAVE</button>
								</div>

							<?php

								if(isset($_POST['update_password'])){
								include 'database.php';
								
									$admin_id = mysqli_real_escape_string($conn,$_POST['admin_id']);
									$password1 = mysqli_real_escape_string($conn,$_POST['password1']);
									$password2 = mysqli_real_escape_string($conn,$_POST['password2']);
									$admin_password = mysqli_real_escape_string($conn,$_POST['admin_password']);

									$select = "SELECT * FROM admin WHERE admin_id = '$admin_id' ";
									$result = $conn->query($select);
									while($row = $result->fetch_assoc()){
										$password = $row["admin_password"];
									}

									if($admin_password == $password){
										if($password1===$password2){
											$query = "UPDATE admin SET admin_id= '$admin_id', admin_password='$password1' WHERE  admin_id='$admin_id'  ";
											echo "<script type = \"text/javascript\">
														alert(\"New Password Updated\");
														
													</script>";
											$result = $conn->query($query);
										}
										else{
											echo "<script type = \"text/javascript\">
														alert(\"Password Not Match\");
														window.location = (\"admin_home.php\")
													</script>";
										}
									}
									else{
										echo "<script type = \"text/javascript\">
														alert(\"Wrong Current Password\");
														window.location = (\"admin_home.php\")
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

	
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
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
                          url:"admin_filter_assignment.php",
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
