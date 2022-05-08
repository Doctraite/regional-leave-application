<?php
session_start();
DATE_DEFAULT_TIMEZONE_SET('AFRICA/CAIRO');
include('includes/config.php');
if(isset($_POST['signin']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$user_status="online";
	$sql ="SELECT * FROM tblemployees where EmailId ='$username' AND Password ='$password'";
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	if($count > 0)
	{
		while ($row = mysqli_fetch_assoc($query)) {
		    if ($row['role'] == 'Admin') {
		    	$_SESSION['alogin']=$row['emp_id'];
		    	$_SESSION['arole']=$row['Designation'];
				$sql1 = "UPDATE tblemployees SET user_status=:user_status WHERE emp_id=:id";
				$query = $dbh->prepare($sql1);
				$query->bindParam(':user_status',$user_status,PDO::PARAM_STR);
				//$query->execute();
				$time_loged =date("Y-m-d H:i:s",strtotime("now"));
				$sql2 = "insert into activity(time_loged,emp_id)VALUES(?,?)";
				$query = $dbh->prepare($sql2);
				$query->bindParam(1,$time_loged,PDO::PARAM_STR);
			    $query->bindParam(2,$_SESSION['alogin'],PDO::PARAM_STR);
				//$query->execute();
			 	echo "<script type='text/javascript'> document.location = 'admin/admin_dashboard.php'; </script>";
		    }
		    elseif ($row['role'] == 'Staff') {
		    	$_SESSION['alogin']=$row['emp_id'];
		    	$_SESSION['arole']=$row['Designation'];
			 	echo "<script type='text/javascript'> document.location = 'staff/index.php'; </script>";
		    }
		}
	} 
	else{
	  echo "<script>alert('Username & Password Incorrect');</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>LMS</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/MoH-square.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/MoH-square.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/MoH-square.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="index.php">
				    <img src="vendors/images/MoH-square.png" alt="">
					<h3>Regional Health Leave Management System</h3>
					
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/logo.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h3 class="text-center text-primary">Welcome to Regional Health Leave Management System</h3>
						</div>
						<form name="signin" method="post">
						
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Email ID" name="username" id="username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy fa fa-envelope-o" aria-hidden="true"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********"name="password" id="password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								
								<div class="col-md-6 col-lg-5">
									<div class="forgot-password"><a href="updates.php">System Updates</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
									   <input class="btn btn-primary btn-lg btn-block" name="signin" id="signin" type="submit" value="LOGIN">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>