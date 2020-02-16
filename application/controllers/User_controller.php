<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

    public function __construct()
        {
                parent::__construct();
               $this->load->model('User_model');
        }
	public function user_list()
	{
		$this->load->view('header');
		$this->load->view('user_list');
		$this->load->view('footer');
	}

    public function register_user()
	{
		$input=$this->input->post();
		$data=$this->User_model->register_user($input);
		echo json_encode($data);
	}

	public function check_duplicate(){
		$input=$this->input->post();
		$data=$this->User_model->check_duplicate($input);
		echo json_encode($data);
	}


}
