<?php
/*
 * All doc on :
 * Toutes les actions disponibles dans l'application 
 *
 */

class mainController{

public static function helloWorld($request,$context){

	//var_dump($_SESSION['user']);

	echo "<pre>";
	print_r(messageTable::getMessages());
	echo "</pre> <hr>";

	echo "<pre>";
	print_r(postTable::getPosts());
	echo "</pre>";

	$context->mavariable="hello world";
	return context::SUCCESS;
}


public static function index($request,$context){
		
	return context::SUCCESS;
}


	public static function login($request,$context){

		if(isset($_POST) && !empty($_POST)) {
			$context->post = $_POST;

			$login = $context->post['user'];
			$password = $context->post['password'];

			$user = utilisateurTable::getUserByLoginAndPass($login, $password);

			if($user != null) {
				$context->setSessionAttribute('user', $user);
				$context->redirect($context->link('helloWorld'));
			}

		}

		return context::SUCCESS;
	}


	public static function logout($request,$context){

		$_SESSION = [ ];
		session_destroy();

		$context->redirect('monApplication.php');

		return context::SUCCESS;
	}

}
