<?php

include "db.php";

$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$address1 = $_POST['address1'];

if(empty($f_name) || empty($l_name) || empty($email) || empty($password) ||
	empty($mobile) || empty($address1)){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else 
	{
		
	if(strlen($password) < 8 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
		exit();
	}
	
	$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is already available Try Another email address</b>
			</div>
		";
		exit();
	} else {
		$password = md5($password);
		$sql = "INSERT INTO user_info 
		( user_id,first_name, last_name, email, 
		password, mobile, address1) 
		VALUES (NULL, '$f_name', '$l_name', '$email', 
		'$password', '$mobile', '$address1')";
		$run_query = mysqli_query($con,$sql);
		if($run_query){
			echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>You are Registered successfully</b>
				</div>
			";
			
		}
	}
	}
	
?>






















































