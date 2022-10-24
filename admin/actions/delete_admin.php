<?php
include("../include/configuration/init.php");
if (isset($_GET['id'])) {

    $admin = Admin::find_by_id($_GET['id']);
    if ($dmin->delete()) {

        header("Location: ../manage_admin.php");
    }
}