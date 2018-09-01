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
    <title>FlexiComm | Manager Home</title>
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
    <?php include '../admin/include/menu.php'?>

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
								<!--<button type="button" class="btn bg-teal waves-effect pull-right">
                                     <i class="material-icons">add_circle_outline</i>New Project -->

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
                                            <th width= '50%'>Details</th>
                                            <th width= '15%'>Status</th>
											<th width= '15%'>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									include "database.php";

									$sql = "SELECT * from highlight";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										// output data of each row
										$x=1;
										while($row = $result->fetch_assoc()) {
											$id_highlight = $row['id_highlight'];
											$highlight_date = $row['highlight_date'];
											$highlight_message = $row['highlight_message'];
											$highlight_status = $row['highlight_status'];
											$manager_id = $row['manager_id'];
											$admin_id = $row['admin_id'];


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
											<td><?php echo $highlight_date; ?></td>
											<td><?php echo $highlight_message; ?></td>
											<td><?php echo $alert;?></td>

											<td>
												<div class='btn-group' role='group' aria-label='...'>
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
											echo '<script>window.location.href="admin_home.php"</script>';
										} else {
											echo "Error updating record: " . $conn->error;
										}
									}



									if(isset($_POST['delete'])){
										// sql to delete a record
										$delete_id = $_POST['delete_id'];
										$sql = "DELETE FROM highlight WHERE id_highlight='$delete_id' ";
										if ($conn->query($sql) === TRUE) {
											echo '<script>window.location.href="admin_home.php"</script>';
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
														<form action = "add_highlight.php" method="post" class="form-horizontal" role="form">

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
															<input type="hidden" name="edit_id" value="<?php echo $admin_id; ?>">


															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="admin_password">Current Password</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="text" id="admin_password" name="admin_password" value="" class="form-control" placeholder="Enter Current Password">
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
																<input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_id']; ?>"  />

															<div class="modal-footer">

																<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																<button type="submit" class="btn btn-success waves-effect" name="update_password"><span class="glyphicon glyphicon-edit"></span>SAVE</button>
															</div>

														<?php

															if(isset($_POST['update_password'])){
																include "database.php";

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
																					alert(\"Wrong Password\");
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
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>






</body>

</html>
