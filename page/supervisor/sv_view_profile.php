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
    <title>FlexiCOMM | Supervisor Manage Profile</title>
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
                <a class="navbar-brand" href="../../page/supervisor/sv_home.php">Flexi<b>COMMUNICATOR</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <!-- Notifications -->
                     <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>

							 <?php
								include 'database.php';
								$sql  = '
										SELECT sv_id,task_status, COUNT(*)
										AS count
										FROM task2
										WHERE task_status="delayed"
										AND sv_id = "'.$_SESSION['sv_id'].'"
										';

										 $result=mysqli_query($conn,$sql);
											if($result)
											{
												while($row=mysqli_fetch_assoc($result))
												{
													//echo $row['c'];

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
                                        <a href="../../page/supervisor/sv_delay.php">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">date_range</i>
                                            </div>
                                            <div class="menu-info">

													<?php
														include 'database.php';
														$t = "SELECT sv_id,task_status, COUNT(*)
																	 AS count
																	 FROM task2
																	 WHERE task_status='delayed'
																	 AND sv_id = '".$_SESSION['sv_id']."'
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
                                <!-- <a href="javascript:void(0);">View All Notifications</a> -->
                            </li>
                        </ul>
                    </li>
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
					$abc=$_SESSION['sv_id'];
					$sql = mysqli_query($conn,"SELECT * FROM supervisor WHERE sv_id = '$abc'");
					$row = mysqli_fetch_array($sql);
					$sv_id=$row['sv_id'];
					$sv_name=$row['sv_name'];
					$sv_email=$row['sv_email'];
				?>

                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $sv_name; ?></div>
                    <div class="email"><?php echo $sv_email; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="sv_update_profile.php"><i class="material-icons">person</i>Edit Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="#changepass" data-toggle="modal"><i class="material-icons">create</i>Edit Password</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="sv_logout.php"><i class="material-icons">input</i>Sign Out</a></li>
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
                        <a href="../../page/supervisor/sv_home.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

					<li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Profile</span>
                        </a>
						<ul class="ml-menu">
							<li class="active">
                                <a href="../../page/supervisor/sv_view_profile.php">Your Profile</a>
                            </li>
							<li>
                                <a href="../../page/supervisor/sv_question.php">Edit Secret Answers</a>
                            </li>
                        </ul>
                    </li>
					
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Assignments</span>
                        </a>
						<ul class="ml-menu">
							<li>
                                <a href="../../page/supervisor/sv_view_all_project.php">All Assignments</a>
                            </li>
							<li>
                                <a href="../../page/supervisor/sv_view_project_list.php">My Assignments</a>
                            </li>
                        </ul>
                    </li>
					
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">date_range</i>
                            <span>Tasks</span>
                        </a>
						<ul class="ml-menu">
							<li>
                                <a href="../../page/supervisor/sv_task.php">My Task</a>
                            </li>
							<li>
                                <a href="../../page/supervisor/sv_team_task.php">Team Task</a>
                            </li>
                        </ul>
                    </li>

					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">group</i>
                            <span>Users</span>
                        </a>
                        <ul class="ml-menu">
							<li>
                                <a href="../../page/supervisor/sv_view_sv.php">Manager Profiles</a>
                            </li>
							<li>
                                <a href="../../page/supervisor/sv_view_staff.php">Staff Profiles</a>
                            </li>
							<li>
                                <a href="../../page/supervisor/company_details.php">Company Details</a>
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
            <div class="block-header">
                <h2></h2>
            </div>
			
			<div class="body">
                <ol class="breadcrumb">
					<li>
                        <a href="../../page/supervisor/sv_home.php">
                        <i class="material-icons">home</i> Home
                        </a>
                    </li>
                    <li class="active">
                        <i class="material-icons">edit</i> Manage Profile Details
                    </li>
             </ol>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                <center><strong>PROFILE DETAILS</strong></center>
                            </h2>
                        </div>
                        <div class="body">
						
						<?php

							include 'database.php';
							
							$abc=$_SESSION['sv_id'];
							$sql = mysqli_query($conn,"SELECT * FROM supervisor WHERE sv_id = '$abc'");
							$row = mysqli_fetch_array($sql);
							$sv_id=$row['sv_id'];
							$sv_name=$row['sv_name'];
							$sv_email=$row['sv_email'];
							$sv_phoneno=$row['sv_phoneno'];
							$sv_department=$row['sv_department'];
							$sv_address=$row['sv_address'];

							//$result = $con -> query($sql);

						?>
                            <form id="form_validation" action="update_sv_profile.php" method="post">
                                <label for="sv_name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo $sv_name; ?>
                                    </div>
                                </div>
								
								<label for="sv_email">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo $sv_email; ?>
                                    </div>
                                </div>
								<label for="sv_phoneno">Phone Number</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo $sv_phoneno; ?>
                                    </div>
                                </div>
								<label for="sv_department">Department</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo $sv_department; ?>
                                    </div>
                                </div>
								<label for="sv_address">Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo $sv_address; ?>
                                    </div>
                                </div>
                                
								<br>
								<div class="form-group" align="right">
									<a href = "sv_update_profile.php" class="btn btn-success waves-effect"><span class="glyphicon glyphicon-edit"></span>UPDATE</button></a>
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