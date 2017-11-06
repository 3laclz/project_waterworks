<?php 
 require 'connect/connect.php';
 $sql_count="SELECT count(id) FROM datauser";
 $objq_count=mysqli_query($conn, $sql_count);
 $objr_count=mysqli_fetch_array($objq_count);
 // $sql_status="SELECT count(id) FROM datauser WHERE status='nonactive'";
 // $objq_status=mysqli_query($conn, $sql_status);
 // $objr_status=mysqli_fetch_array($objq_status);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>AdminLTE 2 | Top Navigation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
   <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" type="text/css" href="bootstraptest/css/style-footer.css">
  <link rel="stylesheet" type="text/css" href="bootstraptest/css/style-form.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTMLa5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top" style="padding-left: 30px; padding-right: 50px;">
      <div class="container-fluid">

        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="padding-top: 0px;">
        <img alt="Brand" src="1514-1.png" height="175%">
      </a>
          <a href="index.php" class="navbar-brand" style="padding-top: 20px; padding-left: 10px;"><b>Waterworks</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="index6.php" style="padding-bottom: 25px; padding-top: 20px;"> หน้าหลัก <span class="sr-only">(current)</span></a></li>
                </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#login-admin-modal" style="padding-bottom: 25px; padding-top: 20px;"><i class="fa fa-university" aria-hidden="true"></i>&nbsp;&nbsp;เข้าสู่ระบบพนักงาน</a>
          </li>
          <li class="nav-item"> 
              <a class="nav-link" href="#" data-toggle="modal" data-target="#login-user-modal" style="padding-bottom: 25px; padding-top: 20px;"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;เข้าสู่ระบบผู้ใช้น้ำ</a>
          </li>
                                   
        </ul>
      </div>
    </div>
      <!-- /.container-fluid -->

    

    </nav>
  </header>


    <!--start login-admin-modal
_______________________________________________________________________________________-->
  <div class="modal fade" id="login-admin-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
                    <!-- <div class="modal-header" style="background-color:#4169E1">
                        
                    </div> -->
        <h3 class="text-center" style="padding-top: 12px; margin-top: auto; margin-bottom: auto;"><!-- พนักงาน --></h3>
        <div class="modal-body">                                
          <img src="1514.png" width="100%">
          <form action="login/check_login/check_login_admin.php" method="post">    
             <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                  </span>
                  <input type="text" name="txtUsername" class="form-control " placeholder="Username">
                </div>
              </div>

              <!--form admin
                ________________________________________________________________________-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-key" aria-hidden="true"></i>
                  </span>
                  <input type="password" name="txtPassword" class="form-control" placeholder="Password">
                </div> 
              </div>
                          <div class="row">
                            <div class="col-xs-8">
                              <div class="checkbox icheck">
                                <label>
                                  
                                </label>
                              </div>
                            </div>
                            
                          </div>

                           <div class="row">
                          <div class="col-md-3"></div> 
                            <div class="col-md-6">
                              <button class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Login</button>
                            </div> 
                            <div class="col-md-3"></div>                      
                        </div>
                        
                </form>           
        </div>
                

        </div>
      </div>
    </div>
        <!--end login-admin-modal -->


    <!--start login-user-modal user
 _____________________________________________________________________________________-->
  <div class="modal fade" id="login-user-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <!-- <div class="modal-header" style="background-color:#4169E1">

                    </div> -->
                    <h3 class="text-center" style="padding-top: 12px; margin-top: auto; margin-bottom: auto;""><!-- ผู้ใช้น้ำ --></h3>
                    <div class="modal-body">
                      <img src="1514.png" width="100%">
                          <form action="login/check_login/check_login_user.php" method="post">
                              <div class="form-group">
                                <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="fa fa-address-card" aria-hidden="true"></i>
                                </span>
                                  <input type="text" name="txtaddress" class="form-control" placeholder="บ้านเลขที่">
                                     </div>      
                                </div>
                                <div class="form-group has-feedback">
                                <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="fa fa-users" aria-hidden="true"></i>
                                </span>
                                  <input type="text" name="txtvillageno" class="form-control" placeholder="หมู่ที่"> 
                                  </div>
                                </div>
                                <div class="form-group has-feedback">
                                  <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="fa fa-key" aria-hidden="true"></i>
                                </span>
                                    <input type="password" name="txtpassword" class="form-control" placeholder="รหัสผ่าน">
                                  </div>
                                </div>                                      
                                    <p class = "text-center">*สำหรับผู้ใช้น้ำในพื้นที่ตำบลบ้านถ้ำเท่านั้น </p >

                                    <!--button
                                    _____________________________________________________________________-->
                                    <div class="row">
                                      <div class="col-md-3"></div> 
                                        <div class="col-md-6">
                                            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Login</button>
                                        </div> 
                                      <div class="col-md-3"></div>                      
                                    </div>                                       
                        </form>             
                    </div>

                </div>
            </div>
    </div>
        <!--end login-user-modal-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content" style="padding-top: 25px;">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h2>15000 ลบ.ม/เดือน</h2>

              <p>ปริมาณการใช้น้ำ</p>
            </div>
            <div class="icon">
              <i class="fa fa-bath" aria-hidden="true"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h2><?php echo $objr_count['count(id)'];?> คน</h2>

              <p>จำนวนผู้ใช้น้ำ</p>
            </div>
            <div class="icon">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h2><?php /*echo $objr_status['count(id)'];*/?>9 คน</h2>
              <p>ผู้ใช้น้ำรอการอนุมัติ</p>
               
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">

      <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
           <div  style="height: 300px; width: 100%;">
           <?php require 'chart/php-wrapper/test.php';?>
          </div>
          </div>
        </section>
        
        <!-- /.Left col -->
       
        

        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>

    <!-- Main content -->
    
    <!-- /.content -->
  
  </div>
  <!-- /.content-wrapper -->

  <footer>
    <div class="footer" id="footer" style="background-color: #f8f8f8">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> ประกาศ </h3>
                    <ul>
                        <li> <a href="#"> ??????????? </a> </li>
                        <li> <a href="#"> ??????????? </a> </li>
                        <li> <a href="#"> ??????????? </a> </li>
                        <li> <a href="#"> ??????????? </a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> ข่าวแจ้งเตือน </h3>
                    <ul>
                        <li> <a href="#"> ??????????? </a> </li>
                        <li> <a href="#"> ??????????? </a> </li>
                        <li> <a href="#"> ??????????? </a> </li>
                        <li> <a href="#"> ??????????? </a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> เกี่ยวกับเทศบาล </h3>
                    <ul>
                        <li> <a href="#"> ??????????? </a> </li>
                        <li> <a href="#"> ??????????? </a> </li>
                        <li> <a href="#"> ??????????? </a> </li>
                        <li> <a href="#"> ??????????? </a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> ติดต่อเรา </h3>
                    <ul class="social">
                        <li> <a href="https://www.facebook.com/banthammunicipality"> <i class=" fa fa-facebook">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-pinterest">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
                    </ul>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
    
    <div class="footer-bottom">
        <div class="container">
            <div class="pull-right">
                <ul class="nav nav-pills payments">
                  <li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                </ul> 
            </div>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


</body>
</html>
