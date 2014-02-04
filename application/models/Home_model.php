<?php
	class Home_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			
		}
		function get_city(){
			$query = $this->db->query("select * from city");
			return $query->result();
			
		}
	}