<?php

/** 
 * @Entity
 * @Table(name="fredouil.message")
 */
class message{

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

	/**
	 *  @OneToOne(targetEntity="utilisateur")
	 *  @JoinColumn(name="emetteur", referencedColumnName="id")
	*/
	public $emetteur;

	/**
	 *  @OneToOne(targetEntity="utilisateur")
	 *  @JoinColumn(name="destinataire", referencedColumnName="id", nullable=true)
	 */
	public $destinataire;

	/**
	 *  @OneToOne(targetEntity="utilisateur")
	 *  @JoinColumn(name="parent", referencedColumnName="id")
	 */
	public $parent;

	/**
	 *  @OneToOne(targetEntity="post")
	 *  @JoinColumn(name="post", referencedColumnName="id")
	 */
	public $post;

	/** @Column(type="integer") */
	public $aime;

	/**
	 * message constructor.
	 *
	 * @param $emetteur
	 * @param $destinataire
	 * @param $post
	 */
	public function __construct( $emetteur, $destinataire, $post ) {
		$this->emetteur     = $emetteur;
		$this->destinataire = $destinataire;
		$this->post         = $post;
		$this->parent       = $emetteur;
		$this->aime         = 0;
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
	public function getEmetteur() {
		return $this->emetteur;
	}

	/**
	 * @return mixed
	 */
	public function getDestinataire() {
		return $this->destinataire;
	}

	/**
	 * @return mixed
	 */
	public function getParent() {
		return $this->parent;
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
	public function getAime() {
		return $this->aime;
	}


}

?>
