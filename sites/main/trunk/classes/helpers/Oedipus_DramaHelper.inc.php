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
		get_drama_div(Oedipus_Drama $drama)
	{
		$drama_div = new HTMLTags_Div();
		$drama_div->set_attribute_str('class', 'drama');

		// SHOW THE ACTS
		foreach ($drama->get_acts() as $act)
		{
			$drama_div->append(self::get_act_div($act));
		}

		return $drama_div;
	}

	public static function
		get_act_div(Oedipus_Act $act)
	{
		$act_div = new HTMLTags_Div();
		$act_div->set_attribute_str('class', 'act');

		$act_div->append('<h3>' . $act->get_name() . '</h3>');
		// SHOW THE Scenes
		foreach ($act->get_scenes() as $scene)
		{

//                        print_r($scene);exit;
			$act_div->append(self::get_scene_div($scene));
		}

		return $act_div;
	}

	public static function
		get_scene_div(Oedipus_Scene $scene)
	{
		$scene_div = new HTMLTags_Div();
		$scene_div->set_attribute_str('class', 'scene');

		$scene_div->append('<h3>' . $scene->get_name() . '</h3>');
		// SHOW THE frames
		foreach ($scene->get_frames() as $frame)
		{
			$scene_div->append(self::get_frame_div($frame));
		}

		return $scene_div;
	}

	private function
		get_frame_div(Oedipus_Frame $frame)
	{
		$drama_div = new HTMLTags_Div();

		# The left and right column divs
		$left_div = new HTMLTags_Div();
		$left_div->set_attribute_str('class', 'left-column');

		# The frame itself
		$left_div->append_tag_to_content(
			self::get_oedipus_frame_div($frame)
		);

		# The instructions
		//$left_div->append_tag_to_content(
		//	self::get_drama_page_frame_instructions_div()
		//);

		$drama_div->append_tag_to_content($left_div);

		$right_div = new HTMLTags_Div();
		$right_div->set_attribute_str('class', 'right-column');

		# The notes etc. added here
		$right_div->append_tag_to_content(self::get_frame_notes_div($frame));

		$drama_div->append_tag_to_content($right_div);

		$clear_div = new HTMLTags_Div();
		$clear_div->set_attribute_str('class', 'clear-columns');
		$drama_div->append_tag_to_content($clear_div);
		return $drama_div;
	}

	private function
		get_oedipus_frame_div(Oedipus_Frame $frame)
	{
		$frame_div = new HTMLTags_Div();
		$frame_div->set_attribute_str('class', 'oedipus-frame');

		$frame_div->append_tag_to_content(self::get_oedipus_html_frame($frame));
		//$frame_div->append_tag_to_content(self::get_oedipus_png_frame($frame));

		$frame_div->append_tag_to_content(
			self::get_oedipus_html_frame_options($frame)
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
		# Get a frame that's not ediframe
		return new Oedipus_OedipusHTMLframe($frame, FALSE);
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
		return new Oedipus_OedipusAllDramasUL();
	}

	private function
		get_oedipus_html_frame_options(Oedipus_Frame $frame)
	{
		return new Oedipus_OedipusframeOptionsUL($frame, FALSE);
	}

	private function
		get_frame_notes_div(Oedipus_Frame $frame)
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', 'notes');

		$heading = new HTMLTags_Heading(3, $frame->get_name());
		$div->append_tag_to_content($heading);

		try
		{
			$note = Oedipus_NotesHelper::get_note_by_frame_id($frame->get_id());
			$div->append_tag_to_content($note->get_note_text_in_pre());
		}
		catch (Exception $e)
		{
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
//                print_r($acts_result);exit;

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

		return $scene;
	}

	public function
		get_frame_by_id($frame_id)
	{
		$dbh = DB::m();
		$query = <<<SQL
SELECT 
	*
	FROM
		oedipus_frames
	WHERE
		id = $frame_id
SQL;

		//                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);
//                                                print_r($row);exit;

		$frame = new Oedipus_Frame(
			$row['id'],
			$row['name'],
			$row['added'],
			$row['scene_id']
		);
		return $frame;
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

	// ------------
	// URLS
	// ------------

	public static function
		get_drama_url(Oedipus_Drama $drama = NULL)
	{
#		if ($drama == NULL)
#		{
#			return PublicHTML_URLHelper
#				::get_oo_page_url('Oedipus_DramaPage');
#		}
#		else
#		{
#			$url = new HTMLTags_URL();
#			$url->set_file('/dramas/'. $drama->get_unique_name());
#//                        $url->set_get_variable('oo-page', 1);
#//                        $url->set_get_variable('page-class', 'Oedipus_DramaEditorPage');
#
#//                        $url->set_get_variable('drama_unique_name', );
#
#			return $url;
#		}
		
		return Oedipus_DramasHelper
			::get_view_page_url($drama);
	}

}
?>
