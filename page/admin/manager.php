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
    <title>FlexiCOMM| Manager List</title>
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
                    <li>
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
					
					<!--<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_balance</i>
                            <span>Company</span>
                        </a>
						<ul class="ml-menu">
							<li>
                                <a href="../../page/admin/company_details.php">Details</a>
                            </li>
							<li>
                                <a href="../../page/admin/add_company_details.php">Add New</a>
                            </li>
                        </ul>
                    </li>-->

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
					
					<li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">group_add</i>
                            <span>Users</span>
                        </a>
                        <ul class="ml-menu">
							<li>
                                <a href="../../page/admin/director.php">Director</a>
                            </li>
							<li class="active">
                                <a href="../../page/admin/manager.php">Manager</a>
                            </li>
                            <li>
                                <a href="../../page/admin/staff.php">Staff</a>
                            </li>
                        </ul>
                    </li>
					
					<li>
                        <a href="https://goo.gl/forms/7jMeopZr5O4mSgoe2">
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
                                <li class="active">
                                    <i class="material-icons">group</i> Manager List
                                </li>
                            </ol>

        </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix bg-blue-grey">
                            <h2><center><strong>MANAGER LIST</button></strong></center></h2>
                        </div>
                        <div class="body">
						<div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th width="10%"><center>No.</center></th>
										<th width="35%"><center>ID</center></th>
										<th width="35%"><center>Name</center></th>
										<th width="20%"><center>Action</center></th>
									</tr>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
									include "database.php";

									
									$sql = "SELECT * from supervisor";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										// output data of each row
										$x=1;
										while($row = $result->fetch_assoc()) {
											$id = $row['id'];
											$sv_id = $row['sv_id'];
											$sv_password = $row['sv_password'];
											$sv_name =  $row['sv_name'];
											$sv_email =  $row['sv_email'];
											$sv_phoneno =  $row['sv_phoneno'];
											$sv_address =  $row['sv_address'];

											echo "<tr>
												<td><center>$x</center></td>
												<td>$sv_id</td>
												<td>$sv_name</td>
												";
									?>
									<td><center>
										<div>
											<a href="#profile<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button></a>
											<a href="#defaultModal<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
											<a href="#delete<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>

										</div></center>
									</td>

									<!-- View Manager Profile -->
										<div class="modal fade" id="profile<?php echo $id; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="defaultModalLabel"><center>MANAGER PROFILE</center></h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="profile_id" value="<?php echo $id; ?>">


															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="sv_id">ID</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<?php echo $sv_id; ?>
																		</div>
																	</div>
																</div>
															</div>

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="sv_name">Name</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<?php echo $sv_name; ?>
																		</div>
																	</div>
																</div>
															</div>

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="sv_email">Email</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<?php echo $sv_email; ?>
																		</div>
																	</div>
																</div>
															</div>

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="sv_phoneno">Phone No.</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<?php echo $sv_phoneno; ?>
																		</div>
																	</div>
																</div>
															</div>

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="sv_address">Address</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<?php echo $sv_address; ?>
																		</div>
																	</div>
																</div>
															</div>

															<div class="modal-footer">
																<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>

									 <!-- Update Manager Password -->
										<div class="modal fade" id="defaultModal<?php echo $id; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="defaultModalLabel"><center>EDIT MANAGER PASSWORD</center></h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="edit_id" value="<?php echo $id; ?>">


															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="sv_id">Manager ID</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<?php echo $sv_id; ?>
																		</div>
																	</div>
																</div>
															</div>
															<input type="hidden" id="sv_name" name="sv_name" value="<?php echo $sv_name; ?>">
															
															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="sv_password">Manager Password</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="password" id="sv_password" name="sv_password" value="<?php echo $sv_password; ?>" class="form-control" placeholder="Enter Manager Password">
																		</div>
																	</div>
																</div>
															</div>



															<div class="modal-footer">
																<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																<button type="submit" class="btn btn-success waves-effect" name="update_manager"><span class="glyphicon glyphicon-edit"></span>SAVE</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>


									 <!-- Delete Employee List -->
										<div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="defaultModalLabel"><center>DELETE MANAGER</center></h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="delete_id" value="<?php echo $id; ?>">
															<div class="alert bg-red">
																<p><strong><center>Are you sure you want to delete details of:  </center>
															</div>
																<label> ID : </label> <?php echo $sv_id; ?><br>
																<label> Name : </label> <?php echo $sv_name; ?>
																</strong></p>

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

									//View Employee Profile
									if(isset($_POST['profile_manager'])){
										$profile_id = $_POST['sv_id'];
										$sv_password = $_POST['sv_password'];
										$sv_id = $_POST['sv_id'];
										$sv_name = $_POST['sv_name'];
										//$item_code = $_POST['item_code'];
										//$item_category = $_POST['item_category'];
										//$item_description = $_POST['item_description'];
										$sql = "SELECT * FROM supervisor
											WHERE id='$profile_id' ";
										if ($conn->query($sql) === TRUE) {
											echo '<script>window.location.href="manager.php"</script>';
										} else {
											echo "Error updating record: " . $conn->error;
										}
									}

									//Update Password
									if(isset($_POST['update_manager'])){
										$edit_id = $_POST['edit_id'];
										$sv_password = $_POST['sv_password'];
										$sv_id = $_POST['sv_id'];
										$sv_name = $_POST['sv_name'];
										
										$sql = "UPDATE supervisor SET
											sv_id='$sv_id',
											sv_password='$sv_password'
											WHERE id='$edit_id' ";
										if ($conn->query($sql) === TRUE) {
											echo '<script>alert("Succesfully change password for '.$sv_name.'");window.location.href="manager.php"</script>';
										} else {
											echo "Error updating record: " . $conn->error;
										}
									}

									if(isset($_POST['delete'])){
										// sql to delete a record
										$delete_id = $_POST['delete_id'];
										$sql = "DELETE FROM supervisor WHERE id='$delete_id' ";
										if ($conn->query($sql) === TRUE) {
											echo '<script>window.location.href="manager.php"</script>';
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
												<input type="password" id="admin_password" name="sv_password" value="" class="form-control" placeholder="Enter Current Password">
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

									if($sv_password == $password){
										if($password1===$password2){
											$query = "UPDATE admin SET admin_id= '$admin_id', admin_password='$password1' WHERE  admin_id='$sv_id'  ";
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
</body>

</html>
