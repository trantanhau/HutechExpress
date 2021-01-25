<?php
include "db.php";
session_start();

if(!isset($_SESSION["uid"])){
	header("location:index.php");
}

$uid = $_SESSION["uid"];

$order_id = "";
$user_id = "";
$address1 = "";
$mobile = "";

$sql_order_id = "SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1 ";
$run_sql_order_id = mysqli_query($con,$sql_order_id);
$data1 = mysqli_fetch_array($run_sql_order_id);
$order_id = $data1["order_id"] + 1;

$sql_user_info = "SELECT user_id, address1, mobile FROM user_info WHERE user_id = '$uid'";
$run_sql_user_info = mysqli_query($con,$sql_user_info);
$data2 = mysqli_fetch_array($run_sql_user_info);
$user_id = $data2["user_id"];
$address1 = $data2["address1"];
$mobile = $data2["mobile"];

$sql = "SELECT * FROM cart WHERE user_id = '$uid'";
$run_query = mysqli_query($con,$sql);
while($row=mysqli_fetch_array($run_query)){


	$product_id = "";
	$quantity = "";

	$product_id = $row["product_id"];
	$quantity = $row["qty"];

			$sql = "INSERT INTO orders (order_id,user_id,product_id,quantity,address1,mobile) VALUES (?,?,?,?,?,?)";
			if ($stmt = mysqli_prepare($con, $sql)) {
				$param_order_id = $order_id;
				$param_brand_id = $user_id;
				$param_product_id = $product_id;
				$param_quantity = $quantity;
				$param_address1 = $address1;
				$param_mobile = $mobile;
				mysqli_stmt_bind_param(
					$stmt,
					"ssssss",
					$param_order_id,
					$param_brand_id,
					$param_product_id,
					$param_quantity,
					$param_address1,
					$param_mobile
				);

				if (mysqli_stmt_execute($stmt)) {
					// header("location: index.php");
					// exit();
				} else {
					echo "Something went wrong. Please try again later.";
				}
			}
			mysqli_stmt_close($stmt);
		
			$pr=$row["product_id"];
			$sql2 = "DELETE FROM cart WHERE user_id = '$uid' AND product_id = '$pr'";
			$run_query2 = mysqli_query($con,$sql2);
	}




?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Online Food</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<style>
			table tr td {padding:10px;}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<a href="profile.php" class="navbar-brand">Online Food</a>
			</div>

		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Thank you </h1>
						<hr/>
						<p> <?php echo $_SESSION["name"]; ?>,Your payment process is 
						successfully completed !!<br/>
						you can buy more food<br/></p>
						<a href="index.php" class="btn btn-success btn-lg">Buy Food</a>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
















































