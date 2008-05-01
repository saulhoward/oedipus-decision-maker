<?php
class
	Oedipus_TableEditorRedirectScript
extends
	PublicHTML_RedirectScript
{
	private $table_id;

	protected function
		do_actions()
	{
		$return_to_url = $this->get_return_to_url();

		/*
		 * The $_POST
		 */
		if (isset($_POST['table_id']))
		{
			$this->table_id = $_POST['table_id'];

			if (isset($_POST['table_name']))
			{
				Oedipus_TableCreationHelper::set_table_name(
					$this->table_id,
					$_POST['table_name']
				);
			}

			elseif (
				isset($_POST['actor_id'])
				&&
				isset($_POST['actor_name'])
				&&
				isset($_POST['actor_color'])
			)
			{
				Oedipus_TableCreationHelper::update_actor_by_id(
					$_POST['actor_id'],
					$_POST['actor_name'],
					$_POST['actor_color']
				);
			}

		}

		/*
		 * The $_GET
		 */
		elseif (isset($_GET['table_id']))
		{
			$this->table_id = $_GET['table_id'];
			if (
				isset($_GET['new_actor'])
			)
			{
				Oedipus_TableCreationHelper::add_actor(
					'New Actor',
					$this->table_id,
					'orange'
				);
			}
			elseif (
				isset($_GET['delete_actor'])
				&&
				isset($_GET['actor_id'])
			)
			{
				Oedipus_TableCreationHelper::delete_actor(
					$_GET['actor_id']
				);
			}
			elseif (
				isset($_GET['add_option'])
				&&
				isset($_GET['actor_id'])
			)
			{
				Oedipus_TableCreationHelper::add_option(
					'New Option',
					$_GET['actor_id'],
					$this->table_id
				);
			}
	
		}

		$this->set_return_to_url($return_to_url);
	}
	
	protected function
		get_return_to_url()
	{
		$get_variables = array();

		if (isset($this->table_id))
		{
			$get_variables = array("table_id" => $this->table_id);

		}

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_TableEditorPage', $get_variables);
	}

}
?>
