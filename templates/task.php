<?php
	$single_task = $taken->getSingleTask();
	$comments = $taken->getComments($_GET['id']);
	$deadline = new DateTime($single_task['deadline']);
	$comment_date = new DateTime($comment['date']);
?>
<div class="page flexbox">
	<div class="sidebar">
		<?php include_once('sidebar.php'); ?>
	</div><!-- ./sidebar -->
	
	<div class="content">
		<header class="flexbox">
			<?php include_once('navbar.php'); ?>
		</header>
		<div class="flexbox single_project">

			<?php if($_SESSION['username'] == $single_task['created_by'] || isset($_SESSION['admin'])){ ?>
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Title</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="title" value="<?php echo $single_task['title']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Deadline</label>
						<div class="col-sm-5">
							<input type="date" class="form-control" name="deadline" value="<?php echo $single_task['deadline']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Beschrijving</label>
						<div class="col-sm-5">
							<textarea type="text" rows="5" class="form-control" name="beschrijving"><?php echo $single_task['beschrijving']; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-7">
							<button type="submit" name="edit_task" class="btn btn-success pull-right">opslaan</button>
						</div>
					</div>
				</form>
			<?php }else{ ?>
				<h2><?php echo $single_task['title']; ?></h2>
				<h6>Toegevoegd door <?php echo $single_task['created_by']; ?> - Deadline: <?php echo date_format($deadline, "d/m/Y"); ?></h6>
				<strong>Project: <?php echo $single_task['project']; ?><label class='green'>10 days left</label></strong>
				<p>
					<?php echo $single_task['beschrijving']; ?>
				</p>
			<?php } ?>
		</div><!-- ./app -->

		<div class="flexbox comments">
			<h4>Plaats een reactie</h4>
			<form action="" method="post">
				<textarea name="reactie" class="form-control" rows="5"></textarea>
				<button type="submit" name="add_comment" class="btn btn-success pull-right">reageren</button>
			</form>
			<ul class="reaction-list">
				<?php
					foreach($comments as $comment):
				?>
					<li>
						<h6>Geplaatst door <?php echo $comment['username']; ?> op <?php echo date_format($comment_date, "d/m/Y"); ?></h6>
						<p><?php echo $comment['comment']; ?></p>
					</li>
				<?php
					endforeach;
				?>
			</ul>
		</div><!-- ./comments -->
	</div><!-- ./content -->
</div><!-- ./page -->