<?php
	class Mhome extends CI_Model{
		function _construct(){
			parent::_construct();
			
		}
		function get_scenery(){
			$query = $this->db->query("select * from scenery order by hot desc");
			return $query->result();
				
		}
		
		function get_first_image($sname){
			$query=$this->db->query("select i.imgurl from travel t,piece p,image i where t.sceneryname='$sname' and t.tid = p.tid and p.pid=i.pid");
			return $query[0]->imgurl;		
		}
		
		
		function search($search){
			$query = $this->db->query("select * from travel t,piece p,image i where t.tid=p.tid and i.pid=p.pid and ((t.sceneryname like '%$search%') or (t.tname like '%$search%') or (t.description like '%$search%')) group by t.tid
;");
			return $query->result();
		}
		
	function get_sceneryInfo($sname){
			$query=$this->db->query("select info from scenery where sname='".$sname."'");
			return $query->result();
		}
		
	function gettravels($sname){
		$query=$this->db->query("select * from travel t,piece p,image i where t.sceneryname='$sname' and t.tid=p.tid and i.pid=p.pid group by t.tid");
		return $query->result();
	}
	
	
	function get_travel_pictures($sname,$rows){
			$this->db->limit($rows);
			
			$query=$this->db->query("select i.imgurl,t.tid from travel t,piece p,image i where t.sceneryname='$sname' and t.tid=p.tid and i.pid=p.pid group by t.tid order by t.tid limit 0,$rows ");
// 			$query=$this->db->query("select turl,tid from travel where sceneryname='$sname' order by tid limit 0,$rows");
			return $query->result();
		}
	
		
		function get_user($uid){
			$query=$this->db->query("select * from user where uid=$uid");
			return $query->result();
		}
		
		function get_travel_by_uid($uid){
			$query=$this->db->query("select * from travel where uid=$uid");
			return $query->result();
		}
		
		function get_like($uid){
			$query=$this->db->query("select l.img from likes l where l.uid=$uid");
			return $query->result();
		}
		
		function get_collect($uid){
			$query=$this->db->query("select t.tid,t.tname from collect c,travel t where t.tid=c.tid and c.uid=$uid");
			return $query->result();
		}
		
		function get_latest_travel(){
			$query=$this->db->query("select * from travel t,piece p,image i where t.tid=p.tid and i.pid=p.pid group by t.tid order by t.tid desc");
			return $query->result();
		}
		
		function checklogin() {
			if($this->session->userdata('uid')){
				return true;
			}else {
				return false;
			}
		}
		
		
		/******lss*******/
			function init_travel_top($tid)
		{
			$query = $this->db->query("select t.tid,t.sceneryname,t.tname,t.persons,t.uid,u.headportrait from travel t,user u where t.tid = $tid and t.uid=u.uid");
			return $query;
		}
		
		function init_travel_days($tid)
		{
			$query = $this->db->query("select (max(date)-min(date)) as days from piece where tid = $tid");
			$row = $query->row();
			$days = floor(($row->days)/3600) + 1;
			return $days;
		}
		
		function init_travel_pictures($tid)
		{
			$query = $this->db->query("select p.description,p.date,i.imgurl from piece p,image i where p.tid=$tid and i.pid = p.pid order by p.date desc");
				
			return $query->result();
		}
		
		function get_travel_pieces($tid)
		{
			$query = $this->db->query("select pid,description,date from piece where tid=$tid order by date desc");
		
			return $query->result();
		}
		
		function get_pieces_count($tid)
		{
			$query = $this->db->query("select count(pid) as pieces_count from piece where tid=$tid");
			$row=$query->row();
			return $row->pieces_count;
// 			return $query->result();
		}
		
		function get_piece_images($pid)
		{
			$query = $this->db->query("select imgurl from image where pid=$pid");
			return $query->result();
			// 			return $query->result();
		}
		
		function init_travel_comment($tid){
			$query = $this->db->query("SELECT c.comment as comment,c.date as date,u.uid as uid,u.username as username,u.headportrait as headportrait FROM comment c,user u where tid = $tid and c.uid = u.uid");
			
			return $query->result();
		}
		
		function insert_travel_comment($tid){
			$message = $this->input->post('message');
			$date= date("Y-m-d");
			$uid = $this->session->userdata('uid');
			$this->db->query("insert into comment(tid,uid,comment,date) values($tid,$uid,'$message','$date')");
			return $this->db->affected_rows();
		}
		
		function insert_likes($img){
			$temp=urldecode($img);
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("SELECT * from likes where uid=$uid and img=$temp");
			$row = $query->row();
			
			if($row){
				return 1;
			}else{				
				$this->db->query("insert into likes(uid,img) values($uid,$temp)");
				return 0;
			}
			
		}
		
		function insert_collect($tid){
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("SELECT * from collect where uid=$uid and tid=$tid");
			$row = $query->row();
				
			if($row){
				return 1;
			}else{
				$this->db->query("insert into collect(uid,tid) values($uid,$tid)");
				return 0;
			}
				
		}
		
		
			
	}
	
	
	