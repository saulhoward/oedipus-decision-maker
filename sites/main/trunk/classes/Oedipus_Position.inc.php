<?php
/**
 * Oedipus_Position
 *
 * @copyright RFI 2007-12-15
 * @copyright SANH 2008-04-05
 */

/**
 * Holds the data for a position 
 * (one for every character/option conjunction)
 * in a Oedipus Drama Theoretic frame.
 *
 * The positions belong to options
 */
class
	Oedipus_Position
{
	private $id;
	private $tile;
	private $doubt;
	private $character;
	
	public function
		__construct($id, $tile, $doubt, Oedipus_Character $character)
	{
		$this->id = $id;
		$this->tile = $tile;
		$this->doubt = $doubt;
		$this->character = $character;
	}

	public function
		get_tile()
	{
		return $this->tile;
	}

	public function
		get_doubt()
	{
		return $this->doubt;
	}

	public function
		get_id()
	{
		return $this->id;
	}

	public function
		get_character()
	{
		return $this->character;
	}
}
?>
