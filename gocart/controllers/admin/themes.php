<?php

class Themes extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		remove_ssl();
		
		if($this->auth->check_access('Orders'))
		{
			redirect($this->config->item('admin_folder').'/orders');
		}
		$this->load->model('Themes_model');
		$this->load->model('Order_model');
		$this->load->model('Customer_model');
		
		$this->load->helper('date');
		$this->load->helper('form');
		$this->lang->load('dashboard');
	}
	
	function index()
	{
		//check to see if shipping and payment modules are installed
		
		$data['page_title']	=  "Template Submissions";
		
		// get 5 latest orders
		//$data['orders']	= $this->Order_model->get_orders(false, '' , 'DESC', 5);

		// get 5 latest customers
		//$data['customers'] = $this->Customer_model->get_customers(5);
		
		$data['themes'] = $this->Themes_model->get_all_submissions();		
		
		$this->load->view($this->config->item('admin_folder').'/submissions', $data);
	}
	
	function edit_template($id)
	{
		$user_id = 0;
		$data['theme'] = $this->Themes_model->get_submission($id, $user_id);
		$this->load->view($this->config->item('admin_folder').'/review', $data);
	}
	
	function update_review()
	{
		$id =  $this->input->post('submission_id');
		$this->Themes_model->update_review($id);
		
	redirect('/admin/themes');

	}

}