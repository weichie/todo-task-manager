<?php
	if(isset($_POST['registration'])){
		$registratie = $user->registration($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);
		echo $registratie;
	}
	if(isset($_POST['login'])){
		$login = $user->login($_POST['email'], $_POST['password']);
		echo $login;
	}
	if(isset($_POST['updating'])){
		$updating = $user->update_user($_POST['name'], $_POST['username'], $_POST['title'], $_POST['email']);
		echo $updating;
	}
	if(isset($_GET['logout'])){
		$user -> logout();
	}
?>