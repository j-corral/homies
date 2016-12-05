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

		$context->isPicture = false;

		if(isset($context->messages->post->image) && file_exists($context->messages->post->image)) {
			$context->isPicture = true;
		}

		return context::SUCCESS;
	}


	public static function showProfile($request, $context) {

		$user = $context->checkLogin();

		$user_id = isset($request['id']) ? (int) $request['id'] : $user->id;

		$context->user = utilisateurTable::getUserById($user_id);

		if(is_null($context->user)) {
			return context::ERROR;
		}

		if(empty($context->user->avatar)) {
			$context->user->avatar = 'images/default-avatar.png';
		}

		$context->messages = messageTable::getMessagesByEmetteur($user_id);

		$context->edit = $user_id == $user->id;

		return context::SUCCESS;
	}


	public static function showChat($request, $context) {

		$user = $context->checkLogin();

		//$context->chat = chatTable::getChats();
		$context->chat = chatTable::getLastChat();

		return context::SUCCESS;
	}


	public static function showFriends($request, $context) {

		$user = $context->checkLogin();

		$context->user = $user;

		$context->users = utilisateurTable::getUsers();

		$context->avatar = 'images/default-avatar.png';

		return context::SUCCESS;
	}

}
