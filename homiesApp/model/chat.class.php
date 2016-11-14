<?php

/** 
 * @Entity
 * @Table(name="fredouil.chat")
 */
class chat{

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
	 *  @OneToOne(targetEntity="post")
	 *  @JoinColumn(name="emetteur", referencedColumnName="id")
	 *
	*/
	public $emetteur;


	
}

?>
