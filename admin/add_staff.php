<?php include('includes/header.php')?>
<?php 
     include('../includes/session.php')
	// DATE_DEFAULT_TIMEZONE_SET('AFRICA/CAIRO');
?>

<?php
			$query1 = mysqli_query($conn,"select * from tblleavetype where LeaveType like '%Vacational%' ")or die(mysqli_error($conn));
			$row1 = mysqli_fetch_array($query1);
	?>
	<?php
			$query2 = mysqli_query($conn,"select * from tblleavetype where LeaveType like '%Casual%' ")or die(mysqli_error($conn));
			$row2 = mysqli_fetch_array($query2);
			
	?>

<?php
	if(isset($_POST['add_staff']))
	{
	DATE_DEFAULT_TIMEZONE_SET('AFRICA/CAIRO');
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];   
	$email=$_POST['email']; 
	$password=md5($_POST['password']); 
	$gender=$_POST['gender']; 
	$dob=$_POST['dob']; 
	$designation=$_POST['department']; 
	$address=$_POST['address']; 
	$leave_days=$_POST['leave_days']; 
	$C_leave_days=$_POST['C_leave_days'];
	$V_leave_days=$_POST['V_leave_days'];
	$user_role=$_POST['user_role']; 
	$phonenumber=$_POST['phonenumber']; 
	$user_status='offline';
	$time_joined =date("Y-m-d H:i:s",strtotime("now"));
	$date_joined =date("Y-m-d", strtotime("now"));
	$status=1;

	 $count = mysqli_num_rows($query);
     



     if ($count > 0){ ?>


	 <script>
	 alert('Data Already Exist');
	</script>
								


	<?php
      }else{
		  
        mysqli_query($conn,"INSERT INTO tblemployees(FirstName,LastName,EmailId,Password,Gender,Dob,Designation,Address,V_leave_days,C_leave_days,Av_leave,role,Phonenumber,Status, location,user_status,time_joined,date_joined) VALUES('$fname','$lname','$email','$password','$gender','$dob','$designation','$address','$V_leave_days','$C_leave_days','$leave_days','$user_role','$phonenumber','$status', 'NO-IMAGE-AVAILABLE.jpg','$user_status','$time_joined','$date_joined')         
		") or die(mysqli_error($conn)); ?>
		<script>alert('Staff Records Successfully  Added');</script>;
		<script>
		window.location = "staff.php"; 
		</script>
		<?php   }
}

?>

<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/MoH-square.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	
	<div class="mobile-menu-overlay"></div>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Staff Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Staff Module</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Staff Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >First Name :</label>
											<input name="firstname" type="text" class="form-control wizard-required" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Last Name :</label>
											<input name="lastname" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Email Address :</label>
											<input name="email" type="email" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Password :</label>
											<input name="password" type="password" placeholder="**********" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Gender :</label>
											<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Gender</option>
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Phone Number :</label>
											<input name="phonenumber" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Date Of Birth :</label>
											<input name="dob" type="text" class="form-control date-picker" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Address :</label>
											<input name="address" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Designation :</label>
											<input name="department" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Staff VacationalLeave Days :</label>
											<input name="V_leave_days" type="number" class="form-control" required="true" autocomplete="off " value="<?php echo $row1['No_of_Days']; ?>">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Staff Casual Leave Days :</label>
											<input name="C_leave_days" type="number" class="form-control" required="true" autocomplete="off" value="<?php echo $row2['No_of_Days']; ?>">
										</div>
									</div>
								


								</div>
									<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Staff Avarage Leave :</label>
											<input name="leave_days" type="number" class="form-control" required="true" autocomplete="off" value="<?php echo $row2['No_of_Days'] +$row1['No_of_Days']; ?>" >
										</div>
									</div>
									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>User Role :</label>
											<select name="user_role" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Role</option>
												<option value="Admin">Admin</option>
												<option value="Staff">Staff</option>
											</select>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="add_staff" id="add_staff" data-toggle="modal">Add&nbsp;Staff</button>
											</div>
										</div>
									</div>
								</div>
							</section>
						</form>
					</div>
				</div>

			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>