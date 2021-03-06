<?php
	class Taken{
		public $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function new_task($title, $deadline, $werkuren, $created_by, $beschrijving, $project, $done){
			$query = "INSERT INTO taken(title, deadline, werkuren, created_by, beschrijving, project, done) VALUES('".$this->db->real_escape_string($title)."','".$this->db->real_escape_string($deadline)."','".$this->db->real_escape_string($werkuren)."','".$_SESSION['username']."','".$this->db->real_escape_string($beschrijving)."','".$this->db->real_escape_string($project)."','0');";

			if($this->db->query($query) === TRUE){
				return "<div class='suc-message' id='message'>De nieuwe taak is toegevoegd!</div>";
			}else{
				return "<div class='err-message' id='message'>Error: " . $query . "<br>" . $conn->error . "</div>";
			}
		}
		public function edit_task($title, $deadline, $werkuren, $beschrijving){
			$query = "UPDATE taken SET title='".$this->db->real_escape_string($title)."',deadline='".$this->db->real_escape_string($deadline)."',werkuren='".$this->db->real_escape_string($werkuren)."',beschrijving='".$this->db->real_escape_string($beschrijving)."' WHERE id='".$this->db->real_escape_string($_GET['id'])."';";
			$controle = "SELECT id FROM taken WHERE id='".$this->db->real_escape_string($_GET['id'])."'";

			$qry = $this->db->query($controle);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				if($this->db->query($query)){
					return "<div class='suc-message' id='message'>De taak is bewerkt.</div>";
				}else{
					return "<div class='err-message' id='message'>Error: " . $query . "<br>" . $this->db->error . "</div>";
				}
			}
		}
		public function getAllTasks(){
			$query = $this->db->query('SELECT * FROM taken ORDER BY deadline asc');
			if($query->num_rows > 0){
				$tasks = array();

				while($t = $query->fetch_assoc()){
					$tasks[] = $t;
				}

				return $tasks;
			}else{
				return false;
			}
		}
		public function getTasks(){
			/* $query = $this->db->query('SELECT * FROM taken WHERE done="0" ORDER BY deadline asc'); */
			$query = $this->db->query('SELECT *, taken.id as taakid, taken.title as ttitle FROM taken INNER JOIN users ON taken.created_by = users.username WHERE done="0" ORDER BY deadline asc');
			if($query->num_rows > 0){
				$tasks = array();

				while($t = $query->fetch_assoc()){
					$tasks[] = $t;
				}

				return $tasks;
			}else{
				return false;
			}
		}
		public function getSingleTask(){
			$query = $this->db->query('SELECT * FROM taken WHERE id="'.$this->db->real_escape_string($_GET['id']).'"');
			$result = $query->fetch_assoc();

			return $result;
			echo $result;
		}
		public function getComments($id){
			$getComments = $this->db->query('SELECT * FROM comments INNER JOIN users ON (comments.user_id = users.id) WHERE comments.taak_id = "'.$this->db->real_escape_string($id).'" ORDER BY date DESC ');

			if($getComments->num_rows){
				$comments = array();
				while($c = $getComments->fetch_assoc()){
					$comments[] = $c;
				}
				return $comments;
			}else{
				return array();
			}
		}
		public function markAsDone($id){
			$query = "UPDATE taken SET done=' 1' WHERE id=".$this->db->real_escape_string($id)."";
			$controle = "SELECT id FROM taken WHERE id='".$this->db->real_escape_string($id)."'";

			$qry = $this->db->query($controle);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				if($this->db->query($query)){
					return "<div class='suc-message' id='message'>De taak is voltooid!" . $query . "</div>";
				}else{
					return "<div class='err-message' id='message'>Error: " . $query . "<br>" . $this->db->error . "</div>";
				}
			}
		}
		public function unmarkAsDone($id){
			$query = "UPDATE taken SET done='0' WHERE id='".$this->db->real_escape_string($id)."'";
			$controle = "SELECT id FROM taken WHERE id='".$this->db->real_escape_string($id)."'";

			$qry = $this->db->query($controle);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				if($this->db->query($query)){
					return "<div class='suc-message' id='message'>De taak is voltooid!</div>";
				}else{
					return "<div class='err-message' id='message'>Error: " . $query . "<br>" . $this->db->error . "</div>";
				}
			}
		} 
		public function isDone(){
			return false;
		}
	}
?>