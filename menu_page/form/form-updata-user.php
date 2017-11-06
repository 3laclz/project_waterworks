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
$sql = "SELECT * FROM datauser INNER JOIN address ON datauser.userid=address.userid WHERE address.userid='".$_GET["edit"]."' ";
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

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script language="javascript">
        function fncSubmit()
        {
        	if(document.form1.name.value == "")
        	{
        		alert('กรุณาใส่ข้อมูลuserid');
        		document.form1.name.focus();		
        		return false;
        	}	
        	if(document.form1.txtname.value == "")
        	{
        		alert('กรุณาใส่ข้อมูลชื่อ');
        		document.form1.txtname.focus();		
        		return false;
        	}	
        	if(document.form1.txtlastname.value == "")
        	{
        		alert('กรุณาใส่ข้อมูลนามสกุล');
        		document.form1.txtlastname.focus();		
        		return false;
        	}	
        	if(document.form1.txtaddress.value == "")
        	{
        		alert('กรุณาใส่ข้อมูลบ้านเลขที่');
        		document.form1.txtaddress.focus();		
        		return false;
        	}	
        	if(document.form1.txtvillageno.value == "")
        	{
        		alert('กรุณาใส่ข้อมูลหมู่ที่');
        		document.form1.txtvillageno.focus();		
        		return false;
        	}	
        	if(document.form1.txtsubdistrict.value == "")
        	{
        		alert('กรุณาใส่ข้อมูลตำบล');
        		document.form1.txtsubdistrict.focus();		
        		return false;
        	}	
        	if(document.form1.txtdistrict.value == "")
        	{
        		alert('กรุณาใส่ข้อมูลอำเภอ');
        		document.form1.txtdistrict.focus();		
        		return false;
        	}	
        	if(document.form1.txtprovince.value == "")
        	{
        		alert('กรุณาใส่ข้อมูลจังหวัด');
        		document.form1.txtprovince.focus();		
        		return false;
        	}	
        	if(document.form1.txtZipcode.value == "")
        	{
        		alert('กรุณาใส่ข้อมูลรหัสไปรษณีย์');
        		document.form1.txtZipcode.focus();		
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
    <a href="../homepage_admin.php" class="logo">
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
          <?php require 'nav_bar/form_top_bar.php';?>
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
                    เเก้ไขรายชื่อผู้ใช้น้ำ
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">รายชื่อผู้ใช้น้ำ</a></li>
        <li class="active">แก้ไขรายชื่อผู้ใช้น้ำ</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
     <form action="../algorithm/updata_user.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
      <div class="row">
        <!-- left column -->
       <div class="col-md-12">
          <!-- Horizontal Form -->
         <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">ข้อมูลส่วนตัว</h3>
            </div>
            <div role="form">
              <div class="box-body">
                <div class="form-group col-md-2">
                  <label for="txtuserid">UserID</label>
                  <input type="text" name="txtuserid" class="form-control" id="txtuserid" value="<?php echo $objR['userid']?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="txtname">ชื่อ</label>
                  <input type="text" name="txtname" class="form-control" id="txtname" value="<?php echo $objR['name']?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="txtlastname">นามสกุล</label>
                  <input type="text" name="txtlastname" class="form-control" id="txtlastname" value="<?php echo $objR['lastname']?>">
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <div class="row">
        <!-- left column -->
       <div class="col-md-12">
          <!-- Horizontal Form -->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ที่อยู่</h3>
            </div>
            <div role="form">
              <div class="box-body">
                <div class="form-group col-md-2">
                  <label for="txtaddress">บ้านเลขที่</label>
                  <input type="text" name="txtaddress" class="form-control" id="txtaddress" value="<?php echo $objR['address']?>">
                </div>
                <div class="form-group col-md-2">
                  <label for="txtvillageno">หมู่ที่</label>
                  <input type="text" name="txtvillageno" class="form-control" id="txtvillageno" value="<?php echo $objR['villageno']?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="txtsubdistrict">ตำบล</label>
                  <input type="text" name="txtsubdistrict" class="form-control" id="txtsubdistrict" value="บ้านถ้ำ">
                </div>
                <div class="form-group col-md-3">
                  <label for="txtdistrict">อำเภอ</label>
                  <input type="text" name="txtdistrict" class="form-control" id="txtdistrict" value="ดอกคำใต้">
                </div>
                <div class="form-group col-md-3">
                  <label for="txtprovince">จังหวัด</label>
                  <input type="text" name="txtprovince" class="form-control" id="txtprovince" value="พะเยา">
                </div>
                <div class="form-group col-md-3">
                  <label for="txtZipcode">รหัสไปรษณีย์</label>
                  <input type="text" name="txtZipcode" class="form-control" id="txtZipcode" value="56210">
                </div>
              </div>
                <!-- /.box-body -->
              <div class="box-footer">
                <button name="btnSubmit1" type="submit" value="Submit" class="btn btn-info pull-left">ตกลง</button>
              </div>
              <!-- /.box-footer -->
              <!-- /.box-body -->
            </div>
          </div>
        </div>
    
      </div>
      <!-- /.row -->
      </form>
    </section>
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
  <div class="control-sidebar-bg"></div>
</div>
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
