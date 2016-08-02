<?php
	class Comments{
		public $db;

		public function __construct($db){
			$this->db=$db;
		}
		
		public function addComment($taak_id, $user_id, $comment){
			$query = "INSERT INTO comments(taak_id, user_id, comment, date) VALUES ('".$this->db->real_escape_string($_GET['id'])."','".$this->db->real_escape_string($_SESSION['userID'])."','".$this->db->real_escape_string($comment)."',NOW())";
			$controle = "SELECT id FROM taken WHERE id='".$this->db->real_escape_string($_GET['id'])."'";

			$qry = $this->db->query($controle);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				if($this->db->query($query)){
					return "Comment toegevoegd";
				}else{
					return "Error: " . $query . "<br>" . $this->db->error;
				}
			}
		}
	}
?>