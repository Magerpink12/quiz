<?php
include("../include/configuration/init.php");
if (isset($_GET['id'])) {

    $question = Question::find_by_id($_GET['id']);
    if ($question->delete()) {

        header("Location: ../questions.php");
    }
}