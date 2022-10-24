<?php
include("../include/configuration/init.php");
if (isset($_GET['id'])) {

    $student = Student::find_by_id($_GET['id']);
    if ($student->delete()) {

        header("Location: ../students.php");
    }
}