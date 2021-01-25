<!DOCTYPE html>
<html>
<?php include('db.php'); ?>
<?php include('admin_head.php'); ?>

<body>

    <?php

    // Define variables and initialize with empty values
    $name = "";
    $name_err = "";

    // Processing form data when form is submitted
    if (isset($_POST["id"]) && !empty($_POST["id"])) {
        // Get hidden input value
        $id = $_POST["id"];

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
            // Prepare an update statement
            $sql = "UPDATE categories SET cat_title=? WHERE cat_id=?";

            if ($stmt = mysqli_prepare($con, $sql)) {

                // Set parameters
                $param_name = $name;
                $param_id = $id;

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "si", $param_name, $param_id);

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Records updated successfully. Redirect to landing page
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
    } else {
        // Check existence of id parameter before processing further
        if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
            // Get URL parameter
            $id =  trim($_GET["id"]);

            // Prepare a select statement
            $sql = "SELECT * FROM categories WHERE cat_id = ?";
            if ($stmt = mysqli_prepare($con, $sql)) {
                // Bind variables to the prepared statement as parameters
                // Set parameters
                $param_id = $id;
                mysqli_stmt_bind_param($stmt, "i", $param_id);


                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($result) == 1) {
                        /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        // Retrieve individual field value
                        $name = $row["cat_title"];
                    } else {
                        // URL doesn't contain valid id. Redirect to error page
                        header("location: error.php");
                        exit();
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);

            // Close connection
            mysqli_close($con);
        } else {
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
                                        <p>Edit</p>
                                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                                                <span class="help-block"><?php echo $name_err; ?></span>
                                            </div>

                                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
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