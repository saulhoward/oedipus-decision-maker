<?php
/**
 * Oedipus_DramaListDiv
 *
 *  2008-12-12, SANH
 */

class
Oedipus_DramaListDiv
extends
HTMLTags_Div
{
	private $dramas; // array of Oedipus_Drama

	protected function
		get_dramas_list()
	{
                /**
		 * Override this to set 
		 * different drama lists
		 *
                 */
		return Oedipus_DramaHelper
			::get_latest_public_dramas();
	}

	public function
		__construct()
	{
		parent::__construct();
		$this->set_dramas(
			$this->get_dramas_list()
		);
		$this->set_attribute_str('class', 'dramas');
		$this->append($this->get_drama_table());
	}

	private function
		get_drama_table()
	{
		$table = new HTMLTags_Table();
		$table->append($this->get_heading_tr());

		$i = 1;
		foreach ($this->get_dramas() as $drama)
		{
			$drama_tr = $this->get_drama_tr($drama);
			if ($i & 1) {
				$drama_tr->set_attribute_str('class', 'odd');
			}
			$i++;
			$table->append($drama_tr);
		}
		return $table;
	}

	private function
		get_heading_tr()
	{
		$tr = new HTMLTags_TR();
		$tr->append('<th>Name</th><th>Date Created</th>');
		return $tr;
	}


	private function
		get_drama_tr(Oedipus_Drama $drama)
	{
		$tr = new HTMLTags_TR();
		//$tr->set_attribute_str('id', 'drama');
		$link = new HTMLTags_A($drama->get_name());
		$link->set_href($this->get_drama_page_url_for_drama($drama));
	
		$name_td = $this->get_td_with_id(
			$link->get_as_string(), 'name'
		);
		$tr->append($name_td);
		$added_td = $this->get_td_with_id(
			$drama->get_human_readable_added(), 'added'
		);
		$tr->append($added_td);
		return $tr;
	}

	private function
		get_td_with_id($content_str, $id_name)
	{
		$td = new HTMLTags_TD($content_str);
		$td->set_attribute_str('id', $id_name);
		return $td;
	}

	private function
		get_drama_page_url_for_drama(Oedipus_Drama $drama)
	{
		return Oedipus_DramaHelper::get_drama_page_url_for_drama($drama);
	}

	private function
		set_dramas($dramas)
	{
		$this->dramas = $dramas;
	}

	private function
		get_dramas()
	{
		if (isset($this->dramas)) {
			return $this->dramas;
		} else {
			throw new 
				Oedipus_DramaNotSetException(
					'In the Drama List'
				);
		}
	}
}
?>
