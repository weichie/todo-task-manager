$(document).ready(function(){

	$(".placeComment").on('click', function(e){
		var comment = $("#commentMessage").val();

		$.post('/school/todo-task-manager/ajax.php', {
			'comment': comment
		}, function success(data){
			console.log(data);
		});
	});

	$(".isDone").on('click', function(e){

		var taak_id = $(this).attr('data-id');
		var box = $(this).parent().parent();

		$.post('/school/todo-task-manager/ajax.php', {
			'taak_id': taak_id
		}, function success(data){
			console.log(data);
			box.fadeOut();
		});
	});
});