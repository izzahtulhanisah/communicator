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
    <title>FlexiCOMM | Admin Manage Company Details</title>
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

    <!-- Sweet Alert Css -->
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-green">
        <?php include '../admin/include/menu.php'?>


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2></h2>
            </div>
			
			<div class="body">
                <ol class="breadcrumb">
					<li>
                        <a href="../../page/admin/admin_home.php">
                        <i class="material-icons">home</i> Home
                        </a>
                    </li>
                    <li>
						<a href="../../page/admin/admin_view_profile.php">
                        <i class="material-icons">person</i>Profile Details
						</a>
                    </li>
					
					<li class="active">
                        <i class="material-icons">edit</i> Manage Profile Details
                    </li>
             </ol>
             </ol>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                <center><strong>UPDATE COMPANY DETAILS</strong></center>
                            </h2>
                        </div>
                        <div class="body">
						
						<?php

							include 'database.php';
							$sql = mysqli_query($conn,"SELECT * FROM company");
							$id=$row['id'];
							
							
							$abc=$_SESSION['admin_id'];
							$sql = mysqli_query($conn,"SELECT * FROM company");
							$row = mysqli_fetch_array($sql);
							$id=$row['id'];
							$company_name=$row['company_name'];
							$company_email=$row['company_email'];
							$company_phoneno=$row['company_phoneno'];
							$company_website=$row['company_website'];
							$company_industry=$row['company_industry'];
							$company_address=$row['company_address'];

							//$result = $con -> query($sql);

						?>
                            <form id="form_validation" action="update_company_details.php" method="post">
                                <label for="company_name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="company_name" class="form-control" name="company_name" value="<?php echo $company_name; ?>" placeholder="Enter company name" required>
                                    </div>
                                </div>
								
								<label for="company_website">Website</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="company_website" class="form-control" name="company_website" value="<?php echo $company_website; ?>" placeholder="Enter company website">
                                    </div>
                                </div>
								
								<label for="company_email">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" id="company_email" class="form-control" name="company_email" value="<?php echo $company_email; ?>" placeholder="Enter email address" required>
                                    </div>
                                </div>
								
								<label for="company_industry">Industry</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="company_industry" class="form-control" name="company_industry" value="<?php echo $company_industry; ?>" placeholder="Enter Industry">
                                    </div>
                                </div>
																
								<label for="company_phoneno">Phone Number</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="company_phoneno" class="form-control" name="company_phoneno" value="<?php echo $company_phoneno; ?>" placeholder="Enter phone number" required>
                                    </div>
                                </div>
								<label for="company_address">Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="company_address" class="form-control" name="company_address" value="<?php echo $company_address; ?>" placeholder="Enter address" required>
                                    </div>
                                </div>
                                
								<br>
								<div class="form-group" align="right">
                                <button type="submit" class="btn btn-success waves-effect" type="submit"><span class="glyphicon glyphicon-edit"></span>SAVE</button>
								</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
			
			<!-- Update Password -->
			<div class="modal fade" id="changepass" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="defaultModalLabel"><center>CHANGE PASSWORD</center></h4>
						</div>
						<div class="modal-body">

							<form method="post" class="form-horizontal" role="form">
								<input type="hidden" name="edit_id" value="<?php echo $sv_id; ?>">


								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="sv_password">Current Password</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="password" id="sv_password" name="sv_password" value="" class="form-control" placeholder="Enter Current Password">
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
									<input type="hidden" name="sv_id" value="<?php echo $_SESSION['sv_id']; ?>"  />

								<div class="modal-footer">
									<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
									<button type="submit" class="btn btn-success waves-effect" name="update_password"><span class="glyphicon glyphicon-edit"></span>SAVE</button>
								</div>

							<?php

								if(isset($_POST['update_password'])){
								include 'database.php';
								
									$sv_id = mysqli_real_escape_string($conn,$_POST['sv_id']);
									$password1 = mysqli_real_escape_string($conn,$_POST['password1']);
									$password2 = mysqli_real_escape_string($conn,$_POST['password2']);
									$sv_password = mysqli_real_escape_string($conn,$_POST['sv_password']);

									$select = "SELECT * FROM supervisor WHERE sv_id = '$sv_id' ";
									$result = $conn->query($select);
									while($row = $result->fetch_assoc()){
										$password = $row["sv_password"];
									}

									if($sv_password == $password){
										if($password1===$password2){
											$query = "UPDATE supervisor SET sv_id= '$sv_id', sv_password='$password1' WHERE  sv_id='$sv_id'  ";
											echo "<script type = \"text/javascript\">
														alert(\"New Password Updated\");
														
													</script>";
											$result = $conn->query($query);
										}
										else{
											echo "<script type = \"text/javascript\">
														alert(\"Password Not Match\");
														window.location = (\"sv_view_profile.php\")
													</script>";
										}
									}
									else{
										echo "<script type = \"text/javascript\">
														alert(\"Wrong Current Password\");
														window.location = (\"sv_view_profile.php\")
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

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>

</html>