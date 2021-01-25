<!DOCTYPE html>
<html>
<?php include('db.php'); ?>
<?php include('admin_head.php'); ?>

<body>

	<?php

	//////$sql_cat = "SELECT * FROM categories";	
	//$result_cat = mysqli_query($con, $sql_cat);										
	//if(mysqli_num_rows($result_cat) > 0){
	//$row_cat = mysqli_fetch_array($result_cat);}

	$user_id = "";
	$user_id_err = "";
	$first_name = "";
	$first_name_err = "";
	$last_name = "";
	$last_name_err = "";
	$email = "";
	$email_err = "";
	$password = "";
	$password_err = "";
	$mobile = "";
	$mobile_err = "";
	$address1 = "";
	$address1_err = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$user_id_name = trim($_POST["user_id"]);
		if (empty($user_id_name)) {
			$user_id_err = "Please field User Id.";
		} else {
			$user_id = $user_id_name;
        }
        
        $first_name_name = trim($_POST["first_name"]);
		if (empty($first_name_name)) {
			$first_name_err = "Please field User Id.";
		} else {
			$first_name = $first_name_name;
        }

        $last_name_name = trim($_POST["last_name"]);
		if (empty($last_name_name)) {
			$last_name_err = "Please field User Id.";
		} else {
			$last_name = $last_name_name;
		}
        
        $email_name = trim($_POST["email"]);
		if (empty($email_name)) {
			$email_err = "Please field User Id.";
		} else {
			$email = $email_name;
		}
        
        $password_name = trim($_POST["password"]);
		if (empty($password_name)) {
			$password_err = "Please field User Id.";
		} else {
			$password = $password_name;
		}

        $mobile_number = trim($_POST["mobile"]);
		if (empty($mobile_number)) {
			$mobile_err = "Please field User Id.";
		} else {
			$mobile = $mobile_number;
        }
        
        $address1_name = trim($_POST["address1"]);
		if (empty($address1_name)) {
			$address1_err = "Please field User Id.";
		} else {
			$address1 = $address1_name;
		}


		// $fileData = pathinfo(basename($_FILES["product_image"]["name"]));
		// $fileName = uniqid() . '.' . $fileData['extension'];
		// $target_path = ($_SERVER['DOCUMENT_ROOT'] . "/final/product_images/" . $fileName);

		// if (empty($fileName)) {
		// 	$product_image_err = "Select an image";
		// } else {
		// 	$product_image = $fileName;
		// }

		//while(file_exists($target_path))
		//{
		//	$fileName = uniqid() . '.' . $fileData['extension'];
		//	$target_path = ($_SERVER['DOCUMENT_ROOT'] . "/product_images/" . $fileName);		
		//}
		// move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_path);


		if (empty($user_id_err) && empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($password_err) && empty($mobile_err) && empty($address1_err)) {
			$sql = "INSERT INTO user_info (user_id,first_name,last_name,email,password,mobile,address1) VALUES (?,?,?,?,?,?,?)";
			if ($stmt = mysqli_prepare($con, $sql)) {
				$param_user_id = $user_id;
				$param_first_name = $first_name;
				$param_last_name = $last_name;
				$param_email = $email;
				$param_password = $password;
				$param_mobile = $mobile;
				$param_address1 = $address1;
				mysqli_stmt_bind_param(
					$stmt,
					"sssssss",
					$param_user_id,
					$param_first_name,
					$param_last_name,
					$param_email,
					$param_password,
					$param_mobile,
					$param_address1
				);

				if (mysqli_stmt_execute($stmt)) {
					header("location: admin_user.php");
					exit();
				} else {
					echo "Something went wrong. Please try again later.";
				}
			}
			mysqli_stmt_close($stmt);
		}
	}


	?>

	<div class="wrapper">
		<!-- Sidebar  -->
		<?php include('admin_sidebar.php') ?>
		<!-- Page Content  -->
		<div id="content">
			<div id="content-wrapper">
				<div class="container-fluid">

					<!-- DataTables Example -->
					<div class="card mb-3">
						<div class="card-header">
							<i class="fas fa-table"></i>
							User Data
							<button class="btn btn-primary" style="float: right;">Add User</button>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<div class="row">
									<div class="col-md-12">
										<div class="page-header">
											<h2>Create Record</h2>
										</div>
										<p>Pleade Fillup User Entry form.</p>

										<?php //echo $_SERVER['DOCUMENT_ROOT'];
										?>
										<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

											<!-- <div class="form-group <?php echo (!empty($cat_id_err)) ? 'has-error' : ''; ?>">
												<label>Category</label>
												<select class="form-control" id="cat_id" name="cat_id">
													<?php
													$sql_cat = "SELECT * FROM categories";
													if ($result_cat = mysqli_query($con, $sql_cat)) {
														if (mysqli_num_rows($result_cat) > 0) {
															while ($row_cat = mysqli_fetch_array($result_cat)) {

													?>
																<option value="<?php echo $row_cat['cat_id']; ?>"> <?php if ($cat_id != '') {
																														echo $cat_id;
																													} else {
																														echo  $row_cat['cat_title'];
																													} ?></option>
													<?php

															}
														}
													}
													?>
												</select>
												<span class="help-block"><?php echo $cat_id_err; ?></span>
											</div> -->

											<!-- <div class="form-group <?php echo (!empty($brand_id_err)) ? 'has-error' : ''; ?>">
												<label>Brand</label>
												<select class="form-control" id="brand_id" name="brand_id">
													<?php
													$sql_brand = "SELECT * FROM brands";
													if ($result_brand = mysqli_query($con, $sql_brand)) {
														if (mysqli_num_rows($result_brand) > 0) {
															while ($row_brand = mysqli_fetch_array($result_brand)) {
													?>
																<option value="<?php echo $row_brand['brand_id']; ?>"> <?php if ($brand_id != '') {
																															echo $brand_id;
																														} else {
																															echo  $row_brand['brand_title'];
																														} ?></option>
													<?php
															}
														}
													}
													?>
												</select>
												<span class="help-block"><?php echo $brand_id_err; ?></span>
											</div> -->
                                            
                                            <div class="form-group <?php echo (!empty($user_id_err)) ? 'has-error' : ''; ?>">
												<label>User Id</label>
												<input type="text" name="user_id" class="form-control " value="<?php echo $user_id; ?>">
												<span class="help-block"><?php echo $user_id_err; ?></span>
											</div>

                                            <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
												<label>First Name</label>
												<input type="text" name="first_name" class="form-control " value="<?php echo $first_name; ?>">
												<span class="help-block"><?php echo $first_name_err; ?></span>
											</div>

											<div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
												<label>Last Name</label>
												<input type="text" name="last_name" class="form-control " value="<?php echo $last_name; ?>">
												<span class="help-block"><?php echo $last_name_err; ?></span>
											</div>

											<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
												<label>Email</label>
												<input type="text" name="email" class="form-control " value="<?php echo $email; ?>">
												<span class="help-block"><?php echo $email_err; ?></span>
											</div>

											<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
												<label>Password</label>
                                                <input type="text" name="password" class="form-control " value="<?php echo $password; ?>">

												<span class="help-block"><?php echo $password_err; ?></span>
											</div>

											<div class="form-group <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
												<label>Mobile</label>
                                                <input type="text" name="mobile" class="form-control " value="<?php echo $mobile; ?>">

												<span class="help-block"><?php echo $mobile_err; ?></span>
											</div>

											<div class="form-group <?php echo (!empty($address1_err)) ? 'has-error' : ''; ?>">
												<label>Address</label>
												<input type="text" name="address1" class="form-control " value="<?php echo $address1; ?>">
												<span class="help-block"><?php echo $address1_err; ?></span>
											</div>

											<input type="submit" class="btn btn-info" value="Submit">
											<a href="index.php" class="btn btn-default">Cancel</a>
										</form>
										<br />
									</div>
								</div>
							</div>

						</div><!-- /.card-body -->
					</div><!-- /.car mb-3 -->
				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<footer class="sticky-footer">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Đây là project nhỏ của nhóm %4 == 0</span>
						</div>
					</div>
				</footer>
			</div>


		</div>
	</div>

	<?php mysqli_close($con); ?>

	<!-- jQuery CDN - Slim version (=without AJAX) -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<!-- Popper.JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<!-- Bootstrap JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#sidebarCollapse').on('click', function() {
				$('#sidebar').toggleClass('active');
			});
		});
	</script>
</body>

</html>