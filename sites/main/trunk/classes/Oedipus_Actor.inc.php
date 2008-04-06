<?php
/**
 * Oedipus_Actor
 *
 * @copyright RFI 2007-12-15
 * @copyright SANH 2008-04-05
 */

/**
 * Holds the data for an option in a Oedipus Drama Theoretic table.
 */
class
	Oedipus_Actor
{
	private $id;
	private $name;
	private $options;
	private $color;
	
	public function
		__construct($id, $name, $color)
	{
		$this->name = $name;
		$this->id = $id;
		$this->color = $color;
		$this->options = array();
	}
		
	public function
		add_option(
			Oedipus_Option $option
			)
		{
		$this->options[$option->get_name()] = $option;
	}
	
	
	public function
		has_options()
	{
		if (count($this->options) > 0)
		{
			return TRUE;
		}
		return FALSE;
	}


	public function
		get_option($option_name)
	{
		if (isset($this->options[$option_name])) {
			return $this->options[$option_name];
		} else {
			throw new Exception("No option called '$option_name' in the '$this->name' table!");
		}
	}

	public function
		get_options()
	{
		return $this->options;
	}

	public function
		get_color()
	{
		return $this->color;
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
		get_short_name()
	{
		if (strlen($this->name) > 4)
		{
			return substr($this->name, 0, 4);
		}
		return $this->name;
	}

}
?>
