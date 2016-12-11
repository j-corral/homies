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


public static function createPost($message, $image = '') {

	$em = dbconnection::getInstance()->getEntityManager() ;

	$post = new post($message);

	if($image != '') {
		$post->setImage($image);
	}

	$em->persist($post);
	$em->flush();

	return $post;
}


}

?>
