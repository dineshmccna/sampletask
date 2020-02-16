<?php
class User_model extends CI_Model
{
 public function register_user($input){
  $languages=implode(",",$input['language']);
  $insert_array=array(
  	'user_type'=>'user', 
  	'user_name'=>$input['user_name'], 
  	'mobile_number'=>$input['mobile_number'], 
  	'email_id'=>$input['email_id'], 
  	'gender'=>$input['gender'], 
  	'languages'=>$languages, 
    'password'=>$input['password'],
  	'status'=>'Active', 
  	'created_at'=>date("Y-m-d H:i:s"), 
  	);
  if($this->db->insert('user_master',$insert_array)){
  	$last_id=$this->db->insert_id();
  	if (isset($_FILES["user_photo"]) && $_FILES["user_photo"] != '') {
     $target_dir  = "uploads/user_photo/";
     $ext         = pathinfo($_FILES["user_photo"]["name"], PATHINFO_EXTENSION);
     $basename    = $last_id.'.'.$ext;
     $target_file = $target_dir . $basename;
     move_uploaded_file($_FILES["user_photo"]["tmp_name"], $target_file);
     $update_array=array(
         'user_photo'=>$target_file
     	);
     $this->db->where('id',$last_id);
     $this->db->update('user_master',$update_array);
     }
     $msg=array('status'=>'true');
  }else{
  	 $msg=array('status'=>'false');
  }
  return $msg;
 }

 public function check_duplicate($input){
  if($input['type']=='username'){
   $this->db->where(array('user_name'=>$input['check_val']));
  }else if($input['type']=='mobile_no'){
    $this->db->where(array('mobile_number'=>$input['check_val']));
  }else if($input['type']=='email_id'){
    $this->db->where(array('email_id'=>$input['check_val']));
  }
   $get_data=$this->db->select("id,user_name")->from('user_master')->where(array())->get()->num_rows();
    if($get_data=='0'){
      $status='Valid';
    }else{
      $status='Invalid';
    }
  return $status;
 }

  public function check_duplicate_edit($input){
  if($input['type']=='mobile_no'){
    $this->db->where(array('mobile_number'=>$input['check_val'],'id!='=>$input['edit_id']));
  }else if($input['type']=='email_id'){
    $this->db->where(array('email_id'=>$input['check_val'],'id!='=>$input['edit_id']));
  }
   $get_data=$this->db->select("id,user_name")->from('user_master')->where(array())->get()->num_rows();
    if($get_data=='0'){
      $status='Valid';
    }else{
      $status='Invalid';
    }
  return $status;
 }

 public function member_edit($input){
  $languages=implode(",",$input['language']);
  $update_array=array(
    'mobile_number'=>$input['mobile_number'], 
    'email_id'=>$input['email_id'], 
    'gender'=>$input['gender'], 
    'languages'=>$languages, 
    'status'=>'Active', 
    'password'=>$input['password'],
    'updated_at'=>date("Y-m-d H:i:s"), 
    );
   $this->db->where('id',$input['edit_id']);
  if($this->db->update('user_master',$update_array)){
    $last_id=$input['edit_id'];
    if (isset($_FILES["user_photo"]) && $_FILES["user_photo"] != '') {
     $target_dir  = "uploads/user_photo/";
     $ext         = pathinfo($_FILES["user_photo"]["name"], PATHINFO_EXTENSION);
     $basename    = $last_id.'.'.$ext;
     $target_file = $target_dir . $basename;
     move_uploaded_file($_FILES["user_photo"]["tmp_name"], $target_file);
     $update_array=array(
         'user_photo'=>$target_file
      );
     $this->db->where('id',$last_id);
     $this->db->update('user_master',$update_array);
     }
     $msg=array('status'=>'true');
  }else{
     $msg=array('status'=>'false');
  }
  return $msg;
 }

 public function get_members(){
  $data=$this->db->select('*')->from('user_master')->where('status','Active')->get()->result_array();
  foreach ($data as $key => $value) {
    $lang=explode(',', $value['languages']);
        $languages=$this->db->select('*')->from('programming_languages')->where_in('id',$lang)->get()->result_array();
        $language_list=array();
        foreach ($languages as $lk => $lv) {
          array_push($language_list, $lv['language_name']);
        }
        $language_list=implode(',', $language_list);
        $data[$key]['lang_list']=$language_list;
  }
  return $data;
 }

 public function delete_member($input){
  $status_array=array('status'=>'Inactive');
  $this->db->where('id',$input['id']);
  if($this->db->update('user_master',$status_array)){
    $msg=array('status'=>'true');
  }else{
    $msg=array('status'=>'false');
  }
  return $msg;
 }
}
?>