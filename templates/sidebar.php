<div class="user">
	<div class="options flexbox">
		<a href="index.php?logout=true"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
		<a href="?page=edit"><i class="fa fa-cog" aria-hidden="true"></i></a>
	</div><!-- ./options -->
	<div class="profile">
		<a href="?page=home">
			<div class="home-avatar" style="background: url('uploads/avatar/<?php echo $user->getAvatar(); ?>') no-repeat;"></div>
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
			/* if(isset($_SESSION['admin'])){ */
		?>
		<li><a href="?page=add_project"><i class="fa fa-plus blue"></i>Add Project</a></li>
		<?php 
			/* } */
			$lists = $projects->getLists();
			foreach($lists as $list): 
		?>
				<li><a href="?page=single-list&id=<?php echo $list['pid']; ?>"><i class="fa fa-folder"></i>
					<?php echo $list['ptit']; ?>
				</a></li>
		<?php endforeach; ?>
	</ul>
	<h5>Lijsten die je volgt:</h5>
	<ul class="follow-lists">
		<?php
			$followers = $volgend->getFollowList();
			foreach($followers as $follow):
		?>
			<li>
				<a href="?page=single-list&id=<?php echo $follow['pid']; ?>"><i class="fa fa-folder"></i>
					<?php echo $follow['ptitle']; ?>
				</a>
			</li>
		<?php
			endforeach;
		?>
	</ul>
</div><!-- ./menu -->