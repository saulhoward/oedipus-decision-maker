<?php
/**
 * Oedipus_NotesHelper
 *
 * @copyright RFI, 2008-02-18
 * @copyright SANH, 2008-04-11
 */

class
	Oedipus_NotesHelper
{

	public static function
		add_note_to_scene_with_default_content(Oedipus_Scene $scene)
	{
		$note_text = <<<TXT
h3. Notes on this Scene

Click this note to edit it.

You can use "Textile":http://textile.thresholdstate.com/ markup.

Click on the *First Frame* to start editing this Scene.
TXT;

		return self::add_note_to_scene($scene, $note_text);
	}


	public static function
		add_note_to_frame_with_default_content(Oedipus_Frame $frame)
	{
		$note_text = <<<TXT
h3. Notes on this Frame

Click this note to edit it.

You can use "Textile":http://textile.thresholdstate.com/ markup.

Use the panel below to edit characters and options in this Frame.

Click the Coloured Tiles on the Frame to change them, or hover over them to find out what they mean.
TXT;

		return self::add_note_to_frame($frame, $note_text);
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
		add_note_to_frame(Oedipus_Frame $frame, $note_text)
	{
		// ADD NOTE TO DATABASE
		$dbh = DB::m();

		$note_sql = <<<SQL
INSERT INTO
	oedipus_notes
SET
	note_text = '$note_text',
	added = NOW()
SQL;

		//                print_r($sql);exit;
		$note_result = mysql_query($note_sql, $dbh);
		$note_id = mysql_insert_id($dbh);

		// ADD LINK TO DATABASE
		$frame_id = $frame->get_id();
		$link_sql = <<<SQL
INSERT INTO
	oedipus_frame_to_note_links
SET
	frame_id = '$frame_id',
	note_id = '$note_id'
SQL;

//                                print_r($link_sql);exit;
		$link_result = mysql_query($link_sql, $dbh);
		$link_id = mysql_insert_id($dbh);

		return new Oedipus_Note($note_id, $note_text, date());
	}

	public static function
		add_note_to_scene(Oedipus_Scene $scene, $note_text)
	{
		// ADD NOTE TO DATABASE
		$dbh = DB::m();

		$note_sql = <<<SQL
INSERT INTO
	oedipus_notes
SET
	note_text = '$note_text',
	added = NOW()
SQL;

		//                print_r($sql);exit;
		$note_result = mysql_query($note_sql, $dbh);
		$note_id = mysql_insert_id($dbh);

		// ADD LINK TO DATABASE
		$scene_id = $scene->get_id();
		$link_sql = <<<SQL
INSERT INTO
	oedipus_scene_to_note_links
SET
	scene_id = '$scene_id',
	note_id = '$note_id'
SQL;

//                                print_r($link_sql);exit;
		$link_result = mysql_query($link_sql, $dbh);
		$link_id = mysql_insert_id($dbh);

		return new Oedipus_Note($note_id, $note_text, date());
	}

	public function
		get_note_by_scene_id($scene_id)
	{
		$dbh = DB::m();

		$query = <<<SQL
SELECT 
		oedipus_notes.id,	
		oedipus_notes.note_text,	
		oedipus_notes.added
	FROM
		oedipus_notes,
		oedipus_scene_to_note_links
	WHERE
		oedipus_notes.id=oedipus_scene_to_note_links.note_id
	AND
		oedipus_scene_to_note_links.scene_id = '$scene_id'
SQL;

		//                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);
		//                                print_r($row);exit;

		return new Oedipus_Note($row['id'], $row['note_text'], $row['added']);
	}
	public function
		get_note_by_frame_id($frame_id)
	{
		$dbh = DB::m();

		$query = <<<SQL
SELECT 
		oedipus_notes.id,	
		oedipus_notes.note_text,	
		oedipus_notes.added
	FROM
		oedipus_notes,
		oedipus_frame_to_note_links
	WHERE
		oedipus_notes.id=oedipus_frame_to_note_links.note_id
	AND
		oedipus_frame_to_note_links.frame_id = '$frame_id'
SQL;

		//                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		$row = mysql_fetch_array($result);
		//                                print_r($row);exit;

		return new Oedipus_Note($row['id'], $row['note_text'], $row['added']);
	}

	public function
		set_note_text($note_id, $note_text)
	{
		$note_data_is_valid = TRUE; //Implement this!

		if ($note_data_is_valid) 
		{
			$dbh = DB::m();

			$sql = <<<SQL
UPDATE
	oedipus_notes
SET
	note_text = '$note_text'
WHERE
	id = $note_id
SQL;

			#print_r($sql);exit;
			mysql_query($sql, $dbh);
		} 
		else 
		{
			//                        throw new Database_CRUDException("'$href' is not a validate HREF!");
		}

	}

	public function
		has_frame_got_note($frame_id)
	{
		$dbh = DB::m();

		$query = <<<SQL
SELECT 
		COUNT(*) as count
	FROM
		oedipus_frame_to_note_links
	WHERE
		frame_id = $frame_id
SQL;

//                                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		if ($result)
		{
			$row = mysql_fetch_array($result);

			if ($row['count'] >= 1)
			{
				return TRUE;
			}
		}
		//                                print_r($row);exit;

		return FALSE;
	}

	public function
		has_scene_got_note($scene_id)
	{
		$dbh = DB::m();

		$query = <<<SQL
SELECT 
		COUNT(*) as count
	FROM
		oedipus_scene_to_note_links
	WHERE
		scene_id = $scene_id
SQL;

//                                                print_r($query);exit;
		$result = mysql_query($query, $dbh);
		if ($result)
		{
			$row = mysql_fetch_array($result);

			if ($row['count'] >= 1)
			{
				return TRUE;
			}
		}
		//                                print_r($row);exit;

		return FALSE;
	}
}
?>
