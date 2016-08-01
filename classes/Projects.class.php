<?php
	class Projects{
		public $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function new_list($title, $beschrijving){
			$query = "INSERT INTO projecten(title, beschrijving) VALUES ('".$this->db->real_escape_string($title)."','".$this->db->real_escape_string($beschrijving)."');";

			//bestaat de lijst al?
			$controle = "SELECT title FROM projecten WHERE title='".$this->db->real_escape_string($title)."'";
			$qry = $this->db->query($controle);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				return "Er is al een lijst aangemaakt met de naam " . $title;
			}else{
				if($this->db->query($query) === TRUE){
					return "De lijst " . $title . " werd met succes aangemaak!";
				}else{
					return "Error: " . $query . "<br>" . $conn->error;
				}
			}
		}
		
		public function getLists(){
			$query = $this->db->query('SELECT * FROM projecten');
			if($query->num_rows > 0){
				$lists = array();

				while($l = $query->fetch_assoc()){
					$lists[] = $l;
				}

				return $lists;
			}else{
				return array();
			}
		}
	}
?>