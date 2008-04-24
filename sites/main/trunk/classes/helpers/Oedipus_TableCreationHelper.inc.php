<?php
/**
 * Oedipus_TableCreationHelper
 *
 * @copyright RFI, 2008-02-18
 * @copyright SANH, 2008-04-19
 */

class
	Oedipus_TableCreationHelper
{

	public static function
		render_oedipus_table_creator_page_div(
			Oedipus_Table $table = NULL
		)
	{
		if ($table == NULL)
		{
			$table = self::get_default_oedipus_table();
		}

		$table_creator_page_div = new HTMLTags_Div();
		$table_creator_page_div->set_attribute_str('class', 'table-creator');

		$table_div = new HTMLTags_Div();
		$table_div->set_attribute_str('class', 'oedipus-table');
		$html_table = Oedipus_TableRenderer::render_oedipus_html_table($table);
		$table_div->append_tag_to_content($html_table);
		$table_creator_page_div->append_tag_to_content($table_div);

		$form_div = new HTMLTags_Div();
		$form_div->set_attribute_str('class', 'table-creator-form');
		$html_form = Oedipus_TableCreationHelper::render_oedipus_html_table_creator_form($table);
		$form_div->append_tag_to_content($html_form);
		$table_creator_page_div->append_tag_to_content($form_div);

		return $table_creator_page_div;
	}

	public static function
		get_oedipus_table_by_id($table_id)
	{
		$dbh = DB::m();
		// Get the table
		$tables_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_tables
	WHERE
		id = $table_id
SQL;

		//                print_r($tables_query);exit;
		$tables_result = mysql_query($tables_query, $dbh);
		//                print_r($tables);exit;
		$table_result = mysql_fetch_array($tables_result);
		// -----------------------------------------------------------------------------
		// Creating a Table
		// -----------------
		// 1.
		// Create the actors,
		// and their options, options have stated intentions

		// For this table, get the actors
		$table_id = $table_result['id'];
		// Get all actors for this drama
		$actors_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_actors
	WHERE
		table_id = $table_id
SQL;

		//                print_r($actors_query);exit;
		$actors_result = mysql_query($actors_query, $dbh);
		//                print_r($actors);exit;

		// create an array of actors
		$actors = array();
		while($actor_result = mysql_fetch_array($actors_result))
		{
			$actor = new Oedipus_Actor(
				$actor_result['id'], $actor_result['name'], $actor_result['color']
			);

			//add the stated intentions to the option object
			//add the options to the actor object

			// For this actor, get the options
			$actor_id = $actor_result['id'];
			// Get all actors for this drama
			$options_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_options
	WHERE
		actor_id = $actor_id
SQL;

			//                print_r($actors_query);exit;
			$options_result = mysql_query($options_query, $dbh);
			//                print_r($actors);exit;

			$options = array();
			while($option_result = mysql_fetch_array($options_result))
			{
				//get the stated intention
				$stated_intention_id = $option_result['stated_intention_id'];
				$stated_intentions_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_stated_intentions
	WHERE
		id = $stated_intention_id
SQL;

				//                print_r($actors_query);exit;
				$stated_intentions_result = mysql_query($stated_intentions_query, $dbh);
				$stated_intention_result = mysql_fetch_array($stated_intentions_result);

				$stated_intention = new Oedipus_StatedIntention(
					$stated_intention_result['position'],
					$stated_intention_result['doubt']
				);

				$actors_option = 
					new Oedipus_Option(
						$option_result['id'],
						$option_result['name'],
						$stated_intention
					);

				$actor->add_option($actors_option);
			}

			$actors[] = $actor;
			//add the positions to the option object
			//
		}

		// 2.
		// create the positions 
		// attached to options for ease of display (?)
		// positions have an actor as well as an option
		foreach ($actors as $actor)
		{
			foreach ($actor->get_options() as $option)
			{
				$positions = array();

				foreach ($actors as $position_actor)
				{
					$actor_id = $position_actor->get_id();
					$option_id = $option->get_id();
					// Get all actors for this drama
					$positions_query = <<<SQL
SELECT 
	*
	FROM
		oedipus_positions
	WHERE
		actor_id = $actor_id
AND
		option_id = $option_id
SQL;

					//                print_r($actors_query);exit;
					$positions_result = mysql_query($positions_query, $dbh);
					//                print_r($actors);exit;
					$position_result = mysql_fetch_array($positions_result);

					$positions[$position_actor->get_name()] =
						new Oedipus_Position(
							$position_result['position'],
							$position_result['doubt'],
							$position_actor
						);
				}

				$option->add_positions($positions);
			}
		}


		$table = new Oedipus_Table($table_result['id'], $table_result['name'], $actors);
		// DEBUG
		// print_r($table->get_actors());exit;

		return $table;
	}


	public static function
		create_oedipus_table_from_get($get)
	{
		// Creating a Table
		// -----------------
		// 1.
		// Create the actors,
		// and their options, options have stated intentions

		$actors = array();
		for ($i = 1; $i <= $get['no_of_actors'];  $i++)
		{
			$actor = new Oedipus_Actor($i, $get['actor_name-' . $i], $get['actor_color-' . $i]);

			for ($j = 1; $j <= $get['actor-' . $i . '-no_of_options'];  $j++)
			{
				$stated_intention = new Oedipus_StatedIntention('1', 'q');
				$actors_option = 
					new Oedipus_Option(
						$j, $get['actor-' . $i . '-option_name-' . $j], $stated_intention
					);

				$actor->add_option($actors_option);
			}

			$actors[] = $actor;
		}
		
		// 2.
		// create the positions 
		// attached to options for ease of display (?)
		// positions have an actor as well as an option
		foreach ($actors as $actor)
		{
			foreach ($actor->get_options() as $option)
			{
				$positions = array();

				foreach ($actors as $position_actor)
				{
					$positions[$position_actor->get_name()] =
					       	new Oedipus_Position('0', 'q', $position_actor);
				}

				$option->add_positions($positions);
			}
		}
		
		// 3.
		// Create the table
		$table = new Oedipus_Table($get['table_name'], $actors);

		// DEBUG
		// print_r($table->get_actors());exit;

		return $table;
	}

	public static function
		get_default_oedipus_table()
	{
		//fake get variables:
		//
		$get = array();
		$get['table_name'] = 'Example Drama Theoretic Oedipus Table';
		$get['no_of_actors'] = 2;

		$get['actor_name-1'] = 'Ryu';
		$get['actor_color-1'] = 'blue';
		$get['actor-1-no_of_options'] = 2;
		$get['actor-1-option_name-1'] = 'smoke weed';
		$get['actor-1-option_name-2'] = 'learn kung fu';

		$get['actor_name-2'] = 'Ganja Master';
		$get['actor_color-2'] = 'red';

		return self::create_oedipus_table_from_get($get);
	}

	public static function
		render_oedipus_html_table_creator_form(
			Oedipus_Table $table
		)
	{
		$form = new Oedipus_OedipusTableCreatorHTMLForm('table_creator');
		$form->set_legend_text('Table Values');

		// action
		$form_action = self::get_table_creator_form_action_url();
		$form->set_action($form_action);

		// cancel
		$form_cancel = self::get_table_creator_form_cancel_url();
		$form->set_cancel_location($form_cancel);

		// Table Name Input
		$form->add_input_name_with_value('table_name', $table->get_name(), 'Table Name:');

		// Actor Inputs
		foreach ($table->get_actors() as $actor)
		{
			$actor_name_li = new HTMLTags_LI();
			$actor_name_li->append_str_to_content('Actor &lsquo;' . $actor->get_name() . '&rsquo;:');
			$form->add_input_li($actor_name_li);

			// Name Input
			$form->add_input_name_with_value(
				'actor_name-' . $actor->get_id(), $actor->get_name(), 'Name:'
			);
			// color Input
			$form->add_input_name_with_value(
				'actor_color-' . $actor->get_id(), $actor->get_color(), 'Color:'
			);

			// Options
			foreach ($actor->get_options() as $option)
			{
				$option_name_li = new HTMLTags_LI();
				$option_name_li->append_str_to_content('Option ' . $option->get_id() . ':');
				$form->add_input_li($option_name_li);

				// name Input
				$form->add_input_name_with_value(
					'actor-' . $actor->get_id() . '-'
					. 'option_name-' . $option->get_id(),
					       	$option->get_name(), 'Action:'
				);

				// stated_intention Input
//                                $stated_intention = $option->get_stated_intention();
//                                $form->add_input_name_with_value(
//                                        'actor-' . $actor->get_id() . '-'
//                                        . 'option_stated_intention-' . $option->get_id(),
//                                                $stated_intention->get_tile() . $stated_intention->get_doubt(),
//                                                       'Stated Intention:'
//                                );

				// Hidden Inputs
				$form->add_hidden_input(
					'actor-' . $actor->get_id() . '-no_of_options', $table->count_actors()
				);
			}
		}

		// Hidden Inputs
		$form->add_hidden_input('no_of_actors', $table->count_actors());

		$form->set_submit_text('Update Table');

		return $form;
	}

	// PROCESS GET & POST
	public static function
		process_table_creator_form()
	{
//                echo 'print_r($_GET)' . "\n";
//                print_r($_GET);
//                echo 'print_r($_POST)' . "\n";
//                print_r($_POST);exit;
		//echo 'print_r($_SESSION)' . "\n";
		//print_r($_SESSION);
//                echo '$_SESSION[\'name\']: ' . $_SESSION['name'] . "\n";
//                echo '$_SESSION[\'email\']: ' . $_SESSION['email'] . "\n";
//                
//                $return_to_url = self::get_table_creator_page_url();
		$return_to_url = new HTMLTags_URL();
		$return_to_url->set_file('/');
		$return_to_url->set_get_variable('oo-page', 1);
		$return_to_url->set_get_variable('page-class', 'Oedipus_TableCreatorPage');

		$return_to_url->set_get_variable('table_values', 1);

		foreach ($_POST as $key=>$value)
		{
			$return_to_url->set_get_variable($key, $value);
		}


//                print_r($_POST);echo $return_to_url->get_as_string();exit;
//                
//                if (isset($_GET['add_person'])) {
//                        $mysql_user_factory = Database_MySQLUserFactory::get_instance();
//                        $mysql_user = $mysql_user_factory->get_for_this_project();
//                        $database = $mysql_user->get_database();
//                        
//                        $people_table = $database->get_table('hpi_mailing_list_people');
//                        
//                        if (isset($_POST['name'])) {
//                                $_SESSION['name'] = $_POST['name'];
//                        }
//                        
//                        if (isset($_POST['email'])) {
//                                $_SESSION['email'] = $_POST['email'];
//                        }
//                        

//            try {
//                $last_added_id = $oedipus_tables_table->update_table(
//                    $_POST['name'],
//                    $_POST['email'],
//                    isset($_POST['force_email'])
//                );
//                
//                $return_to_url->set_get_variable('table_updated');

//                
//                $_SESSION['last_added_id'] = $last_added_id;
//                
//                unset($_SESSION['name']);
//                unset($_SESSION['email']);
//            } catch (MailingList_NameAndEmailException $e) {
//                $return_to_url->set_get_variable('form_incomplete');
//            } catch (MailingList_NameTooLongException $e) {
//                $return_to_url->set_get_variable('name_too_long');
//            } catch (MailingList_EmailTooLongException $e) {
//                $return_to_url->set_get_variable('email_too_long');
//            } catch (MailingList_InvalidEmailException $e) {
//                $return_to_url->set_get_variable('email_incorrect');
//            } catch (Database_InvalidUserInputException $e) {
//                $return_to_url->set_get_variable('error_message', urlencode($e->getMessage()));
//            }
//                }
//                
//                print_r($return_to_url);
		#exit;
		
		return $return_to_url;
	}
	
	/*
	 * ----------------------------------------
	 * Functions to do with making URLs
	 * ----------------------------------------
	 */
	
	// FORM URLS
	public static function
		get_table_creator_form_action_url()
	{
		#$url = new HTMLTags_URL();
		#$url->set_file('/Oedipus_TableCreatorRedirectScript');
		#return $url;
		
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_TableCreatorRedirectScript');
	}
	
	public static function
		get_table_creator_form_cancel_url()
	{
		#$url = new HTMLTags_URL();
		#$url->set_file('/Oedipus_TableCreatorPage');
		#return $url;
		
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_TableCreatorPage');
	}
}
?>
