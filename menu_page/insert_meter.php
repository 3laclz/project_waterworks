<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
	    header("location:../login/login_admin.php");
		exit();
	}

	if($_SESSION['Status'] != "admin")
	{
		echo "Homepage_admin";
		exit();
	}	
	
	 require '../connect/connect.php';
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysqli_query($conn,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Waterwork</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <script language="javascript">
        function fncSubmit()
        {
          if(document.form1.txtaddress.value == "")
          {
            alert('กรุณาใส่ข้อมูล "บ้านเลขที่" ');
            document.form1.txtaddress.focus();   
            return false;
          } 
          if(document.form1.txtvillageno.value == "")
          {
            alert('กรุณาใส่ข้อมูล "หมู่ที่" ');
            document.form1.txtvillageno.focus();    
            return false;
          }

          document.form1.submit();
        }
</script>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="homepage_admin.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Waterwork</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <?php require 'nav_bar/top_bar.php';?>
          <!-- /account -->
          </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php require 'nav_bar/side_bar.php';?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
                    จัดการค่าน้ำประปา
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li>ระบบจัดการน้ำประปา</li>
        <li class="active">จัดการค่าน้ำประปา</li>
      </ol>
    </section>
    <section class="content">
    <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">เพิ่มค่าน้ำประปา</a></li>
              <li><a href="#timeline" data-toggle="tab">แก้ไขค่าน้ำประปา</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <!-- /.user-block -->
                  <form action="form/form-insert-meter.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
                   <div class="post">
                     <div class="box-header with-border">
                      <h3 class="box-title">กรุณากรอกบ้านเลขที่เเละหมู่ที่</h3>
                     </div>
                        <div role="form">
                          <div class="box-body">
                            <div class="form-group col-md-3">
                              <label for="txtaddress">บ้านเลขที่</label>
                              <input type="text" name="txtaddress" class="form-control" id="txtaddress" placeholder="บ้านเลขที่">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="txtvillageno">หมู่ที่</label>
                              <input type="text" name="txtvillageno" class="form-control" id="txtvillageno" placeholder="หมู่ที่">
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                         <button type="submit" class="btn btn-info pull-left">ตกลง</button>
                        </div>
                    </div> 
                   </form> 
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
               <form action="form/form_edit_meter.php" method="get">
                <div class="post">
                     <div class="box-header with-border">
                      <h3 class="box-title">กรุณากรอกบ้านเลขที่เเละหมู่ที่</h3>
                     </div>
                        <div role="form">
                          <div class="box-body">
                            <div class="form-group col-md-3">
                              <label for="txtaddress">บ้านเลขที่</label>
                              <input type="text" name="txtaddress" class="form-control" id="txtaddress" placeholder="บ้านเลขที่">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="txtvillageno">หมู่ที่</label>
                              <input type="text" name="txtvillageno" class="form-control" id="txtvillageno" placeholder="หมู่ที่">
                            </div>
                          </div>
                        </div>
                       <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-left">ตกลง</button>
                       </div>
                   </div> 
                </form> 
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     <b>Version</b> 1.0.0
    </div>
    <strong>CPE XIII-UP</strong>
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="../bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
