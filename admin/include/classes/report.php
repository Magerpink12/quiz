<?php

class Report extends Objects_class
{
    public static $db_table_fields = array('id', 'quiz_id', 'positions', 'date');
    public static $db_table = "report";
    public $id;
    public $quiz_id;
    public $positions;
    public $date;
}