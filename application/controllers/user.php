<?php
	class user extends CI_Controller{
		public function __construct(){
			parent::__construct();
			//($this->session->userdata('user_logged')==false):
					//direct('kt-login');
			//dif;
			$this->load->model('contacts_model');
			
		}

		function index(){

			$this->login();
		}
		function login(){

			if($this->session->userdata('user_logged')==true):
				redirect('kt-admin/dashboard');
			endif;
				$this->load->library('form_validation');
				$this->form_validation->set_rules('admin_username','username','required');
				$this->form_validation->set_rules('admin_password','password','required');

				if($this->form_validation->run()==true):
					$username=$this->input->post('admin_username',true);
					$password=md5($this->input->post('admin_password',true));

					//check user admin at database
					$this->db->where('admin_username',$username);
					$this->db->where('admin_password',$password);
					$get_admin=$this->db->get('tb_admin');

					//check admin found it

					if($get_admin->num_rows==1):
						$this->session->set_userdata('user_id',$get_admin->row()->admin_id);
						$this->session->set_userdata('user_display',$get_admin->row()->admin_display_name);
						$this->session->set_userdata('user_logged',true);
						redirect('kt-admin/dashboard');
					else:
                        $data["error"] = "Username atau password tidak sesuai dengan database";
                    endif;

				else:
            		$data["error"] = validation_errors();
        		endif;
        		$this->load->view('kt-admin/login',$data);
			//endif;
			//$data['content']='kt-admin/login';

		}

		function logout(){
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('user_display');
			$this->session->unset_userdata('user_logged');
			redirect('kt-login');
		}
		function dashboard(){
			if($this->session->userdata('user_logged')==false):
				redirect('kt-login');
			endif;
			$data['page_title']="Dashboard";
			$data['total_contact']=$this->contacts_model->list_data()->num_rows();
			$data['user_display']=$this->session->userdata('user_display');
			$data['content']='kt-admin/dashboard';
			$this->load->view('kt-admin/index',$data);
		}
	}

?>