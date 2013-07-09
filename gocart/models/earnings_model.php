<?php
	Class Earnings_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function get_customer_earnings($user_id)
		{
			
			$this->db->join('orders', 'orders.order_number = earnings.order_id');
			$this->db->join('products', 'products.id = earnings.product_id');
			$this->db->order_by('orders.ordered_on', 'DESC');
			$this -> db -> where('earnings.customer_id', $user_id);
			return $this->db->get('earnings')->result();
			
			
		}
		
		function get_affiliate_earnings($user_id)
		{
			$this->db->join('orders', 'orders.order_number = earnings.order_id');
			$this->db->join('products', 'products.id = earnings.product_id');
			$this->db->order_by('orders.ordered_on', 'DESC');
			$this -> db -> where('earnings.referrer_id', $user_id);
			return $this->db->get('earnings')->result();
			
			
		}

		function save_earnings($order_id, $product_owner, $item_id, $total, $referrer_id)
		{

			$rate = 0.55;
			if ($referrer_id > 0)
			{
				$affiliate_rate = 0.1;
			}
			else
			{
				$affiliate_rate = 0;
			}
			$owner_earning = $rate * $total;
			$affiliate_earning = $affiliate_rate * $total;

			$site_earnings = $total - ($owner_earning + $affiliate_earning);

			$earnings = array(

				'product_id' => $item_id,
				'customer_id' => $product_owner,
				'value' => $total,
				'order_id' => $order_id,
				'referrer_id' => $referrer_id,
				'rate' => $rate,
				'owner_earnings' => $owner_earning,
				'affiliate_earnings' => $affiliate_earning,
				'site_earnings' => $site_earnings
			);

			$this -> db -> insert('earnings', $earnings);

			return;

		}

		function get_referrer($user_id)
		{
			$this -> db -> where('id', $user_id);
			$result = $this -> db -> get('customers');

			$customer = $result -> row();

			return $customer -> referred_by;
		}

	}
