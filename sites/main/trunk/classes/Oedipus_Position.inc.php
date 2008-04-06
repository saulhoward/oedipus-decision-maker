<?php
/**
 * Oedipus_Position
 *
 * @copyright RFI 2007-12-15
 * @copyright SANH 2008-04-05
 */

/**
 * Holds the data for a position (one for every actor/option conjunction) in a Oedipus Drama Theoretic table.
 * The positions belong to options
 */
class
	Oedipus_Position
{
	private $tile;
	private $doubt;
	private $actor;
	
	public function
		__construct($tile, $doubt, Oedipus_Actor $actor)
	{
		$this->tile = $tile;
		$this->doubt = $doubt;
		$this->actor = $actor;
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
		get_actor()
	{
		return $this->actor;
	}

}
?>
