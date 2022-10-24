<?php include("../admin/include/configuration/init.php");
if (isset($_SESSION['student_id'])) {
    $user = Student::find_by_id($_SESSION['student_id']);
    if ($user) {
    } else {
        header("Location: ../");
    }
} else {
    header("Location: ../");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quiz - <?php echo $user->reg_no ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../admin/dist/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="../admin/dist/datatable/datatables.css" rel="stylesheet">
    <script src="../admin/dist/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <script src="../admin/dist/datatable/jQuery-3.6.0/jquery-3.6.0.js"></script>
    <script src="../admin/dist/datatable/datatables.js"></script>
    <link href="../admin/dist/style.css" rel="stylesheet">
    <style>

    </style>
</head>

<body class="row">
    <div class="page">
        <img class="row spiral" src="../admin/dist/img/spiral.png" alt="">