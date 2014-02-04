<?php 

class Muser extends CI_Model{
	function __construct() {
		parent::__construct();
		
	}
	
	function get_all_users($num,$offset) {
		$query = "select * from user limit $offset,$num";
		$excution = $this->db->query($query);
		$result = $excution->result();
		return $result;
	}
	
	function search_users($key,$num,$offset) {
		$query = "select * from user where username like '%$key%' limit $offset,$num";
		$excution = $this->db->query($query);
		$result = $excution->result();
		return $result;
	}
	
	function search_count($key) {
		$query = "select * from user where username like '%$key%'";
		$excution = $this->db->query($query);
		return $excution->num_rows();
	}
	
	function get_user_id($name) {
		$name=addslashes($name);
		$query = "select uid from user where username = '$name'";
		$excution = $this->db->query($query);
		$result = $excution->result();
		if($excution->num_rows()>0)
			return $result[0]->uid;
		else {
			return false;
		}
	}
	
	function get_user_password($id) {
		$query = "select password from user where uid = '$id'";
		$excution = $this->db->query($query);
		$result = $excution->result();
		return $result[0]->password;
	}
	
	function get_user($id) {
		$query = "select * from user where uid = '$id'";
		$excution = $this->db->query($query);
		$result = $excution->result();
		return $result[0];
	}
	


	
	function insert_user($pic) {
		$username = addslashes($this->input->post('rname'));
		$password = addslashes($this->input->post('rpass'));
		$email = addslashes($this->input->post('email'));
		$phone = addslashes($this->input->post('phonenum'));
		$location = addslashes($this->input->post('location'));
		
		
		$query = $this->db->query("insert into user(username,password,email,phone,location,description,headportrait) values('$username','$password','$email','$phone','$location','','$pic')");
		
		$user_id=$this->db->insert_id();		
						
		return $username;
	}
	
	function get_today_ques_count($user_id) {
		$query = "select count(*) as count from questions where userid=$user_id and year(now())=year(date) and month(now())=month(now()) and day(now())=day(date)";
		$excution = $this->db->query($query);
		$result = $excution->result();
		
		return $result[0]->count;
	}
	
	function get_user_authority($user_id) {
		$query = "select score from user where id=$user_id";
		$excution = $this->db->query($query);
		$result = $excution->result();
		
		$score = $result[0]->score;
		if($score >= 100){
			return 5;
		}else{
			return 2;
		}		
	}
	
	function whether_can_ask($user_id) {
		return $this->get_today_ques_count($user_id)<$this->get_user_authority($user_id);
	}
	
}