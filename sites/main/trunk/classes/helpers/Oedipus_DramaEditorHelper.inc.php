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
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorRedirectScript');
	}

	public static function
		get_new_drama_form_cancel_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorPage');
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
		$name = self::string_for_url($name);

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
		string_for_url($strIn) 
	{
		//Function from darrenG at http://www.webmasterworld.com/php/3413526.htm
		//
		$strOut = '';
		$allowed = '/[^a-zA-Z0-9 ]/';
		$strOut = $strIn;

		// only alphanum and spaces allowed
		$strOut = preg_replace($allowed, '', $strOut);

		// swap spaces for _ (changed to delete spaces)
		// $strOut = str_replace(' ', '_', $strOut);
		$strOut = str_replace(' ', '', $strOut);
		$strOut = trim($strOut);

		// make lower case for consistancy
		$strOut = strtolower($strOut);

		return $strOut;
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

		//                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);
		//                                print_r($row);exit;

		$drama = new Oedipus_Drama($row['id'], $row['name'], $row['unique_name']);

		// Add the tables to the Drama
		$drama_id = $drama->get_id();
		// Get all tables for this drama
		$tables_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_tables
	WHERE
		drama_id = $drama_id
SQL;

//                                print_r($tables_query);exit;
		$tables_result = mysql_query($tables_query, $dbh);
//                print_r($tables_result);exit;

		// Add the tables to the drama object
		//
		if ($tables_result)
		{
			while($table_result = mysql_fetch_array($tables_result))
			{
				$table_id = $table_result['id'];
				$table = Oedipus_TableCreationHelper::get_oedipus_table_by_id($table_id);
				$drama->add_table($table);
			}
		}
		return $drama;
	}

	public function
		render_oedipus_html_drama(Oedipus_Drama $drama)
	{
		$drama_div = new HTMLTags_Div();

		// SHOW THE TABLES
		foreach ($drama->get_tables() as $table)
		{
			$table_div = new HTMLTags_Div();
			$table_div->set_attribute_str('class', 'oedipus-table');

			$html_table = 
				Oedipus_TableCreationHelper::get_oedipus_html_table($table);
			$table_div->append_tag_to_content($html_table);

			$html_table_options = 
				Oedipus_TableCreationHelper::get_oedipus_html_table_options($table);
			$table_div->append_tag_to_content($html_table_options);
			
			$drama_div->append_tag_to_content($table_div);

		}

		// CREATE TABLE FORM
		$drama_div->append_tag_to_content(self::render_html_new_table_form($drama));

		return $drama_div;
	}

	public static function
		render_html_new_table_form(Oedipus_Drama $drama)
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
		$form->add_hidden_input('drama_unique_name', $drama->get_unique_name());

		$form->set_submit_text('Create Table');

		return $form;
	}

	// FORM URLS
	public static function
		get_new_table_form_action_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorRedirectScript');
	}

	public static function
		get_new_table_form_cancel_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorPage');
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

	public function
		add_table(
			Oedipus_Drama $drama,
			$table_name
		)
	{
		// ADD TABLE TO DATABASE
		$drama_id = $drama->get_id();
		$dbh = DB::m();
		$sql = <<<SQL
INSERT INTO
	oedipus_tables
SET
	name = '$table_name',
	drama_id = $drama_id,
	added = NOW()
SQL;

		//                print_r($sql);exit;
		$result = mysql_query($sql, $dbh);

		$table_id = mysql_insert_id($dbh);

		// ADD DEFAULT ACTOR tO DATABASE
		$actor_name = 'First Actor';
		$actor_color = 'red';
		$sql2 = <<<SQL
INSERT INTO
	oedipus_actors
SET
	name = '$actor_name',
	color = '$actor_color',
	table_id = $table_id,
	added = NOW()
SQL;

		//                print_r($sql);exit;
		$result2 = mysql_query($sql2, $dbh);
		$actor_id = mysql_insert_id($dbh);

		$actor = new Oedipus_Actor($actor_id, $actor_name, $actor_color);
		$actors = array();
		$actors[] = $actor;

		foreach ($actors as $actor)
		{

			// ADD DEFAULT stated_intention tO DATABASE
			$stated_intention_position = '1';
			$stated_intention_doubt = '';
			$sql3 = <<<SQL
INSERT INTO
	oedipus_stated_intentions
SET
	position = '$stated_intention_position',
	doubt = '$stated_intention_doubt'
SQL;

			//                print_r($sql);exit;
			$result3 = mysql_query($sql3, $dbh);
			$stated_intention_id = mysql_insert_id($dbh);


			// ADD DEFAULT option tO DATABASE
			$option_name = 'First Option';
			$sql4 = <<<SQL
INSERT INTO
	oedipus_options
SET
	name = '$option_name',
	actor_id = $actor_id,
	stated_intention_id = $stated_intention_id,
	added = NOW()
SQL;

			//                print_r($sql);exit;
			$result4 = mysql_query($sql4, $dbh);
			$option_id = mysql_insert_id($dbh);

			$stated_intention = new Oedipus_StatedIntention(
				$stated_intention_position,
				$stated_intention_doubt
			);

			$actors_option = 
				new Oedipus_Option(
					$option_id,
					$option_name,
					$stated_intention
				);


			$actor->add_option($actors_option);
		}

		// Create default positions

		foreach ($actors as $actor)
		{
			foreach ($actor->get_options() as $option)
			{
				$positions = array();

				foreach ($actors as $position_actor)
				{

					// ADD DEFAULT position tO DATABASE
					$position_position = '1';
					$position_doubt = '';
					$option_id = $option->get_id();
					$actor_id = $position_actor->get_id();
					$sql5 = <<<SQL
INSERT INTO
	oedipus_positions
SET
	position = '$position_position',
	doubt = '$position_doubt',
	option_id = $option_id,
	actor_id = $actor_id
SQL;

					//                                                        print_r($sql5);exit;
					$result5 = mysql_query($sql5, $dbh);
					$position_id = mysql_insert_id($dbh);

					$positions[$position_actor->get_name()] =
						new Oedipus_Position(
							$position_position,
							$position_doubt,
							$position_actor
						);
				}

				$option->add_positions($positions);
			}
		}

		$table = new Oedipus_Table($table_id, $table_name, $actors);
		//                print_r($table);exit;

		//
		// Update Drama Object with new Table
		//                $drama->add_table($table);
		return $table;
	}

	// ------------
	// URLS
	// ------------
	public static function
		get_redirect_script_return_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorPage');
	}


	public static function
		get_drama_editor_url(Oedipus_Drama $drama = NULL)
	{
		if ($drama == NULL)
		{
			return PublicHTML_URLHelper
				::get_oo_page_url('Oedipus_DramaEditorPage');
		}
		else
		{
			$url = new HTMLTags_URL();
			$url->set_file('/');
			$url->set_get_variable('oo-page', 1);
			$url->set_get_variable('page-class', 'Oedipus_DramaEditorPage');

			$url->set_get_variable('drama_unique_name', $drama->get_unique_name());

			return $url;
		}
	}

}
?>