<?php

/* Classe Outils en lien avec l'entité message
	composée de méthodes statiques
*/

class messageTable {

	/**
	 * @param $id
	 *
	 * @return array
	 */
	public static function getMessages($id){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('message');

		$messages = $messageRepository->findBy(array(), array(
			'id' => 'desc'
		));

		return $messages;
	}


	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public static function getMessagesByEmetteur($id){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('message');

		$messages = $messageRepository->findByEmetteur($id, array(
			'id' => 'desc'
		));

		return $messages;
	}


	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public static function getMessagesByDestinataire($id){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('message');

		$messages = $messageRepository->findByDestinataire($id, array(
			'id' => 'desc'
		));

		return $messages;
	}


	/**
	 * @param $id
	 *
	 * @return array
	 */
	public static function getMessagesByUser($id){

		$messagesEmetteur = self::getMessagesByEmetteur($id);
		$messagesDestinataire = self::getMessagesByDestinataire($id);

		$messages = array_merge($messagesEmetteur, $messagesDestinataire);


		return $messages;
	}


	/**
	 * @param $idEmetteur
	 * @param $idDestinataire
	 * @param $message
	 * @param string $image
	 *
	 * @return bool
	 */
	public static function postMessage($idEmetteur, $idDestinataire, $message, $image = '') {

		$em = dbconnection::getInstance()->getEntityManager();

		$utilisateurRepository = $em->getRepository('utilisateur');

		$emetteur = $utilisateurRepository->findOneById($idEmetteur);

		$destinataire = $emetteur;

		if($idEmetteur != $idDestinataire) {
			$destinataire = $utilisateurRepository->findOneById($idDestinataire);
		}

		$postEntity = postTable::createPost($message, $image);

		$messageEntity = new message($emetteur, $destinataire, $postEntity);

		$em->persist($messageEntity);
		$em->flush();

		return true;
	}

}

?>
