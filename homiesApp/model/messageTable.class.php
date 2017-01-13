	<?php

/* Classe Outils en lien avec l'entité message
	composée de méthodes statiques
*/

class messageTable {

	/**
	 * @param $id
	 * @param $last
	 *
	 * @return array
	 */
	public static function getMessages($id, $last = 0){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('message');

		$last = (int) $last;

		$order = 'ASC';

		if($last == 0) {
			$order = 'DESC';
		}

		/*$messages = $messageRepository->findBy(array(), array(
			'id' => 'desc'
		));*/

		$messages = $messageRepository->createQueryBuilder('m')
		                        ->where('m.id > ' . $last)
								->orderBy('m.id', $order)
								->setMaxResults( 10 )
		                        ->getQuery()
		                        ->getResult();

		return $messages;
	}


	/**
	 * @param $id
	 * @param $last
	 *
	 * @return array
	 */
	public static function getPreviousMessages($id, $last = 0){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('message');

		$last = (int) $last;

		$order = 'DESC';

		$messages = $messageRepository->createQueryBuilder('m')
		                              ->where('m.id < ' . $last)
		                              ->orderBy('m.id', $order)
		                              ->setMaxResults( 20 )
		                              ->getQuery()
		                              ->getResult();

		return $messages;
	}


	/**
	 * @param $id
	 * @param $last
	 * @param $first
	 *
	 * @return array
	 */
	public static function getMessagesLikes($id, $last = 0, $first = 0){
		$em = dbconnection::getInstance()->getEntityManager() ;

		$messageRepository = $em->getRepository('message');

		$last = (int) $last;
		$first = (int) $first;

		$order = 'DESC';

		$messages = $messageRepository->createQueryBuilder('m')
		                              ->select(array('m.id', 'm.aime'))
		                              ->where('m.id <= ' . $last)
									  ->andWhere('m.id >= ' . $first)
									  ->andWhere('m.aime > ' . 0)
		                              ->orderBy('m.id', $order)
		                              ->getQuery()
		                              ->getResult();

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

	public static function likeMessage($idMessage) {

		$em = dbconnection::getInstance()->getEntityManager();

		$messageRepository = $em->getRepository('message');

		$message = $messageRepository->findOneById($idMessage);

		$message->aime++;

		$em->persist($message);
		$em->flush();

		return $message->aime;
	}

}

?>
