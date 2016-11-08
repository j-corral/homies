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
	public $text;
		
	/** @Column(type="datetime") */
	public $date;

	/** @Column(type="string", length=200) */
	public $image;
	
}

?>
