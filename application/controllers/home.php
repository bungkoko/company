<?php
	class home extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('services_model');
			$this->load->model('contacts_model');
			$this->load->model('portfolio_model');
			$this->load->model('team_model');
		}

		function index(){
			$data['data_service']=$this->services_model->all_service();
			$data['data_portfolio']=$this->portfolio_model->list_portfolio();
			$data['data_team']=$this->team_model->list_data();
			$this->load->view('index',$data);
		}



		function contact(){
			if($this->input->post('submit')):

				$this->load->library('form_validation');
				$this->form_validation->set_rules('contactFname','Firstname','required');
				$this->form_validation->set_rules('contactName','LastName','required');
				$this->form_validation->set_rules('contactEmail','Email','required');
				$this->form_validation->set_rules('contactSubject','Subject','required');
				$this->form_validation->set_rules('contactMessage','Message','required');

				if($this->form_validation->run()==true):
					$this->contacts_model->create();
				redirect('home');
				endif;


			endif;
		}
	}
?>