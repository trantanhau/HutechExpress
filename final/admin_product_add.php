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

	$cat_id = "";
	$cat_id_err = "";
	$brand_id = "";
	$brand_id_err = "";
	$product_title = "";
	$product_title_err = "";
	$product_price = "";
	$product_price_err = "";
	$product_desc = "";
	$product_desc_err = "";
	$product_keywords = "";
	$product_keywords_err = "";
	$product_image = "";
	$product_image_err = "";


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$cat_id_name = trim($_POST["cat_id"]);
		if (empty($cat_id_name)) {
			$cat_id_err = "Please Select a Category.";
		} else {
			$cat_id = $cat_id_name;
		}

		$brand_id_name = trim($_POST["brand_id"]);
		if (empty($brand_id_name)) {
			$brand_id_err = "Please Select a Brand.";
		} else {
			$brand_id = $brand_id_name;
		}

		$product_title_name = trim($_POST["product_title"]);
		if (empty($product_title_name)) {
			$product_title_err = "Please Endter a Product Name.";
		} else {
			$product_title = $product_title_name;
		}

		$product_price_name = trim($_POST["product_price"]);
		if (empty($product_price_name)) {
			$product_price_err = "Please Endter Product Price.";
		} else {
			$product_price = $product_price_name;
		}

		$product_desc_name = trim($_POST["product_desc"]);
		if (empty($product_desc_name)) {
			$product_desc_err = "Please Endter Product Description.";
		} else {
			$product_desc = $product_desc_name;
		}

		$product_keywords_name = trim($_POST["product_keywords"]);
		if (empty($product_keywords_name)) {
			$product_keywords_err = "Please Endter Product Keywords.";
		} else {
			$product_keywords = $product_keywords_name;
		}

		$fileData = pathinfo(basename($_FILES["product_image"]["name"]));
		$fileName = uniqid() . '.' . $fileData['extension'];
		$target_path = ($_SERVER['DOCUMENT_ROOT'] . "/final/product_images/" . $fileName);

		if (empty($fileName)) {
			$product_image_err = "Select an image";
		} else {
			$product_image = $fileName;
		}

		//while(file_exists($target_path))
		//{
		//	$fileName = uniqid() . '.' . $fileData['extension'];
		//	$target_path = ($_SERVER['DOCUMENT_ROOT'] . "/product_images/" . $fileName);		
		//}
		move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_path);


		if (empty($cat_id_err) && empty($brand_id_err) && empty($product_title_err) && empty($product_price_err) && empty($product_desc_err) && empty($product_keywords_err) && empty($product_image_err)) {
			$sql = "INSERT INTO products (cat_id,brand_id,product_title,product_price,product_desc,product_image,product_keywords) VALUES (?,?,?,?,?,?,?)";
			if ($stmt = mysqli_prepare($con, $sql)) {
				$param_cat_id = $cat_id;
				$param_brand_id = $brand_id;
				$param_product_title = $product_title;
				$param_product_price = $product_price;
				$param_product_desc = $product_desc;
				$param_product_keywords = $product_keywords;
				$param_product_image = $fileName;
				mysqli_stmt_bind_param(
					$stmt,
					"sssssss",
					$param_cat_id,
					$param_brand_id,
					$param_product_title,
					$param_product_price,
					$param_product_desc,
					$param_product_image,
					$param_product_keywords
				);

				if (mysqli_stmt_execute($stmt)) {
					header("location: admin_product.php");
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
							Product Data
							<button class="btn btn-primary" style="float: right;">Add Product</button>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<div class="row">
									<div class="col-md-12">
										<div class="page-header">
											<h2>Create Record</h2>
										</div>
										<p>Pleade Fillup Product Entry form.</p>

										<?php //echo $_SERVER['DOCUMENT_ROOT'];
										?>
										<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

											<div class="form-group <?php echo (!empty($cat_id_err)) ? 'has-error' : ''; ?>">
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
											</div>

											<div class="form-group <?php echo (!empty($brand_id_err)) ? 'has-error' : ''; ?>">
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
											</div>

											<div class="form-group <?php echo (!empty($product_title_err)) ? 'has-error' : ''; ?>">
												<label>Name</label>
												<input type="text" name="product_title" class="form-control " value="<?php echo $product_title; ?>">
												<span class="help-block"><?php echo $product_title_err; ?></span>
											</div>

											<div class="form-group <?php echo (!empty($product_price_err)) ? 'has-error' : ''; ?>">
												<label>Price</label>
												<input type="text" name="product_price" class="form-control " value="<?php echo $product_price; ?>">
												<span class="help-block"><?php echo $product_price_err; ?></span>
											</div>

											<div class="form-group <?php echo (!empty($product_desc_err)) ? 'has-error' : ''; ?>">
												<label>Description</label>
												<textarea class="form-control" rows="2" name="product_desc"><?php echo $product_desc; ?></textarea>
												<span class="help-block"><?php echo $product_desc_err; ?></span>
											</div>

											<div class="form-group <?php echo (!empty($product_image_err)) ? 'has-error' : ''; ?>">
												<label>Image</label>
												<input type="file" name="product_image" class="form-control">
												<span class="help-block"><?php echo $product_image_err; ?></span>
											</div>

											<div class="form-group <?php echo (!empty($product_keywords_err)) ? 'has-error' : ''; ?>">
												<label>Keywords</label>
												<input type="text" name="product_keywords" class="form-control " value="<?php echo $product_keywords; ?>">
												<span class="help-block"><?php echo $product_keywords_err; ?></span>
											</div>

											<input type="submit" class="btn btn-primary" value="Submit">
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