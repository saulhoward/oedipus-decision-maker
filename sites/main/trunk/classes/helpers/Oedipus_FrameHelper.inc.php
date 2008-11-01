<?php
/**
 * Oedipus_FrameHelper
 *
 * @copyright RFI, 2008-02-18
 * @copyright SANH, 2008-04-19
 */

class
Oedipus_FrameHelper
{
	public static function
		get_frame_by_id($frame_id)
	{
		$dbh = DB::m();
		// Get the frame
		$frames_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_frames
	WHERE
		id = $frame_id
SQL;

		//                print_r($frames_query);exit;
		$frames_result = mysql_query($frames_query, $dbh);
		//                print_r($frames);exit;
		$frame_result = mysql_fetch_array($frames_result);
		// -----------------------------------------------------------------------------
		// Creating a frame
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
				$character_result['id'], $character_result['name'], $character_result['color']
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
			$frame_result['drama_id'],
			$frame_result['name'],
			$characters
		);
		// DEBUG
		// print_r($frame->get_characters());exit;

		return $frame;
	}

	public function
		get_latest_option_frames($no_of_frames)
	{
		$dbh = DB::m();
		// Get the frame
		$sql = <<<SQL
SELECT 
	id
FROM 
	`oedipus_frames`
ORDER BY 
	`oedipus_frames`.`added` DESC
LIMIT 
	0 , $no_of_frames
SQL;

		$results = mysql_query($sql, $dbh);
		//print_r($sql);exit;

		// create an array of characters
		$frames = array();
		while($frame_id = mysql_fetch_array($results))
		{
			$frame = self::get_frame_by_id($frame_id['id']);
			$frames[] = $frame;
		}

		//print_r($frames);exit;
		return $frames;
	}

	/* 
	 * Functions for updating and editing frame values
	 *
	 */

	public static function
		set_frame_name(
			$frame_id,
			$frame_name
		)
	{
		$frame_name_is_valid = TRUE; //Implement this!

		if ($frame_name_is_valid) 
		{
			$dbh = DB::m();

			$sql = <<<SQL
UPDATE
	oedipus_frames
SET
	name = '$frame_name'
WHERE
	id = $frame_id
SQL;

			//                        print_r($sql);exit;
			mysql_query($sql, $dbh);
		} 
		else 
		{
			//                        throw new Database_CRUDException("'$href' is not a validate HREF!");
		}
	}

	public static function
		set_option_name(
			$option_id,
			$option_name
		)
	{
		$option_name_is_valid = TRUE; //Implement this!

		if ($option_name_is_valid) 
		{
			$dbh = DB::m();

			$sql = <<<SQL
UPDATE
	oedipus_options
SET
	name = '$option_name'
WHERE
	id = $option_id
SQL;

			//                        print_r($sql);exit;
			mysql_query($sql, $dbh);
		} 
		else 
		{
			//                        throw new Database_CRUDException("'$href' is not a validate HREF!");
		}
	}


	public static function
		add_character(
			$character_name,
			$frame_id,
			$character_color
		)
	{
		$character_data_is_valid = TRUE; //Implement this!

		if ($character_data_is_valid) 
		{
			$frame = self::get_oedipus_frame_by_id($frame_id);

			$dbh = DB::m();

			// Create the character

			$sql = <<<SQL
INSERT INTO
	oedipus_characters
SET
	name = '$character_name',
	frame_id = '$frame_id',
	color = '$character_color',
	added = NOW()
SQL;

			//                        print_r($sql);exit;
			mysql_query($sql, $dbh);
			$character_id = mysql_insert_id($dbh);

			// Create default positions
			// for all options in the frame

			$frame_characters = $frame->get_characters();
			foreach ($frame_characters as $frame_character)
			{
				foreach ($frame_character->get_options() as $option)
				{
						// ADD DEFAULT position tO DATABASE
						$position_position = '1';
						$position_doubt = '';
						$option_id = $option->get_id();
						$sql5 = <<<SQL
INSERT INTO
	oedipus_positions
SET
	position = '$position_position',
	doubt = '$position_doubt',
	option_id = $option_id,
	character_id = $character_id
SQL;

						//                                                        print_r($sql5);exit;
						$result5 = mysql_query($sql5, $dbh);
				}
			}
		} 
		else 
		{
			//                        throw new Database_CRUDException("'$href' is not a validate HREF!");
		}
	}


	public static function
		add_option(
			$option_name,
			$character_id,
			$frame_id
		)
	{
		$option_data_is_valid = TRUE; //Implement this!

		if ($option_data_is_valid) 
		{
			$frame = self::get_oedipus_frame_by_id($frame_id);

			$dbh = DB::m();

			// Create the stated_intention

			$stated_intention_sql = <<<SQL
INSERT INTO
	oedipus_stated_intentions
SET
	position = '1',
	doubt = ''
SQL;

			//                        print_r($sql);exit;
			mysql_query($stated_intention_sql, $dbh);
			$stated_intention_id = mysql_insert_id($dbh);


			// Create the Option

			$option_sql = <<<SQL
INSERT INTO
	oedipus_options
SET
	name = '$option_name',
	character_id = '$character_id',
	stated_intention_id = '$stated_intention_id',
	added = NOW()
SQL;

			//                        print_r($sql);exit;
			mysql_query($option_sql, $dbh);
			$option_id = mysql_insert_id($dbh);

			// Create default positions
			// for all characters in the frame

			$frame_characters = $frame->get_characters();
			foreach ($frame_characters as $frame_character)
			{
				// ADD DEFAULT position tO DATABASE
				$position_position = '1';
				$position_doubt = '';
				$character_id = $frame_character->get_id();
				$sql5 = <<<SQL
INSERT INTO
	oedipus_positions
SET
	position = '$position_position',
	doubt = '$position_doubt',
	option_id = $option_id,
	character_id = $character_id
SQL;

				//                                                        print_r($sql5);exit;
				$result5 = mysql_query($sql5, $dbh);
			}
		} 
		else 
		{
			//                        throw new Database_CRUDException("'$href' is not a validate HREF!");
		}
	}

	public static function
		delete_character($character_id)
	{
		$character_data_is_valid = TRUE; //Implement this!

		if ($character_data_is_valid) 
		{
			$dbh = DB::m();

			// First, each character has positions on everyone's options
			// delete any of the characters positions
			$positions_sql = <<<SQL
DELETE FROM
	oedipus_positions
WHERE
	character_id = $character_id
SQL;

//                        print_r($positions_sql);exit;
			mysql_query($positions_sql, $dbh);

			// Delete any options created by the character
			// and their stated intention, and everyone's positions on them
			// need options_ids to delete
			// get all options where character_id = $character_id
			$option_ids_sql = <<<SQL
SELECT 
	id
FROM
	oedipus_options
WHERE
	character_id = $character_id
SQL;

//                        print_r($option_ids_sql);exit;
			$option_ids_result = mysql_query($option_ids_sql, $dbh);

			if ($option_ids_result)
			{
				while($option_id_result = mysql_fetch_array($option_ids_result))
				{
					$option_id = $option_id_result['id'];

					// Delete the Stated Intention for the Option
					// delete s_i where option_id
					$stated_intentions_sql = <<<SQL
DELETE FROM
	oedipus_stated_intentions
WHERE
	option_id = $option_id
SQL;

//                                        print_r($sql);exit;
					mysql_query($stated_intentions_sql, $dbh);

					// Delete everyone's positions on the Option
					// delete position where option_id
					$option_positions_sql = <<<SQL
DELETE FROM
	oedipus_positions
WHERE
	option_id = $option_id
SQL;

					//                        print_r($sql);exit;
					mysql_query($option_positions_sql, $dbh);
				}

				// Delete the Options themselves
				$options_sql = <<<SQL
DELETE FROM
	oedipus_options
WHERE
	character_id = $character_id
SQL;

				//                        print_r($sql);exit;
				mysql_query($options_sql, $dbh);

			}

			// Finally, delete the character
			$character_sql = <<<SQL
DELETE FROM
	oedipus_characters
WHERE
	id = $character_id
SQL;

//                        print_r($character_sql);exit;
			mysql_query($character_sql, $dbh);
		}
		else 
		{
			//throw new Database_CRUDException("'$href' is not a validate HREF!");
		}

	}

	public static function
		update_position_by_id(
			$position_id,
			$position_tile,
			$position_doubt
		)
	{
		$position_data_is_valid = TRUE; //Implement this!

		if ($position_data_is_valid) 
		{
			$position_tile = self::get_next_tile($position_tile, $position_doubt);
			$position_doubt = self::get_next_doubt($position_doubt);

			$dbh = DB::m();

			$sql = <<<SQL
UPDATE
	oedipus_positions
SET
	position = '$position_tile',
	doubt = '$position_doubt'
WHERE
	id = $position_id
SQL;

			#print_r($sql);exit;
			mysql_query($sql, $dbh);
		} 
		else 
		{
			//                        throw new Database_CRUDException("'$href' is not a validate HREF!");
		}
	}

	public static function
		update_stated_intention_by_id(
			$stated_intention_id,
			$stated_intention_tile,
			$stated_intention_doubt
		)
	{
		$stated_intention_data_is_valid = TRUE; //Implement this!

		if ($stated_intention_data_is_valid) 
		{
			$stated_intention_tile = self::get_next_tile($stated_intention_tile, $stated_intention_doubt);
			$stated_intention_doubt = self::get_next_doubt($stated_intention_doubt);

			$dbh = DB::m();

			$sql = <<<SQL
UPDATE
	oedipus_stated_intentions
SET
	position = '$stated_intention_tile',
	doubt = '$stated_intention_doubt'
WHERE
	id = $stated_intention_id
SQL;

			#print_r($sql);exit;
			mysql_query($sql, $dbh);
		} 
		else 
		{
			//                        throw new Database_CRUDException("'$href' is not a validate HREF!");
		}
	}


	public static function
		get_next_doubt($position_doubt)
	{
		if ($position_doubt == '')
		{
			return '?';
		}
		elseif ($position_doubt == '?')
		{
			return 'x';
		}
		elseif ($position_doubt == 'x')
		{
			return '';
		}
		return $position_doubt;
	}
	

	public static function
		get_next_tile($position_tile, $position_doubt)
	{
		if ($position_tile == '1' && $position_doubt == 'x')
		{
			return 0;
		}
		elseif ($position_tile == '0' && $position_doubt == 'x')
		{
			return 1;
		}
		return $position_tile;
	}
	
	public static function
		update_character_by_id(
			$character_id,
			$character_name,
			$character_color
		)
	{
		$character_data_is_valid = TRUE; //Implement this!

		if ($character_data_is_valid) 
		{
			$dbh = DB::m();

			$sql = <<<SQL
UPDATE
	oedipus_characters
SET
	name = '$character_name',
	color = '$character_color'
WHERE
	id = $character_id
SQL;

			#print_r($sql);exit;
			mysql_query($sql, $dbh);
		} 
		else 
		{
			//                        throw new Database_CRUDException("'$href' is not a validate HREF!");
		}
	}

	public static function
		delete_option($option_id)
	{
		$option_data_is_valid = TRUE; //Implement this!

		if ($option_data_is_valid) 
		{
			$dbh = DB::m();

			// Delete the Stated Intention for the Option
			// delete s_i where option_id
			$stated_intentions_sql = <<<SQL
DELETE FROM
	oedipus_stated_intentions
WHERE
	option_id = $option_id
SQL;

			//                                        print_r($sql);exit;
			mysql_query($stated_intentions_sql, $dbh);

			// Delete everyone's positions on the Option
			// delete position where option_id
			$option_positions_sql = <<<SQL
DELETE FROM
	oedipus_positions
WHERE
	option_id = $option_id
SQL;

			//                        print_r($sql);exit;
			mysql_query($option_positions_sql, $dbh);

			// Delete the Options themselves
			$options_sql = <<<SQL
DELETE FROM
	oedipus_options
WHERE
	id = $option_id
SQL;

			//                        print_r($sql);exit;
			mysql_query($options_sql, $dbh);
		}
		else 
		{
			//throw new Database_CRUDException("'$href' is not a validate HREF!");
		}

	}


	/*
	 * --------------------------------------------------------------------------
	 * Functions unused are under here
	 *
	 * --------------------------------------------------------------------------
	 */

	public static function
		create_oedipus_frame_from_get($get)
	{
		// Creating a frame
		// -----------------
		// 1.
		// Create the characters,
		// and their options, options have stated intentions
		// foreach character, check if 

		$characters = array();
		for ($i = 1; $i <= $get['no_of_characters'];  $i++)
		{
			$character = new Oedipus_Character($i, $get['character_name-' . $i], $get['character_color-' . $i]);

			for ($j = 1; $j <= $get['character-' . $i . '-no_of_options'];  $j++)
			{
				$stated_intention = new Oedipus_StatedIntention('1', 'q');
				$characters_option = 
					new Oedipus_Option(
						$j, $get['character-' . $i . '-option_name-' . $j], $stated_intention
					);

				$character->add_option($characters_option);
			}

			$characters[] = $character;
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
					$positions[$position_character->get_id()] =
						new Oedipus_Position('0', 'q', $position_character);
				}

				$option->add_positions($positions);
			}
		}

		// 3.
		// Create the frame
		$frame = new Oedipus_Frame($get['frame_name'], $characters);

		// DEBUG
		// print_r($frame->get_characters());exit;

		return $frame;
	}

	public static function
		get_default_oedipus_frame()
	{
		//fake get variables:
		//
		$get = array();
		$get['frame_name'] = 'Example Drama Theoretic Oedipus frame';
		$get['no_of_characters'] = 2;

		$get['character_name-1'] = 'Ryu';
		$get['character_color-1'] = 'blue';
		$get['character-1-no_of_options'] = 2;
		$get['character-1-option_name-1'] = 'smoke weed';
		$get['character-1-option_name-2'] = 'learn kung fu';

		$get['character_name-2'] = 'Ganja Master';
		$get['character_color-2'] = 'red';

		return self::create_oedipus_frame_from_get($get);
	}

	// PROCESS GET & POST
	public static function
		process_frame_editor_form()
	{
		// NOT USED ANYMORE
		//
		//

		//                echo 'print_r($_GET)' . "\n";
		//                print_r($_GET);
		//                echo 'print_r($_POST)' . "\n";
		print_r($_POST);exit;
		//echo 'print_r($_SESSION)' . "\n";
		//print_r($_SESSION);
		//                echo '$_SESSION[\'name\']: ' . $_SESSION['name'] . "\n";
		//                echo '$_SESSION[\'email\']: ' . $_SESSION['email'] . "\n";
		//                
		//                $return_to_url = self::get_frame_creator_page_url();
		$return_to_url = new HTMLTags_URL();
		$return_to_url->set_file('/');
		$return_to_url->set_get_variable('oo-page', 1);
		$return_to_url->set_get_variable('page-class', 'Oedipus_FrameCreatorPage');

		$return_to_url->set_get_variable('frame_values', 1);

		foreach ($_POST as $key=>$value)
		{
			$return_to_url->set_get_variable($key, $value);
		}


		//                print_r($_POST);echo $return_to_url->get_as_string();exit;
		//                
		//                if (isset($_GET['add_person'])) {
		//                        $mysql_user_fcharactery = Database_MySQLUserFcharactery::get_instance();
		//                        $mysql_user = $mysql_user_fcharactery->get_for_this_project();
		//                        $database = $mysql_user->get_database();
		//                        
		//                        $people_frame = $database->get_frame('hpi_mailing_list_people');
		//                        
		//                        if (isset($_POST['name'])) {
		//                                $_SESSION['name'] = $_POST['name'];
		//                        }
		//                        
		//                        if (isset($_POST['email'])) {
		//                                $_SESSION['email'] = $_POST['email'];
		//                        }
		//                        

		//            try {
		//                $last_added_id = $oedipus_frames_frame->update_frame(
		//                    $_POST['name'],
		//                    $_POST['email'],
		//                    isset($_POST['force_email'])
		//                );
		//                
		//                $return_to_url->set_get_variable('frame_updated');

		//                
		//                $_SESSION['last_added_id'] = $last_added_id;
		//                
		//                unset($_SESSION['name']);
		//                unset($_SESSION['email']);
		//            } catch (MailingList_NameAndEmailException $e) {
		//                $return_to_url->set_get_variable('form_incomplete');
		//            } catch (MailingList_NameTooLongException $e) {
		//                $return_to_url->set_get_variable('name_too_long');
		//            } catch (MailingList_EmailTooLongException $e) {
		//                $return_to_url->set_get_variable('email_too_long');
		//            } catch (MailingList_InvalidEmailException $e) {
		//                $return_to_url->set_get_variable('email_incorrect');
		//            } catch (Database_InvalidUserInputException $e) {
		//                $return_to_url->set_get_variable('error_message', urlencode($e->getMessage()));
		//            }
		//                }
		//                
		//                print_r($return_to_url);
		#exit;

		return $return_to_url;
	}

	/*
	 * ----------------------------------------
	 * Functions to do with making URLs
	 * ----------------------------------------
	 */
	public function
		get_drama_url_for_frame(Oedipus_Frame $frame)
	{
			return PublicHTML_URLHelper
				::get_oo_page_url(
					'Oedipus_DramaPage',
					array(
						'drama_id' => $frame->get_drama_id()
					)
				);
	}

}
?>
