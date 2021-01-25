<?php session_start();
if (!isset($_SESSION["aid"])) {
    header("location:admin.php");
}
?>
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Admin panel</h3>
    </div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="admin_category.php">Category</a>
        </li>
        <!-- <li>
            <a href="#">Brand</a>
        </li> -->
        <li>
            <a href="admin_product.php">Product</a>
        </li>
        <li>
            <a href="admin_user.php">User</a>
        </li>
        <li>
            <a href="admin_orders.php">Orders</a>
        </li>
        <li>
            <a href="staff_delivery.php">Delivery</a>
        </li>
        <li>
            <a href="logout_admin.php">Logout</a>
        </li>
        
    </ul>
</nav>