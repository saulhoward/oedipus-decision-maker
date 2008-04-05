<?php
/**
 * Oedipus_Table
 *
 * @copyright RFI 2007-12-15
 */

/**
 * Holds the data for a Oedipus Drama Theoretic table.
 */
class
	Oedipus_Table
{
	private $name;
	
	private $actors;
	
	public function
		__construct($name)
	{
		$this->name = $name;
		
		$this->actors = array();
	}
	
	public function
		add_actor(
			Oedipus_Actor $actor
			)
		{
		$this->actors[$actor->get_name()] = $actor;
	}
	
	public function
		get_actor($actor_name)
	{
		if (isset($this->actors[$actor_name])) {
			return $this->actors[$actor_name];
		} else {
			throw new Exception("No actor called '$actor_name' in the '$this->name' table!");
		}
	}
}
?>
