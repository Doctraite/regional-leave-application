<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<?

        $sql="select * from tblemployees inner join activity on tblemployees.emp_id=activity.emp_id  ORDER BY tblemployees.emp_id";
		date_default_timezone_set('Africa/Cairo');
		$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));

		if(isset($_POST['update']))
		{
			date_default_timezone_set('Africa/Cairo');
		    $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
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

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="page-header">
				<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Activity Log Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Staff Log Activity</li>
								</ol>
							</nav>
						</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">System Activity Log</h2>
					</div>
				<div class="pb-10">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">STAFF NAME</th>
								<th>TIME LOGGED INTO SYSTEM</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                            <?php
							error_reporting(0);
		                         $teacher_query = mysqli_query($conn,"select * from tblemployees inner join activity on tblemployees.emp_id=activity.emp_id where role='Admin' ORDER BY activity.activity_id") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['emp_id'];
		                         ?>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['location'])) ? '../uploads/'.$row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></div>
										</div>
									</div>
								</td>
								<td>
									<?php
									echo 'User logged in at &nbsp;'.date("d/m/y H:i:sA",strtotime($row['time_log']));
									?>
								 </td>
                            </tr>
                         <?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>

			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="../src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="../src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="../src/plugins/datatables/js/vfs_fonts.js"></script>
	<script src="../vendors/scripts/datatable-setting.js"></script></body>
</body>
</html>
