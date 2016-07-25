<?php
	class UserController{
		protected $app;

		public function register(){
			if(isset($_POST)['register'])){
				$register_message = $this->app->registration($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);

				$this->app->view('register', array(
					'register_message' => $register_message)
				);
			}else{
				$this->app->view('register');
			}
		}

	}
?>