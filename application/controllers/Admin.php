<?php

class Admin extends Manage{
	function __construct(){
		parent::__construct();
		$data['user'] 		= $this->get_user_identity();
		$data['errors_log']	= $this->session->userdata('errors_log');
		$data['suck_log']	= $this->session->userdata('suck_log');
		$this->load->vars($data);	
	}

	function index(){
		$this->grocery->unset_columns(array(
				'book_mhs_id','book_support_id','book_support_code'
				,'book_use_description','book_created','book_confirmed_by_support_id','book_last_modified')
			);
		$this->grocery->set_table('booking_room');
		$this->grocery->unset_add();
		$this->grocery->unset_edit();
		$this->grocery->unset_delete();
		//$this->grocery->unset_read();
		$this->grocery->add_action('Approve'
			, base_url().'assets/images/confirm.png','admin/booking_acc', 'btn btn-sm btn-primary');
		//$this->grocery->add_action('detail'
		//	, base_url().'assets/images/preview.png','admin/booking_detail', 'btn btn-sm btn-default');
		$output = $this->grocery->render();
		$this->grocery_view($output);

	}

	function room(){
		
		$this->grocery->set_table('room');
		$this->grocery->set_relation('room_support_id','petugas','support_name');
		$this->grocery->set_field_upload('room_file_map','assets/uploads/maps');
		$this->grocery->unset_columns('room_file_map');
		//$this->grocery->limit(2);
		$this->column_room();
		$this->grocery->add_action('switch', '/images/toggle.png','admin/availablity', 'btn btn-sm btn-default');
		$this->grocery->add_action('view map', '/images/view.png','admin/map', 'btn btn-sm btn-default');

		$output = $this->grocery->render();		
		
		$this->grocery_view($output);
	}
	

	function petugas(){
		$this->grocery->set_table('petugas');
		$this->grocery->set_relation('support_by_admin_id','admin','user_name');
		$this->grocery->add_action('suspend', '/images/view.png','admin/suspend', 'btn btn-sm btn-default');
		$output = $this->grocery->render();
		$this->grocery_view($output);
	}

	function availablity($id=false){
		if (!$this->switch_to('room',$id)) {
			$this->session->set_flashdata('errors_log','update room error');			
		}
		$this->room();
	}

	function suspend($id=false){
		if (!$this->switch_to('petugas',$id)) {
			$this->session->set_flashdata('errors_log','update petugas error');			
		}
		$this->petugas();
	}

	function map($id=false){
		$data['room'] = (array)get_detail_room($id);

		if (is_null($data['room']['room_file_map'])) {
			$this->admin_view('room-map',$data);
		}else{
			$data['img_src'] = base_url().'maps/'.$data['room']['room_file_map'];
			$this->admin_view('room-map-img',$data);
		}
		
	}

	function upload_map(){
		$config['upload_path']          = 'maps/';
		$config['allowed_types']        = 'gif|jpg|png';
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('room_file_map')) {
			$file = $this->upload->data();
			if (isset($_POST['id'])) {
				$this->db->where('id',$_POST['id']);
				$this->db->update('room',array('room_file_map'=>$file['file_name']));
			}
		}else{
			$this->set_error_log($this->upload->display_errors());
		}
		redirect('admin/room','refresh');
	}

	function booking_acc($id=false)
	{
		if ($id && !empty($id)) {
			$code_supp 					= rand(5,100).time();
			$data['book_status'] 		= 'approve';
			$data['book_last_modified'] = date('Y-m-d h:i:s');
			$data['book_support_code']	= $code_supp;
			$this->db->where('id',$id);
			if ($this->db->update('booking_room',$data)) {
				$booking 		 = $this->db->get_where('booking_room',array('id'=>$id))->row();
				$to 			 = get_support_email($booking->book_support_id);
				$item['room']	 = $this->room->get_by_id($booking->book_room_id);
				$item['subject'] = '[booking-'.$item['room']->room_name.'] Please Give this code!';
				$item['code'] 	 = $code_supp;
				$item['pic']	 = $booking->book_pic_name;
				$item['user']	 = get_detail_mhs($booking->book_mhs_id);
				$message 		 = $this->load->view('admin/email-tpl-v1',$item,true);
				if ($this->send_email($to,$message,$item['room']->room_name)) {
					$this->set_success_log('Thank you, code support has been send');
				}
			}	
		}
		redirect('admin/index','refresh');
	}
}
