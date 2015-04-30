<?php 
	class portfolio extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('services_model');
			$this->load->model('portfolio_model');
			$this->load->model('contacts_model');
		}

		function index(){
			$offset=0;

			$data['page_title']="Portfolio";
			$this->load->library('pagination');

			$config['total_rows']=$this->portfolio_model->list_portfolio()->num_rows();
			$config['per_page']='10';
			$config['num_links']='6';

			$this->pagination->initialize($config);

			$data['dropdown_service']=$this->services_model->all_service();
			$data['list_data']=$this->portfolio_model->list_portfolio($config['per_page'],$offset);
			$data['total_contact']=$this->contacts_model->list_data()->num_rows();
			$data['offset']=$offset;
			$data['content']='kt-admin/portfolio/form_view';
			$this->load->view('kt-admin/index',$data);
		}

		function create(){
			$data['page_title']='Portfolio';
			if($this->input->post('submit')):

				$this->load->library('form_validation');
				$this->form_validation->set_rules('portfolio_subject','Subject','required');
				$this->form_validation->set_rules('portfolio_description','description','required');
				$this->form_validation->set_rules('portfolio_start','Start','required');
				$this->form_validation->set_rules('portfolio_finish','finish','required');
			
				if($this->form_validation->run()==true):
					$this->load->library('upload');
					$this->load->library('image_lib');

					$config['upload_path']='.'.$this->config->item('upload_path_portfolio');
					$config['allowed_types']=$this->config->item('allowed_types');
					$config['max_size']=$this->config->item('max_size');
					$config['max_width']=$this->config->item('max_width');
					$config['max_height']=$this->config->item('max_height');
					$config['encrypt_name']=true;

					$this->upload->initialize($config);

					if(!$this->upload->do_upload('portfolio_image')):
						$this->session->set_flashdata('error',$this->upload->display_errors());
					else:

						//echo $this->input->post('portfolio_subject');
						$data_portfolio=$this->upload->data();
						$portfolio_name=$data_portfolio['raw_name'];
						$portfolio_ext=$data_portfolio['file_ext'];
						$portfolio_path=$data_portfolio['file_name'];
						$portfolio_fullpath=$data_portfolio['full_path'];

						$config['image_library'] = $this->config->item("image_library");
						$config['maintain_ratio'] =$this->config->item("maintain_ratio");
						$config['width'] = $this->config->item("width_resize");
						$config['height'] = $this->config->item("height_resize");
						$config['source_image'] = $portfolio_fullpath;

						$this->image_lib->initialize($config);
						$this->image_lib->resize();
						$this->image_lib->clear();

						$this->portfolio_model->create($portfolio_path);
						redirect('portfolio');
					endif;
				else:
					$data['error']="Semua Field Harus Di isi";
				endif;
			endif;
		}

		function delete_portfolio($id){
			$this->portfolio_model->delete($id);
			redirect('portfolio');
		}

		function delete_file($id=""){
			if($param !=""):
				$this->db->where('portfolio_id',$param);
				$dt_portfolio=$this->db->get('tb_portfolio');

				$file=$dt_portfolio->row()->portfolio_image;

				$location=$_SERVER['DOCUMENT_ROOT'].'/bha_prof/';
				$path=$location.$file;

				//unlink($path);

				echo print_r($path);
			endif;
		}
	}
?>