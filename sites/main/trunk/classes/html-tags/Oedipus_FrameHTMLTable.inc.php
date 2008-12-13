<?php
/**
 * Oedipus_FrameHTMLTable
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 */

/*
 * Constructs an HTML <TABLE> 
 * from an Oedipus_Frame
 *
 * An oedipus frame consists of:
 *
 * There has to be at least one option and one character;
 * Options belong to characters.
 * For each option, every character has a position on it.
 * For each option, there is a si-position on it.
 */

class
	Oedipus_FrameHTMLTable
extends
	HTMLTags_Table
{
        //private $key_fields;
        //private $column_titles;
        //private $row_data;
        //private $base_redirect_script_url;

	private $characters;

	private $frame;

	public function
		__construct(Oedipus_Frame $frame)
	{
		parent::__construct();
		
		$this->set_attribute_str('class', 'oedipus');
		
		$this->frame = $frame;

		$this->characters = $frame->get_characters();
	}
	
	protected function
		get_content()
	{
		$content = new HTMLTags_TagContent();
		
		$content->append_tag($this->get_caption());

		$colgroups = $this->get_colgroups();
		foreach ($colgroups as $colgroup)
		{
			$content->append_tag($colgroup);
		}

		$content->append_tag($this->get_thead());

		$content->append_tag($this->get_tbody());
		
		return $content;
	}
		
	protected function
		get_caption()
	{
		return new HTMLTags_Caption($this->frame->get_name());
	}

	protected function
		get_thead()
	{
		$thead = new HTMLTags_THead();
		
		$thead->append_tag_to_content($this->get_heading_tr());
		
		return $thead;
	}
		protected function
		get_colgroups()
	{
//                
//                        <!-- colgroup defines columns for css -->
//                        <colgroup class="options-column" span="1">
//                        </colgroup>

//                        <colgroup class="character-column" id="character1" span="1">
//                        </colgroup>
//                        <colgroup class="character-column" id="character2" span="1">
//                        </colgroup>

//                        <colgroup class="si-column" span="1">
//                        </colgroup>

		$colgroups = array();

		// Options ColGroup
		$options_colgroup = new HTMLTags_ColGroup();
		$options_colgroup->set_attribute_str('class', 'options-column');
		$options_colgroup->set_attribute_str('span', '1');
		$colgroups[] = $options_colgroup;

		// Actor ColGroup
		foreach ($this->characters as $character)
		{
			$character_colgroup = new HTMLTags_ColGroup();
			$character_colgroup->set_attribute_str('class', 'character-column');
			$character_colgroup->set_attribute_str('id', $character->get_color());
			$character_colgroup->set_attribute_str('span', '1');
			$colgroups[] = $character_colgroup;
		}
	
		// si ColGroup
		$si_colgroup = new HTMLTags_ColGroup();
		$si_colgroup->set_attribute_str('class', 'si-column');
		$si_colgroup->set_attribute_str('span', '1');
		$colgroups[] = $si_colgroup;
		
		return $colgroups;
	}
	
	protected function
		get_heading_tr()
	{
		$heading_tr = new HTMLTags_TR();
		
		/* Blank TH
		 */
		$blank_th = new HTMLTags_TH();
		$blank_th->set_attribute_str('class', 'blank');
		$heading_tr->append_tag_to_content($blank_th);

		/*
		 * Append the column headings for the data in the table.
		 */
		$characters = $this->get_characters();
		
		foreach ($characters as $character) {
			$heading_tr->append_tag_to_content(new HTMLTags_TH($character->get_short_name()));
		}
		
		// SI Column
		$si_heading = new HTMLTags_TH('s.i.');
		$heading_tr->append_tag_to_content($si_heading);
		
		return $heading_tr;
	}
	
	protected function
		get_characters()
	{
		if (count($this->characters) < 1) {
			throw new Exception('There needs to be at least one character!');
		}
		
		return $this->characters;
	}
	
	public function
		add_character($character)
	{
		$this->characters[] = $character;
	}
	
	protected function
		get_tbody()
	{
		$tbody = new HTMLTags_TBody();
		
		$option_trs = $this->get_option_trs();
		
		foreach ($option_trs as $option_tr) {
			$tbody->append_tag_to_content($option_tr);
		}
		
		return $tbody;
	}
	
	protected function
		get_option_trs()
	{
		$option_trs = array();

		foreach ($this->characters as $character)
		{
			if ($character->has_options())
			{
				// Actors Name TR
				$characters_name_tr = new HTMLTags_TR();
				$characters_name_th = new HTMLTags_TH();
				$characters_name_th->append($character->get_name());
				$characters_name_th->set_attribute_str('class', 'option');
				$characters_name_th->set_attribute_str('id', $character->get_color());
				$characters_name_tr->append($characters_name_th);

				for ($i = -1; $i < count($this->characters); $i++)
				{
					$blank_td = new HTMLTags_TD();
					$characters_name_tr->append($blank_td);
				}
				$option_trs[] = $characters_name_tr;

				// Option TRs with positions
				$options = $character->get_options();
				foreach ($options as $option)
				{
					$tr = new HTMLTags_TR();
					$option_em = new HTMLTags_Em($option->get_name());
					$option_th = new HTMLTags_TH();
					$option_th->append($option_em);
					$option_th->set_attribute_str('class', 'option');
					$option_th->set_attribute_str('id', $character->get_color());
					$tr->append_tag_to_content($option_th);

					foreach ($this->characters as $position_character)
					{
						$position = $option->get_position(
							$position_character->get_id()
						);

						$position_td = new HTMLTags_TD();
						$p_explanation = Oedipus_DramaHelper
							::get_explanation_for_position(
								$character, $position, $option
							);
						$position_td->append_tag_to_content(
							$this->get_position_tile($position, $p_explanation)
						);
						$tr->append_tag_to_content($position_td);
					}

					// Stated Intention TD
					$stated_intention = $option->get_stated_intention();

					$stated_intention_td = new HTMLTags_TD();

					$si_explanation = Oedipus_DramaHelper
							::get_explanation_for_stated_intention(
								$character, $stated_intention, $option
							);
					$stated_intention_td->append_tag_to_content(
						$this->get_stated_intention_tile(
							$stated_intention, $character, $si_explanation
						)
					);
					$tr->append_tag_to_content($stated_intention_td);

					$option_trs[] = $tr;
				}
				// Blank TR
				$blank_tr = new HTMLTags_TR();
				$blank_th = new HTMLTags_TH();
				$blank_th->set_attribute_str('class', 'blank');
				$blank_tr->append_tag_to_content($blank_th);

				for ($i = -1; $i < count($this->characters); $i++)
				{
					$blank_td = new HTMLTags_TD();
					$blank_tr->append_tag_to_content($blank_td);
				}
				$option_trs[] = $blank_tr;
			}
		}

		return $option_trs;
	}
	
	public function
		get_position_tile(Oedipus_Position $position, $explanation)
	{
//                <a href="#" class="position-tile" id="character1-option1">0</a>

		if ($this->frame->is_editable())
		{
			$html_tile_link = PublicHTML_URLHelper
				::get_oo_page_url(
					'Oedipus_EditFrameRedirectScript',
					array(
						'frame_id' => $this->frame->get_id(),
						'edit_position' => 1,
						'position_id' => $position->get_id(),
						'position_tile' => $position->get_tile(),
						'position_doubt' => $position->get_doubt()
					)
				);
			if (isset($_GET['edit_frame'])) {
				$html_tile_link->set_get_variable('return_to_get', 'edit_frame');
			}
		}
		else
		{
			$html_tile_link = new HTMLTags_URL();
			$html_tile_link->set_file('#');
		}
		$html_tile = new HTMLTags_A($position->get_tile() . $position->get_doubt());

		/**
		 * An explanation for the position is set here in the
		 * title attribute, for the javascript to use as a
		 * cool -tip
		 */
		$html_tile->set_attribute_str(
			'title',
			Oedipus_LanguageHelper::get_possessive($position->get_character()->get_name()) 
			. " Position" 
			. '|' .
			$explanation
		);

		$html_tile->set_href($html_tile_link);
		$html_tile->set_attribute_str('class', 'position-tile');
		$character = $position->get_character();
		$html_tile_id = $character->get_color() . $position->get_tile() 
			. $this->add_q_to_doubt($position->get_doubt());
		$html_tile->set_attribute_str('id', $html_tile_id);
		return $html_tile;

	}


	private function
		add_q_to_doubt($doubt)
	{
		if ($doubt == '?')
		{
			$doubt = 'q';
		}
		return $doubt;
	}

	public function
		get_stated_intention_tile(
			Oedipus_StatedIntention $stated_intention,
			Oedipus_Character $character,
			$explanation
		)
	{
//                <a href="#" class="si-tile" id="character1-option1">0</a>
		if ($this->frame->is_editable())
		{
			$html_tile_link = PublicHTML_URLHelper
				::get_oo_page_url(
					'Oedipus_EditFrameRedirectScript',
					array(
						'frame_id' => $this->frame->get_id(),
						'edit_stated_intention' => 1,
						'stated_intention_id' => $stated_intention->get_id(),
						'stated_intention_tile' => $stated_intention->get_tile(),
						'stated_intention_doubt' => $stated_intention->get_doubt()
					)
				);
			if (isset($_GET['edit_frame'])) {
				$html_tile_link->set_get_variable('return_to_get', 'edit_frame');
			}
		}
		else
		{
			$html_tile_link = new HTMLTags_URL();
			$html_tile_link->set_file('#');
		}

		$html_tile 
			= new HTMLTags_A($stated_intention->get_tile() . $stated_intention->get_doubt());
		$html_tile->set_href($html_tile_link);

		/**
		 * An explanation for the position is set here in the
		 * title attribute, for the javascript to use as a
		 * cool -tip
		 */
		$html_tile->set_attribute_str(
			'title',
			Oedipus_LanguageHelper::get_possessive($character->get_name())
		       	. " Stated Intention" 			
			. '|' .
			$explanation
		);

		$html_tile->set_attribute_str('class', 'si-tile');
		$html_tile_id = 
			$character->get_color() . $stated_intention->get_tile() 
			. $this->add_q_to_doubt($stated_intention->get_doubt());
		$html_tile->set_attribute_str('id', $html_tile_id);

		return $html_tile;
	}


	public function
		get_options($options)
	{
		return $this->frame->get_options();
	}
	
	public function
		set_characters($characters)
	{
		$this->characters = $characters;
	}
}


?>
