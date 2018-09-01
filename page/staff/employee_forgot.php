<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FlexiCOMM | Reset Password</title>
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
                <a class="navbar-brand" href="../../index.html">Flexi<b>COMMUNICATOR</b></a>
            </div>
            
        </div>
    </nav>
    <!-- #Top Bar -->

	
    <section>
        <div class="container-fluid">
            <div class="block-header">
                <h2>BLANK PAGE</h2>
            </div>
        </div>
<?php
include 'database.php';


		if(isset($_POST['forgot1'])){

			$employee_id = $_POST['employee_id'];

			$select = "SELECT * FROM employee WHERE employee_id= '$employee_id' ";
			$result = $conn->query($select);
			while($row = $result->fetch_assoc()){
				$question1 = $row["question1"];
			}

		?>
		<br><br><br><br><br><br>
			<div class="row">
				<div class="col-lg-12">
					<div class="container">
					  <center><h2>Secret Question 1</h2></center>
					  <center><div class="panel panel-success" style="width: 500px">
					    <div class="panel-heading">Fill in the Secret Answer</div>
					    <div class="panel-body">
								<form method="post" action="">
									<label>In what city were you born?</label>
									<input class="form-control" type="text" name="question1">
									<input class="form-control" type="hidden" name="employee_id" value="<?php echo $employee_id; ?>"><br>
									<input class="btn btn-success pull-right" type="submit" name="forgot2" value="Submit">
									<button class="btn btn-bg-grey pull-left" type="button" onclick="window.location.href='employee_forgot.php'">Back</button>
								</form>
							</div>
						</div></center>
					</div>
				</div>
			</div>
		<?php

		}
		elseif(isset($_POST['forgot2'])){

			$question1 = $_POST['question1'];
			$employee_id = $_POST['employee_id'];

			$select = "SELECT * FROM employee WHERE employee_id= '$employee_id' ";
			$result = $conn->query($select);
			while($row = $result->fetch_assoc()){
				$question2 = $row["question2"];
			}
		?>
		<br><br><br><br><br><br>
			<div class="row">
				<div class="col-lg-12">
					<div class="container">
					  <center><h2>Secret Question 2</h2></center>
					  <center><div class="panel panel-success" style="width: 500px">
					    <div class="panel-heading">Fill in the Secret Answer</div>
					    <div class="panel-body">
								<form method="post" action="">
									<label><b>What is your favorite movie? <b></label>
									<input class="form-control" type="text" name="question2">
									<input class="form-control" type="hidden" name="question1" value="<?php echo $question1; ?>">
									<input class="form-control" type="hidden" name="employee_id" value="<?php echo $employee_id; ?>">
									<br>
									<input class="btn btn-success pull-right" type="submit" name="forgot3" value="Submit">
									<button class="btn btn-bg-grey pull-left" type="button" onclick="window.location.href='employee_forgot.php'">Back</button>
								</form>
							</div>
						</div></center>
					</div>
				</div>
			</div>
		<?php
		}
		elseif(isset($_POST['forgot3'])){
			$answer1 = $_POST['question1'];
			$answer2 = $_POST['question2'];
			$employee_id = $_POST['employee_id'];

			$select = "SELECT * FROM employee WHERE employee_id= '$employee_id' ";
			$result = $conn->query($select);
			while($row = $result->fetch_assoc()){
				$question1 = $row["question1"];
				$question2 = $row["question2"];
			}

			if($question1 === $answer1 && $question2 === $answer2){
		?>
		<br><br><br><br><br><br>
			<div class="row">
				<div class="col-lg-12">
					<div class="container">
					  <center><h2>Reset Password</h2></center>
					  <center><div class="panel panel-success" style="width: 500px">
					    <div class="panel-heading">Input Your New Password</div>
					    <div class="panel-body">
								<form method="post" action="">
									<label><b>New Password<b></label>
									<input class="form-control" type="password" name="password1">
									<br>
									<label><b>Confirm Password<b></label>
									<input class="form-control" type="password" name="password2">
									<input class="form-control" type="hidden" name="employee_id" value="<?php echo $employee_id; ?>">
									<br>
									<input class="btn btn-success pull-right" type="submit" name="reset" value="Submit">
									<button class="btn btn-bg-grey pull-left" type="button" onclick="window.location.href='employee_forgot.php'">Back</button>
								</form>
							</div>
						</div></center>
					</div>
				</div>
			</div>
		<?php
			}
			else{

				echo "<script type = \"text/javascript\">
						alert(\"You input the wrong answer\");
						window.location = (\"../../index.html\")
						</script>";
			}
		}
		elseif(isset($_POST['reset'])){

			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];
			$employee_id = $_POST['employee_id'];

			if($password1 === $password2){



				$query = "UPDATE employee SET employee_password='$password1' WHERE  employee_id='$employee_id'  ";

				$res = $conn->query($query);

				if($res === TRUE){
					echo "<script type = \"text/javascript\">
						alert(\"Password Succesfully Edited\");
						window.location = (\"../../index.html\")
						</script>";
					}

				else {
					echo $password1;
					echo $password2;
					echo $employee_password;
					}
			}
			else{
				echo "<script type = \"text/javascript\">
						alert(\"Your input the wrong password\");
						window.location = (\"../../index.html\")
						</script>";
			}
		}
		else{
		?>
		<br><br><br><br><br><br>
			<div class="row">
				<div class="col-lg-12">
					<div class="container">
					  <h2><center>Forgot Password</center></h2><hr>
					  <center><div class="panel panel-success" style="width: 500px">
					    <div class="panel-heading">Reset Password</div>
					    	<div class="panel-body">
									<form method="post" action="">
										<label><b>Input Your Username<b></label>
										<input class="form-control" type="text" name="employee_id"><br>
										<input class="btn btn-success pull-right" type="submit" name="forgot1" value="Submit">
										<button class="btn btn-bg-grey pull-left" type="button" onclick="window.location.href='../../index.html'">Back</button>
									</form>
								</div>
							</div></center>
						</div>

				</div>
			</div>
		<?php
		}
		?>		
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