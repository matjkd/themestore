<?php
	Class Themes_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function submit_theme($data)
		{
		
			
			
		$this->db->insert('submissions', $data);
		return $this->db->insert_id();
		}

	}
