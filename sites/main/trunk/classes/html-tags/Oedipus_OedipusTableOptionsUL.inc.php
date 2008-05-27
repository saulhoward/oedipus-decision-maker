<?php
/**
 * Oedipus_OedipusTableOptionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 */

class
	Oedipus_OedipusTableOptionsUL
extends
	HTMLTags_UL
{
	private $table;

	public function
		__construct(Oedipus_Table $table, $edit_table_option = TRUE)
	{
		parent::__construct();

		$this->table = $table;
		
		$this->set_attribute_str('class', 'table-options');
		
		// Link to png_image the table
		$png_image_li = $this->get_png_image_li();
		$this->append_tag_to_content($png_image_li);

		if ($edit_table_option)
		{
			// Link to edit the table
			$edit_li = $this->get_edit_li();
			$this->append_tag_to_content($edit_li);
		}
	}

	private function
		get_png_image_li()
	{
		$png_image_url = $this->get_png_image_url();
		$link = new HTMLTags_A('Full size PNG image of this Table');
		$link->set_href($png_image_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'png-image-table');

		return $li;
	}

	private function
		get_png_image_url()
	{
		//                $get_variables = array("table_id" => $this->table->get_id());
		//                return PublicHTML_URLHelper
		//                        ::get_oo_page_url('Oedipus_TablePNGImage', $get_variables);

		// Nice URLs /tables/images/option-table-XX.png
		return Oedipus_TableImageHelper::get_table_png_url($this->table->get_id());
	}

	private function
		get_edit_li()
	{
		$edit_url = $this->get_edit_url();
		$link = new HTMLTags_A('Edit this Table');
		$link->set_href($edit_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'edit-table');

		return $li;
	}

	private function
		get_edit_url()
	{
		$get_variables = array("table_id" => $this->table->get_id());

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_TableEditorPage', $get_variables);
	}
}
?>
