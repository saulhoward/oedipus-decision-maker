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
	private $tables;
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
		
		$this->tables = array();
	}

	public function
		add_table(
			Oedipus_Table $table
		)
	{
//                $this->tables[$table->get_name()] = $table;
		$this->tables[$table->get_id()] = $table;
	}

	public function
		add_tables(
			$tables
		)
	{
		$this->tables = $tables;
	}

	public function
		get_table($table_id)
	{
		if (isset($this->tables[$table_id])) {
			return $this->tables[$table_id];
		} else {
			throw new Exception("No table with id '$table_id' in the '$this->name' drama!");
		}
	}

	public function
		get_tables()
	{
		return $this->tables;
	}

	public function
		count_tables()
	{
		return count($this->tables);
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

	private function GetEnumValues($Table,$Column)
	{
		$dbSQL = "SHOW COLUMNS FROM ".$Table." LIKE '".$Column."'";
		$dbQuery = mysql_query($dbSQL);

		$dbRow = mysql_fetch_assoc($dbQuery);
		$EnumValues = $dbRow["Type"];

		$EnumValues = substr($EnumValues, 6, strlen($EnumValues)-8);
		$EnumValues = str_replace("','",",",$EnumValues);

		return explode(",",$EnumValues);
	}


}
?>
