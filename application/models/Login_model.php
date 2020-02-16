<?php
class Login_model extends CI_Model
{

 public function get_languages(){
   $data=$this->db->select('*')->from('programming_languages')->where(array('status'=>'Active'))->get()->result_array();
  return $data;
 }

 public function log_in($input){
 $get_user=$this->db->select('*')->from('user_master')->where(array('user_name'=>$input['user_name'],'password'=>$input['password']))->get();
 if($get_user->num_rows()!='0'){
 	$result=$get_user->row_array();
 	$this->session->set_userdata($result);
 	$status=array('status'=>'success');
 }else{
 	$status=array('status'=>'failed');
 }
 return $status;
 }

 public function get_user_data($id){

  $data=$this->db->select('*')->from('user_master')->where('id',$id)->get()->row_array();
  return $data;
 }

 public function check_user_name($email_id){
  $data=$this->db->select('id,user_name')->from('user_master')->where('email_id',$email_id)->get();
  $count=$data->num_rows();
  if($count!=0){
  	$user_data=$data->row_array();
  	$msg=array('status'=>'available','id'=>$user_data['id']);
  }else{
  	$msg=array('status'=>'not_available');
  }
  return $msg;
 }

 public function get_smtp(){
 	$data=$this->db->select('*')->from('email_setting')->where('id','1')->get()->row_array();
 	return $data;
 }

 public function get_email($id){
 	$data=$this->db->select('email_id')->from('user_master')->where('id',$id)->get()->row_array();
 	return $data;
 }

}
?>