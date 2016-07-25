<?php
	class User{
		protected $userID;
		protected $username;
		public $db;

		public function registration($name, $username, $email, $password){
			global $db;

			$options = [
				'cost' => 12
			];

			$password = password_hash($password, PASSWORD_DEFAULT, $options);
			$query = "INSERT INTO users(name, username, email, password) VALUES ('".$this->db->real_escape_string($name)."','".$this->db->real_escape_string($username)."','".$this->db->real_escape_string($email)."','".$this->db->real_escape_string($password)."');";

			//bestaat gebruiker al? based on email
			$controle = "SELECT name, username, email, password FROM users WHERE email='".$this->db->real_escape_string($email)."'";
			$qry = $db->query($controle);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				return 'Dit email adres is al in gebruik...';
			}else{
				if($db->query($query) === TRUE){
					return "U bent succesvol geregistreerd!<br>U kan zich vanaf nu aanmelden.";
				}else{
					return "Error: " . $query . "<br>" . $conn->error;
				}
			}
		}/*** end registration function ***/
	}
?>