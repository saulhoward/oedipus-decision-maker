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

	private $editable;

	public function
		__construct($id, $name, $added, $scene_id, $characters)
	{
		$this->id = $id;
		$this->name = $name;
		$this->added = $added;
		$this->scene_id = $scene_id;

		$this->characters = $characters;

		$this->editable = FALSE;
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
			throw new Exception(
				"No character called '$character_name' in the '$this->name' frame!"
			);
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
		return Oedipus_DramaHelper::get_drama_id_for_scene_id($this->get_scene_id());
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
	
	public function
		make_editable()
	{
		$this->editable = TRUE;
		return TRUE;
	}
	
	public function
		is_editable()
	{
		return $this->editable;
	}

	public function
		get_drama_name()
	{
		return Oedipus_FrameHelper::get_drama_name_for_scene_id($this->get_scene_id());
	}

	public function
		get_scene_name()
	{
		return Oedipus_FrameHelper::get_scene_name_for_scene_id($this->get_scene_id());
	}

	public function
		get_act_name()
	{
		return Oedipus_FrameHelper::get_act_name_for_scene_id($this->get_scene_id());
	}
}
?>
