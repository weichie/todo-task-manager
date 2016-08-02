<div class="page flexbox">
	<div class="sidebar">
		<?php include_once('sidebar.php'); ?>
	</div><!-- ./sidebar -->
	
	<div class="content">
		<header class="flexbox">
			<?php include_once('navbar.php'); ?>
		</header>
		<div class="flexbox">
			<div class="list">
				<?php include_once('list.php'); ?>
			</div><!-- ./list -->
			<div class="members">
				<div class="search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Zoek teamgenoot">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
						</span>
					</div><!-- /input-group -->
				</div><!-- ./search -->
				<?php if($_SESSION['admin']){
					echo '<a href="?page=user-list" class="view_all">view all members</a>';
				} ?>
				<ul>
				<?php
					$users = $user->getUsers();
					foreach($users as $user):
				?>
					<li>
						<img src="https://randomuser.me/api/portraits/women/80.jpg" alt="Member" >
						<?php
							echo "<p><strong>" . $user['name'] . "</strong><span>" . $user['title'] . "</span></p>";
						?>
						<a href="#!"><i class="fa fa-external-link" aria-hidden="true"></i></a>
					</li>

				<?php endforeach; ?>

				</ul>
			</div><!-- ./members -->
		</div><!-- ./app -->
	</div><!-- ./content -->
</div><!-- ./page -->