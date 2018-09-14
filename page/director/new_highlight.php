<!DOCTYPE html>

<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['manager_id'])){
header("location: ../../index.html");
}

$manager_idd = $_SESSION['manager_id'];

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FLEXICOMM | Director Home</title>
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

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />

	<!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />




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
                <a class="navbar-brand" href="../../page/director/manager_home.php">Flexi<b>COMMUNICATOR</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <!-- Notifications -->
                     <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>

							 <?php
								include "database.php";

								$sql  = '
										SELECT task_status, COUNT( * ) AS count
										FROM (

										SELECT task_status
										FROM task
										UNION ALL 
										SELECT task_status
										FROM task2
										)t
										WHERE task_status =  "Delayed"
										GROUP BY task_status
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
                                        <a href="../../page/director/manager_open_delay_task.php">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">date_range</i>
                                            </div>
                                            <div class="menu-info">

													<?php
														include "database.php";
														$t = "SELECT task_status, COUNT( * ) AS count
															FROM (

															SELECT task_status
															FROM task
															UNION ALL 
															SELECT task_status
															FROM task2
															)t
															WHERE task_status =  'Delayed'
															GROUP BY task_status
															'";
														$result=mysqli_query($conn,$sql);

														if($result)
														{
															while($row=mysqli_fetch_assoc($result))
															{
														echo '<h4>';
														 echo '
																 '.$row['count'].' delayed task
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
                            <!--<li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>-->
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

					$abc=$_SESSION['manager_id'];
					$sql = mysqli_query($conn,"SELECT * FROM manager WHERE manager_id = '$abc'");
					$row = mysqli_fetch_array($sql);
					$manager_id=$row['manager_id'];
					$manager_name=$row['manager_name'];
					$manager_email=$row['manager_email'];
				?>

                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $manager_name; ?></div>
                    <div class="email"><?php echo $manager_email; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="manager_update_profile.php"><i class="material-icons">person</i>Edit Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="#changepass" data-toggle="modal"><i class="material-icons">create</i>Edit Password</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="manager_logout.php"><i class="material-icons">input</i>Sign Out</a></li>
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
                        <a href="../../page/director/manager_home.php">
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
                                <a href="../../page/director/manager_view_profile.php">Your Profile</a>
                            </li>
							<li>
                                <a href="../../page/director/manager_question.php">Edit Secret Answers</a>
                            </li>
                        </ul>
                    </li>

					<li>
                        <a href="../../page/director/manager_view_project_list.php">
                            <i class="material-icons">view_list</i>
                            <span>Assignments</span>
                        </a>
                    </li>

					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">date_range</i>
                            <span>Task</span>
                        </a>
						<ul class="ml-menu">
							<li>
                                <a href="../../page/director/manager_view_employee_task.php">Staff</a>
                            </li>
							<li>
                                <a href="../../page/director/manager_view_sv_task.php">Manager</a>
                            </li>
                        </ul>
                    </li>
					
					<li>
                        <a href="../../page/director/company_details.php">
                            <i class="material-icons">location_city</i>
                            <span>Company Details</span>
                        </a>
                    </li>
					
					<li>
                        <a href="../../page/director/admin_contact.php">
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
                    &copy; 2018 <b>Beta Version </b>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        
    </section>

        <!-- Coding dalam container -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>MANAGE HIGHLIGHTS</h2>
            </div>


			<div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                                <h2><center><strong>
                                HIGHLIGHTS
								<a class="btn btn-success pull-right" data-toggle="modal" data-target="#addHighlight"><span class='glyphicon glyphicon-plus' aria-hidden='true'> NEW</span></a>

                                </button>
                            </strong><center></h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th width= '15%'>Date</th>
                                            <th width= '45%'>Details</th>
                                            <th width= '15%'>Attention To</th>
											<th width= '15%'>Created By</th>
											<th width= '15%'>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									include "database.php";

									$sql = "SELECT * from highlight ORDER BY highlight_date DESC";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										// output data of each row
										$x=1;
										while($row = $result->fetch_assoc()) {
											$id_highlight = $row['id_highlight'];
											$highlight_date = $row['highlight_date'];
											$highlight_message = $row['highlight_message'];
											$highlight_status = $row['highlight_status'];
											$user = $row['user'];


											if($highlight_status == 'Important'){
												$alert = "<div class='badge bg-red'>
												<strong>$highlight_status</strong>
												</div>";

											}else if($highlight_status == 'All'){
												$alert = "<div class='badge bg-blue'>
												<strong>$highlight_status</strong>
												</div>";

											}else if($highlight_status == 'Manager'){
												$alert = "<div class='badge bg-orange'>
												<strong>$highlight_status</strong>
												</div>";

											}else if($highlight_status == 'Staff'){
												$alert = "<div class='badge bg-green'>
												<strong>$highlight_status</strong>
												</div>";

											}else  {
												$alert = "<div class='badge bg-cyan'>
												<strong>$highlight_status</strong>
												</div>";
												}
									?>
										<tr>
											<td><?php echo date('d-m-Y', strtotime($row['highlight_date'])); ?></td>
											<td><?php echo $highlight_message; ?></td>
											<td><?php echo $alert;?></td>
											<td><i><?php echo $user;?></i></td>

											<td>
												<div class='' role='group' aria-label='...'>
													<a href="#defaultModal<?php echo $id_highlight;?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
													<a href="#delete<?php echo $id_highlight;?>" data-toggle="modal"><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
												</div>
											</td>

									 <!-- Update Highlight List -->
										<div class="modal fade" id="defaultModal<?php echo $id_highlight; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="defaultModalLabel"><center>EDIT HIGHLIGHTS</center></h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="edit_id" value="<?php echo $id_highlight; ?>">


															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="highlight_message">Details</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																		<textarea name="highlight_message" cols="30" rows="5" class="form-control no-resize" placeholder="Enter Message" required><?php echo $highlight_message;?></textarea>
																		</div>
																	</div>
																</div>
															</div>

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="highlight_status">Status</label>
																</div>
																<div class="col-sm-8">
																	<select class="form-control show-tick" name= "highlight_status" id="highlight_status">
																		<!--<option value="<?php '$highlight_status';?>" selected='selected'><?php echo $highlight_status;?></option>-->
																		<option value="Important">Important</option>
																		<option value="Staff">Staff</option>
																		<option value="Manager">Manager</option>
																		<option value="All">All</option>
																		<option value="Others">Others</option>
																	</select>
																</div>
															</div>

															<div class="modal-footer">
																<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																<button type="submit" class="btn btn-success waves-effect" name="update_highlight"><span class="glyphicon glyphicon-edit"></span>SAVE</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>


									 <!-- Delete Highlight List -->
										<div class="modal fade" id="delete<?php echo $id_highlight; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="defaultModalLabel"><center>DELETE MESSAGE</center></h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="delete_id" value="<?php echo $id_highlight; ?>">

																<p><strong>Are you sure you want to delete this message?</strong></p>


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

									//Update Highlight
									if(isset($_POST['update_highlight'])){
										$edit_id = $_POST['edit_id'];

										$highlight_message = $_POST['highlight_message'];
										$highlight_status = $_POST['highlight_status'];

										$sql = "UPDATE highlight SET
											highlight_date=NOW(),
											highlight_message='$highlight_message',
											highlight_status='$highlight_status'
											WHERE id_highlight='$edit_id' ";
										if ($conn->query($sql) === TRUE) {
											echo '<script>window.location.href="manager_home.php"</script>';
										} else {
											echo "Error updating record: " . $conn->error;
										}
									}



									if(isset($_POST['delete'])){
										// sql to delete a highlight
										$delete_id = $_POST['delete_id'];
										$sql = "DELETE FROM highlight WHERE id_highlight='$delete_id' ";
										if ($conn->query($sql) === TRUE) {
											echo '<script>window.location.href="new_highlight.php"</script>';
											} else {
												echo "Error deleting record: " . $conn->error;
											}
										}
								}
									?>

								<!-- Add New Highlights -->
								<div class="modal fade" id="addHighlight" tabindex="-1" role="dialog">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="defaultModalLabel"><center>NEW MESSAGE FOR HIGHLIGHTS</center></h4>
											</div>
											<div class="modal-body">
											<?php
											include 'database.php';
												$abc=$_SESSION['manager_id'];
											?>
											<form action = "manager_add_highlight.php" method="post" class="form-horizontal" role="form">
											<input type="hidden" name="user" value="<?php echo $abc; ?>">

												<div class="row clearfix">
													<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
														<label for="highlight_message">Details</label>
													</div>
													<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
														<div class="form-group">
															<div class="form-line">
															<textarea name="highlight_message" cols="30" rows="5" class="form-control no-resize" placeholder="Enter Message" required></textarea>
															</div>
														</div>
													</div>
												</div>

												<div class="row clearfix">
													<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
														<label for="highlight_status">Status</label>
													</div>
													<div class="col-sm-8">
														<select class="form-control show-tick" name= "highlight_status" id="highlight_status">
															<option value="" selected='selected'>-- Please select --</option>
															<option value="Important">Important</option>
															<option value="Staff">Staff</option>
															<option value="Manager">Manager</option>
															<option value="All">All</option>
															<option value="Others">Others</option>
														</select>
													</div>
												</div>



												<div class="modal-footer">
													<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
													<button type="submit" class="btn btn-success waves-effect"><span class="glyphicon glyphicon-plus"></span>POST</button>
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
                <!-- #END# Task Info -->

            </div>

			<!-- Update Password -->
			<div class="modal fade" id="changepass" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="defaultModalLabel">Change Password</h4>
						</div>
						<div class="modal-body">

							<form method="post" class="form-horizontal" role="form">
								<input type="hidden" name="edit_id" value="<?php echo $manager_id; ?>">


								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="manager_password">Current Password</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="text" id="manager_password" name="manager_password" value="" class="form-control" placeholder="Enter Current Password">
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
												<input type="text" id="password1" name="password1" value="" class="form-control" placeholder="Enter New Password">
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
												<input type="text" id="password2" name="password2" value="" class="form-control" placeholder="Enter Confirm Password">
											</div>
										</div>
									</div>
								</div>
									<input type="hidden" name="manager_id" value="<?php echo $_SESSION['manager_id']; ?>"  />

								<div class="modal-footer">
									<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
									<button type="submit" class="btn btn-success waves-effect" name="update_password"><span class="glyphicon glyphicon-edit"></span>SAVE</button>
								</div>

							<?php

								if(isset($_POST['update_password'])){
									include "database.php";
	

									$manager_id = mysqli_real_escape_string($con,$_POST['manager_id']);
									$password1 = mysqli_real_escape_string($con,$_POST['password1']);
									$password2 = mysqli_real_escape_string($con,$_POST['password2']);
									$manager_password = mysqli_real_escape_string($con,$_POST['manager_password']);

									$select = "SELECT * FROM manager WHERE manager_id = '$manager_id' ";
									$result = $con->query($select);
									while($row = $result->fetch_assoc()){
										$password = $row["manager_password"];
									}

									if($manager_password == $password){
										if($password1===$password2){
											$query = "UPDATE manager SET manager_id= '$manager_id', manager_password='$password1' WHERE  manager_id='$manager_id'  ";
											$result = $con->query($query);
										}
										else{
											echo "<script type = \"text/javascript\">
														alert(\"Password Not Match\");
														window.location = (\"manager_home.php\")
													</script>";
										}
									}
									else{
										echo "<script type = \"text/javascript\">
														alert(\"Wrong Password\");
														window.location = (\"manager_home.php\")
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
	        <!-- #END# Coding dalam container -->

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

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>

	 <!-- Select Plugin Js
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>-->
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>






</body>

</html>
