<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'quiz');

define('INCLUDES_PATH', SITE_ROOT .  DS . 'admin' . DS . 'include' .   DS . 'classes');

set_include_path(INCLUDES_PATH);

include_once('function.php');
include_once('new_config.php');
include_once('objects_class.php');
include_once('database.php');
include_once('session.php');

include_once('admin.php');
include_once('class.php');
include_once('question.php');
include_once('quiz.php');
include_once('student.php');
include_once('subject.php');
include_once('report.php');