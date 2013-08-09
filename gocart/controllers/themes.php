<?php

class Themes extends CI_Controller {

	//we collect the categories automatically with each load rather than for each function
	//this just cuts the codebase down a bit
	var $categories	= '';
	
	//this is so there will be a breadcrumb on every page even if it is blank
	//the breadcrumbs currently suck. on a product page if you refresh, you lose the path
	//will have to find a better way for these, but it's not a priority
	var $breadcrumb	= '';	
	
	// determine whether to display gift card link on all cart pages
	var $gift_cards_enabled = false; 
	
	//load all the pages into this variable so we can call it from all the methods
	var $pages;
	
	var $customer;
	
	function __construct()
	{
		parent::__construct();
		
		//check to see if they are on a secure URL, this will stop them from typing in the insecure url and
		//attempting to force an insecure page.... why would someone do this? I dunnno....
		force_ssl();
		
		$this->load->library('Go_cart');
		$this->load->model(array('Page_model', 'Product_model', 'Option_model','location_model'));
		$this->load->helper('form_helper');
		
		$this->customer = $this->go_cart->customer();
		
		//fill up our categories variable
		$this->categories =  $this->Category_model->get_categories_tierd(0);
		$this->pages		= $this->Page_model->get_pages();
		$gc_setting = $this->Settings_model->get_settings('gift_cards');
		
		
		//load the theme package
		$this->load->add_package_path(APPPATH.'themes/'.$this->config->item('theme').'/');
	}
	
	function index()
	{
		//we don't have a default landing page for secure
		redirect('');
	}
	
	
	
	function add_template($id = false)
	{
		//make sure they're logged in
		$this->Customer_model->is_logged_in('secure/my_account/');
		
		$this->load->view('submit_template');
	}
	
	
	
}