<?php

/*
 * All doc on :
 * Toutes les actions disponibles dans l'application 
 *
 */

class mainController {

	public static function helloWorld( $request, $context ) {

		$context->mavariable = "hello world";

		return context::SUCCESS;
	}


	public static function index( $request, $context ) {

		return context::SUCCESS;
	}


	public static function login( $request, $context ) {

		if ( $context->getSessionAttribute( 'user' ) != null ) {
			$context->redirect( $context->link( 'index' ) );
		}

		if ( isset( $_POST ) && ! empty( $_POST ) ) {

			$user = utilisateurTable::getUserByLoginAndPass( $context->post->user, $context->post->password );

			if ( $user != null ) {
				$context->setSessionAttribute( 'user', $user );
				$context->redirect( $context->link( 'showMessage' ) );
			} else {
				$context->setNotif( 'Login or password invalid !', 'error', 3000 );
			}

		}

		return context::SUCCESS;
	}


	public static function logout( $request, $context ) {

		$_SESSION = [];
		session_destroy();

		if ( $request['ajax'] ) {
			$context->ajax = 'You are now offline !';

			return context::NONE;
		}

		$context->redirect( $context->link( 'login' ) );

		return context::SUCCESS;
	}


	public static function showMessage( $request, $context ) {

		$user = $context->checkLogin();

		$context->messages = messageTable::getMessages( $user->id );

		return context::SUCCESS;
	}


	public static function ajaxGetWallPosts($request, $context) {

		$user = $context->checkLogin();

		$context->checkIsAjax($request);

		$messages = messageTable::getMessages( $user->id, $context->post->last );

		$context->ajax = $messages;

		return context::NONE;
	}


	public static function ajaxGetPreviousPosts($request, $context) {

		$user = $context->checkLogin();

		$context->checkIsAjax($request);

		$messages = messageTable::getPreviousMessages( $user->id, $context->post->last );

		$context->ajax = $messages;

		return context::NONE;
	}


	public static function showProfile( $request, $context ) {

		$user = $context->checkLogin();

		$user_id = isset( $request['id'] ) ? (int) $request['id'] : $user->id;

		$context->user = utilisateurTable::getUserById( $user_id );

		if ( is_null( $context->user ) ) {
			return context::ERROR;
		}

		if ( empty( $context->user->avatar ) ) {
			$context->user->avatar = 'images/default-avatar.png';
		}

		$context->messages = messageTable::getMessagesByUser( $user_id );

		$context->edit = $user_id == $user->id;
		
		$context->setLayout("layoutProfile");

		return context::SUCCESS;
	}


	public static function updateStatus( $request, $context ) {

		$user = $context->checkLogin();

		if ( ! isset( $context->post->status ) || empty( $context->post->status ) ) {
			return context::ERROR;
		}

		$update = utilisateurTable::updateStatus( $user->id, $context->post->status );

		$context->redirect( $context->link( 'showProfile' ) );

		$context->setNotif( "Your status has been modified :)" );

		return context::NONE;
	}


	public static function showChat( $request, $context ) {

		$user = $context->checkLogin();

		//$context->chat = chatTable::getChats();
		$context->chat = chatTable::getLastChat();

		return context::SUCCESS;
	}


	public static function showFriends( $request, $context ) {

		$user = $context->checkLogin();

		$context->user = $user;

		$context->users = utilisateurTable::getUsers();

		$context->avatar = 'images/default-avatar.png';

		return context::SUCCESS;
	}


	public static function postMessage( $request, $context ) {

		$user = $context->checkLogin();

		$destinataire = isset( $context->post->destinataire ) && ! empty( $context->post->destinataire ) ? (int) $context->post->destinataire : 0;

		if ( ! isset( $context->post->message ) || empty( $context->post->message ) || $destinataire == 0 ) {
			$context->redirect( $context->link( 'showProfile' ) );
			$context->setNotif( "Error: Your message has not been posted :(", "error" );

			return context::NONE;
		}


		$picture = "";
		if ( isset( $_FILES['file'] ) && ! empty( $_FILES['file'] ) ) {
			$picture = $context->uploadPicture();
		}

		if ( strlen( $picture ) > 0 ) {
			$picture = UPLOADS_LINK . '/' . $picture;
		}

		$post = messageTable::postMessage( $user->id, $destinataire, $context->post->message, $picture );

		$context->redirect( $context->link( 'showProfile' ) );
		$context->setNotif( "Your message has been posted :)" );

		return context::NONE;
	}


	public static function likeMessage($request, $context) {

		$user = $context->checkLogin();

		$context->checkIsAjax($request);

		$context->ajax = messageTable::likeMessage($context->post->id);

		return context::NONE;
	}


	public static function ajaxGetChatMessages($request, $context) {

		$user = $context->checkLogin();

		$context->checkIsAjax($request);

		$chats = chatTable::getChats($context->post->last);
//		$chats = chatTable::getLastChat();

		$context->ajax = $chats;

		return context::NONE;
	}


	public static function ajaxSendChatMessage($request, $context) {
		$user = $context->checkLogin();

		$context->checkIsAjax($request);

		$context->ajax = chatTable::sendMessage($user->id, $context->post->msg);

		return context::NONE;
	}

}
