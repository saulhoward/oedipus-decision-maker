<?php
/**
 * Oedipus_DramaEditorHelper
 *
 * @copyright RFI, 2008-02-18
 * @copyright SANH, 2008-04-11
 */

class
	Oedipus_DramaEditorHelper
{
	public static function
		render_oedipus_drama_editor_page_div(
			Oedipus_Drama $drama
		)
	{
		$drama_editor_page_div = new HTMLTags_Div();
		$drama_editor_page_div->set_attribute_str('class', 'drama-editor');

		$drama_div = new HTMLTags_Div();
		$drama_div->set_attribute_str('class', 'oedipus-drama');
		$html_drama = self::render_oedipus_html_drama($drama);
		$drama_div->append_tag_to_content($html_drama);
		$drama_editor_page_div->append_tag_to_content($drama_div);

//                $form_div = new HTMLTags_Div();
//                $form_div->set_attribute_str('class', 'drama-editor-form');
//                $html_form = Oedipus_TableCreatorHelper::render_oedipus_html_drama_editor_form($drama);
//                $form_div->append_tag_to_content($html_form);
//                $drama_editor_page_div->append_tag_to_content($form_div);

		return $drama_editor_page_div;
	}

	public static function
		render_create_new_drama_div()
	{
		$drama_editor_page_div = new HTMLTags_Div();
		$drama_editor_page_div->set_attribute_str('class', 'drama-editor');

		$form_div = new HTMLTags_Div();
		$form_div->set_attribute_str('class', 'new-drama-form');
		$html_form = Oedipus_DramaEditorHelper::render_html_new_drama_form();
		$form_div->append_tag_to_content($html_form);
		$drama_editor_page_div->append_tag_to_content($form_div);

		return $drama_editor_page_div;
	}

	public static function
		render_html_new_drama_form()
	{
		$form = new HTMLTags_SimpleOLForm('new_drama');
		$form->set_legend_text('New Drama');

		// action
		$form_action = self::get_new_drama_form_action_url();
		$form->set_action($form_action);

		// cancel
		$form_cancel = self::get_new_drama_form_cancel_url();
		$form->set_cancel_location($form_cancel);

		// Drama Name Input
		$form->add_input_name_with_value('drama_name', '', 'Drama Name:');
		// Hidden Inputs
		$form->add_hidden_input('new_drama', 1);

		$form->set_submit_text('Create Drama');

		return $form;
	}

	// FORM URLS
	public static function
		get_new_drama_form_action_url()
	{
		$url = new HTMLTags_URL();
		$url->set_file('/Oedipus_DramaEditorRedirectScript');
		return $url;
	}
	
	public static function
		get_new_drama_form_cancel_url()
	{
		$url = new HTMLTags_URL();
		$url->set_file('/Oedipus_DramaEditorPage');
		return $url;
	}

	// PROCESS NEW DRAMA
	public static function
		add_drama($drama_name)
	{
		// ADD DRAMA TO DATABASE
		$drama_unique_name = self::create_unique_name($drama_name);
		$dbh = DB::m();
		$sql = <<<SQL
INSERT INTO
	oedipus_dramas
SET
	name = '$drama_name',
	unique_name = '$drama_unique_name',
	added = NOW()
SQL;

//                print_r($sql);exit;
		$result = mysql_query($sql, $dbh);

		$drama_id = mysql_insert_id($dbh);


		$drama = new Oedipus_Drama($drama_id, $drama_name, $drama_unique_name);
//                print_r($drama);exit;
		return $drama;
	}

	public function
		create_unique_name($name)
	{
		// unique names will be used as part of the url
		$name = urlencode($name);

		$i = 0;

//                print_r($name);exit;
		// Check if name is already in oedipus_dramas
		$is_name_unique = self::is_name_unique($name);
		while ($is_name_unique > 0)
		{
			if ($i > 0)
			{
				$name = substr($name, 0, -2);  
			}
			$name = $name . '_' . $i;
			$is_name_unique = self::is_name_unique($name);
			$i++;
		}

//                print_r($name);exit;
		return $name;
	}

	public function
		is_name_unique($unique_name)
	{
		$dbh = DB::m();
		// Check if name is already in oedipus_dramas
		$query = <<<SQL
SELECT 
	COUNT( * ) AS count
	FROM
		oedipus_dramas
	WHERE
		unique_name = '$unique_name'
SQL;

//                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);

		if($row['count'] > 0)
		{
			return TRUE;
		}

//                print_r($row['count']);exit;
		return FALSE;
	}

	public function
		get_drama_by_unique_name($unique_name)
	{
		$dbh = DB::m();
		// Check if name is already in oedipus_dramas
		$query = <<<SQL
SELECT 
	*
	FROM
		oedipus_dramas
	WHERE
		unique_name = '$unique_name'
SQL;

//                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);
//                print_r($row);exit;

		$drama = new Oedipus_Drama($row['id'], $row['name'], $row['unique_name']);

		return $drama;
	}

	public function
		render_oedipus_html_drama($drama)
	{
		$drama_div = new HTMLTags_Div();

		// SHOW THE TABLES
		foreach ($drama->get_tables() as $table)
		{
			$drama_div->append_tag_to_content(Oedipus_TableRenderer::render_oedipus_html_table($table));
		}

		// CREATE TABLE FORM
		$drama_div->append_tag_to_content(self::render_html_new_table_form());

		return $drama_div;
	}

	public static function
		render_html_new_table_form()
	{
		$form = new HTMLTags_SimpleOLForm('new_table');
		$form->set_legend_text('New Table');

		// action
		$form_action = self::get_new_table_form_action_url();
		$form->set_action($form_action);

		// cancel
		$form_cancel = self::get_new_table_form_cancel_url();
		$form->set_cancel_location($form_cancel);

		// Drama Name Input
		$form->add_input_name_with_value('table_name', '', 'Table Name:');
		// Hidden Inputs
		$form->add_hidden_input('new_table', 1);

		$form->set_submit_text('Create Table');

		return $form;
	}

	// FORM URLS
	public static function
		get_new_table_form_action_url()
	{
		$url = new HTMLTags_URL();
		$url->set_file('/Oedipus_DramaEditorRedirectScript');
		return $url;
	}
	
	public static function
		get_new_table_form_cancel_url()
	{
		$url = new HTMLTags_URL();
		$url->set_file('/Oedipus_DramaEditorPage');
		return $url;
	}

	public function
		render_all_dramas_ul()
	{
		$ul = new HTMLTags_UL();

		$dramas = self::get_all_dramas();

		foreach ($dramas as $drama)
		{
			$li = new HTMLTags_LI();
			$link = new HTMLTags_A($drama->get_name());
			$link->set_href(self::get_drama_editor_url($drama));
			$li->append_tag_to_content($link);
			$ul->append_tag_to_content($li);
		}

		return $ul;
	}

	public function
		get_all_dramas()
	{
		$dbh = DB::m();
		$query = <<<SQL
SELECT 
	*
	FROM
	oedipus_dramas
SQL;

//                print_r($query);exit;
		$result = mysql_query($query, $dbh);

		$dramas = array();
		while($row = mysql_fetch_array($result))
		{
			//                print_r($row);exit;
			$dramas[] = new Oedipus_Drama($row['id'], $row['name'], $row['unique_name']);
		}

		return $dramas;
	}

	// ------------
	// URLS
	// ------------
	public static function
		get_redirect_script_return_url()
	{
		$url = new HTMLTags_URL();
		$url->set_file('/Oedipus_DramaEditorPage');
		return $url;
	}


	public static function
		get_drama_editor_url(Oedipus_Drama $drama = NULL)
	{
		$url = new HTMLTags_URL();
		if ($drama == NULL)
		{
			$url->set_file('/Oedipus_DramaEditorPage');
			return $url;
		}
		else
		{
			$url->set_file('/');
			$url->set_get_variable('oo-page', 1);
			$url->set_get_variable('page-class', 'Oedipus_DramaEditorPage');

			$url->set_get_variable('drama_unique_name', $drama->get_unique_name());

			return $url;
		}
	}

}
?>
