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
	HTMLTags_SimpleOLForm
#        HTMLTags_SimpleForm
{
	private $table;

	public function
		__construct(Oedipus_Table $table, $form_name)
	{
		parent::__construct($form_name);

		$this->table = $table;

		$this->set_legend_text('Table Values');

		# action
		$this_action = $this->get_table_editor_form_action_url();
		$this->set_action($this_action);

		# cancel
		$this_cancel = $this->get_table_editor_form_cancel_url();
		$this->set_cancel_location($this_cancel);

//                # Table Name Input
//                $this->add_input_name_with_value('table_name', $table->get_name(), 'Table Name:');

//                # Actor Inputs
//                foreach ($table->get_actors() as $actor)
//                {
//                        $actor_name_li = new HTMLTags_LI();
//                        $actor_name_li->append_str_to_content('Actor &lsquo;' . $actor->get_name() . '&rsquo;:');
//                        $this->add_input_li($actor_name_li);

//                        # Name Input
//                        $this->add_input_name_with_value(
//                                'actor_name-' . $actor->get_id(), $actor->get_name(), 'Name:'
//                        );
//                        # color Input
//                        $this->add_input_name_with_value(
//                                'actor_color-' . $actor->get_id(), $actor->get_color(), 'Color:'
//                        );

//                        # Options
//                        foreach ($actor->get_options() as $option)
//                        {
//                                $option_name_li = new HTMLTags_LI();
//                                $option_name_li->append_str_to_content(
//                                        'Option &lsquo;' 
//                                        . $option->get_name() 
//                                        . '&rsquo;:'
//                                );
//                                $this->add_input_li($option_name_li);

//                                # name Input
//                                $this->add_input_name_with_value(
//                                        'actor-' . $actor->get_id() . '-'
//                                        . 'option_name-' . $option->get_id(),
//                                                $option->get_name(), 'Action:'
//                                        );

//                                # stated_intention Input
//                                #     $stated_intention = $option->get_stated_intention();
//                                #       $this->add_input_name_with_value(
//                                #          'actor-' . $actor->get_id() . '-'
//                                #          . 'option_stated_intention-' . $option->get_id(),
//                                #  $stated_intention->get_tile() . $stated_intention->get_doubt(),
//                                #    'Stated Intention:'
//                                #                                );

//                                # Hidden Inputs
//                                $this->add_hidden_input(
//                                        'actor-' . $actor->get_id() . '-no_of_options', $table->count_actors()
//                                );
//                        }
//                }

		# Hidden Inputs
		$this->add_hidden_input('table_id', $table->get_id());

		$this->set_submit_text('Update Table');
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
