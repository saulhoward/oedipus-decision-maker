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

	public function
		get_stated_intention_str()
	{
		switch ($this->get_tile() . $this->get_doubt()) {
		case "1":
			return 'will';
			break;
		case "0":
			return "won't";
			break;
		case "1?":
			return 'will perhaps';
			break;
		case "0?":
			return "probably won't";
			break;
		case "1x":
			return "will, (but doesn't believe them)";
			break;
		case "0x":
			return "won't, (but doesn't believe them)";
			break;
		}
		return 'will';
	}

}
?>
