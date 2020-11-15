<?php 

class Guest extends Portal{

	function __construct(){
		parent::__construct();		

	}

    function index(){
        $this->setup_guest_room();
        $output = $this->grocery->render();
        $this->grocery_view($output);
    }
    function signup(){
		$data['errors_log']	= $this->session->userdata('errors_log');
		$data['last_url']	= $this->last_url();
        $data['nav_model']  = 'nav_guest';
		$this->render('form/sign_up',$data);
    }
    
}