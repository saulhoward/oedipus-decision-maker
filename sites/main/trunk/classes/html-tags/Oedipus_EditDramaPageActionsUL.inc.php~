<?php
/**
 * Oedipus_OedipusDramaEditorPageActionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *  2008-04-27, SANH
 */

class
	Oedipus_OedipusDramaEditorPageActionsUL
extends
Oedipus_OedipusPageActionsUL
{

	private $drama;

	public function
		__construct(Oedipus_Drama $drama)
	{
		parent::__construct();

		$this->drama = $drama;
		
		// Link to edit the drama

		$back_to_drama_li = $this->get_back_to_drama_li();
		$this->append_tag_to_content($back_to_drama_li);
	}

	private function
		get_back_to_drama_li()
	{
		$back_to_drama_url = $this->get_back_to_drama_url();
		$link = new HTMLTags_A('View Drama');
		$link->set_href($back_to_drama_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'view-drama');

		return $li;
	}

	private function
		get_back_to_drama_url()
	{
		//This function uses the mod-rewrited urls (/dramas/nameofdrama)
		return Oedipus_DramaHelper::get_drama_url($this->drama);

//                $get_variables = array("drama_id" => $this->drama->get_drama_id());

//                return PublicHTML_URLHelper
//                        ::get_oo_page_url('Oedipus_DramaEditorPage', $get_variables);
	}
	
}
?>
