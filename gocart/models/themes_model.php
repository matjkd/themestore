<?php
	Class Themes_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function submit_theme($data)
		{

			$this -> db -> insert('submissions', $data);

			return $this -> db -> insert_id();

		}

		function update_theme($data, $id)
		{
			$this -> db -> where('submission_id', $id);
			$this -> db -> update('submissions', $data);
			return;
		}

		function update_file($id, $filename)
		{

			$data = array('file_location' => $filename);
			$this -> db -> where('submission_id', $id);
			$this -> db -> update('submissions', $data);

		}

		function update_review($id)
		{
			$visual = $this -> input -> post('visual');
			$quality = $this -> input -> post('quality');
			$standards = $this -> input -> post('standards');
			$copy = $this -> input -> post('copy');
			$notes = $this -> input -> post('notes');

			$data = array(

				'visual_passed' => $visual,
				'standards_passed' => $standards,
				'quality_passed' => $quality,
				'copycheck_passed' => $copy,
				'notes_for_seller' => $notes
			);

			$this -> db -> where('submission_id', $id);
			$this -> db -> update('submissions', $data);

		}

		function get_submission($id, $user_id)
		{
			if ($user_id > 0)
			{
				$this -> db -> where('customer_id', $user_id);
			}

			$this -> db -> where('submission_id', $id);

			$result = $this -> db -> get('submissions');

			$return = $result -> result();

			return $return;
		}

		function get_all_submissions()
		{

			$result = $this -> db -> get('submissions');

			$return = $result -> result();

			return $return;
		}

		function get_themes($user_id)
		{

			$this -> db -> where('customer_id', $user_id);

			$result = $this -> db -> get('submissions');

			$return = $result -> result();

			return $return;
		}

		function get_random_themes($count = 3)
		{
			$this -> db -> order_by('id', 'RANDOM');
			$this -> db -> limit($count);
			$result = $this -> db -> get('products');
			$return = $result -> result();

			return $return;
		}
		function get_latest_themes($count = 4)
		{
			$this -> db -> order_by('id', 'DESC');
			$this -> db -> limit($count);
			$result = $this -> db -> get('products');
			$return = $result -> result();

			return $return;
		}
		
		function get_author($id) {
		
			$this->db->where('id', $id);
			$result = $this -> db -> get('customers');
			$return = $result -> result();

			return $return;
		}
		

	}
