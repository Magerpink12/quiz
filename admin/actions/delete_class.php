<?php
include("../include/configuration/init.php");
if (isset($_GET['id'])) {

    $classs = Classes::find_by_id($_GET['id']);
    if ($classs->delete()) {

        header("Location: ../class.php");
    }
}