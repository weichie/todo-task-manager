<?php
	class Volgend{
		public $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function follow($userid, $listid){
			$query = "INSERT INTO volgend(userid, projectid) VALUES ('".$_SESSION['userID']."','".$this->db->real_escape_string($listid)."');";

			//volgt de gebruiker deze lijst al?
			$controle = "SELECT * FROM volgend WHERE userid='".$_SESSION['userID']."' AND projectid='".$this->db->real_escape_string($listid)."'";
			$qry = $this->db->query($controle);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				return "<div class='err-message' id='message'>Je bent deze lijst al aan het volgen!</div>";
			}else{
				if($this->db->query($query) === TRUE){
					return "<div class='suc-message' id='message'>De lijst is toegevoegd aan uw account.</div>";
				}else{
					return "<div class='err-mesage' id='message'>Error: " . $query . "<br>" . $conn->error . "</div>";
				}
			}
		}

		public function getFollowList(){
			$query = $this->db->query('SELECT *, projecten.id as pid, projecten.title as ptitle FROM volgend INNER JOIN users ON (volgend.userid = users.id) INNER JOIN projecten ON (volgend.projectid = projecten.id) WHERE users.id="'.$_SESSION['userID'].'"');

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