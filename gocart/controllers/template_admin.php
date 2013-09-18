<?php

	class Template_admin extends CI_Controller
	{

		//we collect the categories automatically with each load rather than for each
		// function
		//this just cuts the codebase down a bit
		var $categories = '';

		//this is so there will be a breadcrumb on every page even if it is blank
		//the breadcrumbs currently suck. on a product page if you refresh, you lose the
		// path
		//will have to find a better way for these, but it's not a priority
		var $breadcrumb = '';

		// determine whether to display gift card link on all cart pages
		var $gift_cards_enabled = false;

		//load all the pages into this variable so we can call it from all the methods
		var $pages;

		var $customer;

		function __construct()
		{
			parent::__construct();

			//check to see if they are on a secure URL, this will stop them from typing in
			// the insecure url and
			//attempting to force an insecure page.... why would someone do this? I
			// dunnno....
			force_ssl();

			$this -> load -> library('Go_cart', 'form_validation');
			$this -> load -> model(array(
				'Page_model',
				'Product_model',
				'Option_model',
				'location_model',
				'Themes_model'
			));
			$this -> load -> helper('form_helper');

			$this -> customer = $this -> go_cart -> customer();

			//fill up our categories variable
			$this -> categories = $this -> Category_model -> get_categories_tierd(0);
			$this -> pages = $this -> Page_model -> get_pages();
			$gc_setting = $this -> Settings_model -> get_settings('gift_cards');

			//load the theme package
			$this -> load -> add_package_path(APPPATH . 'themes/' . $this -> config -> item('theme') . '/');
		}

		function index()
		{
			//we don't have a default landing page for secure
			redirect('');
		}

		function add_template($id = false)
		{
			//make sure they're logged in
			$this -> Customer_model -> is_logged_in('secure/my_account/');
			$data['customer_id'] = $this -> customer['id'];

			//set values to zero
			$data['name'] = "";
			$data['price_single'] = "";
			$data['price_multiple'] = "";
			$data['price_extended'] = "";
			$data['description'] = "";
			$data['demo_url'] = "";
			$data['notes'] = "";
			$data['version'] = "";
			$data['file_location'] ="";

			if (isset($this -> error) && $this -> error != NULL)
			{
				$data['error'] = $this -> error;
			}
			$data['action'] = "submit";
			
			
			
			$this -> load -> view('submit_template', $data);
		}

		function edit_template($id)
		{
			//make sure they're logged in
			$this -> Customer_model -> is_logged_in('secure/my_account/');
			$data['customer_id'] = $this -> customer['id'];

			$template = $this -> Themes_model -> get_submission($id, $data['customer_id']);

			if (isset($this -> error) && $this -> error != NULL)
			{
				$data['error'] = $this -> error;
			}

			foreach ($template as $row):
				
				$data['name'] = $row -> template_name;
				
				$data['price_single'] = $row -> price_single;
				$data['price_multiple'] = $row -> price_multiple;
				$data['price_extended'] = $row -> price_extended;
				$data['description'] = $row -> description;
				$data['demo_url'] = $row -> demo_location;
				$data['notes'] = $row -> notes_for_reviewer;
				$data['version'] = $row -> version;
				$data['file_location'] = $row -> file_location;
				
			endforeach;
			$data['submission_id'] = $id;
			$data['action'] = "update";
			$this -> load -> view('submit_template', $data);
		}

		function my_templates($id = false)
		{
			//make sure they're logged in
			$this -> Customer_model -> is_logged_in('secure/my_account/');
			$data['customer_id'] = $this -> customer['id'];
			if (isset($this -> error) && $this -> error != NULL)
			{
				$data['error'] = $this -> error;
			}
			$data['templates'] = $this -> Themes_model -> get_themes($data['customer_id']);

			$this -> load -> view('my_templates', $data);
		}

		function submit_template($id = false)
		{
			//make sure they're logged in
			$this -> Customer_model -> is_logged_in('secure/my_account/');

			$customer_id = $this -> customer['id'];

			$this -> load -> library('form_validation');

			$this -> form_validation -> set_rules('name', 'Template Name', 'trim|required');
			$this -> form_validation -> set_rules('price_single', 'Price Single', 'trim|required');
			$this -> form_validation -> set_rules('price_multiple', 'Price multiple', 'trim');
			$this -> form_validation -> set_rules('price_extended', 'Price extended', 'trim');
			$this -> form_validation -> set_rules('demo_url', 'Demo URL', 'trim|required');

			$this -> form_validation -> set_rules('version', 'Version', 'trim|required');
			$this -> form_validation -> set_rules('description', 'description', 'trim|required');
			$this -> form_validation -> set_rules('notes', 'notes', 'trim');

			$action = $this -> input -> post('action');

			//check validation
			if ($this -> form_validation -> run() == FALSE)
			{

				$this -> error = validation_errors();

				if ($action == 'submit')
				{
					$this -> add_template();
					
				}

				if ($action == 'update')
				{
					
					$submission_id = $this->input->post('submission_id');
					$this -> edit_template($submission_id);
				}
			}
			else
			{

				//array
				$submission = array(

					'customer_id' => $customer_id,
					'template_name' => set_value('name'),
					'price_single' => set_value('price_single'),
					'price_multiple' => set_value('price_multiple'),
					'price_extended' => set_value('price_extended'),
					'description' => set_value('description'),
					'demo_location' => set_value('demo_url'),
					'version' => set_value('version'),
					'notes_for_reviewer' => set_value('notes')
				);

				if ($action == 'submit')
				{
					$submit_template = $this -> Themes_model -> submit_theme($submission);
					$content = "A template has been submitted";
			$this->email_admin($content);
				}

				if ($action == 'update')
				{
					$submission_id = $this->input->post('submission_id');
					$submit_template = $this -> Themes_model -> update_theme($submission, $submission_id);
				}

				$this -> do_upload($submit_template);

			}

		}

		function add_file()
		{
			$template_id = $this -> input -> post('template_id');
			$this -> do_upload($template_id);
		}

		function do_upload($submit_id)
		{

			$config['upload_path'] = 'uploads/submissions';
			$config['allowed_types'] = 'zip|rar|jpg';
			$config['remove_spaces'] = true;

			$this -> load -> library('upload', $config);

			if (!$this -> upload -> do_upload())
			{

				$error = array('error' => $this -> upload -> display_errors());
				$this -> error = $error['error'];
				//$this->load->view('upload_form', $error);
				$this -> my_templates();
			}
			else
			{
				$upload_data = $this -> upload -> data();

				//$this->load->view('upload_success', $data);
				$filename = $upload_data['file_name'];

				//add filename to submissions
				$this -> Themes_model -> update_file($submit_id, $filename);
				$this -> my_templates();
			}

		}
		
		function email_admin($content)
		{
			$this->load->library('email');
			
			$config['mailtype'] = 'html';
			
			$this->email->initialize($config);
	
			$this->email->from($this->config->item('email'), $this->config->item('company_name'));
			$this->email->to('mat@redstudio.co.uk');
			$this->email->bcc($this->config->item('email'));
			$this->email->subject('Bootstrap Update');
			$this->email->message(html_entity_decode($content));
			
			$this->email->send();
		}

	}
