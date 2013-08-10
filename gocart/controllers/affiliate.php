<?php

	class Affiliate extends CI_Controller
	{

		//we collect the categories automatically with each load rather than for each
		// function
		//this just cuts the codebase down a bit
		var $categories = '';

		//load all the pages into this variable so we can call it from all the methods
		var $pages = '';

		// determine whether to display gift card link on all cart pages
		//  This is Not the place to enable gift cards. It is a setting that is loaded
		// during instantiation.
		var $gift_cards_enabled;

		var $header_text;

		function __construct()
		{
			parent::__construct();

			//make sure we're not always behind ssl
			remove_ssl();

			$this -> load -> library('Go_cart');
			$this -> load -> model(array(
				'Page_model',
				'Product_model',
				'Digital_Product_model',
				'Gift_card_model',
				'Option_model',
				'Order_model',
				'Settings_model',
				'customer_model'
			));
			$this -> load -> helper(array(
				'form_helper',
				'formatting_helper'
			));

			//fill in our variables
			$this -> categories = $this -> Category_model -> get_categories_tierd(0);
			$this -> pages = $this -> Page_model -> get_pages();

			// check if giftcards are enabled
			$gc_setting = $this -> Settings_model -> get_settings('gift_cards');
			if (!empty($gc_setting['enabled']) && $gc_setting['enabled'] == 1)
			{
				$this -> gift_cards_enabled = true;
			}
			else
			{
				$this -> gift_cards_enabled = false;
			}

			//load the theme package
			$this -> load -> add_package_path(APPPATH . 'themes/' . $this -> config -> item('theme') . '/');

		}

		function index($id)
		{

		}

		function a($id)
		{

			$affiliate = $this -> customer_model -> get_affiliate($id);

			$affiliate_id = $affiliate[0] -> id;

			//check if user is logged in
			$customer = $this -> go_cart -> customer();
			if (!isset($customer['id']))
			{
				//not logged in
				// set cookie
				$cookie = array(
			    'name'   => 'affiliateCookie',
			    'value'  =>  $affiliate_id,
			    'expire' => '2592000',
			    'domain' => '.bootstrapsauce.com',
			    'path' => '/'
			  
			);

				$this->input->set_cookie($cookie);	
				$this->session->set_userdata('affiliateCookie', $affiliate_id);
				
				redirect('/');
			}
			else
			{
				//if affiliate id is not equal to customer id, add affiliate id to user 
				if($customer['id'] != $affiliate_id) {
					
				$this->customer_model->set_referrer($customer['email'], $affiliate_id);	
				}
				
				redirect('/');
			}

		}

	}
