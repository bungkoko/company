<?php
	class articles extends CI_Controller{
		public function __construct(){
			parent::__construct();
			//declare model
			$this->load->model('articles_model');
			$this->load->model('contacts_model');

			//declare to user log with session
			if($this->session->userdata('user_logged')==false):
				redirect('kt-login');
			endif;
				
		}
		function index(){
			
			$this->view_article();
		}

		function view_article($offset=0){
			$this->load->library('pagination');

			$config['total_rows']=$this->articles_model->list_data()->num_rows();
			$config['per_page']='10';
			$config['num_links']='6';

			$this->pagination->initialize($config);

			$data['page_title']='Articles';
			$data['list_data']=$this->articles_model->list_data($config['per_page'],$offset);
			$data['offset']=$offset;
			$data['total_contact']=$this->contacts_model->list_data()->num_rows();
			$data['content']='kt-admin/article/view';
			$this->load->view('kt-admin/index',$data);
		}

		
		function create(){
			$data['page_title']="Create Articles";
			if($this->input->post('submit')):
				$this->load->library('form_validation');
				$this->form_validation->set_rules('articles_subject','subject','required');
				$this->form_validation->set_rules('articles_post','post','required');
				$this->form_validation->set_rules('articles_publish','publish','required');
				if($this->form_validation->run()==true):
					return $this->articles_model->create();
					redirect('kt-admin/articles');
				else:
					$data['error']="Semua Field Harus Di isi";
				endif;
			endif;
			$data['total_contact']=$this->contacts_model->list_data()->num_rows();
			$data['content']='kt-admin/article/form';
			$this->load->view('kt-admin/index',$data);
		}

		function delete($id){
			return $this->articles_model->delete_data($id);
			redirect('kt-admin/articles');
		}

		/*function update($id){

		}*/




	}
?>