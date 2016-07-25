<?php 
include_once('templates/header.php'); 

if( isset($register_message) ): ?>
	<div class="alert alert-warning">
<?php echo htmlspecialchars($register_message, ENT_QUOTES, 'UTF-8'); ?>
	</div>
<?php endif; ?>

	<h1 class="login-title">Todo App</h1>

	<div class="login">
		<h2>Registreer een account</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" class="form-control" name="name" id="name" placeholder="Volledige naam">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="username" id="username" placeholder="Gebruikersnaam">
			</div>
			<div class="form-group">
				<input type="email" class="form-control" name="email" id="email" placeholder="Email">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" id="password" placeholder="wachtwoord">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div><!-- ./login -->

<?php include_once('templates/footer.php'); ?>