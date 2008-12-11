<?php
/**
 * Oedipus_DramaDBHelper
 *
 * @copyright RFI, 2008-02-18
 * @copyright SANH, 2008-04-11
 */

class
	Oedipus_DramaDBHelper
{
	// PROCESS NEW DRAMA
	public static function
		add_drama($drama_name, $user_id)
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
	added = NOW(),
	created_by_user_id = $user_id
SQL;

		//                print_r($sql);exit;
		$result = mysql_query($sql, $dbh);

		$drama_id = mysql_insert_id($dbh);

		$drama = new Oedipus_Drama(
			$drama_id,
			$drama_name,
		       	$drama_unique_name,
		       	'private'
		);
		//                print_r($drama);exit;
		return $drama;
	}

	public static function
		add_act(Oedipus_Drama $drama, $name = NULL)
	{
		if ($name == NULL) {
			$name = Oedipus_DramaHelper
				::get_next_act_name_for_drama_id($drama->get_id());
		}

		// Add Act to database
		$dbh = DB::m();
		$drama_id = mysql_real_escape_string($drama->get_id(), $dbh);
		$name = mysql_real_escape_string($name, $dbh);

		$sql = <<<SQL
INSERT INTO
	oedipus_acts
SET
	name = '$name',
	added = NOW(),
	drama_id = '$drama_id'
SQL;

//                                print_r($sql);exit;
		$result = mysql_query($sql, $dbh);

		$act_id = mysql_insert_id($dbh);
		$added = date();

		$act = new Oedipus_Act(
			$act_id,
			$act_name,
			$added,
			$drama_id
		);
		//                print_r($act);exit;
	
		return $act;
	}

	public static function
		add_scene(Oedipus_Act $act, $name = NULL)
	{
		if ($name == NULL) {
			$name = Oedipus_DramaHelper
				::get_next_scene_name_for_act_id($act->get_id());
		}


		// ADD scene TO DATABASE
		$dbh = DB::m();
		$act_id = mysql_real_escape_string($act->get_id(), $dbh);
		$name = mysql_real_escape_string($name, $dbh);

		$sql = <<<SQL
INSERT INTO
	oedipus_scenes
SET
	name = '$name',
	added = NOW(),
	act_id = '$act_id'
SQL;

		//                print_r($sql);exit;
		$result = mysql_query($sql, $dbh);

		$scene_id = mysql_insert_id($dbh);
		$added = date();

		$scene = new Oedipus_Scene(
			$scene_id,
			$scene_name,
			$added,
			$act_id
		);
		//                print_r($scene);exit;
		return $scene;
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
				$stated_intention_id,
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
							$position_id,
							$position_position,
							$position_doubt,
							$position_actor
						);
				}

				$option->add_positions($positions);
			}
		}

		$table = new Oedipus_Table($table_id, $drama_id, $table_name, $actors);
		//                print_r($table);exit;

		//
		// Update Drama Object with new Table
		//                $drama->add_table($table);
		return $table;
	}

	public function
		set_drama_status($drama_id, $status)
	{
		$drama_status_is_valid = TRUE; //Implement this!

		if ($drama_status_is_valid) 
		{
			$dbh = DB::m();

			$sql = <<<SQL
UPDATE
	oedipus_dramas
SET
	status = '$status'
WHERE
	id = $drama_id
SQL;

			//                        print_r($sql);exit;
			mysql_query($sql, $dbh);
		} 
		else 
		{
			//                        throw new Database_CRUDException("'$href' is not a validate HREF!");
		}
	}

	public function
		add_child_frame_as_duplicate_of_parent(
			Oedipus_Scene $scene,
			$parent_frame_id
		)
	{
		$parent_frame = $scene->get_frame($parent_frame_id);
		$frame_name = Oedipus_DramaHelper::get_incremented_name($parent_frame->get_name());
		//print_r($frame_name);exit;

		$scene_id = $scene->get_id();
		// ADD TABLE TO DATABASE
		$dbh = DB::m();
		$sql = <<<SQL
INSERT INTO
	oedipus_frames
SET
	name = '$frame_name',
	scene_id = $scene_id,
	added = NOW()
SQL;

		//print_r($sql);exit;
		$result = mysql_query($sql, $dbh);

		$frame_id = mysql_insert_id($dbh);

		/*
		 *Set Frame Name
		 */
		$characters = array();
		$parent_characters = array();

		$i = 0;
		foreach ($parent_frame->get_characters() as $parent_character) {
			// ADD Duplicate ACTOR tO DATABASE
			$character_name = $parent_character->get_name();
			$character_color = $parent_character->get_color();
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

			$character = new Oedipus_Character(
				$character_id, $character_name, $character_color
			);
			$characters[$i] = $character;
			$parent_characters[$i] = $parent_character;
			$i++;
		}

		//print_r($parent_characters);exit;
		$i = 0;
		foreach ($parent_characters[$i]->get_options() as $parent_option) {

			$parent_si = $parent_option->get_stated_intention();
			//print_r($parent_si);exit;
			// ADD DEFAULT stated_intention tO DATABASE
			$stated_intention_position = $parent_si->get_tile();
			$stated_intention_doubt = $parent_si->get_doubt();
			$sql3 = <<<SQL
INSERT INTO
	oedipus_stated_intentions
SET
	position = '$stated_intention_position',
	doubt = '$stated_intention_doubt'
SQL;

			//print_r($sql3);exit;
			$result3 = mysql_query($sql3, $dbh);
			$stated_intention_id = mysql_insert_id($dbh);


			// ADD DEFAULT option tO DATABASE
			$character_id = $characters[$i]->get_id();
			$option_name = $parent_option->get_name();
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


			$characters[$i]->add_option($characters_option);
			$i ++;
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

		//__construct($id, $name, $added, $scene_id, $characters
		// Add Frame to Tree
		Oedipus_FrameTreeHelper::add_frame_to_tree($frame, $parent_frame_id);

		return $frame;
	}

	public function
		add_frame(
			Oedipus_Scene $scene,
			$frame_name,
			$parent_frame_id
		)
	{
		if ($parent_frame_id != 0) {
			return self
				::add_child_frame_as_duplicate_of_parent(
					$scene, $parent_frame_id
				);
		} 

		/*
		 *Set Frame Name
		 */
		if (
			!isset($frame_name)
		) {
			$frame_name = 'New Frame';
		}

		$scene_id = $scene->get_id();
		// ADD TABLE TO DATABASE
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

}
?>
