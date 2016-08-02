<div class="page flexbox">
	<div class="sidebar">
		<?php include_once('sidebar.php'); ?>
	</div><!-- ./sidebar -->
	
	<div class="content">
		<header class="flexbox">
			<?php include_once('navbar.php'); ?>
		</header>
		<div class="flexbox member-list">
			<ul>
			<?php
				$users = $user->getUsers();
				foreach($users as $user):
			?>
				<li class="flexbox">
					<img src="https://randomuser.me/api/portraits/women/80.jpg" alt="Member" >
					<p>
						<strong><?php echo $user['name']; ?></strong>
						<span><?php echo $user['title']; ?></span>
						<select class="form-control changeType" data-id="<?php echo $user['id']; ?>" name="project">
							<option <?php if($user['type'] == 'admin'){ ?>selected<?php } ?> value="admin">admin</option>
							<option <?php if($user['type'] == 'member'){ ?>selected<?php } ?> value="member">member</option>
						</select>
					</p>
				</li>
			<?php endforeach; ?>
			</ul>
		</div><!-- ./flexbox -->
	</div><!-- ./content -->
</div><!-- ./page -->