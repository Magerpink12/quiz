<?php

class Subject extends Objects_class
{
    public static $db_table_fields = array('id', 'name', 'class_id');
    public static $db_table = "subject";
    public $id;
    public $name;
    public $class_id;
}