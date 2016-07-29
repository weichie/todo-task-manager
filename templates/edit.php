<div class="page flexbox">
	<div class="sidebar">
		<?php include_once('sidebar.php'); ?>
	</div><!-- ./sidebar -->
	
	<div class="content">
		<header class="flexbox">
			<?php include_once('navbar.php'); ?>
		</header>
		<div class="flexbox">
			<div class="edit">
				<h2>Update je profiel</h2>
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Naam</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" id="name" value="<?php echo $user->getFullname(); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="username" id="username" value="<?php echo $user->getUsername();?>">
						</div>
					</div>
					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Job Title</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="title" id="title" value="<?php echo $user->getTitle(); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-5">
							<input type="email" class="form-control" name="email" id="email" value="<?php echo $user->getEmail(); ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-7">
							<button type="submit" name="updating" class="btn btn-success pull-right">update</button>
						</div>
					</div>
				</form>
			</div><!-- ./edit -->
		</div><!-- ./app -->
	</div><!-- ./content -->
</div><!-- ./page -->