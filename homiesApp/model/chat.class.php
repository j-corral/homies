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

	/** @Column(type="integer")
	 *
	 */
	public $post = null;

	/** @Column(type="integer")
	 *
	*/
	public $emetteur = null;


	
}

?>
