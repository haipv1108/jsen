<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	/*
		file nay co chuc nang:
		nguoi dung (khong phai admin) login, logout, xu ly session
	*/
	class Verify extends MX_Controller{ 
		public function __construct(){ 
			parent::__construct(); 
			$this->load->helper(array('form', 'url', 'cookie')); 
			$this->load->library(array('form_validation','session')); 
			$this->load->model(array('muser')); 
		} 
		public function index(){ 
			// Kiem tra neu da dang nhap -> vao trang quan tri 
			// Neu chua dang nhap -> chuyen den trang login
			$user = $this->session->userdata('user');
			if($user['logged_in']){
				$a_UserInfo['user'] = $this->session->userdata('user'); 
				redirect(base_url().'member');
			}else{
				redirect(base_url().'home/login');
			}
		} 
		public function login(){ 
			// neu chua dang ky -> chuyen den trang dang ky
			// neu quen pass -> chuyen den trang forger	
			$this->form_validation->set_rules('username', 'Username', 'trim|required'); 
			$this->form_validation->set_rules('password', 'Password', 'required'); 
			$this->form_validation->set_error_delimiters('<div style="color: red; font-weight: bold">', '</div>');
			if($this->form_validation->run() == TRUE){
				$a_UserInfo['username'] = $this->input->post('username'); 
				$a_UserInfo['password'] = $this->input->post('password'); //md5($this->input->post('password')); 
				$a_UserChecking = $this->muser->a_fCheckUser( $a_UserInfo ); 
				if($a_UserChecking){
		
					$data = array(
									'username' 	=> $a_UserChecking['username'],
									'email' 	=> $a_UserChecking['email'],
									'level'		=> $a_UserChecking['level'],
									'logged_in'	=> TRUE
								);
					
					$this->session->set_userdata('user', $data); 
					if($a_UserChecking['level'] == 3)
						redirect(base_url().'admin'); 
					else if($a_UserChecking['level'] == 2)
						redirect(base_url().'member'); 
				} else{ 
					$error['error'] = 'Username or Password error.';
				} 
			}
			$this->load->view('login', isset($error)?$error: NULL); 
		} 
		public function logout(){ 
			$this->session->sess_destroy();	// Unset session of user 
			redirect(base_url().'home/login'); 
		} 
}