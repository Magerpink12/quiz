<?php

class Quiz extends Objects_class
{
    public static $db_table_fields = array('id', 'name', 'status', 'class_id', 'date', 'subject_id');
    public static $db_table = "quiz";
    public $id;
    public $name;
    public $class_id;
    public $subject_id;
    public $date;
    public $status;
}