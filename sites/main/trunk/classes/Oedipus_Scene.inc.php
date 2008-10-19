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
	private $unique_name;
	private $frames;
	private $status;

	public function
		__construct(
			$id,
			$name,
			$unique_name,
			$added,
			$status
		)
	{
		$this->id = $id;
		$this->name = $name;
		$this->added = $added;
		$this->unique_name = $unique_name;
		$this->status = $status;
		
		$this->frames = array();
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
			throw new Exception("No frame with id '$frame_id' in the '$this->name' drama!");
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
		get_status()
	{
		return $this->status;
	}

	public function
		get_unique_name()
	{
		return $this->unique_name;
	}

	public function
		is_public()
	{
		if ($this->status == 'public')
		{
			return TRUE;
		}
		return FALSE;
	}

	public function
		get_possible_status_values()
	{
		return $this->GetEnumValues('oedipus_dramas', 'status');
	}

	private function GetEnumValues($frame,$Column)
	{
		$dbSQL = "SHOW COLUMNS FROM ".$frame." LIKE '".$Column."'";
		$dbQuery = mysql_query($dbSQL);

		$dbRow = mysql_fetch_assoc($dbQuery);
		$EnumValues = $dbRow["Type"];

		$EnumValues = substr($EnumValues, 6, strlen($EnumValues)-8);
		$EnumValues = str_replace("','",",",$EnumValues);

		return explode(",",$EnumValues);
	}


}
?>
