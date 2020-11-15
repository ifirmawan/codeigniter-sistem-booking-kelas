	<?php 

class Login extends Portal{

	function __construct(){
		parent::__construct();
		$this->logged_in_true();
	}

	function index(){
		$data['errors_log']	= $this->session->userdata('errors_log');
		$data['last_url']	= $this->last_url();
        $data['nav_model']  = 'nav_guest';
		$this->render('form/sign_in',$data);
	}


	function submit(){
		/**
		* $_POST mengambil semua bidang pada form. kalau dijs form serialize. isinya array() 
		* 
		**/
		$data = $_POST;
		$this->validation->set_data($data); // register
    	$this->validation->required(array('user_email','user_pass'), 'Email dan Password tidak boleh kosong !');

    	if ($this->validation->is_valid()) {
    		$user_data = $this->user->verify($data['user_email'],$data['user_pass']);
    		if ($user_data['data']){
    			$data  = (array)$user_data;    			
    			$this->session->set_userdata('logged_in',$user_data);    			
    			if ($user_data['table'] == 'mhs'){
    				redirect('booking','refresh');
    			}else if ($user_data['table'] == 'adm') {
    				redirect('admin','refresh');
    			}else{
    				$this->session->set_flashdata('errors_log','internal server error');			
    			}
    		}else{
    			$this->session->set_flashdata('errors_log','Email dan password salah !');		
    		}
    	}else{
    		$this->session->set_flashdata('errors_log',$this->validation->get_error_message());	
    	}
    	$this->index();
	}
    
    function create(){
        $data = $_POST;
        $this->validation->set_data($data); // register
        $this->validation->required(array('user_email','user_password','user_name'), 'Real name, email dan Password tidak boleh kosong !');
        if ($this->validation->is_valid()) {
            $data['user_password']=sha1($data['user_password']);
            if ($this->db->insert('mahasiswa',$data)) {
                $data['id']     = $this->db->insert_id();
                $user['table']  ='mhs';
                $user['data']   = $data;                
                $this->session->set_userdata('logged_in',$user);
                redirect('booking','refresh');
            }else{
                $this->session->set_flashdata('errors_log','internal server error');            
            }
        }else{
            $this->session->set_flashdata('errors_log',$this->validation->get_error_message()); 
            redirect('guest/signup','refresh');
        }
    } 	

}