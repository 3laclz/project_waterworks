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
          if(document.form1.txtname.value == "")
          {
            alert('กรุณาใส่ข้อมูล "ชื่อ" ');
            document.form1.txtname.focus();   
            return false;
          } 
          if(document.form1.txtlastname.value == "")
          {
            alert('กรุณาใส่ข้อมูล "นามสกุล" ');
            document.form1.txtlastname.focus();    
            return false;
          }
          if(document.form1.txtusername.value == "")
          {
            alert('กรุณาใส่ข้อมูล "Username" ');
            document.form1.txtusername.focus();   
            return false;
          } 
          if(document.form1.txtpassword.value == "")
          {
            alert('กรุณาใส่ข้อมูล "Password"');
            document.form1.txtpassword.focus();   
            return false;
          } 
          if(document.form1.txtposition.value == "")
          {
            alert('กรุณาใส่ข้อมูล "ตำแหน่ง" ');
            document.form1.txtposition.focus();    
            return false;
          }
          if(document.form1.txtstatus.value == "...กรุณาเลือกสถานะ...")
          {
            alert('กรุณาเลือกข้อมูล "สถานะ" ');
            document.form1.txtstatus.focus();    
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
                    เพิ่มรายการผู้ใช้น้ำประปา
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li>ข้อมูลผู้ใช้น้ำ</li>
        <li class="active">เพิ่มรายการผู้ใช้น้ำประปา</li>
      </ol>
    </section>
    <form action="algorithm/insert_personnel.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
    <!-- Main content -->
             <section class="content">
              <div class="row">
                <!-- left column -->
               <div class="col-md-6">
                  <!-- Horizontal Form -->
                 <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">ชื่อ-นามสกุล</h3>
                    </div>
                    <div role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="txtname">ชื่อ</label>
                          <input type="text" name="txtname" class="form-control" id="txtname" placeholder="ชื่อ">
                        </div>
                        <div class="form-group">
                          <label for="txtlastname">นามสกุล</label>
                          <input type="text" name="txtlastname" class="form-control" id="txtlastname" placeholder="นามสกุล">
                        </div>
                        
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- Horizontal Form -->
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">บัญชีพนักงาน</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="form-horizontal">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Username : </label>
        
                          <div class="col-sm-10">
                            <input type="text" name="txtusername" class="form-control" id="inputEmail3" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Password : </label>
                          <div class="col-sm-10">
                            <input type="text" name="txtpassword" class="form-control" id="inputPassword3" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">ตำเเหน่ง : </label>
                          <div class="col-sm-10">
                            <input type="text" name="txtposition" class="form-control" id="inputPassword3" value="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">สถานะ  : </label>
                          <div class="col-sm-10">
                            <select class="form-control select2" style="width: 100%;" name="txtstatus">
                               <option selected="selected">...กรุณาเลือกสถานะ...</option>
                               <option name="admin">admin</option>
                               <option name="employee">employee</option>
                            </select>
                          </div>
                        </div>
                        
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-left" onclick="return confirm('ยืนยันการบันทึกข้อมูล')">ตกลง</button>
                      </div>
                      <!-- /.box-footer -->
                    </div>
                  </div>
                </div>
                <!--/.col (right) -->
              </div>
              <!-- /.row -->
              
            </section>
    <!-- /.content -->
    </form>
   >
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
