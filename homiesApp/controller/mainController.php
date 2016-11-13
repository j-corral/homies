<?php
/*
 * All doc on :
 * Toutes les actions disponibles dans l'application 
 *
 */

class mainController{

public static function helloWorld($request,$context){

	var_dump($_SESSION['user']);

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

		if($context->getSessionAttribute('user') != null) {
			$context->redirect($context->link('index'));
		}

		if(isset($_POST) && !empty($_POST)) {

			$user = utilisateurTable::getUserByLoginAndPass($context->post->user, $context->post->password);

			if($user != null) {
				$context->setSessionAttribute('user', $user);
				$context->redirect($context->link('index'));
			} else {
				$context->setNotif('Login ou mot de passe invalide !', 3000, 'error');
			}

		}

		return context::SUCCESS;
	}


	public static function logout($request,$context){

		$_SESSION = [];
		session_destroy();

		$context->redirect($context->link('login'));

		return context::SUCCESS;
	}

}
