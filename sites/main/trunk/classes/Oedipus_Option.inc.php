<?php
/**
 * Oedipus_Option
 *
 * @copyright RFI 2007-12-15
 * @copyright SANH 2008-04-05
 */

/**
 * Holds the data for an option (which belongs to an actor) in a Oedipus Drama Theoretic table.
 */
class
	Oedipus_Option
{
	private $name;
	
	public function
		__construct($name)
	{
		$this->name = $name;
	}

	public function
		get_name()
	{
		return $this->name;
	}
}
?>
