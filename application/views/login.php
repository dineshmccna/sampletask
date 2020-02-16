<div class="bg-dark">
<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form id="login_form">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name">
                            <small class="help-block form-text" style="display:none;color:red" id="user_name_error">
                                                </small>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                            <small class="help-block form-text" style="display:none;color:red" id="password_error">
                                                </small>
                        </div>
                        <div class="checkbox">
                            <label class="pull-right">
                                <a href="<?php echo base_url();?>index.php/forgot_password">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="button" class="btn btn-success btn-flat m-b-30 m-t-30" id="login">Login in</button>
                         <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="<?php echo base_url();?>index.php/signup"> Register Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#login').click(function(e){
          var user_name=$('#user_name').val();
          var password=$('#password').val();
          if(user_name==''||user_name==undefined||user_name==null){
            show_error('username','Username cannot be empty');
          }else if(password==''||password==undefined||password==null){
             show_error('password','Password cannot be empty');
          }else{
             var form = document.getElementById("login_form");
             var formdata = new FormData(form);
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo base_url();?>index.php/login',
                     type:"post",
                     data:formdata,
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                         console.log(data);
                         data=JSON.parse(data);
                         console.log(data);
                         if(data.status=='success'){
                            window.location.href = "<?php echo base_url();?>index.php/dashboard";
                         }else if(data.status=='failed'){
                            show_error('username','Username and Password Mismatch');
                         }

                   }
                 });
             }
            });
         
 var show_photo = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
};


    });

function show_error(type,msg){
if(type=='username'){
    $('#user_name_error').show();
    $('#user_name_error').html(msg);
}else if(type=='password'){
    $('#password_error').show();
    $('#password_error').html(msg);
}
}

function hide_error(type){
if(type=='username'){
    $('#user_name_error').hide();
}else if(type=='password'){
    $('#password').hide();
}

}
</script>

  