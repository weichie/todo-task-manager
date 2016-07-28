<?php 
include_once('app.php');
include_once('logic.php');
include_once('templates/header.php'); 

if(isset($_GET['page'])){
	if(file_exists('templates/'.$_GET['page'].'.php')){
		include('templates/'.$_GET['page'].'.php');
	}else{
?>
		Whoops, page not found.
<?php
	}
}else{
	if(isset($_SESSION['logged'])){
		include_once('templates/home.php');
	}else{
		include_once('templates/login.php');
	}
}

include_once('templates/footer.php'); 
?>