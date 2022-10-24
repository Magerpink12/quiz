<?php include("include/configuration/init.php");
unset($_SESSION['admin_id']);
header("Location: login.php");