<div class="page flexbox">
	<div class="sidebar">
		<?php include_once('sidebar.php'); ?>
	</div><!-- ./sidebar -->
	
	<div class="content">
		<header class="flexbox">
			<?php include_once('navbar.php'); ?>
		</header>
		<div class="flexbox pub-user">
		<?php $lists = $user->getUserProfile(); ?>
	
		<h2><?php $lists['username']; ?></h2>

		<ul class="public-lists">
			<?php
				foreach($lists as $list): 
			?>
					<li>
						<a href="#!" class="nfollow" id="follow">volgen</a>
						<h5><?php echo $list['ptitle']; ?></h5>
						<p><?php echo $list['beschrijving']; ?></p>
					</li>
			<?php
				endforeach;
			?>
			</ul>
		</div><!-- ./flexbox -->
	</div><!-- ./content -->
</div><!-- ./page -->