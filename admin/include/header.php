<?php include("configuration/init.php");
if (isset($_SESSION['admin_id'])) {
    $user = Admin::find_by_id($_SESSION['admin_id']);
    if ($user) {
    } else {
        header("Location: login.php");
    }
} else {
    header("Location: login.php");
}
// print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quiz - Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="dist/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="dist/datatable/datatables.css" rel="stylesheet">
    <script src="dist/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <script src="dist/datatable/jQuery-3.6.0/jquery-3.6.0.js"></script>
    <script src="dist/datatable/datatables.js"></script>
    <link href="dist/style.css" rel="stylesheet">
    <style>

    </style>
</head>

<body class="row">
    <div class="page">
        <img class="row spiral" src="dist/img/spiral.png" alt="">