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
				//$this->form_validation->set_rules('articles_publish','publish','required');
				if($this->form_validation->run()==true):
					$this->articles_model->create();
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
			$this->articles_model->delete_data($id);
			redirect('kt-admin/articles');
		}

		function update($id=''){
			if ($id=='')
				redirect($this->uri->segment(1).'/'.$this->uri->segment(2));

			$data['page_title']="Update for Articles";
			if($this->input->post('submit')):
				$this->load->library('form_validation');
				$this->form_validation->set_rules('articles_subject','subject','required');
				$this->form_validation->set_rules('articles_post','post','requred');
				//$this->form_validation->set_rules('articles_publish','publish','required');

				if($this->form_validation->run()==true):

					$this->articles_model->update($id);
					$this->session->set_flashdata('message', 'article has been update');
					redirect('kt-admin/articles');
				else:
					$data['error']=validation_errors();
				endif;
			endif;
			$data['get_data']=$this->articles_model->get($id);
			$data['content']='kt-admin/article/update';
			$this->load->view('kt-admin/index',$data);
		}

		function status($id,$status){
			if($status=='n'):
				$status='y';
			else:
				$status='n';
			endif;

			$this->db->where('articles_id',$id);
			$this->db->set('articles_status',$status);
			$this->db->update('tb_article');

			$this->session->set_flashdata('message','status sudah berubah');
			redirect('kt-admin/articles');
		}

		/*function update($id){

		}*/




	}
?>