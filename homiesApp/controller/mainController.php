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

		if($request['ajax']) {
			$context->ajax = 'Vous êtes maintenant déconnecté !';
			return context::NONE;
		}

		$context->redirect($context->link('login'));

		return context::SUCCESS;
	}


	public static function showMessage($request, $context) {
		
		$user = $context->checkLogin();

		$context->messages = messageTable::getMessages($user->id);

		/*echo "<pre>";
		print_r($messages);
		echo "</pre> <hr>";*/

		return context::SUCCESS;
	}

}
