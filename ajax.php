<?php
	include_once('app.php');

	/*
	if(isset($_POST['comment'])){
		$comments->addComment($_GET['id'], $_SESSION['userID'], $_POST['reactie']);
	}
	*/

	if(isset($_POST['taak_id'])){
		if($taken->isDone()){
			$result = $taken->unmarkAsDone($_POST['taak_id']);
			if($result){echo "taak nog te doen";}
		}else{
			$result = $taken->markAsDone($_POST['taak_id']);
			if($result){echo "Taak is gedaan";}
		}
	}

	if(isset($_POST['user_id'])){
		if($user->isAdmin($_POST['user_id'])){
			$result = $user->makeMember($_POST['user_id']);
		}else{
			$result = $user->makeAdmin($_POST['user_id']);
		}

	}
?>