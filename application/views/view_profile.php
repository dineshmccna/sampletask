
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
                                <h4 class="box-title">Member Dashboard</h4>
                                <div align="right">
                                 <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i>&nbsp; <a href="<?php echo base_url();?>index.php/profile_edit/<?php echo $user_info['id'];?>">Edit</a></button>
                             </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-body">
                                        <div>
                                         <img class="user-avatar rounded-circle" src="<?php echo '../'.$user_info['user_photo'];?>" height="100" width="100">
                                        </div>
                                        <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <label>
                                                <b>Username: </b>
                                            </label>
                                            <span>
                                          <?php echo $user_info['user_name'];?>
                                            </span>
                                        </div>
                                          <div class="col-md-6">
                                            <label>
                                               <b> User Type: </b>
                                            </label>
                                            <span>
                                          <?php echo $user_info['user_type'];?>
                                            </span>
                                        </div>
                                          <div class="col-md-6">
                                            <label>
                                                <b>Mobile No: </b>
                                            </label>
                                            <span>
                                          <?php echo $user_info['mobile_number'];?>
                                            </span>
                                        </div>
                                          <div class="col-md-6">
                                            <label>
                                               <b>Email ID: </b>
                                            </label>
                                            <span>
                                          <?php echo $user_info['email_id'];?>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <label>
                                               <b>Programming Languages: </b>
                                            </label>
                                            <span>
                                          <?php echo $user_info['lang_list'];?>
                                            </span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                           
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
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
    function edit_member(id){

     console.log(id);

     $.post('', {edit_id:id}, function(result) {


     })
    }
    </script>


