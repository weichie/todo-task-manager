<?php
	class User{
		protected $userID;
		protected $username;
		protected $name;
		protected $email;
		protected $title;
		protected $avatar;
		public $db;

		public function __construct($db){
			$this->db=$db;

			if(isset($_SESSION['logged'])){
				$this->initUser();
			}
		}

		public function setUserID($id) 				{$this->userID = $id;}
		public function setUsername($username) 		{$this->username = $username;}
		public function setFullName($name) 			{$this->name = $name;}
		public function setEmail($email) 			{$this->email = $email;}
		public function setTitle($title) 			{$this->title = $title;}
		public function setAvatar($avatar) 			{$this->avatar = $avatar;}

		public function getUserID()					{return $this->userID;}
		public function getUsername()				{return $this->username;}
		public function getFullname()				{return $this->name;}
		public function getEmail()					{return $this->email;}
		public function getTitle()					{return $this->title;}
		public function getAvatar()					{return $this->avatar;}

		public function registration($name, $username, $email, $password){

			$options = ['cost' => 12];

			$password = password_hash($password, PASSWORD_DEFAULT, $options);
			$query = "INSERT INTO users(name, username, email, password, type) VALUES ('".$this->db->real_escape_string($name)."','".$this->db->real_escape_string($username)."','".$this->db->real_escape_string($email)."','".$this->db->real_escape_string($password)."','member');";

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
		}

		public function login($email, $password){
			$query = "SELECT id, name, username, email, password, title, type, avatar FROM users WHERE email = '".$this->db->real_escape_string($email)."'";
			$qry = $this->db->query($query);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				if(password_verify($password, $result['password'])){
					$_SESSION['logged'] = true;
					$_SESSION['userID'] = $result['id'];
					$_SESSION['username'] = $result['username'];
					$_SESSION['fullname'] = $result['name'];
					$_SESSION['email'] = $result['email'];
					$_SESSION['title'] = $result['title'];
					$_SESSION['avatar'] = $result['avatar'];

					if($result['type'] == 'admin'){
						$_SESSION['admin'] = true;
					}

					$this->initUser($result);

					header('Location: index.php');
				}else{
					return 'Aanmelden niet gelukt, probeer het nog een keer...';
				}
			}else{
				return 'Het opgegeven email adres werd niet gevonden...';
			}
		}

		public function getUsers(){
			$query = $this->db->query('SELECT * FROM users ORDER BY type');

			if($query->num_rows > 0){
				$users = array();

				while($u = $query->fetch_assoc()){
					$users[] = $u;
				}
				return $users;
			}else{
				return array();
			}
		}

		public function update_user($name, $username, $title, $email, $avatar){
			$query = "UPDATE users SET name='".$this->db->real_escape_string($name)."', username='".$this->db->real_escape_string($username)."', title='".$this->db->real_escape_string($title)."', email='".$this->db->real_escape_string($email)."', avatar='".$this->db->real_escape_string($avatar['name'])."' WHERE id=".$_SESSION['userID'].";";
			$controle = "SELECT id FROM users WHERE id=".$_SESSION['userID']."";

			$qry = $this->db->query($controle);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				if($this->db->query($query)){
					return "Uw account werd succesvol geupdate!";
					$this->initUser($result);
				}else{
					return "Error:" . $query . "<br>" . $this->db->error;
				}
			}
		}

		public function makeAdmin($id){
			$query = "UPDATE users SET type='admin' WHERE id=".$this->db->real_escape_string($id)."";
			$controle = "SELECT id FROM users WHERE id='".$this->db->real_escape_string($id)."'";

			$qry = $this->db->query($controle);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				if($this->db->query($query)){
					return "De gebruiker is aangepast" . $query;
				}else{
					return "Error: " . $query . "<br>" . $this->db->error;
				}
			}
		}
		public function makeMember($id){
			$query = "UPDATE users SET type='member' WHERE id=".$this->db->real_escape_string($id)."";
			$controle = "SELECT id FROM users WHERE id='".$this->db->real_escape_string($id)."'";

			$qry = $this->db->query($controle);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				if($this->db->query($query)){
					return "De gebruiker is aangepast" . $query;
				}else{
					return "Error: " . $query . "<br>" . $this->db->error;
				}
			}
		}
		public function isAdmin($id){
			$query = "SELECT * FROM users WHERE id='".$this->db->real_escape_string($id)."'";
			$isAdmin = $this->db->query($query);
			$result = $isAdmin->fetch_assoc();

			if($result['type'] == 'admin'){
				return true;
			}else{
				return false;
			}
		}
		public function initUser($result = null){
			if($result == null){
				$this->setUserID($_SESSION['userID']);
				$this->setUsername($_SESSION['username']);
				$this->setFullname($_SESSION['fullname']);
				$this->setEmail($_SESSION['email']);
				$this->setTitle($_SESSION['title']);
				$this->setAvatar($_SESSION['avatar']);
			}else{
				$this->setUserID($result['id']);
				$this->setUsername($result['username']);
				$this->setFullname($result['name']);
				$this->setEmail($result['email']);
				$this->setTitle($result['title']);
				$this->setAvatar($result['avatar']);
			}
		}/*** end initUser ***/

		public function upload_avatar($file){ //upload_avatar($file)
			if(!empty($file['name'])){
				$file_name = $file['name'];
				$temp_name = $file['tmp_name'];
				$imgtype = $file['type'];
				$ext = $this->getImageExtention($imgtype);
				$target_path = "uploads/avatar/".$file_name;

				if(move_uploaded_file($temp_name, $target_path)){
					$query = 'UPDATE users SET avatar="'.$this->db->real_escape_string($file['name']).'" WHERE id="'.$this->getUserID().'"';

					if($this->db->query($query)){
						echo "Avatar succesvol geupdate!";
					}else{
						return "Error" . $query . "<br>" . $this->db->error;
					}
				}
			}
		}

		public function getImageExtention($imagetype){
			if(empty($imagetype)){
				return false;
			}else{
				switch($imagetype){
					case 'image/bmp': return '.bmp';
					case 'image/gif': return '.gif';
					case 'image/jpeg': return '.jpg';
					case 'image/png': return '.png';
					default: return false;
				}
			}
		}

		public function logout(){
			session_destroy();
			header('Location:'.SITE_URL);
			exit;
		}
	}
?>