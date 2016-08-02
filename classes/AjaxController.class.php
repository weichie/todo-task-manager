<?php
	class AjaxController{
		public $db;

		public function __construct($db){
			$this->db = $db;
		}

		/*
		public function comment(){
			if(isset($_POST['comment'])){
				$result = $this->db->addComment($_POST['taak_id'], $_POST['comment'], true);

				if($result){
					echo "ok";
				}
			}
		}
		*/

		public function done(){
			
		}
	}
?>