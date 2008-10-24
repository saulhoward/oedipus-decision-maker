<?php
/**
 * Oedipus_Option
 *
 * @copyright RFI 2007-12-15
 * @copyright SANH 2008-04-05
 */

/**
 * Holds the data for an option (which belongs to a character) in a Oedipus Drama Theoretic table.
 */
class
	Oedipus_Option
{
	private $name;
	private $id;
	private $positions;
	private $stated_intention;
	
	public function
		__construct($id, $name, Oedipus_StatedIntention $stated_intention)
	{
		$this->name = $name;
		$this->id = $id;
		$this->stated_intention = $stated_intention;
	}

	public function
		get_id()
	{
		return $this->id;
	}

	public function
		get_name()
	{
		return $this->name;
	}

	public function
		get_positions()
	{
		return $this->positions;
	}

	public function
		get_stated_intention()
	{
		return $this->stated_intention;
	}

	public function
		add_positions(
			$positions
			)
		{
		$this->positions = $positions;
	}

	public function
		get_position($character_id)
	{
		if (isset($this->positions[$character_id])) {
			return $this->positions[$character_id];
		} else {
			throw new Exception("No position for the character '$character_id' in the '$this->name' option!");
		}
	}


}
?>
