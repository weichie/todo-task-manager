<?php include_once('templates/header.php'); ?>
	
	<h1 class="login-title">Todo App</h1>
	<div class="login">
		<h2>Aanmelden</h2>
		<form class="login-form">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
				<input type="text" class="form-control" placeholder="Gebruikersnaam">
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
				<input type="text" class="form-control" placeholder="Wachtwoord">
			</div>
			<button type="submit" class="btn btn-default pull-right">Aanmelden</button>
			<a href="register.php">Nog geen account?</a>
		</form>
	</div><!-- ./login -->

<?php include_once('templates/footer.php'); ?>