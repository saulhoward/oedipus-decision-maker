<?php
/**
 * Oedipus_Frame
 *
 * @copyright SANH 2008-10-19
 */

/**
 * Holds the data for a Oedipus Drama Theoretic frame.
 */
class
Oedipus_Table
{
	private $id;
	private $drama_id;
	private $name;
	private $characters;

	public function
		__construct($id, $drama_id, $name, $characters)
	{
		$this->id = $id;
		$this->drama_id = $drama_id;
		$this->name = $name;

		$this->characters = $characters;
	}

	public function
		add_character(
			Oedipus_Character $character
		)
	{
		$this->characters[$character->get_name()] = $character;
	}

	public function
		add_characters(
			$characters
		)
	{
		$this->characters = $characters;
	}

	public function
		get_character($character_name)
	{
		if (isset($this->characters[$character_name])) {
			return $this->characters[$character_name];
		} else {
			throw new Exception("No character called '$character_name' in the '$this->name' frame!");
		}
	}

	public function
		get_characters()
	{
		return $this->characters;
	}

	public function
		count_characters()
	{
		return count($this->characters);
	}

	public function
		get_drama_id()
	{
		return $this->drama_id;
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
