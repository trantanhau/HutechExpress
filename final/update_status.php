<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>

<?php include('db.php'); ?>
<?php include('admin_head.php'); ?>

<?php
    function update_quantity(){
                $quantity = "";
				$product_id = "";
				if(isset($_POST['quantity']))
				{
					$quantity = $_POST['quantity'];
					$product_id = $_POST['product_id'];
					// Do whatever you want with the $uid
				}
				
				$uid = $_SESSION["uid"];
				$sql_update_qty = "UPDATE cart SET qty = $quantity WHERE product_id = $product_id AND user_id = $uid";
                $temp = mysqli_query($con,$sql_update_qty);
            }
    update_quantity();
            
?>
<form action="payment.php" method="post">