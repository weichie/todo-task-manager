<?php 
include_once('templates/header.php'); 

if(isset($_GET['page'])){
	if(file_exists($_GET['page'].'.php')){
		include($_GET['page'].'.php');
	}else{
?>
		Whoops, page not found.
<?php
	}
}else{
	include_once('templates/home.php');
}

include_once('templates/footer.php'); 
?>