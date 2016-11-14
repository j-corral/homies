<?php

/* Classe Outils en lien avec l'entité chat
	composée de méthodes statiques
*/

class chatTable {

public static function getMessages(){
	$em = dbconnection::getInstance()->getEntityManager() ;

	$messageRepository = $em->getRepository('chat');

	$messages = $messageRepository->findAll();
	

	return $messages;
}


}

?>
