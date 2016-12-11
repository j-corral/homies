<?php

/* Classe Outils en lien avec l'entité message
	composée de méthodes statiques
*/

class messageTable {

	public static function getMessages($id){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('message');

		$messages = $messageRepository->findBy(array(), array(
			'id' => 'desc'
		));

		return $messages;
	}


	public static function getMessagesByEmetteur($id){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('message');

		$messages = $messageRepository->findByEmetteur($id, array(
			'id' => 'desc'
		));

		return $messages;
	}


	public static function getMessagesByDestinataire($id){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('message');

		$messages = $messageRepository->findByDestinataire($id, array(
			'id' => 'desc'
		));

		return $messages;
	}


	public static function getMessagesByUser($id){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messagesEmetteur = self::getMessagesByEmetteur($id);
		$messagesDestinataire = self::getMessagesByDestinataire($id);

		$messages = array_merge($messagesEmetteur, $messagesDestinataire);


		return $messages;
	}


}

?>
