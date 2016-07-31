<div class="page flexbox">
	<div class="sidebar">
		<?php include_once('sidebar.php'); ?>
	</div><!-- ./sidebar -->
	
	<div class="content">
		<header class="flexbox">
			<?php include_once('navbar.php'); ?>
		</header>
		<div class="flexbox add_project">
			<h2>Nieuw project toevoegen <em>(lijst)</em></h2>
			<form class="form-horizontal add_task" action="" method="post">
				<div class="form-group">
					<label for="naam" class="col-sm-2 control-label">naam</label>
					<div class="col-sm-10">
						<input type="text" name="title" class="form-control" id="naam" placeholder="Naam van het project">
					</div>
				</div>
				<div class="form-group">
					<label for="beschrijving" class="col-sm-2 control-label">Beschrijving</label>
					<div class="col-sm-10">
						<textarea type="text" rows="5" name="beschrijving" class="form-control" id="beschrijving" placeholder="Extra informatie bij de lijst"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="add_list" class="btn btn-default pull-right">aanmaken</button>
					</div>
				</div>
			</form>
		</div><!-- ./app -->
	</div><!-- ./content -->
</div><!-- ./page -->