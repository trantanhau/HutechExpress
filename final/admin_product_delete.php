<!DOCTYPE html>
<html>
<?php include('db.php'); ?>
<?php include('admin_head.php'); ?>

<body>

  <?php

  // Process delete operation after confirmation
  if (isset($_POST["id"]) && !empty($_POST["id"])) {

    $query = 'select product_image from products where product_id = ' . trim($_POST["id"]);
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $image = $row['product_image'];
    $link = ($_SERVER['DOCUMENT_ROOT'] . "/shop/product_images/" . $image);
    //echo $link;

    //exit;
    $sql = "DELETE FROM products WHERE product_id = ?";

    unlink($link);

    if ($stmt = mysqli_prepare($con, $sql)) {
      $param_id = trim($_POST["id"]);
      mysqli_stmt_bind_param($stmt, "i", $param_id);

      if (mysqli_stmt_execute($stmt)) {
        header("location: admin_product.php");
        exit();
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
  } else {
    // Check existence of id parameter
    if (empty(trim($_GET["id"]))) {
      // URL doesn't contain id parameter. Redirect to error page
      header("location: error.php");
      exit();
    }
  }
  ?>



  <div class="wrapper">
    <!-- Sidebar  -->
    <?php include('admin_sidebar.php') ?>

    <!-- Page Content  -->
    <div id="content">

      <div id="content-wrapper">

        <div class="container-fluid">



          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Product Data
              <button class="btn btn-primary" style="float: right;">Remove Product</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">



                <div class="row">
                  <div class="col-md-12">
                    <div class="page-header">
                      <h1>Delete Record</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <div class="alert alert-danger">
                        <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" />
                        <p>Are you sure you want to delete this record?</p><br>
                        <p>
                          <input type="submit" value="Yes" class="btn btn-danger">
                          <a href="admin_category.php" class="btn btn-default">No</a>
                        </p>
                      </div>
                    </form>
                    <br />
                  </div>
                </div>







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