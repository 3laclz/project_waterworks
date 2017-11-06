<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
	    header("location:../../login/login_admin.php");
		exit();
	}

	if($_SESSION['Status'] != "admin")
	{
		echo "Homepage_admin";
		exit();
	}	
	
	 require '../../connect/connect.php';
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysqli_query($conn,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
?>
<?php 
require '../../connect/connect.php';
$sql = "SELECT * FROM member WHERE UserID='".$_GET["edit"]."' ";
$objq = mysqli_query($conn,$sql);
$objR = mysqli_fetch_array($objq);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Waterwork</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <?php require '../nav_bar/form_top_bar.php';?>
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
            	 แก้ไขบัญชีเจ้าหน้าที่
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li><a href="#">ข้อมูลเจ้าหน้าที่</a></li>
        <li class="active">เเก้ไขบัญชีเจ้าหน้าที่</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
     <form action="../algorithm/updata_personnel.php" class="form-horizontal"  method="post">
      <div class="row">
       <div class="col-md-6">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">ชื่อ-นามสกุล</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">       
                    <input type="hidden" name="txtuserid" class="form-control" id="inputEmail3" value="<?php echo $objR['UserID']?>">
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">ชื่อ :</label>
                      <div class="col-sm-8">
                        <input type="text" name="txtname" class="form-control" id="inputEmail3" value="<?php echo $objR['Name']?>">
                      </div>
                  </div>
                 <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">นามสกุล :</label>
                      <div class="col-sm-8">
                        <input type="text" name="txtlastname" class="form-control" id="inputEmail3" value="<?php echo $objR['lastname']?>">
                      </div>
                </div>
              </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
            
          </div>
        </div>
     
        <div class="col-md-6">
         <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">บัญชี</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">ชื่อบัญชีเจ้าหน้าที่ :</label>
                  <div class="col-sm-6">
                    <input type="text" name="txtusername" class="form-control" id="inputEmail3" value="<?php echo $objR['Username']?>">
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">รหัสผ่าน :</label>
                  <div class="col-sm-8">
                    <input type="text" name="txtpassword" class="form-control" id="inputEmail3" value="<?php echo $objR['Password']?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ตำแหน่ง :</label>
                  <div class="col-sm-8">
                    <input type="text" name="txtposition" class="form-control" id="inputEmail3" value="<?php echo $objR['position']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">สถานะ :</label>
                  <div class="col-sm-8">
                    <input type="text" name="txtstatus"  class="form-control" id="inputEmail3" value="<?php echo $objR['Status']?>">
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
    </form>
    </section>
    </div>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>CPE XIII-UP</strong>
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="...../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
