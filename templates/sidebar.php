<div class="user">
	<div class="options flexbox">
		<a href="index.php?logout=true"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
		<a href="#!"><i class="fa fa-cog" aria-hidden="true"></i></a>
	</div><!-- ./options -->
	<div class="profile">
		<img src="https://randomuser.me/api/portraits/women/80.jpg" alt="user-pic" />
		<strong>
			<?php echo $user->getFullname(); ?>
		</strong>
		<p>Project Manager</p>
	</div><!-- ./profile -->
</div><!-- ./user -->


<div class="search input-group">
	<input type="text" class="form-control" placeholder="Search" aria-describedby="addon">
	<span class="input-group-addon" id="addon"><i class="fa fa-search" aria-hidden="true"></i></span>
</div><!-- ./input-group -->

<div class="menu">
	<ul>
		<li><a href="#!"><i class="fa fa-plus blue"></i>Add Project</a></li>
		<li><a href="#!"><i class="fa fa-folder"></i>Secret project</a></li>
		<li><a href="#!"><i class="fa fa-folder"></i>Nike Mobile App</a></li>
		<li><a href="#!"><i class="fa fa-folder"></i>New Portfolio Site</a></li>
	</ul>
</div><!-- ./menu -->