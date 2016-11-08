<?php

/* Classe Outils en lien avec l'entité message
	composée de méthodes statiques
*/

class messageTable {

public static function getMessages(){
	$em = dbconnection::getInstance()->getEntityManager() ;

	$messageRepository = $em->getRepository('message');

	$messages = $messageRepository->findAll();
	

	return $messages;
}


}

?>
