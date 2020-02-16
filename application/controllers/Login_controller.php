<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }
	public function index()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function sign_up()
	{
        $data['languages']=$this->Login_model->get_languages();
		$this->load->view('header');
		$this->load->view('sign_up',$data);
		$this->load->view('footer');
	}

	public function log_in()
	{
		$input=$this->input->post();
		$data=$this->Login_model->log_in($input);
		echo json_encode($data);
	}

	public function dashboard(){
		$this->load->view('header');
		$this->load->view('dashboard');
		$this->load->view('footer');
	}

	public function logout(){
		$this->session->sess_destroy();
        redirect('http://localhost/dineshtask/');

	}

    public function forgot_password(){
        $this->load->view('header');
        $this->load->view('forgot_email');
        $this->load->view('footer');
    }

    public function get_password(){
        $input=$this->input->post();
        $check_result=$this->Login_model->check_user_name($input['user_name']);
        if($check_result['status']=='available'){
        $new_password=sprintf( "%05d", rand(0,99999));
        $user_id=$check_result['id'];
        $pass_array=array(
        'password'=>$new_password
        );
        $smtp_settings=$this->Login_model->get_smtp();
        $get_receipient=$this->Login_model->get_email($user_id);
        $this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();
        $mail->isSMTP();
        $mail->Host     = $smtp_settings['server_name'];
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_settings['username'];
        $mail->Password = $smtp_settings['password'];
        $mail->SMTPSecure = $smtp_settings['connection'];
        $mail->Port     = $smtp_settings['port'];
        $mail->setFrom($smtp_settings['username'], 'Forgot password');
        $mail->addAddress($get_receipient['email_id']);
        $mail->Subject = 'New password';
        $mail->isHTML(true);
        $mailContent = "<h1>Use the below password</h1>
            <p>".$new_password."</p>";
        $mail->Body = $mailContent;
        // $mail->SMTPDebug = 1;
        // Send email
        if(!$mail->send()){
            $msg=array('status'=>'false','msg'=>'server_error');
        }else{
            $this->db->where('id',$user_id);
            $this->db->update('user_master',$pass_array);
            $msg=array('status'=>'true');
        }
        }else if($check_result['status']=='not_available'){
            $msg=array('status'=>'false','msg'=>'invalid_user');
        }
        echo json_encode($msg);
    }
   public function send_email(){
         
        $this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dineshmkumar91@gmail.com';
        $mail->Password = 'fourloopiiii';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('dineshmkumar91@gmail.com', 'Forgot password');
        $mail->addAddress('fullstackdinesh@gmail.com');
        $mail->Subject = 'New password';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>Use the below password</h1>
            <p>password</p>";
        $mail->Body = $mailContent;
        $mail->SMTPDebug = 1;
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
   
   }



}
