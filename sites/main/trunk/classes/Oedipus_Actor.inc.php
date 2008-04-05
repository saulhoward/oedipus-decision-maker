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
	private $name;
	
	private $options;
	
	public function
		__construct($name)
	{
		$this->name = $name;
		
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
		get_option($option_name)
	{
		if (isset($this->options[$option_name])) {
			return $this->options[$option_name];
		} else {
			throw new Exception("No option called '$option_name' in the '$this->name' table!");
		}
	}

	public function
		get_name()
	{
		return $this->name;
	}
}
?>
