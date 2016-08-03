<?php
	include_once('app.php');

	if(isset($_POST['reactie'])){
		$com = $comments->addComment($_POST['id'], $_SESSION['userID'], $_POST['reactie']);
	}

	if(isset($_GET['taak_id']) && isset($_GET['comments'])){
		$reload = $taken->getComments($_GET['taak_id']);
		$html = "";

		foreach($reload as $comment):
			$comment_date = new DateTime($comment['date']);
			$html.="<li><h6>Geplaatst door" . $comment['username'] . " op " . date_format($comment_date, "d/m/Y") . "</h6><p>" . $comment['comment'] . "</p></li>";
		endforeach;

		echo $html;
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

	if(isset($_POST['user_id'])){
		if($user->isAdmin($_POST['user_id'])){
			$result = $user->makeMember($_POST['user_id']);
		}else{
			$result = $user->makeAdmin($_POST['user_id']);
		}

	}
?>