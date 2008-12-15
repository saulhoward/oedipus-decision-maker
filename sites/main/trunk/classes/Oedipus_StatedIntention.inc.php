<?php
/**
 * Oedipus_StatedIntention
 *
 * @copyright RFI 2007-12-15
 * @copyright SANH 2008-04-05
 */

/**
 * Holds the data for a stated intention (one for every option) in a Oedipus Drama Theoretic table.
 * The si belong to options
 */
class
	Oedipus_StatedIntention
{
	private $id;
	private $tile;
	private $doubt;
	
	public function
		__construct($id, $tile, $doubt)
	{
		$this->id = $id;
		$this->tile = $tile;
		$this->doubt = $doubt;
	}

	public function
		get_id()
	{
		return $this->id;
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
}
?>
