<?php 
	class team extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('team_model');
		}

		function index(){
			$this->create();
		}

		function create(){
			$offset=0;
			$data['page_title']="Input Team";
			if($this->input->post('submit')):
				$this->load->library('form_validation');
				$this->form_validation->set_rules('team_name','name','required');
				$this->form_validation->set_rules('team_description','description','required');
				//$this->form_validation->set_rules('portfolio_start','Start','required');
				//$this->form_validation->set_rules('portfolio_finish','finish','required');
			
				if($this->form_validation->run()==true):
					$this->load->library('upload');
					$this->load->library('image_lib');

					$config['upload_path']='.'.$this->config->item('upload_path_team');
					$config['allowed_types']=$this->config->item('allowed_types');
					$config['max_size']=$this->config->item('max_size');
					$config['max_width']=$this->config->item('max_width');
					$config['max_height']=$this->config->item('max_height');
					$config['encrypt_name']=true;

					$this->upload->initialize($config);

					if(!$this->upload->do_upload('team_avatar')):
						$this->session->set_flashdata('error',$this->upload->display_errors());
					else:

						//echo $this->input->post('portfolio_subject');
						$data_team=$this->upload->data();
						$team_name=$data_team['raw_name'];
						$team_ext=$data_team['file_ext'];
						$team_path=$data_team['file_name'];
						$team_fullpath=$data_team['full_path'];

						$config['image_library'] = $this->config->item("image_library");
						$config['maintain_ratio'] =$this->config->item("maintain_ratio");
						$config['width'] = $this->config->item("width_resize");
						$config['height'] = $this->config->item("height_resize");
						$config['source_image'] = $team_fullpath;

						$this->image_lib->initialize($config);
						$this->image_lib->resize();
						$this->image_lib->clear();

						$this->team_model->create($team_path);
						redirect('team');
					endif;
				else:
					$data['error']="Semua Field Harus Di isi";
				endif;
			endif;
			$data['list_data']=$this->team_model->list_data();
			$data['offset']=$offset;
			$data['content']='kt-admin/team/form_view';
			$this->load->view('kt-admin/index',$data);
		}
	}

?>