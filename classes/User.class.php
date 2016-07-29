<?php
	class User{
		protected $userID;
		protected $username;
		protected $name;
		public $db;

		public function __construct($db){
			$this->db=$db;

			if(isset($_SESSION['logged'])){
				$this->initUser();
			}
		}

		public function setUserID($id){
			$this->userID = $id;
		}
		public function setUsername($username){
			$this->username = $username;
		}
		public function setFullName($name){
			$this->name = $name;
		}
		public function getUserID(){
			return $this->userID;
		}
		public function getUsername(){
			return $this->username;
		}
		public function getFullname(){
			return $this->name;
		}

		public function registration($name, $username, $email, $password){

			$options = ['cost' => 12];

			$password = password_hash($password, PASSWORD_DEFAULT, $options);
			$query = "INSERT INTO users(name, username, email, password) VALUES ('".$this->db->real_escape_string($name)."','".$this->db->real_escape_string($username)."','".$this->db->real_escape_string($email)."','".$this->db->real_escape_string($password)."');";

			//bestaat gebruiker al? based on email
			$controle = "SELECT name, username, email, password FROM users WHERE email='".$this->db->real_escape_string($email)."'";
			$qry = $this->db->query($controle);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				return 'Dit email adres is al in gebruik...';
			}else{
				if($this->db->query($query) === TRUE){
					return "U bent succesvol geregistreerd!<br>U kan zich vanaf nu aanmelden.";
				}else{
					return "Error: " . $query . "<br>" . $conn->error;
				}
			}
		}/*** end registration function ***/

		public function login($email, $password){
			$query = "SELECT id, name, username, email, password FROM users WHERE email = '".$this->db->real_escape_string($email)."'";
			$qry = $this->db->query($query);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				if(password_verify($password, $result['password'])){
					$_SESSION['logged'] = true;
					$_SESSION['userID'] = $result['id'];
					$_SESSION['username'] = $result['username'];
					$_SESSION['fullname'] = $result['name'];

					$this->initUser($result);

					header('Location: index.php');
				}else{
					return 'Aanmelden niet gelukt, probeer het nog een keer...';
				}
			}else{
				return 'Het opgegeven email adres werd niet gevonden...';
			}
		}/*** end login function ***/

		public function initUser($result = null){
			if($result == null){
				$this->setUserID($_SESSION['userID']);
				$this->setUsername($_SESSION['username']);
				$this->setFullname($_SESSION['fullname']);
			}else{
				$this->setUserID($result['id']);
				$this->setUsername($result['username']);
				$this->setFullname($result['name']);
			}
		}/*** end initUser ***/

		public function logout(){
			session_destroy();
			header('Location:'.SITE_URL);
			exit;
		}
	}
?>