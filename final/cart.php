<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>
<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Online Food</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="profile.php" class="navbar-brand">Online Food</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Cart Checkout</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2"><b>Action</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Image</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Name</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Price</b></div>
							<div class="col-md-2 col-xs-2"><b>Price in BDT</b></div>
						</div>
						<div id="cart_checkout"></div>

						</div> 
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>
</body>	
<?php
		
		if(isset($_POST['quantity']))
		{
			$quantity = "";
			$product_id = "";
			$total = "";
			$quantity = $_POST['quantity'];
			$product_id = $_POST['product_id'];
			$total = $_POST['total'];

			$uid = $_SESSION["uid"];
			
			$sql_update_qty = "UPDATE cart SET qty = $quantity, total_amt = $total WHERE product_id = $product_id AND user_id = '$uid'";
			$temp = mysqli_query($con,$sql_update_qty);
		}

?>
</html>
















		