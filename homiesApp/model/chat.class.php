<?php

/** 
 * @Entity
 * @Table(name="fredouil.chat")
 */
class chat {

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

	/**
	 *  @OneToOne(targetEntity="post")
	 *  @JoinColumn(name="post", referencedColumnName="id")
	 */
	public $post;

	/**
	 *  @OneToOne(targetEntity="utilisateur")
	 *  @JoinColumn(name="emetteur", referencedColumnName="id")
	 *
	*/
	public $emetteur;


	/**
	 * chat constructor.
	 *
	 * @param $post
	 * @param $emetteur
	 */
	public function __construct( $post, $emetteur ) {
		$this->post = $post;
		$this->emetteur = $emetteur;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getPost() {
		return $this->post;
	}

	/**
	 * @return mixed
	 */
	public function getEmetteur() {
		return $this->emetteur;
	}

}

?>
