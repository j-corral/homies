<?php
/*
 * All doc on :
 * Toutes les actions disponibles dans l'application 
 *
 */

class mainController{

public static function helloWorld($request,$context){
	$context->mavariable="hello world";
	return context::SUCCESS;
}


public static function index($request,$context){
		
	return context::SUCCESS;
}


	public static function login($request,$context){

		//var_dump("User ID:", $context->getSessionAttribute('user'));

		if(isset($_POST) && !empty($_POST)) {
			$context->post = $_POST;

			$login = $context->post['user'];
			$password = $context->post['password'];

			$user = utilisateurTable::getUserByLoginAndPass($login, $password);
			//var_dump("USER", $user);


			if($user != null) {
				//var_dump("id:", $user->id);
				$context->setSessionAttribute('user', $user->id);
				$context->redirect('monApplication.php?=helloWorld');
			}

		}


		/*if(!$context->getSessionAttribute('user')) {

			echo "Not logged";

		}*/

		return context::SUCCESS;
	}


	public static function logout($request,$context){

		$_SESSION = [ ];
		session_destroy();

		$context->redirect('monApplication.php');

		return context::SUCCESS;
	}

}
