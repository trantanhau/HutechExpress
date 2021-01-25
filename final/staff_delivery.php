<!DOCTYPE html>
<html>
<?php include('db.php'); ?>
<?php include('admin_head.php'); ?>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <?php include('admin_sidebar.php') ?>
    
    <!-- Page Content  -->
    <div id="content">
      <div id="content-wrapper">
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Delivery
              <!-- <a href="admin_product_add.php"><button class="btn btn-primary" style="float: right;">Add Product</button></a> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>User Name</th>
                      <th>Products</th>
                      <th>Address</th>
                      <th>Mobile</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 

                    

                    $order_id = "";
                    $sql = "SELECT order_id, user_id, quantity, address1, mobile FROM orders WHERE status = 0 Group by order_id";
                    
                    if ($result = mysqli_query($con, $sql)) {
                      if (mysqli_num_rows($result) > 0) {
                        
                        while ($row = mysqli_fetch_array($result)) {
                            $order_id = $row["order_id"];
                            $user_id = $row["user_id"];
                            $sql_user_name = "SELECT first_name, last_name FROM user_info WHERE user_id = '$user_id'";
                            $run_sql_user_name = mysqli_query($con,$sql_user_name);
                            $data1 = mysqli_fetch_array($run_sql_user_name);
                            $user_name = $data1["last_name"];
                            
                            $list_product = "";
                            $name = "";
                            $qty = "";
                            $sql_list_product = "SELECT b.product_title, a.quantity FROM orders a, products b WHERE a.product_id = b.product_id And a.user_id = $user_id AND a.order_id = $order_id";
                            $run_sql_list_product = mysqli_query($con,$sql_list_product);
                            while($data2 = mysqli_fetch_array($run_sql_list_product)){
                                $name = $data2["product_title"];
                                $qty = $data2["quantity"];
                                $list_product = $list_product. "" .$name. " x " .$qty. "</br>";
                            }
                       
                    ?>
                          <tr>
                            <td><?php echo  $row['order_id']; ?></td>
                            <td><?php echo  $user_name; ?></td>
                            <td><?php echo  $list_product; ?></td>
                            <td><?php echo  $row['address1']; ?></td>
                            <td><?php echo  $row['mobile']; ?></td>
                            <td>
                              <!-- <a href='staff_delivery.php?updatestatus=true'>OK </a> -->
                              <a href='staff_delivery.php?updatestatus=true' title='Update Record' data-toggle='tooltip'><button class="btn btn-danger" >Completed </button></a>
                              <a href='#' title='Update Record' data-toggle='tooltip'><button class="btn btn">Delete </button></a>
                            </td>
                          </tr>
                    <?php
                        }
                      }
                    }
                    //mysqli_stmt_close($);
                    
                    
                    

                    ?>
                  </tbody>
                </table>





              </div>
            </div>

          </div>
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