<?php
include("../include/configuration/init.php");
if (isset($_GET['id'])) {

    $quiz = Quiz::find_by_id($_GET['id']);
    if ($quiz->delete()) {

        header("Location: ../quiz.php");
    }
}