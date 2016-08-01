<div class="user">
	<div class="options flexbox">
		<a href="index.php?logout=true"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
		<a href="?page=edit"><i class="fa fa-cog" aria-hidden="true"></i></a>
	</div><!-- ./options -->
	<div class="profile">
		<a href="?page=home">
			<img src="https://randomuser.me/api/portraits/women/80.jpg" alt="user-pic" />
		</a>
		<strong><?php echo $user->getFullname(); ?></strong>
		<p><?php echo $user->getTitle(); ?></p>
	</div><!-- ./profile -->
</div><!-- ./user -->


<div class="search input-group">
	<input type="text" class="form-control" placeholder="Search" aria-describedby="addon">
	<span class="input-group-addon" id="addon"><i class="fa fa-search" aria-hidden="true"></i></span>
</div><!-- ./input-group -->

<div class="menu">
	<ul>
		<?php
			if(isset($_SESSION['admin'])){
		?>
		<li><a href="?page=add_project"><i class="fa fa-plus blue"></i>Add Project</a></li>
		<?php 
			}
			$lists = $projects->getLists();
			foreach($lists as $list): 
		?>
				<li><a href="#!"><i class="fa fa-folder"></i>
					<?php echo $list['title']; ?>
				</a></li>
		<?php endforeach; ?>
	</ul>
</div><!-- ./menu -->