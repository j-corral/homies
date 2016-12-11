<?php

/** 
 * @Entity
 * @Table(name="fredouil.post")
 */
class post{

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

	/** @Column(type="string", length=2000) */
	public $texte;
		
	/** @Column(type="datetime") */
	public $date;

	/** @Column(type="string", length=200) */
	public $image;

	/**
	 * post constructor.
	 *
	 * @param $texte
	 */
	public function __construct( $texte ) {
		$this->texte = $texte;
		$this->date = new DateTime();
	}

	/**
	 * @param mixed $image
	 */
	public function setImage( $image ) {
		$this->image = $image;
	}




}

?>
