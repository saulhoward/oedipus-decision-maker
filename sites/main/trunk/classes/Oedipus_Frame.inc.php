<?php
/**
 * Oedipus_Frame
 *
 * @copyright SANH 2008-10-19
 */

/**
 * Holds the data for a Oedipus scene Theoretic frame.
 */
class
Oedipus_Frame
{
	private $id;
	private $scene_id;
	private $name;
	private $added;
	private $characters;

	public function
		__construct($id, $name, $added, $scene_id, $characters)
	{
		$this->id = $id;
		$this->name = $name;
		$this->added = $added;
		$this->scene_id = $scene_id;

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
		get_scene_id()
	{
		return $this->scene_id;
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
