<?php

class Booking extends Apps{

	protected $list_room=array();

	function __construct(){
		parent::__construct();
		$data['user'] = $this->get_user_identity();
		$data['errors_log']	= $this->session->userdata('errors_log');
		$data['suck_log']	= $this->session->userdata('suck_log');
		$this->load->vars($data);
	}

	function index(){
		$user 		= $this->get_user_identity();
		if ($booked = $this->db->get_where('booking_room',array('book_mhs_id'=>$user['id']))->result_array()) {
			$data['booking'] 	= $booked;
			$data['room']		= $this->room->get_by_id($booked[0]['book_room_id']);
			$data['fc_list']	= $this->room->get_facilities_by($booked[0]['book_room_id']);
			$data['support'] 	= $this->db->get_where('petugas',array('id'=>$booked[0]['book_support_id']))->row();
			switch ($booked[0]['book_status']) {
				case 'pending':
					$this->app_view('booking-pending',$data);
					break;
				case 'approve':
					$this->app_view('booking-waiting-code',$data);
					break;
				case 'confirm':
					$this->app_view('room-used',$data);
					break;
			}
		}else{
			if (is_null($this->session->userdata('booking'))) {
				if ($this->list_room) {
					$item['list_room']  = $this->list_room;
					$data['konten'] 	= $this->load->view('pages/room-by-day',$item,true);
				}else{
					$data['konten'] = $this->load->view('pages/home-article','',true);
				}
				$data['available'] 	= $this->room->available_day();
				$this->app_view('user-netral',$data);
			}else{
				$this->ajukan();
			}
		}
	}
	function day($day=''){
		$room 			 = $this->room->get_by_day($day);
		$this->list_room = $room;
		$this->index();
	}

	function info_room($id=false){
		$data['info'] = $this->room->get_by_id($id);
		if ($data['info']) {
			$data['support'] = $this->db->get_where('petugas',array('id'=>$data['info']->room_support_id))->row();
			$data['fc_list'] = $this->room->get_facilities_by($id);
			$this->app_view('room-detail',$data);
		}else{
			show_404();
		}
	}	


	function initial(){
		$data = $_POST;
		$this->validation->set_data($data); // register
    	$this->validation->required(array('book_day','book_room_id'), 'waktu pemakaian belum ditentukan :(');	
    	if ($this->validation->is_valid()) {
    		$user 					= $this->get_user_identity(); 
    		$data['book_mhs_id'] 	= $user['id'];
    		//$data['book_support_id']= $this->room->get_support_by($data['book_room_id']);
    		if ($this->db->insert('booking_room',$data)) {
    			$data['id'] = $this->db->insert_id();
				$this->session->set_userdata('booking',$data);
    		}
    	}else{
    		$this->set_error_log($this->validation->get_error_message());
    	}
		redirect('booking/ajukan','refresh');
	}

	
	function ajukan(){
		if (is_null($this->session->userdata('booking'))) {
			show_404();
		}else{
			$data['booking'] 	= $this->session->userdata('booking');
			$data['room']		= $this->room->get_by_id($data['booking']['book_room_id']);
			$data['fc_list']	= $this->room->get_facilities_by($data['booking']['book_room_id']);
			$this->app_form('booking-update-info',$data);
		}
	}

	function done(){
		if (!is_null($booking = $this->session->userdata('booking'))) {
			$data = $_POST;
			$this->validation->set_data($data); // register
    		$this->validation->required(array('book_use_for','book_pic_name'), 'Please fill use for and PIC field!');
    		if ($this->validation->is_valid()) {
    			$this->db->where('id',$booking['id']);
    			if ($this->db->update('booking_room',$data)) {
    				$this->session->unset_userdata('booking');
    			}
    		}else{
    			$this->set_error_log($this->validation->get_error_message());
    		}
		}
		redirect('booking/index','refresh');
	}
	
	function verify()
	{
		$data = $_POST;
		$this->validation->set_data($data); // register
    	$this->validation->required(array('id','book_support_code'), 'Please fill use for and PIC field!');
    	if ($confirm = $this->db->get_where('booking_room',array('id'=>$data['id'],'book_support_code'=>$data['book_support_code']))->row()) {
    		$this->db->where('id',$data['id']);
    		if ($this->db->update('booking_room',array('book_status'=>'confirm'))) {
    			$room 	= $this->room->get_by_id($confirm->book_room_id);
    			$this->set_success_log('Success !, you can use this rooom begin at '.$room->room_available_begin);
    		}else{
    			$this->set_error_log('internal error -_- cannot update status');
    		}
    	}else{
    		$this->set_error_log('Please enter valid code!, your code wrong');
    	}
    	redirect('booking/index');

	}
	function out($id=false){
		if (! $this->db->delete('booking_room',array('id'=>$id))) {
			$this->set_error_log('Failed to remove this room session');	
		}
		redirect('booking/index');
	}
}

  