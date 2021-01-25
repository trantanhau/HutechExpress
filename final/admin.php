<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Online Food</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="style.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>	

	</head>

<?php
include "db.php";

session_start();
//echo $_POST["admin_user"];
echo "1";
echo "1";
echo "1";
echo "1";
if(isset($_POST["log_in_btn"])){
	$admin_user = mysqli_real_escape_string($con,$_POST["admin_user"]);
	$password = $_POST["admin_password"];
	echo $admin_user;
	$sql = "SELECT * FROM `admin_info` WHERE admin_user = '$admin_user' AND password= '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION["aid"] = $row["admin_id"];
		$_SESSION["aname"] = $row["admin_user"];
			
		}
	header("location: admin_category.php");
}




?>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<a href="admin.php" class="navbar-brand">Online Food</a>
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
				<div class="panel panel-primary">
					<div class="panel-heading">Admin LogIn</div>
					<div class="panel-body">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<div class="row">
								<div class="col-md-12">
									<label for="admin_user" >User name</label>
									<input type="text" id="admin_user" name="admin_user" class="form-control" />
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="admin_password" >password</label>
									<input type="password" id="admin_password" name="admin_password" class="form-control" />
								</div>
							</div>
							
							<p><br/></p>
							<div class="row">
								<div class="col-md-12">
									<input style="float:right;" value="Log In" id="log_in_btn" name="log_in_btn" class="btn btn-success btn-lg" type="Submit" >
								</div>
							</div>						
						</form>
					</div>	
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>




