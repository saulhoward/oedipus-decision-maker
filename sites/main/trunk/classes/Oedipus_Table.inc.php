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
	private $id;
	private $name;
	private $actors;

	public function
		__construct($id, $name, $actors)
	{
		$this->id = $id;
		$this->name = $name;

		$this->actors = $actors;
	}

	public function
		add_actor(
			Oedipus_Actor $actor
		)
	{
		$this->actors[$actor->get_name()] = $actor;
	}

	public function
		add_actors(
			$actors
		)
	{
		$this->actors = $actors;
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

	public function
		get_actors()
	{
		return $this->actors;
	}

	public function
		count_actors()
	{
		return count($this->actors);
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
}
?>
