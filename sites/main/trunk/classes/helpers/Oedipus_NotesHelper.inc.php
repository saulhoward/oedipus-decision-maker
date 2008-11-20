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
This is a Scene.
TXT;

		return self::add_note_to_scene($scene, $note_text);
	}


	public static function
		add_note_to_frame_with_default_content(Oedipus_Frame $frame)
	{
		$note_text = <<<TXT
This is a Frame.
TXT;

		return self::add_note_to_frame($frame, $note_text);
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
