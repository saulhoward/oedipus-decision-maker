<?php
/**
 * Oedipus_OedipusHTMLTable
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 */

class
	Oedipus_OedipusHTMLTable
extends
	HTMLTags_Table
{
//        private $key_fields;
//        
//        private $column_titles;
//        
//        private $row_data;
//        
//        private $base_redirect_script_url;
	
	// An oedipus table consists of:
	//
	// There has to be at least one option and one actor;
	// Options belong to Actors.
	// For each option, every actor has a position on it.
	// For each option, there is a si-position on it.
	//
	
	private $actors;

	private $table;

	public function
		__construct(Oedipus_Table $table)
	{
		parent::__construct();
		
		$this->set_attribute_str('class', 'oedipus');
		
		$this->table = $table;

		$this->actors = $table->get_actors();
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
		return new HTMLTags_Caption($this->table->get_name());
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

//                        <colgroup class="actor-column" id="actor1" span="1">
//                        </colgroup>
//                        <colgroup class="actor-column" id="actor2" span="1">
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
		foreach ($this->actors as $actor)
		{
			$actor_colgroup = new HTMLTags_ColGroup();
			$actor_colgroup->set_attribute_str('class', 'actor-column');
			$actor_colgroup->set_attribute_str('id', $actor->get_color());
			$actor_colgroup->set_attribute_str('span', '1');
			$colgroups[] = $actor_colgroup;
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
		$heading_tr->append_tag_to_content(new HTMLTags_TH());

		/*
		 * Append the column headings for the data in the table.
		 */
		$actors = $this->get_actors();
		
		foreach ($actors as $actor) {
			$heading_tr->append_tag_to_content(new HTMLTags_TH($actor->get_short_name()));
		}
		
		// SI Column
		$si_heading = new HTMLTags_TH('s.i.');
		$heading_tr->append_tag_to_content($si_heading);
		
		return $heading_tr;
	}
	
	protected function
		get_actors()
	{
		if (count($this->actors) < 1) {
			throw new Exception('There needs to be at least one actor!');
		}
		
		return $this->actors;
	}
	
	public function
		add_actor($actor)
	{
		$this->actors[] = $actor;
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

		foreach ($this->actors as $actor)
		{
			if ($actor->has_options())
			{
				// Actors Name TR
				$actors_name_tr = new HTMLTags_TR();
				$actors_name_th = new HTMLTags_TH($actor->get_name());
				$actors_name_th->set_attribute_str('class', 'option');
				$actors_name_tr->append_tag_to_content($actors_name_th);

				for ($i = -1; $i < count($this->actors); $i++)
				{
					$blank_td = new HTMLTags_TD();
					$actors_name_tr->append_tag_to_content($blank_td);
				}
				$option_trs[] = $actors_name_tr;

				// Option TRs with positions
				$options = $actor->get_options();
				foreach ($options as $option)
				{
					$tr = new HTMLTags_TR();
					$option_th = new HTMLTags_TH($option->get_name());
					$option_th->set_attribute_str('class', 'option');
					$tr->append_tag_to_content($option_th);

					foreach ($this->actors as $position_actor)
					{
						$position = $option->get_position($position_actor->get_name());

						$position_td = new HTMLTags_TD();
						$position_td->append_tag_to_content(
							$this->get_position_tile($position)
						);
						$tr->append_tag_to_content($position_td);
					}

					// Stated Intention TD
					$stated_intention = $option->get_stated_intention();
					$stated_intention_td = new HTMLTags_TD();
					$stated_intention_td->append_tag_to_content(
						$this->get_stated_intention_tile($stated_intention, $actor)
					);
					$tr->append_tag_to_content($stated_intention_td);

					$option_trs[] = $tr;
				}
			}
		}

		return $option_trs;
	}
	
	public function
		get_position_tile(Oedipus_Position $position)
	{
//                <a href="#" class="position-tile" id="actor1-option1">0</a>

		$html_tile_link = new HTMLTags_URL();
		$html_tile_link->set_file('#');

		$html_tile = new HTMLTags_A($position->get_tile() . $position->get_doubt());
		$html_tile->set_href($html_tile_link);

		$html_tile->set_attribute_str('class', 'position-tile');
		$actor = $position->get_actor();
		$html_tile_id = $actor->get_color() . $position->get_tile() . $position->get_doubt();
		$html_tile->set_attribute_str('id', $html_tile_id);
		return $html_tile;

	}
	
	public function
		get_stated_intention_tile(Oedipus_StatedIntention $stated_intention, Oedipus_Actor $actor)
	{
//                <a href="#" class="si-tile" id="actor1-option1">0</a>

		$html_tile_link = new HTMLTags_URL();
		$html_tile_link->set_file('#');

		$html_tile = new HTMLTags_A($stated_intention->get_tile() . $stated_intention->get_doubt());
		$html_tile->set_href($html_tile_link);

		$html_tile->set_attribute_str('class', 'si-tile');
		$html_tile_id = 
			$actor->get_color() . $stated_intention->get_tile() . $stated_intention->get_doubt();
		$html_tile->set_attribute_str('id', $html_tile_id);

		return $html_tile;
	}


	public function
		get_options($options)
	{
		return $this->table->get_options();
	}
	
	public function
		set_actors($actors)
	{
		$this->actors = $actors;
	}
}


?>
