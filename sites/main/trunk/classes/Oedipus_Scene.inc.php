<?php
/**
 * Oedipus_Scene
 *
 * @copyright 2008-10-19, RFI & SANH
 */

/**
 * Holds the data for a Oedipus Drama Theoretic scene.
 */
class
	Oedipus_Scene
{
	private $name;
	private $id;
	private $added;
	private $frames;
	private $act_id;

	private $editable;

	
	public function
		__construct(
			$id,
			$name,
			$added,
			$act_id
		)
	{
		$this->id = $id;
		$this->name = $name;
		$this->added = $added;
		$this->act_id = $act_id;
		
		$this->frames = array();

		$this->editable = FALSE;
	}

	public function
		add_frame(
			Oedipus_Frame $frame
		)
	{
//                $this->frames[$frame->get_name()] = $frame;
		$this->frames[$frame->get_id()] = $frame;
	}

	public function
		add_frames(
			$frames
		)
	{
		$this->frames = $frames;
	}

	public function
		get_frame($frame_id)
	{
		if (isset($this->frames[$frame_id])) {
			return $this->frames[$frame_id];
		} else {
			throw new Exception("No frame with id '$frame_id' in the '$this->name' scene!");
		}
	}

	public function
		get_frames()
	{
		return $this->frames;
	}

	public function
		count_frames()
	{
		return count($this->frames);
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
}
?>
