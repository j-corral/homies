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
	exit;
} else {
	$context->setNotif('Success !', 2000, 'success');

	header( 'Cache-Control: no-cache, must-revalidate' );
	header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
	header( 'Content-type: application/json' );

	echo json_encode($context);
	exit;
}

?>
