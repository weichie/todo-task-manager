<?php
	date_default_timezone_set('Belgium/Brussels');
	$date = date('l d F Y', time());
?>
<div class="date">
	<i class="fa fa-calendar" aria-hidden="true"></i>
	<span id="date"><?php echo $date ?></span>
</div><!-- ./date -->
<div class="logs">
	<ul class="flexbox">
		<li><a href="#!"><span>5</span> <i class="fa fa-bell-o" aria-hidden="true"></i></a></li>
		<li><a href="#!" class="btn green-btn">Add Task</a></li>
	</ul>
</div><!-- ./logs -->