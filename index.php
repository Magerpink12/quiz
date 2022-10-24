<?php include("admin/include/configuration/init.php");
if (isset($_SESSION['student_id'])) {
    $user = Student::find_by_id($_SESSION['student_id']);
    if ($user) {
        header("Location: student/");
    } else {
        // header("Location: login.php");
    }
}
?>
<?php
$alert = "";
extract($_POST);
if (isset($submit)) {

    $user = Student::find_by_query("SELECT * FROM student WHERE reg_no = '$reg_no' AND password= '$password' LIMIT 1");
    // print_r($user);
    $user = array_shift($user);

    if ($user) {
        $_SESSION['student_id'] = $user->id;
        header("Location: student/index.php");
    } else {
        $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error: </strong> Reg. Number or Password Incorrect!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="admin/dist/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="admin/dist/datatable/datatables.css" rel="stylesheet">
    <script src="admin/dist/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <script src="admin/dist/datatable/jQuery-3.6.0/jquery-3.6.0.js"></script>
    <script src="admin/dist/datatable/datatables.js"></script>
    <link href="admin/dist/style.css" rel="stylesheet">
    <style>
    </style>
</head>

<body class="row">

    <div class="col-4">

    </div>
    <div class="col-4">
        <div class="page">
            <img class="row mini_spiral" src="admin/dist/img/mini_spiral.png" alt="">
            <div class="header row">



            </div>
            <div class="body row">
                <div class="row" style="margin-top: 20px; z-index: 99;">

                </div>
                <div style="position:relative; margin-top:0px; height: fit-content;" class="bg-light card">
                    <div class="card-header">
                        <h5 class="card-subtitle mb-2 text-muted">
                            <center>Student - Login</center>

                        </h5>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php echo $alert; ?>
                            <form method="POST">

                                <label for="inputPassword" class="col-form-label text-muted">Student Reg No.</label>
                                <input required type="text" name="reg_no" value="" placeholder="e.g U/CS/17/777"
                                    class="form-control form-control-sm mb-2" id="inputPassword">

                                <label for="inputPassword" class="col-form-label text-muted">Login Password</label>
                                <input required type="password" name="password" value="" placeholder=""
                                    class="form-control form-control-sm mb-2" id="inputPassword">

                                <center>
                                    <input type="submit" name="submit" class="btn btn-sm btn-warning mb-2" value="Login"
                                        id="inputPassword">
                                </center>


                                <a class="btn-sm mb-2" href="admin/login.php">Admin Login</a>
                            </form>

                        </div>
                    </div>
                    <div class="card-footer">
                        <p>
                            <center class="card-subtitle mb-2 text-muted">Quiz &copy; 2022</center>
                        </p>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-4">

    </div>


</body>
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>

</html>