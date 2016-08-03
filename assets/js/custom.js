$(document).ready(function(){

	$(".placeComment").on('click', function(e){
		e.preventDefault();
		var taak_id = $('.commentMessage').attr('data-id');
		var comment = $('.commentMessage').val();

		$.post('/school/todo-task-manager/ajax.php', {
			'id': taak_id,
			'reactie': comment
		}, function success(data){
			$('.commentMessage').val('');
			$('.reaction-list').load('/school/todo-task-manager/ajax.php?taak_id=' + taak_id + '&comments');
		});
	});

	$(".isDone").on('click', function(e){
		var taak_id = $(this).attr('data-id');
		var box = $(this).parent().parent();

		$.post('/school/todo-task-manager/ajax.php', {
			'taak_id': taak_id
		}, function success(data){
			box.fadeOut('slow');
		});
	});

	$(".changeType").on('change', function(e){
		var user_id = $(this).attr('data-id');

		$.post('/school/todo-task-manager/ajax.php', {
			'user_id': user_id
		}, function success(data){
			//succes functies
		});
	})
});