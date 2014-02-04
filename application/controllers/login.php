<?php 
class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->library('session');
 		$this->load->model('Muser');
	}
	
	function user_login() {
		$username = $this->input->post('uname');
		$userid = $this->Muser->get_user_id($username);
		if($userid){
			$userpassword = $this->Muser->get_user_password($userid);
			if($userpassword == $this->input->post('upass'))
			{
				echo "login success";
				$newdata = array(
						'username'  => $username,
						'uid'     => $userid,
				);
				$this->session->set_userdata($newdata);
				
				redirect('/home/index');
			}else {
				echo "× 密码不正确哦(⊙o⊙)";
			}
			
		}else{
		echo "× 没有这个用户哦╮(╯_╰)╭";
		}
	}
	
	function username_check() {

		$username = $this->input->post('uname');
		$userid = $this->Muser->get_user_id($username);
		if($userid){
			echo "√ 存在的用户名";
		}else{
			echo "× 不存在的用户名，快来注册一个吧~";
		}
	}
	
	function register_username_check() {
		$username = $this->input->post('uname');
		$userid = $this->Muser->get_user_id($username);
		if($userid){
			echo "× 已经注册过这个用户名了╮(╯▽╰)╭";
		}else{
			echo "√ 可以注册";
		}
	}
	
	function user_register() {
		$username = $this->input->post('uname');
		$userid = $this->Muser->get_user_id($username);
		if($userid){
			echo "username existed!";
		}else{
			$userpassword = $this->input->post('upass');
			$data['name'] = $username;
			$data['password'] = $userpassword;
			$data['title'] = "完成注册";
			$data['isLogin'] = false;
			$this->load->view('header',$data);
			$this->load->view('register',$data);
			$this->load->view('footer');
		}
	}
	
	function confirm_register() {
		$pic="";
		$filename = rand(0, 99999999);
		$config['upload_path'] = './images';
		$config['allowed_types'] = 'gif|jpg|png';	
		$this->load->library('upload',$config);		
		if (!$this->upload->do_upload())
		{
		echo $error = $this->upload->display_errors();
		}
		else
		{
		$data = $this->upload->data();
		$pic = $data['file_name'];
		echo $pic;
		echo '<br />';
		}
		$username = $this->Muser->insert_user("images/".$pic);
		$user_id = $this->Muser->get_user_id($username);
		if($user_id>0){
		$newdata = array(
						'username'  => $username,
						'uid'     => $user_id,
				);
		$this->session->set_userdata($newdata);
		redirect('/home/index');
		}else{
		echo 'fail';
		}		
	}
	
	function user_logout() {
	$this->session->unset_userdata('uid');
	$this->session->unset_userdata('username');
	redirect('/home/index');
	}
	
}
	
