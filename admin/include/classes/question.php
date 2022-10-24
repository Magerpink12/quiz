<?php

class Question extends Objects_class
{
    public static $db_table_fields = array('id', 'subject_id', 'question', 'options', 'answer');
    public static $db_table = "question";
    public $id;
    public $subject_id;
    public $question;
    public $options;
    public $answer;
}