<?php
ob_start();
session_start();
$db = new mysqli('localhost','root','root','todo_app');

define('SITE_URL', '/school/todo-task-manager');

spl_autoload_register(function($class_name){
	include 'classes/' .$class_name . '.class.php';
});

$user = new User($db);
$projects = new Projects($db);
$taken = new Taken($db);
$comments = new Comments($db);

//$app = new User($db);
?>