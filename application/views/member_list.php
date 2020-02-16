    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url();?>index.php/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                     <li>
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
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
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
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Member List</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Usertype</th>
                                            <th>Email ID</th>
                                            <th>Mobile No</th>
                                            <th>Languages Known</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($member_list as $key => $value) {?>
                                           <tr>
                                            <td><?php echo $value['user_name'];?></td>
                                            <td><?php echo $value['user_type'];?></td>
                                            <td><?php echo $value['email_id'];?></td>
                                            <td><?php echo $value['mobile_number'];?></td>
                                            <td><?php echo $value['lang_list'];?></td>
                                            <td><?php echo $value['address'];?></td>
                                            <td><button type="button" class="btn btn-danger btn-sm" onclick="delete_member(<?php echo $value['id'];?>)"><i class="fa fa-trash"></i>&nbsp;Delete</button></td>
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->

        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
<script type="text/javascript">

function delete_member(id){

                 $.post('<?php echo base_url();?>index.php/delete_member', {id:id}, function(data) {
                         console.log(data);
                         result=JSON.parse(data);
                         if(result.status=='true'){
                swal({
                    title: 'Success!',
                    text: 'User deleted successfully!',
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                }).then(function() { 
                   window.location.href = "<?php echo base_url();?>index.php/member_list";
                  });
            }
                   
                 });
            
         
}
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
</script>


