<?php

/**
*
*/
class FW_Controller extends CI_Controller{
    public $scripts= array();
    public $styles = array();    
    public $items  = array();
    public $grocery;    
    private $user=array();

    function __construct(){
        parent::__construct();
        $this->grocery_setup();
        
        $this->template->set_template('templates/default');
    }
    function get_user_identity(){
        return $this->user['identity'];
    }
    function get_user_role(){
        return $this->user['role'];
    }

    function set_user_role($role=''){
        if (!empty($role)) {
            $this->user['role'] = $role;
        }
    }

    function set_user_identity($data=array()){
        if ($data) {
            $this->user['identity'] = $data;
        }
    }

    function set_css($data=array()){
            if (count($data) > 0 && is_array($data)) {
            foreach ($data as $key => $value) {
                    $this->styles[] = CSS_PATH.$value.'.css';
                }
            }
    }

    function set_js($data=array()){
        if (count($data) > 0 && is_array($data)) {
            foreach ($data as $key => $value) {
                $this->scripts[] = JS_PATH.$value.'.js';
            }
        }
    }


    function logged_in_true(){
        if (!is_null($user=$this->session->userdata('logged_in'))) {
            ($user['table'] == 'adm')? $page='admin' : $page='booking';
            redirect($page,'refresh');
        }   
    }

    function logged_in_false(){
        if (is_null($this->session->userdata('logged_in'))) {

            redirect('login','refresh');
        }else{
            $data['user_data'] = $this->session->userdata('logged_in');
            $this->load->vars($data);
        }
    }

    function setup_session(){
        if (!is_null($user=$this->session->userdata('logged_in'))) {
            $this->set_user_identity($user['data']);
            $this->set_user_role($user['table']);
        }
    }

    function add_enqueue($custom=array()){
			if(array_key_exists('css',$custom)){
					$this->styles		= array_merge($this->styles,$custom['css']);
					$this->set_css($this->styles);
			}
			if(array_key_exists('js',$custom)){
					$this->scripts	= array_merge($this->scripts,$custom['js']);
			}
    }

    function load_stylesheet(){
        $css 	   = '';
        foreach ($this->styles as $key => $value) {
            $css  .= '<link rel="stylesheet" href="'.$value.'" rel="stylesheet" />';
        }
				return $css;
    }

    function load_scriptjs(){
        $js			 = '';
        foreach ($this->scripts as $key => $value) {            
            $js 	.='<script src="'.$value.'" ></script>';
        }
        return $js;
    }

    function render($page='pages/front',$data=array()){
        $data['navbar_top'] = $this->template->widget('navigation',$data);
        $this->template->content->view($page, $data);
        $this->template->publish();
    }

    function grocery_view($output=null,$data=array())
    {
        
        $page = $this->load->view('pages/list',$output,true);
        $this->template->content = $page;
        $this->template->publish();

    }

    function last_url(){
        $urls   = $this->uri->segment_array();
        $urls_n = count($urls);
        return $urls[$urls_n];
    }
    function grocery_setup(){
        $this->grocery = new grocery_CRUD();
    }
    
    function column_room()
    {
        $this->grocery->display_as('room_support_id','Support');
        $this->grocery->display_as('room_available_begin','start at');
        $this->grocery->display_as('room_name','Room name');
        $this->grocery->display_as('room_floor','at floor');
        $this->grocery->display_as('data_status','available');
        $this->grocery->display_as('room_available_end','finish at');
        $this->grocery->display_as('room_available_day','at Day');
    }

    function set_error_log($msg=''){
        if (!empty($msg)) {
            $this->session->set_flashdata('errors_log',$msg);
        }        
    }
    function set_success_log($msg=''){
        if (!empty($msg)) {
            $this->session->set_flashdata('suck_log',$msg);
        }
    }        
 }
