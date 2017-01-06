<?php

$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if(!$isAjax) {
	trigger_error('Access denied - not an AJAX request...', E_USER_ERROR);
}

// mode debug
$debug = false;

//nom de l'application
$nameApp = "homiesApp";

// Inclusion des classes et librairies
require_once 'lib/core.php';
require_once $nameApp.'/controller/mainController.php';

define('ROUTE', basename(__FILE__) . '?action=');

require_once "const.php";

if($debug) {
	ini_set ("display_errors", 1);
	error_reporting (-1);
}

//action par défaut
$action = "index";

if(key_exists("action", $_REQUEST))
	$action =  $_REQUEST['action'];

session_start();

$context = context::getInstance();
$context->init($nameApp);

$_REQUEST['ajax'] = true;

$view = $context->executeAction($action, $_REQUEST);

//traitement des erreurs de bases, reste a traiter les erreurs d'inclusion
if($view != context::NONE){

	header( 'Cache-Control: no-cache, must-revalidate' );
	header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
	header( 'Content-type: application/json' );

	$msg = "Action - ".$action." : non autorisée !";
	echo json_encode($msg);
	exit();
} else {

	header( 'Cache-Control: no-cache, must-revalidate' );
	header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
	header( 'Content-type: application/json' );

	$data = $context->ajax;

	// Attributs autorisés
	$whitelist = array(
		'chat' => array('id', 'emetteur', 'post'),
		'post' => array('id', 'texte', 'date', 'image'),
		'utilisateur' => array('id', 'identifiant', 'nom', 'prenom', 'avatar', 'date_de_naissance'),
		'message' => array('id', 'emetteur', 'destinataire', 'parent', 'post', 'aime'),
	);

	if(is_array($data) || is_object($data)) {
		echo Serializor::json_encode($data, 1, $whitelist);
	} else {
		echo json_encode($data);
	}

	exit();
}

?>
