
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url();?>index.php/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                     <li class="active">
                        <a href="<?php echo base_url();?>index.php/profile"><i class="menu-icon fa fa-user"></i>Profile</a>
                    </li>
                     <?php if($_SESSION['user_type']=='admin'||$_SESSION['user_type']=='superadmin'){?>
                     <li>
                        <a href="<?php echo base_url();?>index.php/member_list"><i class="menu-icon fa fa-users"></i>Members</a>
                    </li>
                    <?php } ?>
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo '../'.$user_info['user_photo'];?>" alt="User Avatar" height="40" width="40">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="<?php echo base_url();?>index.php/logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
       
                <!-- /Widgets -->
                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Edit Member</h4>
                                <?php 
                               

                                $lang_list=explode(',', $user_info['languages']);
                              
                                ?>
                                <div align="right">
                                 <button type="button" class="btn btn-primary" onclick="edit_member(<?php echo $user_info['id'];?>)"><i class="fa fa-pencil"></i>&nbsp; Edit</button>
                             </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                     <div class="card-body">
                                        <form id="user_form" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="user_name" class="control-label mb-1">User Name</label>
                                                <input id="user_name" name="user_name" type="text" class="form-control" value="<?php echo $user_info['user_name'];?>" readonly>
                         
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="mobile_number" class="control-label mb-1">Mobile Number</label>
                                                <input id="mobile_number" name="mobile_number" type="text" class="form-control" onblur="check_duplicate_edit('mobile_no')" value="<?php echo $user_info['mobile_number'];?>">
                                                <small class="help-block form-text" style="display:none;color:red" id="mobile_no_error">
                                                </small>
                                             </div>
                                            <div class="form-group">
                                                <label for="email_id" class="control-label mb-1">Email ID</label>
                                                <input id="email_id" name="email_id" type="text" class="form-control" onblur="check_duplicate_edit('email_id')" value="<?php echo $user_info['email_id'];?>">
                                                <small class="help-block form-text" style="display:none;color:red" id="email_id_error">
                                                </small>
                                            </div>
                                              <div class="form-group">
                                                <label for="gender" class="control-label mb-1">Gender</label>
                                                <div class="form-check-inline form-check col-md-12">
                                                <label for="gender_male" class="form-check-label ml-2 mr-5">
                                                    <input type="radio" id="gender_male" name="gender" value="Male" class="form-check-input" <?php if($user_info['gender']=='Male'){echo 'checked';}?>>Male
                                                </label>
                                                <label for="gender_female" class="form-check-label mr-5">
                                                    <input type="radio" id="gender_female" name="gender" value="Female" class="form-check-input" <?php if($user_info['gender']=='Female'){echo 'checked';}?>>Female
                                                </label>
                                                <label for="gender_other" class="form-check-label ">
                                                    <input type="radio" id="gender_other" name="gender" value="Others" class="form-check-input" <?php if($user_info['gender']=='Others'){echo 'checked';}?>>Others
                                                </label>
                                                <small class="help-block form-text" style="display:none;color:red" id="gender_error">
                                                </small>
                                            </div>
                                            </div>
                                              <div class="form-group">
                                                <label for="address" class="control-label mb-1">Address</label>
                                               <textarea name="address" id="address" class="form-control"><?php echo $user_info['address'];?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="languages" class="control-label mb-1">Programming Languages</label>
                                                <select class="form-control" name="language[]" id="language" multiple>
                                                <option value="0"></option>
                                               <?php foreach ($languages as $key => $value) {?>
                                                 <option value="<?php echo $value['id'];?>" <?php if(in_array($value['id'], $lang_list)){echo 'selected';}?>><?php echo $value['language_name'];?></option>
                                               <?php  } ?>
                                                </select>
                                            </div>
                                              <div class="row form-group">
                                           <div class="col col-md-12"><label for="user_photo" class="form-control-label">Photo</label></div>
                                           <div class="col-12 col-md-9"><input type="file" id="user_photo" name="user_photo" class="form-control-file" onchange="show_photo(event)"></div>
                                            </div>
                                            <p><img id="output" width="200" /></p>
                                            <div class="form-group">
                                                <label for="password" class="control-label mb-1">Password</label>
                                                <input id="password" name="password" type="password" class="form-control">
                                                <small class="help-block form-text" style="display:none;color:red" id="password_error">
                                                </small>
                                            </div>
                                            <input type="hidden" name="invalid_mobile" id="invalid_mobile" value="0">
                                            <input type="hidden" name="invalid_email" id="invalid_email" value="0">
                                            <input type="hidden" name="edit_id" value="<?php echo $user_info['id'];?>">
                                            <div>
                                                <button id="update" type="button" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-thumbs-up fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Update</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                           
                            </div> <!-- /.row -->

                        </div>
                    </div><!-- /# column -->
                </div>
              
                <div class="clearfix"></div>
              
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->

        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <script>
 function check_duplicate_edit(type){
 if(type=="mobile_no"){
    var check_val=$('#mobile_number').val();
 }else if(type=="email_id"){
    var check_val=$('#email_id').val();
 }
var edit_id=$('#edit_id').val();
 if(check_val!=null&&check_val!=''&&check_val!=undefined){
     $.post('<?php echo base_url();?>index.php/checkduplicate_edit', {type:type,check_val:check_val,edit_id:edit_id}, function(result) {
        result=JSON.parse(result);
        if(type=="mobile_no"){
            if(result=='Invalid'){
            show_error('mobile_no','Mobile No Already Exists');
        }else if(result=='Valid'){
            hide_error('mobile_no');
        }
         }else if(type=="email_id"){
            if(result=='Invalid'){
            show_error('email_id','Email ID Already Exists');
        }else if(result=='Valid'){
            hide_error('email_id');
        }
         }
     })
 }
}

function show_error(type,msg){
if(type=='username'){
    $('#user_name_error').show();
    $('#user_name_error').html(msg);
    $('#invalid_user').val('1');
}else if(type=='mobile_no'){
    $('#mobile_no_error').show();
    $('#mobile_no_error').html(msg);
    $('#invalid_mobile').val('1');
}else if(type=='email_id'){
    $('#email_id_error').show();
    $('#email_id_error').html(msg);
    $('#invalid_email').val('1');
}else if(type=='password'){
    $('#password_error').show();
    $('#password_error').html(msg);
}
}

function hide_error(type){
if(type=='username'){
    $('#user_name_error').hide();
    $('#invalid_user').val('0');
}else if(type=='mobile_no'){
    $('#mobile_no_error').hide();
    $('#invalid_mobile').val('0');
}else if(type=='email_id'){
    $('#email_id_error').hide();
    $('#invalid_email').val('0');
}else if(type=='password'){
    $('#password').hide();
}

}

 $('#update').click(function(e){
        
          var mobile_no=$('#mobile_number').val();
          var email_id=$('#email_id').val();
          var password=$('#password').val();
         
          var invalid_mobile=$('#invalid_mobile').val();
          var invalid_email=$('#invalid_email').val();
          if(mobile_no==''||mobile_no==undefined||mobile_no==null){
             show_error('mobile_no','Mobile Number cannot be empty');
          }else if(email_id==''||email_id==undefined||email_id==null){
             show_error('email_id','Email ID cannot be empty');
          }else if(password==''||password==undefined||password==null){
             show_error('passwod','Password cannot be empty');
          }else if(invalid_mobile=='1'){
             show_error('mobile_no','Mobile No Already Exists');
          }else if(invalid_email=='1'){
             show_error('email_id','Email ID Already Exists');
          }else{
             var register_form = document.getElementById("user_form");
             var formdata = new FormData(register_form);
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo base_url();?>index.php/member_edit',
                     type:"post",
                     data:formdata,
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                         console.log(data);
                         result=JSON.parse(data);
                         if(result.status=='true'){
                swal({
                    title: 'Success!',
                    text: 'Profile Updation success!',
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                }).then(function() { 
                   window.location.href = "<?php echo base_url();?>index.php/dashboard";
                  });
            }
                   }
                 });
             }
            });
    </script>


