<?php
/**
 * Oedipus_ActActionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *  2008-04-27, SANH
 */

class
Oedipus_ActActionsUL
extends
Oedipus_ActionsUL
{
	private $act;
	private $drama_id;

	public function
		__construct(Oedipus_Act $act, $drama_id)
	{
		parent::__construct();

		$this->act = $act;
		$this->drama_id = $drama_id;

		// Link to add act
               $add_act_li = $this->get_add_act_li();
               $this->append_tag_to_content($add_act_li);
	}
	private function
		get_add_act_li()
	{
		$add_act_url = $this->get_add_act_url();
		$link = new HTMLTags_A('Add act');
		$link->set_href($add_act_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'add-act');

		return $li;
	}

	private function
		get_add_act_url()
	{
		return Oedipus_DramaHelper::get_add_act_url($this->drama_id);
	}
}
?>
