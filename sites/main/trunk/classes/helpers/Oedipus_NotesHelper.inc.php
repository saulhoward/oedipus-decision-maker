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
		add_note_to_table(Oedipus_Table $table, $note_text)
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
		$table_id = $table->get_id();
		$link_sql = <<<SQL
INSERT INTO
	oedipus_table_to_note_links
SET
	table_id = '$table_id',
	note_id = '$note_id'
SQL;

//                                print_r($link_sql);exit;
		$link_result = mysql_query($link_sql, $dbh);
		$link_id = mysql_insert_id($dbh);

		return new Oedipus_Note($note_id, $note_text, date());
	}

	public function
		get_note_by_table_id($table_id)
	{
		$dbh = DB::m();

		$query = <<<SQL
SELECT 
		oedipus_notes.id,	
		oedipus_notes.note_text,	
		oedipus_notes.added
	FROM
		oedipus_notes,
		oedipus_table_to_note_links
	WHERE
		oedipus_notes.id=oedipus_table_to_note_links.note_id
	AND
		oedipus_table_to_note_links.table_id = '$table_id'
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
		has_table_got_note($table_id)
	{
		$dbh = DB::m();

		$query = <<<SQL
SELECT 
		COUNT(*) as count
	FROM
		oedipus_table_to_note_links
	WHERE
		table_id = $table_id
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
