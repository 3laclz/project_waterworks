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
     $month_before=$_GET['month_before'];
     $year_before=$_GET['year_before'];
     $month_after=$_GET['month_after'];
     $year_after=$_GET['year_after'];
   //ค้นหาชื่อหมู่บ้านหมู่บ้าน
    require '../../connect/connect2.php';
    $sql_village = "SELECT * FROM name_village";
    $objq_village = mysqli_query($conn, $sql_village);
    $objr_village = mysqli_fetch_array($objq_village);
   ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>สถิติใช้น้ำรายเดือน</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins -->
   <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
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
    <a href="../../homepage_admin.php" class="logo">
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
    <!-- Main content -->
    <section class="content">
    <div class="row">
     <div class="col-md-12">
          <div class="box box-solid">
            <!-- /.box-header -->
              <div class="box-body">
              <dl class="dl-horizontal">
               
                <dt>ชื่อพนักงาน</dt>
                <dd><?php echo $objResult['Name']?>  <?php echo $objResult['lastname']?></dd>
                <dt>หน้าที่</dt>
                <dd><?php  echo $objResult['position']?></dd>
                <dt>ข้อมูลใช้น้ำประจำเดือน</dt>
                <dd><?php echo $month_before.'-'?><?php echo $year_before?> ถึง  <?php echo $month_after.'-'?><?php echo $year_after?> </dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
            <!-- form start -->
         <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
              <div class="box-body">
               <div class="box-header">
                <h3 class="box-title">สถิติการใช้น้ำประจำเดือน</h3>
               </div>
                 <div class="mailbox-read-message">
               <table class="table table-hover table-striped table-bordered">
                  <thead> 
                   <tr>
                    <th class="text-center" width="20%">หมู่ที่</th>
                    <th class="text-center" width="60%">ชื่อหมู่บ้าน</th>
                    <th class="text-center" width="20%">รายละเอียด</th>
                   </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($objq_village as $village):?>
                   <tr> 
                     <td class="text-center" width="20%"><?php echo $village['villageno']?></td>
                     <td class="text-center" width="60%"><?php echo $village['village']?></td>
                     <td class="text-center" width="20%"><a href="st_previos_month.php?village=<?php echo $village["villageno"]?>&month_before=<?php echo $month_before?>&year_before=<?php echo $year_before?>&month_after=<?php echo $month_after?>&year_after=<?php echo $year_after?>" target="_blank">
                         <i class="fa fa-check-circle-o"></i></a>
                     </td>
                   </tr>
                   <?php endforeach;?> 
                  </tbody>
                </table>
              </div>         
              </div><br><br>
                 
                 </div>    
             </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
    
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
  <div class="control-sidebar-bg"></div>


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
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- ChartJS -->
<script src="../../bower_components/Chart.js/Chart.js"></script>
<!-- page script -->
</body>
</html>
