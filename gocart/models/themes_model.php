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
		
		function update_file($id, $filename) {
			
			$data = array(
			'file_location' => $filename
			);
			$this->db->where('submission_id', $id);
			$this->db->update('submissions', $data);
			
			
		}
		
		function get_themes($user_id) {
			
			$this->db->where('customer_id', $user_id);
			
			$result	= $this->db->get('submissions');
			
			$return = $result->result();
			
			
			return $return;
		}

	}
