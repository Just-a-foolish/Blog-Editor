<?php 

class AuthMiddleware {	
	static function run() {

		session_start();
		if (!isset($_SESSION['loggedin'])) {
			return ['error' => true , 'redirect' => '../view/login.php']; 
		} else {
			return ['error' => false];
		}
	}
}