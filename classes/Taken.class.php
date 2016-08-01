<?php
	class Taken{
		public $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function new_task($title, $deadline, $created_by, $project, $done){
			$query = "INSERT INTO taken(title, deadline, created_by, project, done) VALUES('".$this->db->real_escape_string($title)."','".$this->db->real_escape_string($deadline)."','".$_SESSION['username']."','".$this->db->real_escape_string($project)."','".$this->db->real_escape_string($done)."');";

			if($this->db->query($query) === TRUE){
				return "De nieuwe taak is toegevoegd!";
			}else{
				return "Error: " . $query . "<br>" . $conn->error;
			}
		}

		public function getTasks(){
			$query = $this->db->query('SELECT * FROM taken ORDER BY deadline asc');
			if($query->num_rows > 0){
				$tasks = array();

				while($t = $query->fetch_assoc()){
					$tasks[] = $t;
				}

				return $tasks;
			}else{
				return array();
			}
		}
	}
?>