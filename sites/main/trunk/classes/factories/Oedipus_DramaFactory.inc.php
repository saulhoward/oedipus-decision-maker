<?php
/**
 ** Oedipus_DramaFactory
 **
 ** @copyright SANH, 2008-11-28
 **/

class
Oedipus_DramaFactory
{
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
	
	/**
	 * Get the frame object.
	 *
	 * We should use a select with a few joins.
	 * See http://oedipus-decision-maker.googlecode.com/svn/sites/main/trunk/sql/useful-queries/select-frame.sql
	 *
	 * The select should probably also be made into a view.
	 */
	public function
		get_frame_by_id($frame_id)
	{
		//print_r($frame_id);exit;
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

		return $frame;
	}
}
?>

