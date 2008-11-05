<?php
/**
 * Oedipus_FrameTreeHelper
 *
 * @copyright RFI, 2008-02-18
 * @copyright SANH, 2008-04-19
 */

/*
 *Uses Tree code from:
 *http://www.sitepoint.com/print/hierarchical-data-database/
 */
class
Oedipus_FrameTreeHelper
{
	public static function
		get_frame_tree_div(Oedipus_Scene $scene)
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', 'frame-tree');
		$html = self::get_tree_ul(
				self::get_root_frame_id_for_scene_id($scene->get_id()),
				$scene->get_id()
			);

//                print_r($html);exit;
		$div->append($html);
		return $div;
	}

	public function
		get_parent_frame_for_frame_id($frame_id)
	{
		$dbh = DB::m();
		//retrieve the left and right value of the $root node
		$sql = <<<SQL
SELECT parent_frame_id
FROM oedipus_frame_trees 
WHERE 
frame_id = $frame_id  
SQL;

//                print_r($root_sql);exit;
		$result = mysql_query($sql, $dbh);
		$row = mysql_fetch_array($result);
		return Oedipus_DramaHelper::get_frame_by_id($row['parent_frame_id']);
	}

	public function
		get_child_frames_for_frame_id($frame_id)
	{
		$dbh = DB::m();
		//retrieve the left and right value of the $root node
		$sql = <<<SQL
SELECT frame_id
FROM oedipus_frame_trees 
WHERE 
parent_frame_id = $frame_id  
SQL;

//                print_r($root_sql);exit;
		//
		$frames = array();
		$result = mysql_query($sql, $dbh);
		while($row = mysql_fetch_array($result))
		{
			$frames[] = Oedipus_DramaHelper::get_frame_by_id($row['frame_id']);
		}
		return $frames;
	}

	public function
		get_root_frame_id_for_scene_id($scene_id)
	{
		$dbh = DB::m();
		//retrieve the left and right value of the $root node
		$root_sql = <<<SQL
SELECT frame_id
FROM oedipus_frame_trees 
WHERE 
scene_id = $scene_id  
AND 
lft=1
SQL;

//                print_r($root_sql);exit;
		$result = mysql_query($root_sql, $dbh);
		$row = mysql_fetch_array($result);
		return $row['frame_id'];
	}

	private function get_tree_ul($root_frame_id, $scene_id) 
	{
		$dbh = DB::m();
		//retrieve the left and right value of the $root node
		$root_sql = <<<SQL
SELECT lft, rgt 
FROM oedipus_frame_trees 
WHERE 
scene_id = $scene_id  
AND 
frame_id='$root_frame_id'
SQL;

//                print_r($root_sql);exit;
		$result = mysql_query($root_sql, $dbh);
		$row = mysql_fetch_array($result);

		//start with an empty $right stack
		$right = array();

		//now, retrieve all descendants of the $root node
		$root_right = $row['rgt'];
		$root_left = $row['lft'];
		$result_sql = <<<SQL

SELECT 
	frame_id, lft, rgt 
FROM 
	oedipus_frame_trees 
WHERE 
	lft 
BETWEEN 
	$root_left AND $root_right
AND 
	scene_id = $scene_id 
ORDER BY 
	lft ASC
SQL;

//                print_r($result_sql);exit;
		$result = mysql_query($result_sql, $dbh);

		//display each row
		$begin_ul_but_not_first = FALSE;
		$html = '<ul>';
		while ($row = mysql_fetch_array($result)) {
			//only check stack if there is one
			if (count($right)>0) {
				if ($begin_ul_but_not_first) {
					$html .= '<li><ul>';
					$begin_ul_but_not_first = FALSE;
				}
				$begin_ul_but_not_first = TRUE;

				//check if we should remove a node from the stack
				while ($right[count($right)-1]<$row['rgt']) {
					array_pop($right);
					$html .= '</ul></li>';
					$begin_ul_but_not_first = TRUE;
				}
			}

			//display Frame Image
			$html .= str_repeat('  ',count($right));
			$html .= '<li>';

			$frame = Oedipus_DramaHelper::get_frame_by_id($row['frame_id']);
//                        print_r($frame);exit;
			$frame_node_div = self::get_frame_node_div($frame);

			$html .= $frame_node_div->get_as_string();
			$html .= '</li>';

			//add this node to the stack
			$right[] = $row['rgt'];

		}

		$html .= '</ul>';
		return $html;
	} 

	private function
		get_frame_node_div(Oedipus_Frame $frame)
	{
		$div = new HTMLTags_Div();
		$div->append(
			Oedipus_FrameImageHelper
			::get_frame_png_thumbnail_img_a($frame, 150, 100)
		);
		$div->append(
			self::get_add_node_a($frame)
		);

		return $div;
	}

	private function
		get_add_node_a(Oedipus_Frame $frame)
	{
		$a = new HTMLTags_A('Add a Frame...');
		$url = PublicHTML_URLHelper
			::get_oo_page_url(
				'Oedipus_EditSceneRedirectScript',
				array(
					'add_frame' => 1,
					'frame_name' => 'New Frame',
					'scene_id' => $frame->get_scene_id(),
					'parent_frame_id' => $frame->get_id()
				)
			);
		$a->set_href($url);
		return $a;
	}

	private function rebuild_tree($scene_id, $parent, $left) {
		$dbh = DB::m();
//                print_r($dbh);exit;

		//the right value of this node is the left value + 1
		$right = $left+1;

		//get all children of this node
		$children_sql = <<<SQL
SELECT 
	frame_id 
FROM 
	oedipus_frame_trees
WHERE 
	parent_frame_id='$parent'
AND
	scene_id = '$scene_id'
SQL;

//                print_r($children_sql);
		$child_result = mysql_query($children_sql, $dbh);
		while ($child_row = mysql_fetch_array($child_result)) {
//                        print_r($child_row);

			//recursive execution of this function for each
			//child of this node
			//$right is the current right value, which is
			//incremented by the rebuild_tree function
			$right = self::rebuild_tree($scene_id, $child_row['frame_id'], $right);
		}

		//we've got the left value, and now that we've processed
		//the children of this node we also know the right value
		//
		$update_sql = <<<SQL
UPDATE 
	oedipus_frame_trees 
SET 
	lft='$left',
	rgt='$right' 
WHERE 
	frame_id ='$parent'
AND
	scene_id = '$scene_id'
SQL;

//                print_r($update_sql);exit;
		mysql_query($update_sql, $dbh);

		//return the right value of this node + 1
		return $right+1;
	} 	

	public function
		rebuild_tree_for_scene_id($scene_id)
	{
		return self::rebuild_tree(
			$scene_id,
			self::get_root_frame_id_for_scene_id($scene_id),
			1
		); 
	}

	public static function
		add_frame_to_tree(
			Oedipus_Frame $frame,
		       	$parent_frame_id
		)
	{
		$scene_id = $frame->get_scene_id();
		$frame_id = $frame->get_id();

		$dbh = DB::m();

		$sql = <<<SQL
INSERT INTO
	oedipus_frame_trees 
SET
	frame_id = '$frame_id',
	scene_id = '$scene_id',
	parent_frame_id = '$parent_frame_id'
SQL;

//                print_r($sql);exit;
		$result = mysql_query($sql, $dbh);

		if ($parent_frame_id == 0)
		{
			/*
			 * Root Frame, left isn't set yet
			 */
			return self::rebuild_tree(
				$scene_id,
				$frame_id,
				1
			); 
		}
		else
		{
			return self::rebuild_tree_for_scene_id($scene_id);
		}
	}

	public static function
		get_frame_navigation_div(Oedipus_Frame $frame)
	{
		$div = new HTMLTags_Div();

		$div->set_attribute_str('id', 'frame-navigation');
		$parent_frame = self::get_parent_frame_for_frame_id($frame->get_id());
		$child_frames = self::get_child_frames_for_frame_id($frame->get_id());

		$div->append(self::get_previous_navigation_div($parent_frame));
		$div->append(self::get_next_navigation_div($frame, $child_frames));

		return $div;
	}

	private function
		get_previous_navigation_div(Oedipus_Frame $frame)
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('id', 'previous-frame');
		$div->append(
			new HTMLTags_Heading(4, 'Previous Frame')
		);

		$div->append(
			Oedipus_FrameImageHelper
			::get_frame_png_thumbnail_img_a($frame, 150, 100)
		);

		return $div;
	}

	private function
		get_next_navigation_div(Oedipus_Frame $frame, $child_frames)
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('id', 'next-frames');
		$div->append(
			new HTMLTags_Heading(4, 'Next Frames')
		);
		$ul = new HTMLTags_UL();
		foreach ($child_frames as $child)
		{
			$li = new HTMLTags_LI();
			$li->append(
				Oedipus_FrameImageHelper
				::get_frame_png_thumbnail_img_a($child, 150, 100)
			);
			$ul->append($li);
		}

		$li = new HTMLTags_LI();
		$li->append(
			self::get_add_node_a($frame)
		);
		$ul->append($li);

		$div->append($ul);
		return $div;
	}
	
}
?>
