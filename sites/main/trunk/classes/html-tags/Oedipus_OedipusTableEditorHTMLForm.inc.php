<?php
/**
 * Oedipus_OedipusTableEditorHTMLForm
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Oedipus Form for editing tables
 *
 * Oedipus_TableNameEditor,
 * Oedipus_ActorEditor,
 * Oedipus_OptionEditor
 *
 * all inherit from this
 */

class
	Oedipus_OedipusTableEditorHTMLForm
extends
	HTMLTags_SimpleForm
{
	private $table;

	private $first_input_name;
	
	private $input_lis;
	
	private $submit_text;
	
	public function
		__construct(
			Oedipus_Table $table,
		       	$name
		)
	{
		parent::__construct('form', NULL);

		$method = 'POST';
		
		$this->set_attribute_str('name', $name);
		$this->set_attribute_str('method', $method);
		$this->set_attribute_str('class', 'basic-form');
		$this->set_attribute_str('id', 'basic-form');
		
		$this->input_lis = array();

		$this->table = $table;

		# action
		$this_action = $this->get_table_editor_form_action_url();
		$this->set_action($this_action);

//                # cancel
//                $this_cancel = $this->get_table_editor_form_cancel_url();
//                $this->set_cancel_location($this_cancel);

		# Hidden Inputs
		$this->add_hidden_input('table_id', $table->get_id());

		$this->set_submit_text('Update Table');
	}
	
	public function
		append_str_to_content($str)
	{
		$msg = <<<MSG
Attempt to append a string to the content of a HTMLTags_SimpleOLForm!
MSG;

		throw new Exception($msg);
	}
	
	public function
		append_tag_to_content(HTMLTags_Tag $tag)
	{
		$msg = <<<MSG
Attempt to append a tag to the content of a HTMLTags_SimpleOLForm!
MSG;

		throw new Exception($msg);
	}
	/*
	 * ----------------------------------------
	 * Functions to do with the inputs
	 * ----------------------------------------
	 */
	
	public function
		add_input_tag(
			$name,
			HTMLTags_InputTag $input_tag,
			$label_text = NULL,
			$post_content = NULL
		)
	{
		#echo "In HTMLTags_SimpleOLForm::add_input_tag(...)\n";
		
		$input_li = new HTMLTags_LI();
		
		if (!isset($label_text)) {
			$l_t_l_o_ws
				= Formatting_ListOfWordsHelper
					::get_list_of_words_for_string(
						$name,
						'_'
					);
			
			$label_text = $l_t_l_o_ws->get_words_as_capitalised_string();
		#    echo "\$label_text: $label_text\n";
		#} else {
		#    echo "\$label_text: $label_text\n";
		}
		
		#echo "After if\n";
		
		$input_label = new HTMLTags_Label($label_text);
		$input_label->set_attribute_str('for', $name);
		#$input_label->set_attribute_str('id', $name);
		
		$input_li->append_tag_to_content($input_label);
		
		$input_li->append_tag_to_content($input_tag);
		
		if (isset($post_content)) {
			#print_r($post_content);
			
			$input_li->append($post_content);
		#} else {
		#	echo "No post_content!\n";
		}
		
		$input_msg_box = new HTMLTags_Span();
		$input_msg_box->set_attribute_str('id', $name . 'msg');
		$input_msg_box->set_attribute_str('class', 'rules');
		
		$input_li->append_tag_to_content($input_msg_box);
		
		if (count($this->input_lis) == 0) {
			$this->first_input_name = $name;
		}
		
		$this->input_lis[] = $input_li;
	}

	public function
		add_input_li($input_li)
	{
		$this->input_lis[] = $input_li;
	} 

	public function
		add_input_name(
			$name,
			$label_text = NULL,
			$post_content = NULL
		)
	{
		$input_tag = new HTMLTags_Input();
		
		$input_tag->set_attribute_str('type', 'text');
		$input_tag->set_attribute_str('id', $name);
		$input_tag->set_attribute_str('name', $name);
		
		$this->add_input_tag(
			$name,
			$input_tag,
			$label_text,
			$post_content
		);
	}
	
	public function
		add_input_name_with_value(
			$name,
			$value,
			$label_text = NULL,
			$post_content = NULL
		)
	{
		$input_tag = new HTMLTags_Input();
		
		$input_tag->set_attribute_str('type', 'text');
		$input_tag->set_attribute_str('id', $name);
		$input_tag->set_attribute_str('name', $name);
		$input_tag->set_attribute_str('value', $value);
		
		$this->add_input_tag(
			$name,
			$input_tag,
			$label_text,
			$post_content
		);
	}
	
	protected function
		get_input_lis()
	{
		return $this->input_lis;
	}
	
	/*
	 * ----------------------------------------
	 * Functions to do with the submit button.
	 * ----------------------------------------
	 */
	
	public function
		set_submit_text($submit_text)
	{
		$this->submit_text = $submit_text;
	}
	
	protected function
		get_submit_text()
	{
		if (isset($this->submit_text)) {
			return $this->submit_text;
		} else {
			throw
				new Exception(
					'Submit text must be set in HTMLTags_SimpleOLForm!'
				);
		}
	}
	
	protected function
		get_submit_button()
	{
		$submit_button = new HTMLTags_Input();
		
		$submit_button->set_attribute_str('type', 'submit');
		$submit_button->set_attribute_str('value', $this->get_submit_text());
		$submit_button->set_attribute_str('class', 'submit');
		
		return $submit_button;
	}

	/*
	 * ----------------------------------------
	 * Functions to do with putting the whole thing together.
	 * ----------------------------------------
	 */
	
	protected function
		get_required_attributes()
	{
		$required_attributes = parent::get_required_attributes();
		
		$required_attributes[] = 'name';
		$required_attributes[] = 'method';
		#$required_attributes[] = 'action';
		
		return $required_attributes;
	}
	
	protected function
		get_content()
	{
		$content = new HTMLTags_TagContent();
	
		/* 
		 * The Inputs
		 */
		$inputs_list = new HTMLTags_OL();
		
		$input_lis = $this->get_input_lis();
		
		if (count($input_lis) > 0) {
			foreach ($input_lis as $input_li) {
				$inputs_list->add_li($input_li);
			}
		} else {
			throw new Exception('No inputs set in HTMLTags_SimpleOLForm!');
		}
		
		$content->append_tag($inputs_list);
				
		/*
		 * The buttons
		 */
		
		$submit_buttons_div = new HTMLTags_Div();
		$submit_buttons_div->set_attribute_str(
			'class',
			'submit_buttons_div'
		);
		
		$submit_buttons_div
			->append_tag_to_content($this->get_submit_button());
		$content->append_tag($submit_buttons_div);
		
		/*
		 * The hidden inputs.
		 */
		
		foreach ($this->get_hidden_inputs() as $hidden_input) {
			$content->append_tag($hidden_input);
		}
	
		return $content;
	}
	
	# FORM URLS
	private function
		get_table_editor_form_action_url()
	{
		$get_variables = array("table_id" => $this->table->get_id());
		return PublicHTML_URLHelper::get_oo_page_url(
				'Oedipus_TableEditorRedirectScript',
				$get_variables
			);
	}
	
	private function
		get_table_editor_form_cancel_url()
	{
		$get_variables = array("table_id" => $this->table->get_id());
		return PublicHTML_URLHelper::get_oo_page_url(
				'Oedipus_TableEditorPage',
				$get_variables
			);
	}

}
?>
