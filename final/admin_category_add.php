<!DOCTYPE html>
<html>
<?php include('db.php'); ?>
<?php include('admin_head.php'); ?>

<body>

    <?php

    $name = "";
    $name_err = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate name
        $input_name = trim($_POST["name"]);
        if (empty($input_name)) {
            $name_err = "Please enter a name.";
        } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
            $name_err = "Please enter a valid name.";
        } else {
            $name = $input_name;
        }


        // Check input errors before inserting in database
        if (empty($name_err)) {
            // Prepare an insert statement
            $sql = "INSERT INTO categories (cat_title) VALUES (?)";

            if ($stmt = mysqli_prepare($con, $sql)) {
                // Bind variables to the prepared statement as parameters

                $param_name = $name;

                mysqli_stmt_bind_param($stmt, "s", $param_name);

                // Set parameters

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Records created successfully. Redirect to landing page
                    header("location: admin_category.php");
                    exit();
                } else {
                    echo "Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($con);
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
                            Category Data
                            <button class="btn btn-primary" style="float: right;">Add Category</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="page-header">
                                            <h2>Create Record</h2>
                                        </div>
                                        <p>Please fill this form and submit to add Category Name record to the database.</p>
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control " value="<?php echo $name; ?>">
                                                <span class="help-block"><?php echo $name_err; ?></span>
                                            </div>

                                            <input type="submit" class="btn btn-primary" value="Submit">
                                            <a href="index.php" class="btn btn-default">Cancel</a>
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
    <script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="js/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min2.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>