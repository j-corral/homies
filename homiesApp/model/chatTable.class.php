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
	 * @param $last
	* 
	* @return $chats
	*/
	public static function getChats($last = 0){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$last = (int) $last;

		$chatRepository = $em->getRepository('chat');

		//$chats = $chatRepository->findAll();
		//$chats = $chatRepository->findBy(array(), array('id' => 'ASC'));

		$chats = $chatRepository->createQueryBuilder('c')
		             ->where('c.id > ' . $last)
		             ->getQuery()
		             ->getResult();

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


	public static function sendMessage($idEmetteur, $message) {
		$em = dbconnection::getInstance()->getEntityManager() ;

		$utilisateurRepository = $em->getRepository('utilisateur');
		$emetteur = $utilisateurRepository->findOneById($idEmetteur);

		$postEntity = postTable::createPost($message);

		if(!empty($postEntity) && !empty($emetteur)) {
			$chatEntity = new chat($postEntity, $emetteur);

			$em->persist($chatEntity);
			$em->flush();

			return true;
		}

		return false;
	}


}

?>
