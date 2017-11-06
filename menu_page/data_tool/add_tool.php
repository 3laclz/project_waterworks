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
 $sql_tool="SELECT * FROM tool";
 $objq_tool=mysqli_query($conn, $sql_tool);
 $num = 1;
 
 $sql_edit_tool="SELECT * FROM tool WHERE ID_Tool = '$_GET[ID_Tool]'";
 $objq_edit_tool=mysqli_query($conn, $sql_edit_tool);
 $objr_edit_tool=mysqli_fetch_array($objq_edit_tool);
 
 $keytool = $objr_edit_tool['Num'];
 $idtool=$objr_edit_tool['ID_Tool'];
 $nametool=$objr_edit_tool['name'];
 $numtool=$objr_edit_tool['Num_Tool'];
 $pricetool=$objr_edit_tool['price'];
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
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">

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
            	 เพิ่มอุปกรณ์
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">อุปกรณ์</a></li>
        <li class="active">เพิ่มอุปกรณ์</li>
      </ol>
    </section>
    
    <!-- Main content -->
      <section class="content">
       <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">รายการอุปกรณ์</h3>
            </div>
            <div class="box-body no-padding">
              <div class="mailbox-read-message">
               <form action="cal_tool/cal_add.php" method="get">
               <table class="table table-hover table-striped table-bordered">
                  <tbody> 
                  <tr>
                    <th width="10%">ลำดับ</th>
                    <th width="20%">รหัสอุปกรณ์</th>
                    <th class="text-center" width="40%">ชื่ออุปกรณ์</th>
                    <th class="text-center" width="15%">จำนวนที่มีอยู่</th>
                    <th class="text-center" width="15%">จำนวนที่เพิ่ม</th>
                   
                  <tr> 
                    <td width="10%">
                       <div class="form-group">
                       <input  type="text"  class="form-control" value="<?php echo $keytool?>"disabled >
                       <input type="hidden" name="txtkeytool" value="<?=$keytool?>">
                       <input type="hidden" name="userId" value="<?=$objResult['UserID']?>">
                       </div>
                    </td>
                    <td width="20%">
                       <div class="form-group">
                       <input type="text" name="txtidtool" class="form-control" value="<?php echo $idtool?>" disabled>
                       </div>
                    </td>
                    <td width="40%">
                       <div class="form-group">
                       <input type="text" name="txtnametool" class="form-control "  value="<?php echo $nametool?>" disabled>
                       </div>
                    </td>
                    <td class="text-center" width="15%">
                       <div class="form-group">
                       <input type="text" name="txtnumtool" class="form-control" value="<?php echo $numtool?>" disabled>
                       </div>
                    </td>
                    <td class="text-center" width="15%">
                      <div class="form-group">
                       <input type="text" name="addtool" class="form-control" value="0">
                       </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
                <div class="box-footer">
              <div class="pull-right">
                <button type="submit" class="btn btn-primary" onclick="if(confirm('ยืนยันการบันทึก')) return true; else return false;"> บันทึก</button>
              </div>
              </div>
              </form>
              </div>
            </div>  <!-- /.mailbox-read-message -->
            </div>
          </div>
        </div> 
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
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
