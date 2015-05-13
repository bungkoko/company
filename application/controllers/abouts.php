<?php 
	class abouts extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('about_model');
			$this->load->model('contacts_model');
		}

		function index(){
			$this->create();
		}

		function create(){
			$offset=0;
			$data['page_title']="Create About";
			if($this->input->post('submit')):
				$this->load->library('form_validation');
				$this->form_validation->set_rules('about_subject','subject','required');
				$this->form_validation->set_rules('about_description','description','required');
				//$this->form_validation->set_rules('articles_publish','publish','required');
				if($this->form_validation->run()==true):
					$this->about_model->create();
					redirect('kt-admin/abouts');
				else:
					$data['error']="Semua Field Harus Di isi";
				endif;
			endif;
			$this->load->library('pagination');

			$config['total_rows']=$this->about_model->list_data()->num_rows();
			$config['per_page']='10';
			$config['num_links']='6';

			$this->pagination->initialize($config);

			$data['total_contact']=$this->contacts_model->list_data()->num_rows();
			$data['list_data']=$this->about_model->list_data($config['per_page'],$offset);
			$data['offset']=$offset;
			$data['content']='kt-admin/about/form_view';

			$this->load->view('kt-admin/index',$data);
		}

		function delete($id){
			$this->about_model->delete($id);
			redirect('kt-admin/abouts');
		}
	}
?>