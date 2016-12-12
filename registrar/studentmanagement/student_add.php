<?php $base_url =  "http://".$_SERVER['SERVER_NAME']."/pcnhs.sis"; ?>
<?php require_once "../../resources/config.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<?php include "$base_url/resources/templates/registrar/header.php"; ?>
	</head>
	<body class="nav-md">
		<!-- Sidebar -->
		<?php include "$base_url/resources/templates/registrar/sidebar.php"; ?>
		<!-- Top Navigation -->
		<?php include "$base_url/resources/templates/registrar/top-nav.php"; ?>
		<div class="right_col" role="main">
			<div class="clearfix"></div>
			<form id="validate-add" class="form-horizontal form-label-left" data-parsley-validate action=<?php echo "$base_url/registrar/studentmanagement/student_info_insert.php"; ?> method="POST" >
				<div class="x_panel">
					<div class="x_title">
						<h2>Student Personal Information</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="col-md-12 col-sm-6 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Student</h2>
									<div class="clearfix"></div>
								</div>
								<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Curriculum *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<select id="curr-select" class="form-control col-md-7 col-xs-12" name="curriculum" required="required">
												<option value="none">No Selected</option>
												<?php
													
													   													
													if(!$conn) {
														die("Connection failed: " . mysqli_connect_error());
													}

													$statement = "SELECT * FROM pcnhsdb.curriculum";
													$result = $conn->query($statement);
													if ($result->num_rows > 0) {
													    // output data of each row
													    while($row = $result->fetch_assoc()) {
													    	$curr_id = $row['curr_id'];
													    	$curr_name = $row['curr_name'];
													    	echo <<<OPTION1
													    		<option value="$curr_id">$curr_name</option>
OPTION1;
													  }
													}
													
												?>
											</select>
										</div>
									</div>
								<div class="x_content">
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input id="name" class="form-control col-md-7 col-xs-12" required="required" type="text" name="stud_id">
										</div>
										<!-- <input class="form-control" type="text" name="stud_id" required="required"> -->
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">First Name *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input class="form-control col-md-7 col-xs-12" required="required" type="text" name="first_name">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input class="form-control col-md-7 col-xs-12" required="required" type="text" name="mid_name">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input class="form-control col-md-7 col-xs-12" required="required" type="text" name="last_name">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Gender *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div id="gender" class="btn-group" data-toggle="buttons">
												<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
													<input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
												</label>
												<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
													<input type="radio" name="gender" value="female"> Female
												</label>
											</div>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Birthday *</label>
										<div class="col-md-2 col-sm-6 col-xs-12">
											<select class="form-control col-md-7 col-xs-12" name="bmonth">
												<option value="">Month</option>
												<?php 
													$month=array('January','February','March','April','May','June','July','August','September','October','November','December');

													for ($i=0; $i < count($month) ; $i++) { 
														$dayVal = $i+1;
														$monthName = $month[$i];
														echo "<option value='$dayVal'>$month[$i]</option>";
													}


												?>
											</select>
										</div>
										<div class="col-md-2 col-sm-6 col-xs-12">
											<select class="form-control col-md-7 col-xs-12" name="bday">
												<option value="">Day</option>
												<?php for ($day=1; $day <= 31 ; $day++) { 
													echo "<option value='$day'>$day</option>";
												} ?>
											</select>
										</div>
										<div class="col-md-2 col-sm-6 col-xs-12">
											<select class="form-control col-md-7 col-xs-12" name="byear">
												<option value="">Year</option>
												<?php 
														$present = date("Y");
													for ($year=1980; $year <= $present; $year++) { 
														echo "<option value='$year'>$year</option>";
												} ?>
											</select>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Birthplace *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input class="form-control col-md-7 col-xs-12" type="text" name="birth_place">
										</div>
									</div>
									<!-- <div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Home Address</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input class="form-control  col-md-7 col-xs-12" type="text" name="home_add">
										</div>
									</div> -->
									<!-- <div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">School Location *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<select class="form-control col-md-7 col-xs-12" name="schl_location">
												<option value="annex">Annex</option>
												<option value="main">Main</option>
											</select>
										</div>
									</div> -->
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Student Program *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<select class="form-control col-md-7 col-xs-12" name="program">
												<?php
													
													   													
													if(!$conn) {
														die("Connection failed: " . mysqli_connect_error());
													}

													$statement = "SELECT * FROM pcnhsdb.programs";
													$result = $conn->query($statement);
													if ($result->num_rows > 0) {
													    // output data of each row
													    while($row = $result->fetch_assoc()) {
													    	$prog_id = $row['prog_id'];
													    	$prog_name = $row['prog_name'];
													    	echo <<<OPTION1
													    		<option value="$prog_id">$prog_name</option>
OPTION1;
													  }
													}
													
												?>
											</select>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Parent or Guardian</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Full Name *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input class="form-control  col-md-7 col-xs-12" type="text" name="pname">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Occupation *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input class="form-control  col-md-7 col-xs-12" type="text" name="occupation">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Address *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input class="form-control  col-md-7 col-xs-12" type="text" name="parent_address">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Primary School</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="item form-group">
										<label class="control-label col-md-4 col-sm-4 col-xs-12">School Name *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input class="form-control  col-md-7 col-xs-12" type="text" name="schl_name">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-4 col-sm-4 col-xs-12">School Year *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input class="form-control  col-md-7 col-xs-12" type="text" name="schl_year">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-4 col-sm-4 col-xs-12">Total Elementary Years *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input class="form-control  col-md-7 col-xs-12" type="number" name="total_elem_years" min="1">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-4 col-sm-4 col-xs-12">Average Grade *</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input class="form-control  col-md-7 col-xs-12" type="number" name="gpa" min="1">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-3 col-md-offset-3 pull-right">
								<button type="submit" class="btn btn-success">Save Changes</button>
							</div>
						</div>
						</div>
					</form>
				</div>
			</div>
			
			
			
			<!-- Content End -->
			<?php include "$base_url/resources/templates/registrar/footer.php"; ?>
			<?php include "$base_url/resources/templates/registrar/scripts.php"; ?>
			
			<!-- /jquery.inputmask -->
			<script>
		      $(document).ready(function() {
		        $(":input").inputmask();
		      });
    		</script>

    		<!-- Parsley -->
			    <script>
			      $(document).ready(function() {
			        $.listen('parsley:field:validate', function() {
			          validateFront();
			        });
			        $('#validate-add .btn').on('click', function() {
			          $('#validate-add').parsley().validate();
			          validateFront();
			        });
			        var validateFront = function() {
			          if (true === $('#validate-add').parsley().isValid()) {
			            $('.bs-callout-info').removeClass('hidden');
			            $('.bs-callout-warning').addClass('hidden');
			          } else {
			            $('.bs-callout-info').addClass('hidden');
			            $('.bs-callout-warning').removeClass('hidden');
			          }
			        };
			      });

			      try {
			        hljs.initHighlightingOnLoad();
			      } catch (err) {}
			    </script>
			<!-- /Parsley -->
		</body>
	</html>