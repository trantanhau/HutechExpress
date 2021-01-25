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
              User Data
              <a href="admin_user_add.php"><button class="btn btn-primary" style="float: right;">Add User</button></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>First Name</th>
                      <!-- <th>Brand</th> -->
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Address</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php $sql = "SELECT * FROM user_info order by user_id asc";
                    if ($result = mysqli_query($con, $sql)) {
                      if (mysqli_num_rows($result) > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_array($result)) {

                    ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <!-- <td><?php echo  $row['user_id']; ?></td> -->
                            <!-- <td><?php echo  $row['brand_title']; ?></td> -->
                            <td><?php echo  $row['first_name']; ?></td>
                            <td><?php echo  $row['last_name']; ?></td>
                            <td><?php echo  $row['email']; ?></td>
                            <td><?php echo  $row['mobile']; ?></td>
                            <td><?php echo  $row['address1']; ?></td>

                            <!-- <td>
                              <a href='admin_product_edit.php?id=<?php echo $row['user_id']; ?>' title='Update Record' data-toggle='tooltip'><button class="btn btn-danger">Edit </button></a>
                              <a href='admin_product_delete.php?id=<?php echo $row['product_id']; ?>' title='Update Record' data-toggle='tooltip'><button class="btn btn">Delete </button></a>
                            </td> -->
                          </tr>
                    <?php
                          $i++;
                        }
                      }
                    } ?>
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