<?php

/* Classe Outils en lien avec l'entité chat
	composée de méthodes statiques
*/

class chatTable {

	/**
	* Récupère la totalité des chats
	* 
	* @author Kenny
	* 
	* @return $chats
	*/
	public static function getChats(){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('chat');

		$chats = $messageRepository->findAll();

		return $chats;
	}

	/**
	* Récupère la totalité des chats
	* 
	* @author Kenny
	* 
	* @return $chats
	*/
	public static function getLastChat(){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('chat');


		$last = $messageRepository->findBy(array(), array('id' => 'DESC'), 1);

		return $last;
	}

}

?>
