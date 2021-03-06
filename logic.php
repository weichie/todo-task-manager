<?php
	/* USER ACTIONS
	=============================== */
	if(isset($_POST['registration'])){
		$registratie = $user->registration($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);
		echo $registratie;
	}
	if(isset($_POST['login'])){
		$login = $user->login($_POST['email'], $_POST['password']);
		echo $login;
	}
	if(isset($_POST['updating'])){
		$upload = $user->upload_avatar($_FILES['user_avatar']);
		$updating = $user->update_user($_POST['name'], $_POST['username'], $_POST['title'], $_POST['email'], $_FILES['user_avatar']);
		echo $updating;
	}
	if(isset($_GET['logout'])){
		$user -> logout();
	}

	/* PROJECT ACTIONS
	=============================== */
	if(isset($_POST['add_list'])){
		$add_list = $projects->new_list($_POST['title'], $_POST['beschrijving'], $_POST['username'], $_POST['public']);
		echo $add_list;
	}
	if(isset($_GET['delete_project'])){
		$projects->deleteProject();
	}

	/* TAKEN ACTIONS
	=============================== */
	if(isset($_POST['add_task'])){
		$add_task = $taken->new_task($_POST['title'], $_POST['deadline'], $_POST['werkuren'], $_SESSION['username'], $_POST['beschrijving'], $_POST['project'], false);
		echo $add_task;
	}
	if(isset($_POST['edit_task'])){
		$taken->edit_task($_POST['title'], $_POST['deadline'], $_POST['werkuren'], $_POST['beschrijving']);
	}

	/* VOLG ACTIONS
	=============================== */
	if(isset($_POST['follow'])){
		$add_to_personal_list = $volgend->follow($_SESSION['userID'], $_POST['list_id']);
	}
?>