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
	public function
		get_explanation_for_position(
			Oedipus_Character $character,
		       	Oedipus_Position $position,
			Oedipus_Option $option
		)
	{
                /*
		 *Set the Phrases
                 */
		$owner_of_position = $position->get_character()->get_name(); 
		$owner_of_position_is_plural 
			= self::is_plural($owner_of_position);
		if ($owner_of_position == $character->get_name()) {
			if ($owner_of_position_is_plural) {
				$owner_of_option = ' they ';
			} else {
				$owner_of_option = ' he/she ';
			}
		}
		else {
			$owner_of_option = $character->get_name();
		}
		$should_or_shouldnt = $position->get_position_str(); 

                /*
		 *Construct the sentence
                 */
		$explanation = '';
		$explanation .= $owner_of_position . ' ';
		if ($owner_of_position_is_plural) {
			$explanation .= 'say ';
		} else {
			$explanation .= 'says ';
		}
		$explanation .= 'that ' . $owner_of_option . ' ';
		$explanation .= $should_or_shouldnt . ' ';
		$explanation .= $option->get_name() . '.';
		return $explanation;
	}

	public function
		get_explanation_for_stated_intention(
			Oedipus_Character $character,
		       	Oedipus_StatedIntention $stated_intention,
			Oedipus_Option $option
		)
	{
                /*
		 *Set the Phrases
		 */
		$owner_of_option = $character->get_name(); 
		$owner_of_option_is_plural 
			= self::is_plural($owner_of_option);
		if ($owner_of_option_is_plural) {
			$pronoun = ' they ';
		} else {
			$pronoun = ' he/she ';
		}
		$will_or_wont = $stated_intention->get_stated_intention_str(); 

                /*
		 *Construct the sentence
                 */
		$explanation = '';
		$explanation .= $owner_of_option . ' ';
		if ($owner_of_option_is_plural) {
			$explanation .= 'have ';
		} else {
			$explanation .= 'has ';
		}
		$explanation .= 'stated that ' . $pronoun . ' ';
		$explanation .= $will_or_wont . ' ';
		$explanation .= $option->get_name() . '.';
		return $explanation;
	}

	public static function
		is_plural($str)
	{
		if (substr($str, -1) == 's') {
			return TRUE;
		}
		return FALSE;
	}

	public static function
		set_scene_name(
			$scene_id,
			$scene_name
		)
	{
		$scene_name_is_valid = TRUE; //Implement this!

		if ($scene_name_is_valid) {
			$dbh = DB::m();

			$sql = <<<SQL
UPDATE
	oedipus_scenes
SET
	name = '$scene_name'
WHERE
	id = $scene_id
SQL;

			//                        print_r($sql);exit;
			mysql_query($sql, $dbh);
		} else {
			//                        throw new Database_CRUDException("'$href' is not a validate HREF!");
		}
	}

	public static function
		get_scene_notes_div(Oedipus_Scene $scene)
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', 'notes');
		$div->set_attribute_str('id', 'scene');

                /*
		 * Put A Textbox for the heading if scene is editable,
		 * Put a <h3> if it isn't
                 */
		if ($scene->is_editable()) {
			$name_div = new HTMLTags_Div();
			$name_div->set_attribute_str('id', 'name-form');
			$name_div->append(
				new Oedipus_EditSceneNameHTMLForm($scene)
			);
			$div->append($name_div);
		}
		else {
	
			$div->append(
				$heading = new HTMLTags_Heading(3, $scene->get_name())
			);
		}

                /*
		 * Put a Textbox for the Note, if frame is editable,
		 * Put the note in a <pre> if it isn't
                 */
		try
		{
			if ($scene->is_editable()) {

				$drama_id = Oedipus_DramaHelper::get_drama_id_for_scene_id($scene->get_id());

				$note_div = new HTMLTags_Div();
				$note_div->set_attribute_str('id', 'note-form');
				$note_div->set_attribute_str('class', 'user-html');
				if (Oedipus_NotesHelper::has_scene_got_note($scene->get_id()))
				{
					$note = Oedipus_NotesHelper
						::get_note_by_scene_id($scene->get_id());

					$note_div->append(self::get_note_preview_div($note));

					$note_div->append(
						new Oedipus_EditSceneNoteHTMLForm(
							$note, $drama_id, $scene->get_id()
						)
					);
				}
				else {
					$note_div->append(
						new Oedipus_AddSceneNoteHTMLForm($drama_id, $scene)
					);
				}
				$div->append($note_div);
			}
			else {
				$note = Oedipus_NotesHelper::get_note_by_scene_id($scene->get_id());
				$user_html_div = new HTMLTags_Div();
				$user_html_div->set_attribute_str('class', 'user-html');
					
				$user_html_div->append($note->get_note_text_html());
				$div->append($user_html_div);
			}
		}
		catch (Exception $e)
		{
			throw new Exception('Failed to retrieve note');
		}


		return $div;
	}
	public static function
		get_note_preview_div(Oedipus_Note $note)
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', 'note-preview');
		$div->append($note->get_note_text_html());
		return $div;
	}


	public static function
		get_new_drama_name()
	{
		return 'New Drama';
	}

	public static function
		get_next_act_name_for_drama_id($drama_id)
	{
		$last_act_name = self::get_latest_act_name_for_drama_id($drama_id);

		$act_name = '';
		if (strlen($last_act_name))
		{
			$act_name = self
				::get_incremented_name($last_act_name);
		}
		else
		{
			$act_name = 'Act 1';
		}
		return $act_name;
	}


	public static function
		get_next_scene_name_for_act_id($act_id)
	{
		$last_scene_name = self::get_latest_scene_name_for_act_id($act_id);

		$scene_name = '';
		if (strlen($last_scene_name))
		{
			$scene_name = self
				::get_incremented_name($last_scene_name);
		}
		else
		{
			$scene_name = 'Scene 1';
		}
		return $scene_name;
	}

	public static function
		get_incremented_name($name)
	{
		/**
		 * See if there is a number
		 * at the end of the last scene name.
		 * If so, use that to make the new name
		 */

		$new_name = '';
		$next_no = 0;
		$last_no = 0;
		preg_match('/[0-9]+$/', $name, $last_no);
		//print_r($last_no);exit;
		if (is_numeric($last_no[0]))
		{
			$next_no = $last_no[0] + 1;
			$new_name = preg_replace('/[0-9]+$/', $next_no, $name);
		}
		else
		{
			/**
			 * Otherwise, just add 1 to the last name
			 */
			$name = trim($name);
			$new_name = $name . ' 1';
		}
		return $new_name;
	}

	public static function
		get_latest_act_name_for_drama_id($drama_id)
	{
		$dbh = DB::m();
		$query = <<<SQL
SELECT 
	oedipus_acts.name
FROM 
	oedipus_acts
WHERE 
	oedipus_acts.drama_id = '$drama_id'
ORDER BY
	oedipus_acts.added DESC
LIMIT
	0, 1
SQL;

//                                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);
		//                                print_r($row);exit;

		return $row['name'];
	}

	public static function
		get_latest_scene_name_for_act_id($act_id)
	{
		$dbh = DB::m();
		$query = <<<SQL
SELECT 
	oedipus_scenes.name
FROM 
	oedipus_scenes
WHERE 
	oedipus_scenes.act_id = '$act_id'
ORDER BY
	oedipus_scenes.added DESC
LIMIT
	0, 1
SQL;

//                                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);
		//                                print_r($row);exit;

		return $row['name'];
	}

	public static function
		get_drama_id_for_scene_id($scene_id)
	{
		$dbh = DB::m();
		$query = <<<SQL
SELECT 
	oedipus_dramas.id
FROM 
	oedipus_dramas, oedipus_acts, oedipus_scenes
WHERE 
	oedipus_scenes.id = '$scene_id'
AND
	oedipus_scenes.act_id = oedipus_acts.id
AND 
	oedipus_acts.drama_id = oedipus_dramas.id
LIMIT
	0, 1
SQL;

//                                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);
		//                                print_r($row);exit;

		return $row['id'];
	}

	public static function
		get_drama_id_for_act_id($act_id)
	{
		$dbh = DB::m();
		$query = <<<SQL
SELECT 
	oedipus_dramas.id
FROM 
	oedipus_dramas, oedipus_acts
WHERE 
	oedipus_acts.id = '$act_id'
AND 
	oedipus_acts.drama_id = oedipus_dramas.id
LIMIT
	0, 1
SQL;

//                                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);
		//                                print_r($row);exit;

		return $row['id'];
	}

	public static function
		get_act_id_for_scene_id($scene_id)
	{
		$dbh = DB::m();
		//retrieve the left and right value of the $root node
		$sql = <<<SQL
SELECT 
	oedipus_scenes.act_id
FROM 
	oedipus_scenes
WHERE 
	oedipus_scenes.id = $scene_id  
SQL;

//                print_r($sql);exit;
		$result = mysql_query($sql, $dbh);
		$row = mysql_fetch_array($result);
		return $row['act_id'];
	}
	public static function
		get_act_id_for_frame_id($frame_id)
	{
		$dbh = DB::m();
		//retrieve the left and right value of the $root node
		$sql = <<<SQL
SELECT 
	oedipus_scenes.act_id
FROM 
	oedipus_scenes, oedipus_frames
WHERE 
	oedipus_frames.id = $frame_id  
AND
	oedipus_scenes.id = oedipus_frames.scene_id
LIMIT
	0, 1
SQL;

               //print_r($sql);exit;
		$result = mysql_query($sql, $dbh);
		$row = mysql_fetch_array($result);
		return $row['act_id'];
	}

	public static function
		get_scene_id_for_frame_id($frame_id)
	{
		$dbh = DB::m();
		//retrieve the left and right value of the $root node
		$sql = <<<SQL
SELECT 
	oedipus_frames.scene_id
FROM 
	oedipus_scenes, oedipus_frames
WHERE 
	oedipus_frames.id = $frame_id  
LIMIT 
	0, 1
SQL;

//                print_r($sql);exit;
		$result = mysql_query($sql, $dbh);
		$row = mysql_fetch_array($result);
		return $row['scene_id'];
	}




	public static function
		get_first_act_id_for_drama_id($drama_id)
	{
		$dbh = DB::m();
		//retrieve the left and right value of the $root node
		$sql = <<<SQL
SELECT 
	oedipus_acts.id
FROM 
	oedipus_acts
WHERE 
	oedipus_acts.drama_id = $drama_id  
ORDER BY
	oedipus_acts.added ASC
LIMIT 0, 1
SQL;

//                print_r($sql);exit;
		$result = mysql_query($sql, $dbh);
		$row = mysql_fetch_array($result);
		return $row['id'];
	}

	public static function
		get_first_scene_id_for_act_id($act_id)
	{
		$dbh = DB::m();
		//retrieve the left and right value of the $root node
		$sql = <<<SQL
SELECT 
	oedipus_scenes.id
FROM 
	oedipus_scenes
WHERE 
	oedipus_scenes.act_id = $act_id  
ORDER BY
	oedipus_scenes.added ASC
LIMIT 0, 1
SQL;

               //print_r($sql);exit;
		$result = mysql_query($sql, $dbh);
		$row = mysql_fetch_array($result);
		return $row['id'];
	}

	public static function
		get_first_scene_id_for_drama_id($drama_id)
	{
		$dbh = DB::m();
		//retrieve the left and right value of the $root node
		$sql = <<<SQL
SELECT 
	oedipus_scenes.id
FROM 
	oedipus_scenes, oedipus_acts
WHERE 
	oedipus_acts.drama_id = $drama_id  
AND
	oedipus_scenes.act_id = oedipus_acts.id
ORDER BY
	oedipus_scenes.added ASC
LIMIT 0, 1
SQL;

               print_r($sql);exit;
		$result = mysql_query($sql, $dbh);
		$row = mysql_fetch_array($result);
		return $row['id'];
	}

	public static function
		get_drama_id_for_frame_id($frame_id)
	{
		$dbh = DB::m();
		$query = <<<SQL
SELECT 
	oedipus_dramas.id
FROM 
	oedipus_dramas, oedipus_acts, oedipus_scenes, oedipus_frames
WHERE 
	oedipus_frames.id = '$frame_id'
AND
	oedipus_frames.scene_id = oedipus_scenes.id
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

	private function
		get_all_dramas_ul()
	{
		return new Oedipus_AllDramasUL();
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
		if ($row == FALSE) {
			throw new Oedipus_DramaNotFoundException('ID ' . $drama_id);
		}

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

				       //print_r($options_query);exit;
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

		//print_r($frame);exit;
		//
		return $frame;
	}

	public function
		get_latest_public_dramas($limit = 5)
	{
		$dbh = DB::m();
		$query = <<<SQL
SELECT 
	*
	FROM
	oedipus_dramas
	WHERE
	status = 'public'
ORDER BY
	added DESC
LIMIT
0, $limit
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

		$result = mysql_query($query, $dbh);
		if ($row = mysql_fetch_array($result)) {
			return self::get_drama_by_id($row['id']);
		}
		else {
			throw new Oedipus_DramaNotFoundException($unique_name);
		}
	}

	public function
		add_frame(
			Oedipus_Scene $scene,
			$frame_name,
			$parent_frame_id
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
		$character_name = 'Wile E. Coyote';
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
			$option_name = 'Chase Road Runner';
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

		// Add Frame to Tree
		Oedipus_FrameTreeHelper::add_frame_to_tree($frame, $parent_frame_id);

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
		get_drama_page_url_for_drama(
			Oedipus_Drama $drama
		)
	{
		return self::get_drama_page_url_for_drama_id($drama->get_id());
	}


	public static function
		get_drama_page_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaPage');
	}

	public static function
		get_drama_page_url_for_drama_id(
			$drama_id
		)
	{
		$url = self::get_drama_page_url();
		$url->set_get_variable('drama_id', $drama_id);

		return $url;
	}

	public static function
		get_edit_drama_page_url_for_drama(
			Oedipus_Drama $drama
		)
	{
		return self::get_edit_drama_page_url_for_drama_id($drama->get_id());
	}

	public static function
		get_edit_drama_page_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditDramaPage');
	}

	public static function
		get_edit_drama_page_url_for_drama_id(
			$drama_id
		)
	{
		$url = self::get_edit_drama_page_url();
		$url->set_get_variable('drama_id', $drama_id);
		return $url;
	}

	public static function
		get_drama_page_url_for_scene_id($scene_id)
	{
		$drama_id = self::get_drama_id_for_scene_id($scene_id);
		$url = self::get_drama_page_url_for_drama_id($drama_id);
		$url->set_get_variable('scene_id', $scene_id);
		return $url;
	}

	public static function
		get_edit_drama_page_url_for_scene_id($scene_id)
	{
		$drama_id = self::get_drama_id_for_scene_id($scene_id);
		return self::get_edit_drama_page_url_for_drama_id($drama_id);
	}

	public static function
		get_frame_view_drama_page_url_for_drama_id($drama_id)
	{
		$scene_id = self::get_first_scene_id_for_drama_id($drama_id);
		$frame_id = Oedipus_FrameTreeHelper::get_root_frame_id_for_scene_id($scene_id);
		$url = self::get_drama_page_url_for_drama_id($drama_id);
		$url->set_get_variable('frame_id', $frame_id);
		return $url;
	}

	public static function
		get_frame_view_drama_page_url_for_scene_id($scene_id)
	{
		$drama_id = self::get_drama_id_for_scene_id($scene_id);
		$frame_id = Oedipus_FrameTreeHelper::get_root_frame_id_for_scene_id($scene_id);
		$url = self::get_drama_page_url_for_drama_id($drama_id);
		$url->set_get_variable('frame_id', $frame_id);
		return $url;
	}

	public static function
		get_drama_page_url_for_act_id($act_id)
	{
		$drama_id = self::get_drama_id_for_act_id($act_id);
		$url = self::get_drama_page_url_for_drama_id($drama_id);
		$url->set_get_variable('act_id', $act_id);
		return $url;
	}

	public static function
		get_edit_frame_drama_page_url_for_frame_id($frame_id)
	{
		$drama_id = self::get_drama_id_for_frame_id($frame_id);
		$url = self::get_drama_page_url_for_drama_id($drama_id);
		$url->set_get_variable('frame_id', $frame_id);
		$url->set_get_variable('edit_frame', '1');
		return $url;
	}

	public static function
		get_share_drama_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url(
				'Oedipus_ShareDramaPage'
			);
	}	

	public static function
		get_share_drama_url_for_drama_id($drama_id)
	{
		$url = self::get_share_drama_url();
		$url->set_get_variable('drama_id', $drama_id);
		return $url;
	}	

	public static function
		get_drama_page_url_for_frame_id($frame_id)
	{
		$drama_id = self::get_drama_id_for_frame_id($frame_id);

		$url = self::get_drama_page_url_for_drama_id($drama_id);
		$url->set_get_variable('frame_id', $frame_id);
		return $url;
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
			return self::get_drama_page_url();
		}
	}

	public static function
		get_add_act_url($drama_id)
	{
		$get_variables = array(
			"add_act" => '1',
			"drama_id" => $drama_id
		);

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditDramaRedirectScript', $get_variables);
	}

	public static function
		get_add_scene_url($act_id)
	{
		$get_variables = array(
			"add_scene" => '1',
			"act_id" => $act_id
		);

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditActRedirectScript', $get_variables);
	}

}

?>

