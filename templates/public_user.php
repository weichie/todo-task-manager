<div class="page flexbox">
	<div class="sidebar">
		<?php include_once('sidebar.php'); ?>
	</div><!-- ./sidebar -->
	
	<div class="content">
		<header class="flexbox">
			<?php include_once('navbar.php'); ?>
		</header>
		<div class="flexbox">
		<ul>
			<?php
				$lists = $user->getSingleUser();
				foreach($lists as $list): 
			?>
					
			<?php
				endforeach;
			?>
			</ul>
		</div><!-- ./flexbox -->
	</div><!-- ./content -->
</div><!-- ./page -->