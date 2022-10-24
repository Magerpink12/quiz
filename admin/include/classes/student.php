<?php

class Student extends Objects_class
{
    public static $db_table_fields = array('id', 'name', 'reg_no', 'password', 'class_id', 'picture');
    public static $db_table = "student";
    public $id;
    public $name;
    public $reg_no;
    public $password;
    public $class_id;
    public $picture;
}