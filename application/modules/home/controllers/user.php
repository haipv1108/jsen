<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
	file nay co cac chuc nang:
		+ register thanh vien
		+ edit thanh vien
		+ lay lai pass, quen pass
*/
class User extends MX_Controller{ 
	var $_mail;
	public function __construct(){ 
	
		parent::__construct(); 
		$this->load->helper(array('form', 'url')); 
		$this->load->library(array('form_validation','session')); 
		$this->load->model(array('muser'));
	} 
	public function index(){ 
		redirect(base_url().'home/verify');
	} 
	public function register(){ 
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]'); 
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]'); 
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required'); 
		$this->form_validation->set_error_delimiters('<div style="color: red; font-weight: bold">', '</div>');
		if($this->form_validation->run() == TRUE){
			$a_Userinfo['username'] = $this->input->post('username');
			$a_Userinfo['email'] = $this->input->post('email');
			$a_Userinfo['password'] = $this->input->post('password');
			$passconf= $this->input->post('passconf');
			if($a_Userinfo['password'] == $passconf){// xu ly voi model
				$a_Userchecking = $this->muser->register($a_Userinfo);
				if($a_Userchecking){//Neu dung -> chuyen trang
					//$body = "Cam on ban da dang ky thanh cong. Mot email kich hoat da duoc gui den email cua ban. Hay check no.";
					//if(mail($this->input->post('email'), 'Kich hoat tai khoan', $body, 'FROM: localhost')){
						$data['message'] = 'Tai khoan cua ban da dang ky thanh cong. Vui long check mail de kich hoat tai khoan.';
					//}
				}else{//Neu sai, xu ly
					$data['message'] = 'Khong thanh cong';
				}
			}
		}
		$this->load->view('register', isset($data)?$data:NULL); 
	} 
}