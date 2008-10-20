<?php
/**
 * Oedipus_Act
 *
 * @copyright 2008-10-19, RFI & SANH
 */

/**
 * Holds the data for a Oedipus Drama Theoretic scene.
 */
class
	Oedipus_Act
{
	private $name;
	private $id;
	private $added;
	private $scenes;
	private $drama_id;

	public function
		__construct(
			$id,
			$name,
			$added,
			$drama_id
		)
	{
		$this->id = $id;
		$this->name = $name;
		$this->added = $added;
		$this->drama_id = $drama_id;
		
		$this->scenes = array();
	}

	public function
		add_scene(
			Oedipus_Scene $scene
		)
	{
//                $this->scenes[$scene->get_name()] = $scene;
		$this->scenes[$scene->get_id()] = $scene;
	}

	public function
		add_scenes(
			$scenes
		)
	{
		$this->scenes = $scenes;
	}

	public function
		get_scene($scene_id)
	{
		if (isset($this->scenes[$scene_id])) {
			return $this->scenes[$scene_id];
		} else {
			throw new Exception("No scene with id '$scene_id' in the '$this->name' act!");
		}
	}

	public function
		get_scenes()
	{
		return $this->scenes;
	}

	public function
		count_scenes()
	{
		return count($this->scenes);
	}

	public function
		get_id()
	{
		return $this->id;
	}

	public function
		get_human_readable_added()
	{
		$date = strtotime($this->added);
		return date("F j, Y, g:i a", $date);
	}

	public function
		get_added()
	{
		return $this->added;
	}

	public function
		get_name()
	{
		return $this->name;
	}
}
?>
