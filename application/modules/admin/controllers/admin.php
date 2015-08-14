<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {
	 public function __construct(){
		parent::__construct();

		$this->load->model('madmin');
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation','session','pagination','email'));
	 }
	 
	public function index()
	{
		$user = $this->session->userdata('user');
		if($user['logged_in'] && $user['level'] ==3){
			$data = array(
						'user'=>$this->session->userdata('user'),
						'meta_title'=>'Home Page',
						'active'=>'admin-homepage',
						'template'=> 'backend/home/index'
						);
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}else{
			redirect(base_url().'home/login');
		}
	}
	public function view($sort ='username',$page = 1)
	{
		$user = $this->session->userdata('user');
		if($user['logged_in'] && $user['level'] ==3){
			$config = array(
						'base_url' => base_url().'admin/view',
						'total_rows' => $this->madmin->count_all(),
						'per_page' => 10,
						'prev_link'  => '&lt;',
						'next_link'  => '&gt;',
						'last_link'  => 'Last',
						'first_link' => 'First',
						'use_page_numbers' => TRUE
						);
            $this->pagination->initialize($config); 
			
			$total_page = ceil($config['total_rows']/$config['per_page']);
			$page = ($page > $total_page)?$total_page:$page;
			$page = ($page < 1)?1:$page;
			$page = $page - 1;
			$data = array(
						'view_user' => $this->madmin->view_user($config['per_page'],$page*$config['per_page'],$sort),
						'paginator' => $this->pagination->create_links(),
						'user' => $this->session->userdata('user'),
						'meta_title' => 'View',
						'active' => 'admin-view',
						'template' => 'backend/home/view_user',
						'current_page' => $page+1,
						'sort_by'=>$sort,
						'total_page'=>$total_page
						);
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}else{
			redirect(base_url().'home/login');
		}
	}
	
	public function add(){
		$user = $this->session->userdata('user');
		if($user['logged_in'] && $user['level'] ==3){
			$data = array(
						'user' => $this->session->userdata('user'),
						'meta_title' => 'Add User',
						'active' => 'admin-add',
						'template' => 'backend/home/add_user'
						);
			if($this->input->post('submit')){
				//user_name  user_name_furi  mail_address  password  passconf  phonenumber  gender  current_job birthday  level

				$this->form_validation->set_rules('user_name', 'user_name', 'required|min_length[5]|max_length[20]'); 
				$this->form_validation->set_rules('user_name_furi', 'User_name_furi', 'required|min_length[5]|max_length[30]'); 
				$this->form_validation->set_rules('mail_address', 'mail_address', 'required|valid_email');
				$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]'); 
				$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required'); 
				$this->form_validation->set_rules('phonenumber', 'phonenumber', 'required|min_length[9]|max_length[12]|numeric');
				$this->form_validation->set_rules('gender', 'gender', 'required');
				$this->form_validation->set_rules('current_job', 'current_job', 'required');
				$this->form_validation->set_rules('birthday', 'birthday', 'required');
				$this->form_validation->set_rules('level', 'Level', 'required'); 
				$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
				if($this->form_validation->run() == TRUE){
					$salt = "testt";
					$a_Userinfo = array(
											'user_name' => $this->input->post('user_name'),
											'user_name_furi' => $this->input->post('user_name_furi'),
											'mail_address' => $this->input->post('mail_address'),
											'password' => $this->input->post('password'),
											'phonenumber' => $this->input->post('phonenumber'),
											'gender' => $this->input->post('gender'),
											'current_job' => $this->input->post('current_job'),
											'birthday' => $this->input->post('birthday'),
											'level' => $this->input->post('level'),
											'active' => 0
										);
					

					$passconf= $this->input->post('passconf');
					if($a_Userinfo['password'] == $passconf){// xu ly voi model
                		$mail = array();
						$a_Userchecking = $this->madmin->add_user($a_Userinfo);
						if($a_Userchecking==0){//Neu dung -> chuyen trang
							$userid = $this->db->insert_id();
                 		   	$link_active = base_url()."home/home/active/?userid=".$userid."&key=".md5($salt);
          
                    		$message  = "Please follow this link to active your acount <br/>";
                    		$message .= "Link : <a href=".$link_active.">".$link_active."</a><br/>";
                    		$message .= "username : ".$a_Userinfo['username']."<br/>";
                    		$message .= "password : ".$this->input->post("password");
                    
                    		$mail = array(
                            "to_receiver"   => $a_Userinfo['email'], 
                            "message"       => $message,
                        );


                  	 	$this->load->library("email"); 
                  		$this->email->config($mail);
                 		$this->email->sendmail();
						redirect(base_url().'admin/view');

						}else{
							if(isset($a_Userchecking['message_mail_address']))
							$data['message_mail_address'] = $a_Userchecking['message_mail_address'];
							if(isset($a_Userchecking['message_user_name']))
							$data['message_user_name'] = $a_Userchecking['message_user_name'];
							if(isset($a_Userchecking['message_user_name_furi']))
							$data['message_user_name_furi'] = $a_Userchecking['message_user_name_furi'];
							if(isset($a_Userchecking['message_phonenumber']))
							$data['message_phonenumber'] = $a_Userchecking['message_phonenumber'];
							
						}
					}
				}
			}
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}else{
			redirect(base_url().'home/login');
		}
	}
	public function edit($id = 0){
		$user = $this->session->userdata('user');
		if($user['logged_in'] && $user['level'] ==3){
			$data = array(
						'user' => $this->session->userdata('user'),
						'meta_title' => 'Edit User',
						'active' => 'admin-edit',
						'template' => 'backend/home/edit_user'
						);
			if($this->madmin->search_user($id) == false){
				$data['error'] = 'User not found in database.';
				$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
			}
			else{
				$data['user_info']= $this->madmin->search_user($id);
			
				if($this->input->post('submit')){
					$this->form_validation->set_rules('user_name', 'user_name', 'required|min_length[5]|max_length[20]'); 
					$this->form_validation->set_rules('user_name_furi', 'User_name_furi', 'required|min_length[5]|max_length[30]'); 
					$this->form_validation->set_rules('mail_address', 'mail_address', 'required|valid_email');
					$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]'); 
					$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required'); 
					$this->form_validation->set_rules('phonenumber', 'phonenumber', 'required|min_length[9]|max_length[12]|numeric');
					$this->form_validation->set_rules('gender', 'gender', 'required');
					$this->form_validation->set_rules('current_job', 'current_job', 'required');
					$this->form_validation->set_rules('birthday', 'birthday', 'required');
					$this->form_validation->set_rules('level', 'Level', 'required'); 
					$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
					if($this->form_validation->run() == TRUE){
						$a_Userinfo = array(
											'user_id'=>$id,
											'user_name' => $this->input->post('user_name'),
											'user_name_furi' => $this->input->post('user_name_furi'),
											'mail_address' => $this->input->post('mail_address'),
											'password' => $this->input->post('password'),
											'phonenumber' => $this->input->post('phonenumber'),
											'gender' => $this->input->post('gender'),
											'current_job' => $this->input->post('current_job'),
											'birthday' => $this->input->post('birthday'),
											'level' => $this->input->post('level'),
											'active' => 0
											);
						$passconf= $this->input->post('passconf');
						if($a_Userinfo['password'] == $passconf){// xu ly voi model
							$a_Userchecking = $this->madmin->update_user($a_Userinfo);
							if($a_Userchecking){//Neu dung -> chuyen trang
								redirect(base_url().'admin/view');
							}else{//Neu sai, xu ly
								$data['message'] = "Edit User unsuccessfully. Please check again.";
							}
						}
					}
				}
				$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
			}
		}else{
			redirect(base_url().'home/login');
		}
	}
	public function delete($id = 0){
		$user = $this->session->userdata('user');
		if($user['logged_in'] && $user['level'] ==3){
			$data = array(
						'user' => $this->session->userdata('user'),
						'meta_title' => 'Delete User',
						'active' => 'admin-delete',
						'template' => 'backend/home/delete_user'
						);
			$check_User = $this->madmin->search_user($id);
			if($check_User == false){
				$data['message'] = 'User not found in system';
				$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
			}
			else{
				$data['user_info'] = $check_User;
				if($this->input->post('submit')){
					$this->form_validation->set_rules('delete', 'Delete Radio', 'required'); 
					$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
					if($this->form_validation->run() == TRUE){
						if($this->input->post('delete') =='yes'){
							$check = $this->madmin->delete_user($id);
							if($check){
								$data['message'] = 'You have successfully deleted.';
							}else $data['message'] = 'You delete unsuccessful.';
						}else if($this->input->post('delete') =='no'){
							$data['message'] = 'I also think you should not delete user';
						}
					}
				}
				$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
			}
		}else{
			redirect(base_url().'home/login');
		}
	}

	public function manage_page($id){
			
		$user = $this->session->userdata('user');
		if($user['logged_in'] && $user['level'] ==3){

		// check box
		if($this->input->post('submit')){
			$action = $this->input->post('dropdown');
			$checkbox = $this->input->post('checkbox');
			if($action=='publish' && is_array($checkbox))
				$check = $this->madmin->publish($checkbox);
			else if($action == 'unpublish' && is_array($checkbox))
				$this->madmin->unpublish($checkbox);
		}

			$data = array(
							'user' => $this->session->userdata('user'),
							'meta_title' => 'Manage Page',
							'active' => 'admin-manage',
							'template' => 'backend/home/manage_page',
							'id'=>$id
						);

			$check = $this->madmin->manage_page($id);
			if($check == false){
				$data['message'] = 'User not found in system';
				$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
			}else{
				$data['view_article'] = $check;
				$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
			}
		}else{
			redirect(base_url().'user/login');
		}
	}



	// public function email(){
	// 	$this->load->library('email');

	// 	$config = array(
	// 	'protocol' => 'smtp',
 //        'mailpath' => 'ssl://smtp.gmail.com',
 //        'smtp_port' => '465',
 //        'smtp_user' => 'dodaihoc.abvk@gmail.com',
 //        'smtp_pass' => '01646236194',
 //        'mailtype'  => 'html',
 //        'charset' => 'utf-8',
 //        'wordwrap' => TRUE
 //        );
 //        $this->email->initialize($config);
 //        $this->email->set_newline("\r\n");

	// 	$this->email->from('dodaihoc.abvk@gmail.com', 'Hà');
	// 	$this->email->to(''); // cái này chú viết mail chú vào nhé

	// 	$this->email->subject('Email Test');
	// 	$this->email->message('Testing the email class.');	

	// 	$this->email->send();

	// 	echo $this->email->print_debugger();
	// }
}
