<?php

/* Classe Outils en lien avec l'entité message
	composée de méthodes statiques
*/

class messageTable {

	public static function getMessages($id){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('message');

		$messages = $messageRepository->findByDestinataire($id);

		return $messages;
	}


	public static function getMessagesByEmetteur($id){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('message');

		$messages = $messageRepository->findByEmetteur($id);

		return $messages;
	}


}

?>
