<?php

class Admin extends Objects_class
{
    public static $db_table_fields = array('id', 'name', 'username', 'password', 'picture');
    public static $db_table = "admin";
    public $id;
    public $name;
    public $username;
    public $password;
    public $picture;
}