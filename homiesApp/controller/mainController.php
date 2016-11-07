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

		/*if(isset($_POST)) {
			$context->post = $_POST;

			var_dump("POST:", $context->post);
		}*/

		// change login and password
		$login = 'user';
		$password = 'pass';

		$user = utilisateurTable::getUserByLoginAndPass($login, $password);

		var_dump($user);

		return context::SUCCESS;
	}


	public static function logout($request,$context){

		return context::SUCCESS;
	}

}
