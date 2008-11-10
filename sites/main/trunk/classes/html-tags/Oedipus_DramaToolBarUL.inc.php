<?php
/**
 * Oedipus_DramaToolBarUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *  2008-04-27, SANH
 */

class
Oedipus_DramaToolBarUL
extends
Oedipus_ToolBarUL
{
	private $drama;
	private $act_id;

	public function
		__construct(Oedipus_Drama $drama, $act_id)
	{
		parent::__construct();

		$this->drama = $drama;
		$this->act_id = $act_id;

		foreach($this->drama->get_acts() as $act)
		{
			$url = Oedipus_DramaHelper
				::get_drama_page_url_for_act_id($act->get_id());
			$li = new HTMLTags_LI();
			$a = new HTMLTags_A($act->get_name());
			$a->set_href($url);
			if ($this->act_id == $act->get_id())
			{
				$a->set_attribute_str('id', 'selected');
			}
			$li->append($a);
			$this->append($li);
		}

		/*
		 * Add Act LI
		 */
		$this->append(
			$this->get_add_act_li()
		);

		return $ul;
	}

	protected function
		get_add_act_li()
	{
		$li = new HTMLTags_LI();
		$a = new HTMLTags_A('Add Act');
		$a->set_attribute_str('id', 'add');
		$a->set_attribute_str('title', 'Add an Act');
		$a->set_href(
			Oedipus_DramaHelper
			::get_add_act_url(
				$this->drama->get_id()
			)
		);
		$li->append($a);

		return $li;
	}
}
?>
