<div class="page flexbox">
	<div class="sidebar">
		<?php include_once('sidebar.php'); ?>
	</div><!-- ./sidebar -->
	
	<div class="content">
		<header class="flexbox">
			<?php include_once('navbar.php'); ?>
		</header>
		<div class="flexbox add_project">
			<h2>Nieuwe taak toevoegen</h2>
			<form class="form-horizontal add_task" action="" method="post">
				<div class="form-group">
					<label for="naam" class="col-sm-2 control-label">naam</label>
					<div class="col-sm-10">
						<input type="text" name="title" class="form-control" id="naam" placeholder="Naam van de taak">
					</div>
				</div>
				<div class="form-group">
					<label for="deadline" class="col-sm-2 control-label">deadline</label>
					<div class="col-sm-10">
						<input type="date" name="deadline" class="form-control" id="deadline">
					</div>
				</div>
				<div class="form-group">
					<label for="beschrijving" class="col-sm-2 control-label">beschrijving</label>
					<div class="col-sm-10">
						<textarea type="text" name="beschrijving" class="form-control" id="beschrijving" placeholder="Extra info"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="project" class="col-sm-2 control-label">project</label>
					<div class="col-sm-10">
						<select class="form-control" name="project">
							<option>Kies een project</option>
							<?php
								$lists = $projects->getLists();
								foreach($lists as $list):
							?>
								<option value="<?php echo $list['title']; ?>"><?php echo $list['title']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="add_task" class="btn btn-default pull-right">aanmaken</button>
					</div>
				</div>
			</form>
		</div><!-- ./app -->
	</div><!-- ./content -->
</div><!-- ./page -->