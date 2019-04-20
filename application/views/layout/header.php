<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Phone Management System | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/build/css/custom.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?php echo base_url();?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url();?>assets/vendors/dist/css/select2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendors/dist/css/select2.min.css" rel="stylesheet"> -->

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url();?>" class="site_title"><!--< i class="fa fa-paw"></i> --> <span>PMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <?php if($this->session->userdata('image')!='') { ?>
                <img src="<?php echo base_url(); ?>assets/profile/<?php echo $this->session->userdata('image');?>" alt="..." class="img-circle profile_img">
              <?php } else  { ?>
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              <?php } ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <?php if($this->session->userdata('id')!='1') { ?>
                  <h2>Seller</h2>
                <?php } else { ?>
                <h2>Admin</h2>
              <?php } ?>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <?php if($this->session->userdata('id')!='1') { ?>
                  <ul class="nav side-menu">
                  <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a><i class="fa fa-desktop"></i> Stock Management<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>stock/phone">Phone</a></li>
                      <li><a href="<?php echo base_url();?>stock/accessories">Accessories</a></li>
                      <li><a href="<?php echo base_url();?>stock/parts">Parts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Sales and Purchase <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>sell/add">Sales Management</a></li>
                      <li><a href="<?php echo base_url();?>sell">View Sales </a></li>
                      <li><a href="<?php echo base_url();?>buy">Purchase Management</a></li>
                    </ul>
                  </li>
                  <li style="background-color: blueviolet;"><a href="<?php echo base_url();?>seller"><i class="fa fa-info text-aqua"></i> About </a></li>
                </ul>
                <?php } else { ?>
                  <ul class="nav side-menu">
                  <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a><i class="fa fa-desktop"></i> Stock Management<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>stock/phone">Phone</a></li>
                      <li><a href="<?php echo base_url();?>stock/accessories">Accessories</a></li>
                      <li><a href="<?php echo base_url();?>stock/parts">Parts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Sales and Purchase <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>sell/add">Sales Management</a></li>
                      <li><a href="<?php echo base_url();?>sell">View Sales </a></li>
                      <li><a href="<?php echo base_url();?>buy">Purchase Management</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo base_url();?>seller"><i class="fa fa-users"></i> Seller </a></li>
                  <li><a href="<?php echo base_url();?>login/tac"><i class="fa fa-users"></i> Term and Conditions </a></li>
                  <li><a><i class="fa fa-table"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>reports">Reports on Sell</a></li>
                      <li><a href="<?php echo base_url();?>reports/warrenty">Reports on Warrenty</a></li>
                      <li><a>Reports on Stock<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                            <li class="sub_menu"><a href="<?php echo base_url();?>reports/phones">Phone</a>
                            </li>
                            <li><a href="<?php echo base_url();?>reports/accessories">Accessories</a>
                            </li>
                            <li><a href="<?php echo base_url();?>reports/parts">Parts</a>
                            </li>
                          </ul>
                    </ul>
                  </li>
                  <li style="background-color: blueviolet;"><a href="<?php echo base_url();?>login/version"><i class="fa fa-info"></i> About </a></li>
                </ul>
                <?php } ?>
                
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php if($this->session->userdata('id')!='1') { ?>
                  Seller
                <?php } else { ?>
                Admin
              <?php } ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url();?>login/profile"> Profile</a></li>
                    <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->