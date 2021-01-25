<?php
include "db.php";
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}




?>
<!DOCTYPE html>

<html>
<?php include('db.php'); ?>
<?php include('admin_head.php'); ?>
	<head>
		<meta charset="UTF-8">
		<title>Online Food</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="style.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<style>
			@media screen and (max-width:480px){
				#search{width:80%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
			}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand">Online Food</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				
				<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
				<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3 col-xs-3">Sl.No</div>
									<div class="col-md-3 col-xs-3">Product Image</div>
									<div class="col-md-3 col-xs-3">Product Name</div>
									<div class="col-md-3 col-xs-3">Price in BDT.</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi!".$_SESSION["name"]; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-shopping-cart">Cart</a></li>
						<li class="divider"></li>
						<li><a href="" style="text-decoration:none; color:blue;">Change Password</a></li>
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		

	
	<div id = formpage>
		<form action="payment_success.php" method="POST">
			<h2 style="text-align: center;">Enter Account no. and PIN no.</h2>
			<p>
				<label>Bank name</label><br>
				<input type="text" id="ac" name="ac"/>
			</p>
			<p>
				<label>Account no.</label><br>
				<input type="text" id="ac" name="ac"/>
			</p>
			<p>
				<label>PIN</label><br>
				<input type="password" id="pin" name="pin"/>
			</p>
			<p>
				<input type="submit" id="btn" value="Submit"/>
			</p>
			<p>
				<input type="submit" id="btn_2" value="Thanh toán tiền mặt"/>
			</p>
		</form>
	</div>

</body>
<script>
	function 
</script>

</html>
















































