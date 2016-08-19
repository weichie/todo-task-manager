<ul class="todo-list">
	<?php 
		$tasks = $taken->getTasks();
		foreach($tasks as $task):
	?>
		<li class="flexbox">
			<div class="single-task">
				<div class="thumb-avatar" style="background: url('uploads/avatar/<?php echo $task['avatar']; ?>') no-repeat;"></div>
				<p>
					<a href="?page=task&id=<?php echo $task['id']; ?>"><strong><?php echo $task['ttitle']; ?></strong></a>
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
					<span>by <?php echo $task['created_by']; ?></span>
				</p>
			</div><!-- ./single-task -->
			<div class="checker">
				<input type="checkbox" class="isDone" data-id="<?php echo $task['taakid']; ?>">
			</div>
		</li>
	<?php endforeach; ?>
</ul>
