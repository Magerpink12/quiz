<?php
include("../../../admin/include/configuration/init.php");
extract($_POST);
if (isset($quiz_id)) {
    $report = Report::find_by_query("SELECT * FROM report WHERE quiz_id = '$quiz_id' LIMIT 1");
    $report = array_shift($report);

    $positions = json_decode($report->positions);

    $positions->$user_id =  $score;
    $report->positions = json_encode($positions);
    $quiz = Quiz::find_by_id($quiz_id);
    $quiz->status = 1;
    $quiz->save();

    if ($report->save()) {

        print_r($report);
    } else {
        print_r(false);
    }
}