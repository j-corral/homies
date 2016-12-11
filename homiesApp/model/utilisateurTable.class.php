<?php

/* Classe Outils en lien avec l'entité utilisateur
	composée de méthodes statiques
*/

class utilisateurTable {

public static function getUserByLoginAndPass($login,$pass){
	$em = dbconnection::getInstance()->getEntityManager() ;

	$userRepository = $em->getRepository('utilisateur');
	$user = $userRepository->findOneBy(array('identifiant' => $login, 'pass' => sha1($pass)));	
	
	if ($user == false){
		//echo 'Erreur sql';
	}
	return $user; 
}


	/**
	 * Récupère un utilisateur
	 * @author jonathan
	 * @param $id
	 *
	 * @return mixed
	 */
	public static function getUserById($id) {

		$em = dbconnection::getInstance()->getEntityManager() ;

		$userRepository = $em->getRepository('utilisateur');

		$user = $userRepository->findOneById($id);

		return $user;
	}


	/**
	 * Récupère la liste des utilisateurs
	 * @author jonathan
	 *
	 * @return array
	 */
	public static function getUsers() {

		$em = dbconnection::getInstance()->getEntityManager() ;

		$userRepository = $em->getRepository('utilisateur');

		$users = $userRepository->findAll();

		return $users;
	}


	public static function updateStatus($id, $status) {

		$em = dbconnection::getInstance()->getEntityManager() ;
		$userRepository = $em->getRepository('utilisateur');

		$user = $userRepository->findOneById($id);

		if(empty($user)) {
			return false;
		}

		$user->statut = $status;
		$em->persist($user);
		$em->flush();

		return true;
	}


}

?>
