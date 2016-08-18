<div class="page flexbox">
	<div class="sidebar">
		<?php include_once('sidebar.php'); ?>
	</div><!-- ./sidebar -->
	
	<div class="content">
		<header class="flexbox">
			<?php include_once('navbar.php'); ?>
		</header>
		<div class="pub-user">
		<?php 
			$lists = $user->getUserProfile(); 
			if(!empty($lists)){
		?>
		<div class="main-profile flexbox">
			<div class="pic" style="background:url('uploads/avatar/<?php echo $lists[0]['avatar']; ?>') no-repeat;"></div>
			<div class="info">
				<h2><?php echo $lists[0]['name']; ?><span>(<?php echo $lists[0]['username']; ?>)</span></h2>
				<p class="title"><?php echo $lists[0]['utitle']; ?></p>
				<p class="email"><?php echo $lists[0]['email']; ?></p>
				<p class="type"><?php echo $lists[0]['type']; ?></p>
			</div><!-- ./info -->
		</div><!-- ./main-profile -->


		<h4>Lijsten die je kan volgen:</h4>
		<ul class="public-lists">
			<?php
				foreach($lists as $list): 
			?>
					<li>
						<form action="" method="post">
							<input type="text" hidden name="list_id" value="<?php echo $list['id']; ?>">
							<button type="submit" class="nfollow" name="follow" id="follow">volgen</button>
						</form>
						<h5><?php echo $list['ptitle']; ?></h5>
						<p><?php echo $list['beschrijving']; ?></p>
					</li>
			<?php
				endforeach;
				}else{
			?>
			</ul>
				<p class="empty-list">Deze persoon heeft nog geen lijsten die je kan volgen.</p>
			<?php
			}
			?>
		</div><!-- ./flexbox -->
	</div><!-- ./content -->
</div><!-- ./page -->