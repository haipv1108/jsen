<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
	File nay co chuc nang:
		+ sau khi user dang nhap thanh cong, se cho quan ly, viet bai, dang bai, messege...
*/
class Member extends MX_Controller {
	public function __construct(){
		 parent::__construct();
		$this->load->model('mmember');
		$this->load->helper(array('form', 'url','date'));
		$this->load->library(array('form_validation','session','pagination'));
	 }
	 
	public function index()
	{
		// Kiem tra dang nhap
		// Neu chua dang nhap -> chuyen den login
		check_login(2){
			$data['user'] = $this->session->userdata('user'); 
			$data['meta_title'] = 'Home Page';
			$data['active'] = 'member-homepage';
			$data['template'] = 'backend/home/index';
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
	}
	public function view($sort ='createon',$page = 1)
	{
		check_login(2){
			$config = array(
						'base_url' => base_url().'/member/view',
						'total_rows' => $this->mmember->count_all(),
						'per_page' => 5,
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
						'view_article' => $this->mmember->view_article($config['per_page'],$page*$config['per_page'],$sort),
						'paginator' => $this->pagination->create_links(),
						'user' => $this->session->userdata('user'),
						'meta_title' => 'View',
						'active' => 'member-view',
						'template' => 'backend/home/view_page',
						'current_page'=>$page+1,
						'sort_by'=>$sort,
						'total_page'=>$total_page
						);
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
	}
	public function add()
	{
		check_login(2){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]|max_length[255]');
				$this->form_validation->set_rules('content','Content', 'trim|required');
				$this->form_validation->set_rules('date','date', 'trim|required');
				$this->form_validation->set_rules('keyword','keyword', 'trim|required');
				$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
				
				if($this->form_validation->run()){
					// kiem tra dieu kien
					$data = array(
									'title' =>$this->input->post('title'),
									'content' => $this->input->post('content'),
									'date' => $this->input->post('date'),
									'keyword' => $this->input->post('keyword'),
									'date' => date("Y-m-d H:i:s")
								);
					$this->mmember->add($data);
					// Neu ok -> redirect ve trang view
					redirect(base_url().'member/view');
				}
			}
			$data = array(
							'user' => $this->session->userdata('user'),
							'meta_title' => 'Add',
							'active' => 'member-add',
							'template' => 'backend/home/add_page'
						);
			//$data['feature'] = $this->mmember->get_feature();
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
	}
	public function edit($work_id = 0){
		check_login(2){
			$data = array(
						'user' => $this->session->userdata('user'),
						'meta_title' => 'Edit_page',
						'template' => 'backend/home/edit_page'
						);
			$check = $this->mmember->search_page($work_id);
			if($check == false){
				$data['message'] = 'Page not found in database.';
				$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
			}else{
				$data['page'] = $check;
				if($this->input->post('submit')){
					$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]|max_length[255]');
					$this->form_validation->set_rules('content','Content', 'trim|required');
					$this->form_validation->set_rules('date','date', 'trim|required');
					$this->form_validation->set_rules('keyword','keyword', 'trim|required');
					$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
					
					if($this->form_validation->run()){
						$page_info = array(
										'id' => $work_id,
										'title' =>$this->input->post('title'),
										'content' => $this->input->post('content'),
										'date' => $this->input->post('date'),
										'keyword' => $this->input->post('keyword'),
										'date' => date("Y-m-d H:i:s")
										);
						$check = $this->mmember->edit_page($page_info);
						if($check){
							redirect(base_url().'member/view');
						}
						else{
							$data['message'] = 'Edit not unsuccessfully. Please check again.';
						}
					}
				}else{}
				$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
			}
		}
	}
	public function delete($work_id){
		check_login(2){
			$data = array(
						'user' => $this->session->userdata('user'),
						'meta_title' => 'Delete Page',
						'template' => 'backend/home/delete_page'
						);
			$check = $this->mmember->search_page($work_id);
			if($check == false){
				$data['message'] = 'Page not found in database.';
				$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
			}else{
				$data['page'] = $check;
				if($this->input->post('submit')){
					$this->form_validation->set_rules('delete', 'Delete Radio', 'required'); 
					$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
					if($this->form_validation->run() == TRUE){
						if($this->input->post('delete') =='yes'){
							$check = $this->mmember->delete_page($work_id);
							if($check){
								$data['message'] = 'You have successfully deleted.';
							}else $data['message'] = 'You delete unsuccessful.';
						}else if($this->input->post('delete') =='no'){
							$data['message'] = 'I also think you should not delete page';
						}
					}
				}
				$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
			}
		}
	}
	// edit profile
	public function profile(){
		check_login(2){
			$data = array(
						'user' => $this->session->userdata('user'),
						'meta_title' => 'Edit Profile',
						'active' => 'member-profile',
						'template' => 'backend/home/profile'
						);
			if($this->input->post('submit')){
				$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]'); 
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
				if($this->form_validation->run() == TRUE){
					$a_Userinfo = array(
											'u_name' => $user['username'],
											'e_mail' => $user['email'],
											'username' => $this->input->post('username'),
											'email' => $this->input->post('email')
										);
					$check = $this->mmember->edit_profile($a_Userinfo);
					if($check){//Neu dung -> chuyen trang
						$data['message'] = 'Edit profile successfully.';
						$sess = array(
									'username' 	=> $a_Userinfo['username'],
									'email' 	=> $a_Userinfo['email'],
									'level'		=> $user['level'],
									'logged_in'	=> TRUE
								);
						$this->session->set_userdata('user', $sess); 
					}else{//Neu sai, xu ly
						$data['message'] = "Edit profile unsuccessfully. Please check again.";
					}
				}
			}
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
	}
}
