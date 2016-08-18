<?php
	$date = date('l, d F, Y', time());
	$tasks = $taken->getTasks();
	$week_start = new DateTime("now");
	$week_end = $week_start->modify('+1 week');
	$uren_deze_week = 0;

	foreach($tasks as $task):
		$deadline_date = new DateTime($task['deadline']);
		if(($week_start < $deadline_date) && ($deadline_date < $week_end)){
			$uren_deze_week += round(($task['werkuren'] / $task['deadline']->days));
		}
	endforeach;
?>
<div class="date">
	<i class="fa fa-calendar" aria-hidden="true"></i>
	<span id="date"><?php echo $date ?></span>
</div><!-- ./date -->
<div class="logs">
	<ul class="flexbox">
		<li><a href="#!"><span>5</span> <i class="fa fa-bell-o" aria-hidden="true"></i></a></li>
		<?php 
			if(isset($_SESSION['admin'])){ 
				if($uren_deze_week < 10){
					echo "<li><a href='?page=werkuren' class='btn green-btn'>" . $uren_deze_week . " werkuren</a></li>";
				}elseif($uren_deze_week < 25){
					echo "<li><a href='?page=werkuren' class='btn orange-btn'>" . $uren_deze_week . " werkuren</a></li>";					
				}else{
					echo "<li><a href='?page=werkuren' class='btn red-btn'>" . $uren_deze_week . " werkuren</a></li>";
				}
			}
		?>
		<li><a href="?page=add_task" class="btn green-btn">Add Task</a></li>
	</ul>
</div><!-- ./logs -->

