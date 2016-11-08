<?php

/* Classe Outils en lien avec l'entité post
	composée de méthodes statiques
*/

class postTable {

public static function getPosts(){
	$em = dbconnection::getInstance()->getEntityManager() ;

	$postRepository = $em->getRepository('post');

	$posts = $postRepository->findAll();
	

	return $posts;
}


}

?>
