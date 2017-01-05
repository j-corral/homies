<?php

/** 
 * @Entity
 * @Table(name="fredouil.utilisateur")
 */
class utilisateur{

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */
	public $id;

	/** @Column(type="string", length=45) */ 
	public $identifiant;
		
	/** @Column(type="string", length=45) */ 
	public $pass;

	/** @Column(type="string", length=45) */ 
	public $nom;

	/** @Column(type="string", length=45) */ 
	public $prenom;

	/** @Column(type="string", length=100) */ 
	public $statut;

	/** @Column(type="string", length=200) */ 
	public $avatar;

	/** @Column(type="datetime") */ 
	public $date_de_naissance;

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getIdentifiant() {
		return $this->identifiant;
	}

	/**
	 * @return mixed
	 */
	public function getNom() {
		return $this->nom;
	}

	/**
	 * @return mixed
	 */
	public function getPrenom() {
		return $this->prenom;
	}

	/**
	 * @return mixed
	 */
	public function getAvatar() {
		return $this->avatar;
	}

	/**
	 * @return mixed
	 */
	public function getStatut() {
		return $this->statut;
	}

	/**
	 * @return mixed
	 */
	public function getDateDeNaissance() {
		return $this->date_de_naissance;
	}



	
}

?>
