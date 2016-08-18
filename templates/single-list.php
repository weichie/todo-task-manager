<div class="page flexbox">
	<div class="sidebar">
		<?php include_once('sidebar.php'); ?>
	</div><!-- ./sidebar -->
	
	<div class="content">
		<header class="flexbox">
			<?php include_once('navbar.php'); ?>
		</header>
		<div class="flexbox single-list">
			<ul class="todo-list">
				<?php 
					$lists = $projects->getSingleList();
					foreach($lists as $list): 
				?>
					<li class="flexbox">
						<div class="single-task">
							<p>
								<a href="?page=task&id=<?php echo $task['id']; ?>"><strong><?php echo $list['taaktitle']; ?></strong></a>
								<?php
									$date1 = new DateTime("now");
									$date2 = new DateTime($task['deadline']);
									$interval = $date1->diff($date2);

									if($interval->format('%r%a days') > 14){
										echo "<label class='bg-green'>" . $interval->days . " days</label>";
									}else if($interval->format('%r%a days') > 0){
										echo "<label class='bg-orange'>" . $interval->days . " days</label>";
									}else{
										echo "<label class='bg-red'>expired " . $interval->days . " days ago</label>";
									}
								?>
								<span>by <?php echo $list['created_by']; ?></span>
							</p>
						</div><!-- ./single-task -->
						<div class="checker">
							<input type="checkbox" class="isDone" data-id="<?php echo $task['id']; ?>">
						</div>
					</li>
				<?php endforeach; ?>
			</ul>			
		</div><!-- ./app -->
	</div><!-- ./content -->
</div><!-- ./page -->