<?php
	$single_task = $taken->getSingleTask();
	$deadline = new DateTime($single_task['deadline']);
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
			<h2><?php echo $single_task['title']; ?></h2>
			<h6>Toegevoegd door <?php echo $single_task['created_by']; ?> - Deadline: <?php echo date_format($deadline, "d/m/Y"); ?></h6>
			<strong>Project: <?php echo $single_task['project']; ?><label class='green'>10 days left</label></strong>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae eveniet vel soluta asperiores voluptas, dolores repudiandae maiores ipsa, nisi distinctio vero illo natus consequuntur corporis consequatur voluptatum dignissimos. Et, a?
			</p>
		</div><!-- ./app -->
	</div><!-- ./content -->
</div><!-- ./page -->