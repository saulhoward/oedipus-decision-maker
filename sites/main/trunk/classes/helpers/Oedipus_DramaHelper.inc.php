<?php
/**
 * Oedipus_DramaHelper
 *
 * @copyright RFI, 2008-02-18
 * @copyright SANH, 2008-04-11
 */
class
Oedipus_DramaHelper
{
	public static function
		get_drama_id_for_scene_id($scene_id)
	{
		$dbh = DB::m();
		$query = <<<SQL
SELECT 
	oedipus_dramas.id
FROM 
	oedipus_dramas, oedipus_acts, oedipus_scenes, oedipus_frames
WHERE 
	oedipus_frames.scene_id = '$scene_id'
AND
	oedipus_scenes.act_id = oedipus_acts.id
AND 
	oedipus_acts.drama_id = oedipus_dramas.id
SQL;

		//                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);
		//                                print_r($row);exit;

		return $row['id'];
	}

	public static function
		get_drama_div(Oedipus_Drama $drama, $editable = FALSE)
	{
		//print_r($drama);exit;
		$drama_div = new HTMLTags_Div();
		$drama_div->set_attribute_str('class', 'drama');

		/*
		 * SHOW THE ACTS
		 */
		foreach ($drama->get_acts() as $act)
		{
			$drama_div->append(self::get_act_div($act, $editable));
		}

		return $drama_div;
	}

	public static function
		get_act_div(Oedipus_Act $act, $editable = FALSE)
	{
		$act_div = new HTMLTags_Div();
		$act_div->set_attribute_str('class', 'act');

		$act_div->append('<h3>' . $act->get_name() . '</h3>');
		// SHOW THE Scenes
		foreach ($act->get_scenes() as $scene)
		{
			//                        print_r($scene);exit;
			$act_div->append(self::get_scene_div($scene, $editable));
		}

		return $act_div;
	}

	public static function
		get_scene_div(Oedipus_Scene $scene, $editable = FALSE)
	{
		$scene_div = new HTMLTags_Div();
		$scene_div->set_attribute_str('class', 'scene');

		$scene_div->append('<h3>' . $scene->get_name() . '</h3>');
		//SHOW THE frames
		foreach ($scene->get_frames() as $frame)
		{
			$scene_div->append(self::get_frame_div($frame, $editable));
		}

		//Add Frame Form if editable
		if ($editable)
		{
			$scene_div->append(self::get_add_frame_form($scene));
		}

		return $scene_div;
	}

	private function
		get_add_frame_form(Oedipus_Scene $scene)
	{
		return new Oedipus_AddFrameHTMLForm($scene);
	}

	private function
		get_frame_div(Oedipus_Frame $frame, $editable = FALSE)
	{
		$drama_div = new HTMLTags_Div();

		# The left and right column divs
		$left_div = new HTMLTags_Div();
		$left_div->set_attribute_str('class', 'left-column');

		# The frame itself
		$left_div->append_tag_to_content(
			self::get_oedipus_frame_div($frame, $editable)
		);

		# The instructions
		//$left_div->append_tag_to_content(
		//	self::get_drama_page_frame_instructions_div()
		//);

		$drama_div->append_tag_to_content($left_div);

		$right_div = new HTMLTags_Div();
		$right_div->set_attribute_str('class', 'right-column');

		# The notes etc. added here
		$right_div->append_tag_to_content(self::get_frame_notes_div($frame, $editable));

		$drama_div->append_tag_to_content($right_div);

		$clear_div = new HTMLTags_Div();
		$clear_div->set_attribute_str('class', 'clear-columns');
		$drama_div->append_tag_to_content($clear_div);
		return $drama_div;
	}

	private function
		get_oedipus_frame_div(Oedipus_Frame $frame, $editable = FALSE)
	{
		$frame_div = new HTMLTags_Div();
		$frame_div->set_attribute_str('class', 'oedipus-frame');

		$frame_div->append_tag_to_content(self::get_oedipus_html_frame($frame));
		//$frame_div->append_tag_to_content(self::get_oedipus_png_frame($frame));

		$frame_div->append_tag_to_content(
			self::get_oedipus_html_frame_options($frame, $editable)
		);

		return $frame_div;
	}

	private function
		get_oedipus_png_frame(Oedipus_Frame $frame)
	{
		$max_width = 300;
		$max_height = 300;
		$url = new HTMLTags_URL();
		$url->set_file(
			'/frames/images/thumbnails/option-frame-'
			. $frame->get_id()
			. '_' . $max_width . 'x' . $max_height . '.png'
		);
		$img = new HTMLTags_IMG();
		$img->set_src($url);
		return $img;
	}

	private function
		get_oedipus_html_frame(Oedipus_Frame $frame)
	{
		//                print_r($frame);exit;
		# Get a frame that's not editable
		return new Oedipus_FrameHTMLTable($frame, FALSE);
	}

	private function
		get_drama_page_frame_instructions_div()
	{
		$instructions_div = new HTMLTags_Div();
		$instructions_div->set_attribute_str('class', 'instructions');
		$instructions_div->set_attribute_str('id', 'drama-page-frame');

		$db_page = DBPages_SPoE
			::get_filtered_page_section('drama', 'frame-instructions');
		$instructions_div->append_str_to_content($db_page);	

		return $instructions_div;
	}

	private function
		get_all_dramas_ul()
	{
		return new Oedipus_AllDramasUL();
	}

	private function
		get_oedipus_html_frame_options(Oedipus_Frame $frame, $editable = FALSE)
	{
		return new Oedipus_FrameOptionsUL($frame, $editable);
	}

	private function
		get_frame_notes_div(Oedipus_Frame $frame, $editable = FALSE)
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', 'notes');

		$heading = new HTMLTags_Heading(3, $frame->get_name());

		//print_r($frame);exit;
		$div->append_tag_to_content($heading);

		try
		{
			if ($editable) {
				if (isset($_GET['drama_id'])) {
					$drama_id = $_GET['drama_id'];
				}
				else {
					$drama_id = $frame->get_drama_id();
				}

				if (Oedipus_NotesHelper::has_frame_got_note($frame->get_id()))
				{
					$note = Oedipus_NotesHelper
						::get_note_by_frame_id($frame->get_id());
					$div->append(
						new Oedipus_EditFrameNoteHTMLForm($note, $drama_id)
					);
				}
				else {
					$div->append(
						new Oedipus_AddFrameNoteHTMLForm($drama_id, $frame)
					);
				}
			}
			else {
				$note = Oedipus_NotesHelper::get_note_by_frame_id($frame->get_id());
				//print_r($note);exit;
				$div->append_tag_to_content($note->get_note_text_in_pre());
			}
		}
		catch (Exception $e)
		{
			throw new Exception('Failed to retrieve note');
		}


		return $div;
	}

	public function
		get_drama_by_id($drama_id)
	{
		$dbh = DB::m();
		$query = <<<SQL
SELECT 
	*
	FROM
		oedipus_dramas
	WHERE
		id = $drama_id
SQL;

		//                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);
		//                                print_r($row);exit;

		$drama = new Oedipus_Drama(
			$row['id'],
			$row['name'],
			$row['unique_name'],
			$row['added'],
			$row['status']
		);

		// Add the acts to this Drama

		// Get all acts for this drama
		$acts_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_acts
	WHERE
		drama_id = $drama_id
SQL;

		//                                print_r($acts_query);exit;
		$acts_result = mysql_query($acts_query, $dbh);

		// Add the acts to the drama object
		//
		if ($acts_result)
		{
			while($act_result = mysql_fetch_array($acts_result))
			{
				$act_id = $act_result['id'];
				$act = self::get_act_by_id($act_id);

				$drama->add_act($act);
			}
		}

		//                                print_r($drama);exit;
		return $drama;
	}

	public function
		get_act_by_id($act_id)
	{
		$dbh = DB::m();
		$query = <<<SQL
SELECT 
	*
	FROM
		oedipus_acts
	WHERE
		id = $act_id
SQL;

		//                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);
		//                                print_r($row);exit;

		$act = new Oedipus_Act(
			$row['id'],
			$row['name'],
			$row['added'],
			$row['drama_id']
		);

		// Add the scenes to this Act

		// Get all scenes for this drama
		$scenes_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_scenes
	WHERE
		act_id = $act_id
SQL;

		//                                print_r($scenes_query);exit;
		$scenes_result = mysql_query($scenes_query, $dbh);

		// Add the scenes to the drama object
		//
		if ($scenes_result)
		{
			while($scene_result = mysql_fetch_array($scenes_result))
			{
				$scene_id = $scene_result['id'];
				$scene = self::get_scene_by_id($scene_id);

				$act->add_scene($scene);
			}
		}

		return $act;
	}

	public function
		get_scene_by_id($scene_id)
	{
		$dbh = DB::m();
		$query = <<<SQL
SELECT 
	*
	FROM
		oedipus_scenes
	WHERE
		id = $scene_id
SQL;

		//                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);
		//                                                print_r($row);exit;

		$scene = new Oedipus_Scene(
			$row['id'],
			$row['name'],
			$row['added'],
			$row['act_id']
		);

		//                                                print_r($scene);exit;

		// Add the scenes to this Act

		// Get all frames for this drama
		$frames_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_frames
	WHERE
		scene_id = $scene_id
SQL;

		//                print_r($frames_query);exit;
		$frames_result = mysql_query($frames_query, $dbh);
		//                print_r($frames_result);exit;

		// Add the frames to the drama object
		//
		if ($frames_result)
		{

			while($frame_result = mysql_fetch_array($frames_result))
			{
				//                                                print_r($frame_result);exit;
				$frame_id = $frame_result['id'];
				$frame = self::get_frame_by_id($frame_id);
				$scene->add_frame($frame);
			}
		}

		//                                                print_r($scene);exit;
		return $scene;
	}

	public function
		get_frame_by_id($frame_id)
	{
		$dbh = DB::m();
		$frames_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_frames
	WHERE
		id = $frame_id
SQL;

		//                                print_r($query);exit;
		//                                                print_r($row);exit;

		//                print_r($frames_query);exit;
		$frames_result = mysql_query($frames_query, $dbh);
		//                print_r($frames);exit;
		$frame_result = mysql_fetch_array($frames_result);
		// -----------------------------------------------------------------------------
		// Creating a Table
		// -----------------
		// 1.
		// Create the characters,
		// and their options, options have stated intentions

		// For this frame, get the characters
		$frame_id = $frame_result['id'];
		// Get all characters for this drama
		$characters_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_characters
	WHERE
		frame_id = $frame_id
SQL;

		//                print_r($characters_query);exit;
		$characters_result = mysql_query($characters_query, $dbh);
		//                print_r($characters);exit;

		// create an array of characters
		$characters = array();
		while($character_result = mysql_fetch_array($characters_result))
		{
			$character = new Oedipus_Character(
				$character_result['id'],
				$character_result['name'],
				$character_result['color']
			);

			//add the stated intentions to the option object
			//add the options to the character object

			// For this character, get the options
			$character_id = $character_result['id'];
			// Get all characters for this drama
			$options_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_options
	WHERE
		character_id = $character_id
SQL;

			//                print_r($characters_query);exit;
			$options_result = mysql_query($options_query, $dbh);
			//                print_r($characters);exit;

			$options = array();
			while($option_result = mysql_fetch_array($options_result))
			{
				//get the stated intention
				$stated_intention_id = $option_result['stated_intention_id'];
				$stated_intentions_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_stated_intentions
	WHERE
		id = $stated_intention_id
SQL;

				//                print_r($characters_query);exit;
				$stated_intentions_result = mysql_query($stated_intentions_query, $dbh);
				$stated_intention_result = mysql_fetch_array($stated_intentions_result);

				$stated_intention = new Oedipus_StatedIntention(
					$stated_intention_result['id'],
					$stated_intention_result['position'],
					$stated_intention_result['doubt']
				);

				$characters_option = 
					new Oedipus_Option(
						$option_result['id'],
						$option_result['name'],
						$stated_intention
					);

				$character->add_option($characters_option);
			}

			$characters[] = $character;
			//add the positions to the option object
			//
		}

		// 2.
		// create the positions 
		// attached to options for ease of display (?)
		// positions have an character as well as an option
		foreach ($characters as $character)
		{
			foreach ($character->get_options() as $option)
			{
				$positions = array();

				foreach ($characters as $position_character)
				{
					$character_id = $position_character->get_id();
					$option_id = $option->get_id();
					// Get all characters for this drama
					$positions_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_positions
	WHERE
		character_id = $character_id
AND
		option_id = $option_id
SQL;

					//                print_r($characters_query);exit;
					$positions_result = mysql_query($positions_query, $dbh);
					//                print_r($characters);exit;
					$position_result = mysql_fetch_array($positions_result);

					$positions[$position_character->get_id()] =
						new Oedipus_Position(
							$position_result['id'],
							$position_result['position'],
							$position_result['doubt'],
							$position_character
						);
				}

				$option->add_positions($positions);
			}
		}

		$frame = new Oedipus_Frame(
			$frame_result['id'],
			$frame_result['name'],
			$frame_result['added'],
			$frame_result['scene_id'],
			$characters
		);

		//                                                print_r($frame);exit;
		//
		return $frame;
	}

	public function
		get_all_dramas_for_user($user_id)
	{
		$dbh = DB::m();
		$query = <<<SQL
SELECT 
	*
	FROM
	oedipus_dramas
	WHERE
	created_by_user_id = $user_id
SQL;

		//                print_r($query);exit;
		$result = mysql_query($query, $dbh);

		$dramas = array();
		while($row = mysql_fetch_array($result))
		{
			//                print_r($row);exit;
			$dramas[] = new Oedipus_Drama(
				$row['id'],
				$row['name'],
				$row['unique_name'],
				$row['added'],
				$row['status']
			);
		}

		return $dramas;
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
			$dramas[] = new Oedipus_Drama(
				$row['id'],
				$row['name'],
				$row['unique_name'],
				$row['added'],
				$row['status']
			);
		}

		return $dramas;
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

		return self::get_drama_by_id($row['id']);
	}

	public function
		add_frame(
			Oedipus_Scene $scene,
			$frame_name
		)
	{
		// ADD TABLE TO DATABASE
		$scene_id = $scene->get_id();
		$dbh = DB::m();
		$sql = <<<SQL
INSERT INTO
	oedipus_frames
SET
	name = '$frame_name',
	scene_id = $scene_id,
	added = NOW()
SQL;

		//                print_r($sql);exit;
		$result = mysql_query($sql, $dbh);

		$frame_id = mysql_insert_id($dbh);

		// ADD DEFAULT ACTOR tO DATABASE
		$character_name = 'First Character';
		$character_color = 'red';
		$sql2 = <<<SQL
INSERT INTO
	oedipus_characters
SET
	name = '$character_name',
	color = '$character_color',
	frame_id = $frame_id,
	added = NOW()
SQL;

		//                print_r($sql);exit;
		$result2 = mysql_query($sql2, $dbh);
		$character_id = mysql_insert_id($dbh);

		$character = new Oedipus_Character($character_id, $character_name, $character_color);
		$characters = array();
		$characters[] = $character;

		foreach ($characters as $character)
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
	character_id = $character_id,
	stated_intention_id = $stated_intention_id,
	added = NOW()
SQL;

			//                print_r($sql);exit;
			$result4 = mysql_query($sql4, $dbh);
			$option_id = mysql_insert_id($dbh);

			$stated_intention = new Oedipus_StatedIntention(
				$stated_intention_id,
				$stated_intention_position,
				$stated_intention_doubt
			);

			$characters_option = 
				new Oedipus_Option(
					$option_id,
					$option_name,
					$stated_intention
				);


			$character->add_option($characters_option);
		}

		// Create default positions

		foreach ($characters as $character)
		{
			foreach ($character->get_options() as $option)
			{
				$positions = array();

				foreach ($characters as $position_character)
				{

					// ADD DEFAULT position tO DATABASE
					$position_position = '1';
					$position_doubt = '';
					$option_id = $option->get_id();
					$character_id = $position_character->get_id();
					$sql5 = <<<SQL
INSERT INTO
	oedipus_positions
SET
	position = '$position_position',
	doubt = '$position_doubt',
	option_id = $option_id,
	character_id = $character_id
SQL;

					//                                        print_r($sql5);exit;
					$result5 = mysql_query($sql5, $dbh);
					$position_id = mysql_insert_id($dbh);

					$positions[$position_character->get_name()] =
						new Oedipus_Position(
							$position_id,
							$position_position,
							$position_doubt,
							$position_character
						);
				}

				$option->add_positions($positions);
			}
		}

		$frame = new Oedipus_Frame($frame_id, $frame_name, date(), $scene_id, $characters);

		//__construct($id, $name, $added, $scene_id, $characters)
		//                print_r($frame);exit;

		return $frame;
	}

	public static function
		get_latest_frames_div()
	{
                /*
		 * This is a bad idea really, cos you shouldnt just show everyone's
		 * frames regardless of who owns them, just for now
                 */
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', 'frame_thumbnail_list');

		$heading = new HTMLTags_Heading(3, 'Latest Frames');

		$div->append_tag_to_content($heading);

		$ul = new HTMLTags_UL();

		$frames = Oedipus_FrameHelper
			::get_latest_option_frames(4);

		foreach ($frames as $frame)
		{
			$li = new HTMLTags_LI();
			$a = Oedipus_FrameImageHelper
				::get_frame_png_thumbnail_img_a($frame);
			$li->append_tag_to_content($a);
			$ul->append_tag_to_content($li);
		}

		$div->append_tag_to_content($ul);
		return $div;
	}

	// ------------
	// URLS
	// ------------

	public static function
		get_drama_url(Oedipus_Drama $drama = NULL)
	{
		return self::get_drama_page_url($drama);
	}

	public static function
		get_drama_page_url(
			Oedipus_Drama $drama = NULL
		)
	{
		if (isset($drama)) {
			return PublicHTML_URLHelper
				::get_oo_page_url(
					'Oedipus_DramaPage',
					array(
						'drama_id' => $drama->get_id()
					)
				);
		} else {
			return PublicHTML_URLHelper
				::get_oo_page_url('Oedipus_DramaPage');
		}
	}

	public static function
		get_drama_page_url_for_drama_id(
			$drama_id
		)
	{
		return PublicHTML_URLHelper
			::get_oo_page_url(
				'Oedipus_DramaPage',
				array(
					'drama_id' => $drama_id
				)
			);
	}

	public static function
		get_edit_drama_page_url(
			Oedipus_Drama $drama = NULL
		)
	{
		if (isset($drama)) {
			return PublicHTML_URLHelper
				::get_oo_page_url(
					'Oedipus_EditDramaPage',
					array(
						'drama_id' => $drama->get_id()
					)
				);
		} else {
			return PublicHTML_URLHelper
				::get_oo_page_url('Oedipus_EditDramaPage');
		}
	}

	public static function
		get_edit_drama_page_url_for_drama_id(
			$drama_id
		)
	{
		return PublicHTML_URLHelper
			::get_oo_page_url(
				'Oedipus_EditDramaPage',
				array(
					'drama_id' => $drama_id
				)
			);
	}

	public static function
		get_drama_page_url_for_scene_id($scene_id)
	{
		$drama_id = self::get_drama_id_for_scene_id($scene_id);
		return self::get_drama_page_url_for_drama_id($drama_id);
	}

	public static function
		get_edit_drama_page_url_for_scene_id($scene_id)
	{
		$drama_id = self::get_drama_id_for_scene_id($scene_id);
		return self::get_edit_drama_page_url_for_drama_id($drama_id);
	}

	public static function
		get_mod_rewrite_drama_page_url(
			Oedipus_Drama $drama = NULL
		)
	{
		if (isset($drama)) {
			$url = new HTMLTags_URL();
			$url->set_file('/dramas/'. $drama->get_unique_name());
			return $url;
		} else {
			return PublicHTML_URLHelper
				::get_oo_page_url('Oedipus_DramaPage');
		}
	}
}

?>

