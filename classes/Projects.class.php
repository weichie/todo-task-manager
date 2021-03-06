<?php
	class Projects{
		public $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function new_list($title, $beschrijving, $creator, $public){
			$query = "INSERT INTO projecten(title, beschrijving, creator, public) VALUES ('".$this->db->real_escape_string($title)."','".$this->db->real_escape_string($beschrijving)."','".$_SESSION['username']."','".$this->db->real_escape_string($public)."');";

			//bestaat de lijst al?
			$controle = "SELECT title FROM projecten WHERE title='".$this->db->real_escape_string($title)."'";
			$qry = $this->db->query($controle);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				return "<div class='err-message' id='message'>Er is al een lijst aangemaakt met de naam " . $title . "</div>";
			}else{
				if($this->db->query($query) === TRUE){
					return "<div class='suc-message' id='message'>De lijst " . $title . " werd met succes aangemaak!</div>";
				}else{
					return "<div class='err-message' id='message'>Error: " . $query . "<br>" . $conn->error . "</div>";
				}
			}
		}
		
		public function getAllLists(){
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

		public function getLists(){
			/* $query = $this->db->query('SELECT * FROM projecten'); */
			$query = $this->db->query('SELECT *, projecten.id as pid, projecten.title as ptit FROM projecten INNER JOIN users on projecten.creator = users.username WHERE users.id="'.$_SESSION['userID'].'"');
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

		public function getSingleList(){
			$query = $this->db->query('SELECT *, taken.title as taaktitle FROM taken INNER JOIN projecten ON taken.project = projecten.title WHERE projecten.id="'.$this->db->real_escape_string($_GET['id']).'"');
			/* $result = $query->fetch_assoc(); */

			if($query->num_rows > 0){
				$lists = array();

				while($l = $query->fetch_assoc()){
					$lists[] = $l;
				}

				return $lists;
			}else{
				return array();
			}

			/* return $result; */
		}

		public function deleteProject(){
			$query = "DELETE FROM projecten WHERE id='".$this->db->real_escape_string($_GET['id'])."'";

			if($this->db->query($query) === TRUE){
				return "<div class='suc-message' id='message'>Het project is verwijderd.</div>";
			}else{
				return "<div class='err-message' id='message'>Error: " . $query . "<br>" . $conn->error . "</div>";
			}
		}
	}
?>