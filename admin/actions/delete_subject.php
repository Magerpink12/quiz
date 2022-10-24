<?php
include("../include/configuration/init.php");
if (isset($_GET['id'])) {

    $subject = Subject::find_by_id($_GET['id']);
    if ($subject->delete()) {

        header("Location: ../subject.php");
    }
}