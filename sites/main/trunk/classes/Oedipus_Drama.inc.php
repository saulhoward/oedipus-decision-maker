<?php
/**
 * Oedipus_Drama
 *
 * @copyright 2007-12-15, RFI & SANH
 */

/**
 * Holds the data for a Oedipus Drama Theoretic drama.
 */
class
	Oedipus_Drama
{
	private $name;
	private $id;
	private $added;
	private $unique_name;
	private $acts;
	private $status;

	private $editable;

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

		$this->editable = FALSE;
		
		$this->acts = array();
	}

	public function
		add_act(
			Oedipus_Act $act
		)
	{
//                $this->acts[$act->get_name()] = $act;
		$this->acts[$act->get_id()] = $act;
	}

	public function
		add_acts(
			$acts
		)
	{
		$this->acts = $acts;
	}

	public function
		get_act($act_id)
	{
		if (isset($this->acts[$act_id])) {
			return $this->acts[$act_id];
		} else {
			throw new Exception("No act with id '$act_id' in the '$this->name' drama!");
		}
	}

	public function
		get_acts()
	{
		return $this->acts;
	}

	public function
		count_acts()
	{
		return count($this->acts);
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
		is_private()
	{
		if ($this->status == 'public')
		{
			return FALSE;
		}
		return TRUE;
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

	private function GetEnumValues($act,$Column)
	{
		$dbSQL = "SHOW COLUMNS FROM ".$act." LIKE '".$Column."'";
		$dbQuery = mysql_query($dbSQL);

		$dbRow = mysql_fetch_assoc($dbQuery);
		$EnumValues = $dbRow["Type"];

		$EnumValues = substr($EnumValues, 6, strlen($EnumValues)-8);
		$EnumValues = str_replace("','",",",$EnumValues);

		return explode(",",$EnumValues);
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

	/*
	 * Legacy - find out where these are
	 */
	public function
		make_drama_editable()
	{
		return $this->make_editable();
	}
	
	public function
		is_drama_editable()
	{
		return $this->is_editable();
	}
}
?>
