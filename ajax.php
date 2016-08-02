<?php
	include_once('app.php');

	if(isset($_POST['comment'])){
		$comments->addComment($_GET['id'], $_SESSION['userID'], $_POST['reactie']);
	}

	if(isset($_POST['taak_id'])){
		if($taken->isDone()){
			$result = $taken->unmarkAsDone($_POST['taak_id']);
			if($result){echo "taak nog te doen";}
		}else{
			$result = $taken->markAsDone($_POST['taak_id']);
			if($result){echo "Taak is gedaan";}
		}
	}
?>