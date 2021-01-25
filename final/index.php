<?php
session_start();
if (isset($_SESSION["uid"])) {
	header("location:profile.php");
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
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand">Hutech Express</a>
			</div>
			<div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav">

					<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
					<li style="top:10px;left:20px;"><button class="btn btn-success" id="search_btn">Search</button></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Giỏ hàng<span class="badge">0</span></a>
						<div class="dropdown-menu" style="width:400px;">
							<div class="panel panel-success">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-3">Số lượng</div>
										<div class="col-md-3">Ảnh</div>
										<div class="col-md-3">Tên sản phẩm</div>
										<div class="col-md-3">Giá</div>
									</div>
								</div>
								<div class="panel-body"></div>
								<div class="panel-footer"></div>
							</div>
						</div>
					</li>
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Đăng nhập</a>
						<ul class="dropdown-menu">
							<div style="width:300px;">
								<div class="panel panel-primary">
									<div class="panel-heading">Đăng nhập</div>
									<div class="panel-heading">
										<label for="email">Email</label>
										<input type="email" class="form-control" id="email" required />
										<label for="email">Mật khẩu</label>
										<input type="password" class="form-control" id="password" required />
										<p><br /></p>
										<a href="#" style="color:white; list-style:none;">Quên mật khẩu</a><input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login">
									</div>
									<div class="panel-footer" id="e_msg"></div>
								</div>
							</div>
						</ul>
					</li>
					<li><a href="customer_registration.php"><span class="glyphicon glyphicon-user"></span>Đăng ký</a></li>
				</ul>
			</div>
		</div>
	</div>
	<br><br><br>
	<div style="margin-left:9%;margin-right:9%;">
		<div id="wowslider-container1">
			<div class="ws_images">
				<ul>
					<li><img src="data1/images/5fc8a51d5e04e_e4d048aecac369c1550ac450018bd2f9.jpg" alt="slide 01" title="slide 01" id="wows1_0" /></li>
					<li><a href="http://wowslider.com"><img src="data1/images/5fed6ececdbc7_eb98daa94b547d52daa881b24768a13f.jpg" alt="jquery content slider" title="slider 02" id="wows1_1" /></a></li>
					<li><img src="data1/images/5ffe5de160439_3d0d1df41f627d34cf34d5b583f94f8c.jpg" alt="slider 03" title="slider 03" id="wows1_2" /></li>
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
					<div class="panel-heading">MiniStop Items</div>
					<div class="panel-body">
						<div id="get_product">

						</div>


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