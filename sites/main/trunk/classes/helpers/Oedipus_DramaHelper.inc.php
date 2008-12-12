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
		add_drama($drama_name, $user_id)
	{
		return Oedipus_DramaDBHelper::add_drama($drama_name, $user_id);
	}

	public static function
		add_act(Oedipus_Drama $drama, $name = NULL)
	{
		return Oedipus_DramaDBHelper::add_act($drama, $name);
	}

	public static function
		add_scene(Oedipus_Act $act, $name = NULL)
	{
		return Oedipus_DramaDBHelper::add_scene($act, $name);
	}
	
	public function
		get_explanation_for_position(
			Oedipus_Character $character,
		       	Oedipus_Position $position,
			Oedipus_Option $option
		)
	{
		return Oedipus_EnglishHelper::get_explanation_for_position(
			$character, $position, $option
		);
	}	

	public function
		get_explanation_for_stated_intention(
			Oedipus_Character $character,
		       	Oedipus_StatedIntention $stated_intention,
			Oedipus_Option $option
		)
	{
		return Oedipus_EnglishHelper::get_explanation_for_stated_intention(
			$character, $stated_intention, $option
		);
	}	
	
	public function
		get_all_dramas()
	{
		return Oedipus_DramaDBHelper::get_all_dramas();
	}

	public static function
		set_scene_name(
			$scene_id,
			$scene_name
		)
	{
		return Oedipus_DramaDBHelper::set_scene_name(
			$scene_id,
			$scene_name
		);
	}

	public static function
		get_scene_notes_div(Oedipus_Scene $scene)
	{
		return Oedipus_NotesHelper::get_scene_notes_div($scene);
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
		return Oedipus_DramaDBHelper::get_latest_act_name_for_drama_id($drama_id);
	}

	public static function
		get_latest_scene_name_for_act_id($act_id)
	{
		return Oedipus_DramaDBHelper::get_latest_scene_name_for_act_id($act_id);
	}

	public static function
		get_drama_id_for_scene_id($scene_id)
	{
		return Oedipus_DramaDBHelper::get_drama_id_for_scene_id($scene_id);
	}

	public static function
		get_drama_id_for_act_id($act_id)
	{
		return Oedipus_DramaDBHelper::get_drama_id_for_act_id($act_id);
	}

	public static function
		get_act_id_for_scene_id($scene_id)
	{
		return Oedipus_DramaDBHelper::get_act_id_for_scene_id($scene_id);
	}

	public static function
		get_act_id_for_frame_id($frame_id)
	{
		return Oedipus_DramaDBHelper::get_act_id_for_frame_id($frame_id);
	}

	public static function
		get_scene_id_for_frame_id($frame_id)
	{
		return Oedipus_DramaDBHelper::get_scene_id_for_frame_id($frame_id);
	}

	public static function
		get_first_act_id_for_drama_id($drama_id)
	{
		return Oedipus_DramaDBHelper::get_first_act_id_for_drama_id($drama_id);
	}

	public static function
		get_first_scene_id_for_act_id($act_id)
	{
		return Oedipus_DramaDBHelper::get_first_scene_id_for_act_id($act_id);
	}

	public static function
		get_first_scene_id_for_drama_id($drama_id)
	{
		return Oedipus_DramaDBHelper::get_first_scene_id_for_drama_id($drama_id);
	}

	public static function
		get_drama_id_for_frame_id($frame_id)
	{
		return Oedipus_DramaDBHelper::get_drama_id_for_frame_id($frame_id);
	}

	private function
		get_all_dramas_ul()
	{
		return new Oedipus_AllDramasUL();
	}

	public function
		get_drama_by_id($drama_id)
	{
		return Oedipus_DramaFactory::get_drama_by_id($drama_id);
	}	

	public function
		get_act_by_id($act_id)
	{
		return Oedipus_DramaFactory::get_act_by_id($act_id);
	}	


	public function
		get_scene_by_id($scene_id)
	{
		return Oedipus_DramaFactory::get_scene_by_id($scene_id);
	}	

	public function
		get_frame_by_id($frame_id)
	{
		return Oedipus_DramaFactory::get_frame_by_id($frame_id);
	}	

	public function
		get_latest_public_dramas($limit = 5)
	{
		return Oedipus_DramaDBHelper::get_latest_public_dramas($limit);
	}

	public function
		get_all_dramas_for_user($user_id)
	{
		return Oedipus_DramaDBHelper::get_all_dramas_for_user($user_id);
	}

	public function
		get_drama_by_unique_name($unique_name)
	{
		return Oedipus_DramaDBHelper::get_drama_by_unique_name($unique_name);
	}

	public function
		add_frame(
			Oedipus_Scene $scene,
			$frame_name,
			$parent_frame_id
		)
	{
		return Oedipus_DramaDBHelper::add_frame(
			$scene,
			$frame_name,
			$parent_frame_id
		);
	}


	/**
	 *
	 * URLs
	 *
	 */
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

