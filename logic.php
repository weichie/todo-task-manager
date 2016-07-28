<?php
	if(isset($_POST['registration'])){
		$registratie = $user->registration($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);
		echo $registratie;
	}
	if(isset($_POST['login'])){
		$login = $user->login($_POST['email'], $_POST['password']);
		echo $login;
	}
?>