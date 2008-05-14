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

	public function
		__construct(
			$id,
			$name,
			$unique_name,
			$added
		)
	{
		$this->id = $id;
		$this->name = $name;
		$this->added = $added;
		$this->unique_name = $unique_name;
		
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
		get_unique_name()
	{
		return $this->unique_name;
	}
}
?>