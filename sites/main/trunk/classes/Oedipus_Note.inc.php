<?php
/**
 * Oedipus_Note
 *
 * @copyright RFI 2007-12-15
 * @copyright SANH 2008-05-05
 */

/**
 * Holds the data for a note about a Oedipus Drama Theoretic table.
 */
class
Oedipus_Note
{
	private $id;
	private $note_text;
	private $added;

	public function
		__construct($id, $note_text, $added)
	{
		$this->id = $id;
		$this->note_text = $note_text;
		$this->added = $added;
	}
	public function
		get_note_text()
	{
		return $this->note_text;
	}
	public function
		get_id()
	{
		return $this->id;
	}

	public function
		get_added()
	{
		return $this->added;
	}
}
?>
