<?php

session_start();
if (!isset($_SESSION["uid"])) {
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Online Food</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<style>
		@media screen and (max-width:480px) {
			#search {
				width: 80%;
			}

			#search_btn {
				width: 30%;
				float: right;
				margin-top: -32px;
				margin-right: 10px;
			}
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
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi," . $_SESSION["name"]; ?></a>
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
	<br><br><br>
	<div style="margin-left:9%;margin-right:9%;">
		<div id="wowslider-container1">
			<div class="ws_images">
				<ul>
					<li><img src="data1/images/slide_01.jpg" alt="slide 01" title="slide 01" id="wows1_0" /></li>
					<li><a href="http://wowslider.com"><img src="data1/images/slider_02.jpg" alt="jquery content slider" title="slider 02" id="wows1_1" /></a></li>
					<li><img src="data1/images/slider_03.jpg" alt="slider 03" title="slider 03" id="wows1_2" /></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">
				<div id="get_category">
				</div>

			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Food Items</div>
					<div class="panel-body">
						<div id="get_product">

						</div>


					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>

	</div>
	<div class="col-md-1"></div>
	</div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
</body>

</html>