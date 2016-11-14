<?php

/* Classe Outils en lien avec l'entité message
	composée de méthodes statiques
*/

class messageTable {

public static function getMessages($id){
	$em = dbconnection::getInstance()->getEntityManager() ;

	$messageRepository = $em->getRepository('message');

	$messages = $messageRepository->findBy(array(
		'emetteur' => $id
	));

	/*echo "<pre>";
	print_r($messages);
	echo "</pre>";*/

	return $messages;
}


}

?>
