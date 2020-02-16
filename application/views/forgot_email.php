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
                    <form id="forgot_form">
                        <div class="form-group">
                            <label>Email ID</label>
                            <input type="text" class="form-control" placeholder="Email" name="user_name" id="user_name">
                            <small class="help-block form-text" style="display:none;color:red" id="user_name_error">
                                                </small>
                        </div>
                        <button type="button" class="btn btn-success btn-flat m-b-30 m-t-30" id="get_password">Get password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#get_password').click(function(e){
          var user_name=$('#user_name').val();
          
          if(user_name==''||user_name==undefined||user_name==null){
            show_error('username','Username cannot be empty');
          }else{
             var form = document.getElementById("forgot_form");
             var formdata = new FormData(form);
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo base_url();?>index.php/get_password',
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
                         if(data.status=='true'){
                                 swal({
                            title: 'Success!',
                            text: 'Password sent to the registered mail id',
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        }).then(function() { 
                           window.location.href = "http://localhost/dineshtask";
                          });
                         }else if(data.status=='false'&&data.msg=='server_error'){
                             swal({
                            title: 'Sorry!',
                            text: 'Server Error',
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        }).then(function() { 
                           window.location.href = "http://localhost/dineshtask";
                          });
                         }else if(data.status=='false'&&data.msg=='invalid_user'){
                             swal({
                            title: 'Sorry!',
                            text: 'User not registered',
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        }).then(function() { 
                           window.location.href = "http://localhost/dineshtask";
                          });
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

  