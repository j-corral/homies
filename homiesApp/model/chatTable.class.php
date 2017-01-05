<?php

/* Classe Outils en lien avec l'entité chat
	composée de méthodes statiques
*/

class chatTable {

	/**
	* Récupère la totalité des messages postés sur le chat
	* 
	* @author Kenny
	* 
	* @return $chats
	*/
	public static function getChats(){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$chatRepository = $em->getRepository('chat');

		$chats = $chatRepository->findAll();

		return $chats;
	}

	/**
	* Récupère le dernier message du chat
	* 
	* @author Kenny
	* 
	* @return $last
	*/
	public static function getLastChat(){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('chat');


		$last = $messageRepository->findBy(array(), array('id' => 'DESC'), 1);

		return $last;
	}


}

?>
