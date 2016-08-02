<?php
	include_once('app.php');

	if(isset($_POST['taak_id'])){
		if($taken->isDone()){
			$result = $taken->unmarkAsDone($_POST['taak_id']);
			if($result){
				echo "taak nog te doen" . $result;
			}
		}else{
			$result = $taken->markAsDone($_POST['taak_id']);
			if($result){
				echo "Taak is gedaan" . $result;
			}
		}
	}
?>