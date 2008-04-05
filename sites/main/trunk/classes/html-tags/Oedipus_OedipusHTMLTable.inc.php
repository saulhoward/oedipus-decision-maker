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
	private $options;

	public function
		__construct()
	{
		parent::__construct();
		
		$this->set_attribute_str('id', 'reorder_rows');
		
		$this->actors = array();
		
		$this->options = array();
	}
	
	protected function
		get_content()
	{
		$content = new HTMLTags_TagContent();
		
		$content->append_tag($this->get_thead());
		
		$content->append_tag($this->get_tbody());
		
		return $content;
	}
	
	protected function
		get_thead()
	{
		$thead = new HTMLTags_THead();
		
		$thead->append_tag_to_content($this->get_heading_tr());
		
		return $thead;
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
			$heading_tr->append_tag_to_content(new HTMLTags_TH($actor->get_name()));
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
		$options = $this->get_options();
		foreach ($options as $option)
		{



	}
	
	public function
		get_options($options)
	{
		if (count($this->options) < 1) {
			throw new Exception('There needs to be at least one option!');
		}
		
		return $this->options;
	}
	
	public function
		add_option($option)
	{
		$this->options[] = $option;
	}

//        protected function
//                get_base_redirect_script_url()
//        {
//                if (!isset($this->base_redirect_script_url)) {
//                        throw new Exception("The base redirect script URL must be set!");
//                }
//                
//                return $this->base_redirect_script_url;
//        }
//        
//        public function
//                set_base_redirect_script_url(
//                        HTMLTags_URL $base_redirect_script_url
//                )
//        {
//                $this->base_redirect_script_url = $base_redirect_script_url;
//        }
//        
//        protected function
//                get_key_fields()
//        {
//                if (!isset($this->key_fields)) {
//                        throw new Exception("The key fields must be set!");
//                }
//                
//                return $this->key_fields;
//        }
//        
//        public function
//                set_key_fields($key_fields)
//        {
//                $this->key_fields = $key_fields;
//        }

	public function
		set_actors($actors)
	{
		$this->actors = $actors;
	}

	public function
		set_options($options)
	{
		$this->options = $options;
	}

}


?>
