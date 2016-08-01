<ul class="todo-list">
	<?php 
		$tasks = $taken->getTasks();
		foreach($tasks as $task):
	?>
		<li class="flexbox">
			<div class="single-task">
				<img src="https://randomuser.me/api/portraits/women/80.jpg" alt="Member">
				<p>
					<strong><?php echo $task['title']; ?></strong>
					<label class="bg-orange">expired</label>
					<span>by <?php echo $task['created_by']; ?></span>
				</p>
			</div><!-- ./single-task -->
			<div class="checker">
				<input type="checkbox">
			</div>
		</li>
	<?php endforeach; ?>
</ul>