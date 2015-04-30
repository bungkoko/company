<?php
	class services extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('services_model');
			$this->load->model('contacts_model');
			if($this->session->userdata('user_logged')==false):
				redirect('kt-login');
			endif;
		}

		function index(){
			$this->create();
		}

		function create($offset=0){
			$data['page_title']="Create Services";
			if($this->input->post('submit')):
				$this->load->library('form_validation');
				$this->form_validation->set_rules('service_name','service subject`','required');
				$this->form_validation->set_rules('service_description','service description','required');
				//$this->form_validation->set_rules('articles_publish','publish','required');
				if($this->form_validation->run()==true):
					$this->services_model->create();
					redirect('kt-admin/services');
				else:
					$data['error']="Semua Field Harus Di isi";
				endif;
			endif;
			$this->load->library('pagination');

			$config['total_rows']=$this->services_model->list_data()->num_rows();
			$config['per_page']='10';
			$config['num_links']='6';

			$this->pagination->initialize($config);

			//$data['page_title']='Articles';
			$data['total_contact']=$this->contacts_model->list_data()->num_rows();

			$data['list_data']=$this->services_model->list_data($config['per_page'],$offset);
			$data['offset']=$offset;
			$data['content']='kt-admin/service/form_view';
			$this->load->view('kt-admin/index',$data);
		}

		function delete($id){
			$this->services_model->delete_data($id);
			redirect('services');
		}

	}
?>