<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller{
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->helper('url');
 		$this->load->model('Mhome');
 		$this->load->library('session');
 		$this->load->database();
 	}
	function index(){
		$data['isLogin']=$this->Mhome->checklogin();
		$data['city'] = $this->Mhome->get_scenery();

		$this->load->view('header',$data);
		$this->load->view('index',$data);	
		$this->load->view('footer');	
	}
	

	
function scenery(){
		$sname=urldecode($this->uri->segment(3));
	
		$data['isLogin']=$this->Mhome->checklogin();
		$result=$this->Mhome->get_sceneryInfo($sname);
		$data['detail']=$result[0];
		$data['turl']=$this->Mhome->get_travel_pictures($sname,3);
			
		$this->load->view('header',$data);
		$this->load->view('scenery',$data);
		$this->load->view('footer');
	}
	
	function user_center(){
		$uid=$this->uri->segment(3);
		$data['isLogin']=$this->Mhome->checklogin();
		$result=$this->Mhome->get_user($uid);
		$data['user']=$result[0];
		$data['travel']=$this->Mhome->get_travel_by_uid($uid);
		$data['like']=$this->Mhome->get_like($uid);
		$data['collect']=$this->Mhome->get_collect($uid);
			
		$this->load->view('header',$data);
		$this->load->view('user_center',$data);
		$this->load->view('footer');
	}
	
	
	function discovery(){
		$data['latest_travel'] = $this->Mhome->get_latest_travel();
		$data['isLogin']=$this->Mhome->checklogin();
		$this->load->view('header',$data);
		$this->load->view('discover',$data);
		$this->load->view('footer');
		
	}
	function login() {
		$data['page_title']='登录/注册';
		$data['isLogin']=$this->Mhome->checklogin();
		
		$this->load->view('header',$data);
		$this->load->view('login');
		$this->load->view('footer');
	}
	
	//lss	
		function writtings($tid) {
	
	
			$data ['tid'] = $tid;
			$data ['top'] = $this->Mhome->init_travel_top ($tid);
			$data ['days'] = $this->Mhome->init_travel_days($tid);
	
			$data['pieces_count'] = $this->Mhome->get_pieces_count($tid);
	
			$data ['pieces'] = $this->Mhome->get_travel_pieces( $tid );
	
			foreach($data['pieces'] as $row ) {
				$images[$row->pid] = $this->Mhome->get_piece_images($row->pid);
			}
	
			$data ['images'] = $images;
	
			$data ['comment'] = $this->Mhome->init_travel_comment ( $tid );
	
			$data['isLogin']=$this->Mhome->checklogin();
		
			$this->load->view('header',$data);
			$this->load->view('template');
			$this->load->view ( 'writtings', $data );
			$this->load->view ( 'footer' );
		}
	
		function submit_travel_comment($tid) {
			if ($this->Mhome->checklogin()) {
			$query = $this->Mhome->insert_travel_comment ( $tid );
			if ($query) {
				echo header("charset=utf-8")."评论成功，3秒后跳转回去";
	
			} else {
				echo header("charset=utf-8")."评论失败，3秒后跳转回去";
			}				
			}else {
				echo header("charset=utf-8")."请先登录，3秒后跳转回去";
			}
	
			$ip = $_SERVER['SERVER_ADDR'];
			header ( "refresh:3;url=http://$ip/travel3/index.php/home/writtings/$tid" );
	
		}
	
		function likeit($imgurl) {
			$img= '"images/'.$imgurl.'"';
			$query = $this->Mhome->insert_likes($img);
			echo $query;
	
		}
	
		function collect($tid) {
	
			$query = $this->Mhome->insert_collect ( $tid );
			echo $query;
	
		}
	
	
	
	function writtings2($tid){
					$data ['tid'] = $tid;
			$data ['top'] = $this->Mhome->init_travel_top ($tid);
			$data ['days'] = $this->Mhome->init_travel_days($tid);
	
			$data['pieces_count'] = $this->Mhome->get_pieces_count($tid);
	
			$data ['pieces'] = $this->Mhome->get_travel_pieces( $tid );
	
			foreach($data['pieces'] as $row ) {
				$images[$row->pid] = $this->Mhome->get_piece_images($row->pid);
			}
	
			$data ['images'] = $images;
	
			$data ['comment'] = $this->Mhome->init_travel_comment ( $tid );
	
			$data['isLogin']=$this->Mhome->checklogin();
		
			$this->load->view('header',$data);
			$this->load->view ( 'writtings2', $data );
			$this->load->view ( 'footer' );

		
	}
	
	function more($sname){
		$data['isLogin']=$this->Mhome->checklogin();
		$data['travels'] = $this->Mhome->gettravels(urldecode($sname));
		$data['sname'] = urldecode($sname) ;
		$this->load->view('header',$data);
		$this->load->view('more',$data);
		$this->load->view('footer');
	}
	
	
	function search(){		
		$data['isLogin']=$this->Mhome->checklogin();	
		$search = addslashes($this->input->get('searchContent'));
		$data['travels'] = $this->Mhome->search($search);
		$data['search'] = urldecode($search) ;
		$this->load->view('header',$data);
		$this->load->view('search',$data);
		$this->load->view('footer');
	}

}
