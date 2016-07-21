<?php
ob_start();
session_start();
$db = new mysqli('localhost','root','root','todo_app');

define('SITE_URL', '/school/todo-task-manager');

?>