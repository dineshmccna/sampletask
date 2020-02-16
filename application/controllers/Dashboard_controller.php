<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(isset($_SESSION['id'])){
        $this->load->model('Login_model');
        $this->load->model('User_model');
        } else{
          redirect('http://localhost/dineshtask/');
        }
        
    }
	
	public function dashboard(){
		$member_count=$this->db->select('id')->from('user_master')->where(array('status'=>'Active','user_type!='=>'superadmin'))->get()->num_rows();
		$data['member_count']=$member_count;
		$this->load->view('header');
		$this->load->view('dashboard',$data);
		$this->load->view('footer');
	}

    public function view_profile(){
    	$user_info=$this->db->select('*')->from('user_master')->where(array('id'=>$_SESSION['id']))->get()->row_array();
        $lang=explode(',', $user_info['languages']);
        $languages=$this->db->select('*')->from('programming_languages')->where_in('id',$lang)->get()->result_array();
        $language_list=array();
        foreach ($languages as $key => $value) {
        	array_push($language_list, $value['language_name']);
        }
        $language_list=implode(',', $language_list);
        $user_info['lang_list']=$language_list;
        $data['user_info']=$user_info;
        $member_count=$this->db->select('id')->from('user_master')->where(array('status'=>'Active','user_type!='=>'superadmin'))->get()->num_rows();
		$data['member_count']=$member_count;
		$this->load->view('header');
		$this->load->view('view_profile',$data);
		$this->load->view('footer');
	}

	public function edit_profile($id){
        $data['user_info']=$this->Login_model->get_user_data($id);
		$data['languages']=$this->Login_model->get_languages();
		$this->load->view('header');
		$this->load->view('profile_edit',$data);
		$this->load->view('footer');
	}

    public function check_duplicate_edit(){
		$input=$this->input->post();
		$data=$this->User_model->check_duplicate($input);
		echo json_encode($data);
	}

   public function member_edit()
	{
		$input=$this->input->post();
		$data=$this->User_model->member_edit($input);
		echo json_encode($data);
	}

	public function member_list(){
		$data['member_list']=$this->User_model->get_members();
		$this->load->view('header');
		$this->load->view('member_list',$data);
		$this->load->view('footer');

	}

	 public function delete_member()
	{
		$input=$this->input->post();
		$data=$this->User_model->delete_member($input);
		echo json_encode($data);
	}



}
