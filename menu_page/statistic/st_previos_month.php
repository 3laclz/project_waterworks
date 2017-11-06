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

$villageno=$_GET['village'];
$month_before=$_GET['month_before'];
$year_before=$_GET['year_before'];
$month_after=$_GET['month_after'];
$year_after=$_GET['year_after'];
$sql_search_month="SELECT datatime,sum(money),sum(meter) FROM datameter INNER JOIN address ON address.villageid=datameter.villageid  WHERE (datatime between '$year_before-$month_before-01' and '$year_after-$month_after-31') and villageno='$villageno' GROUP BY MONTH(datatime),YEAR(datatime) ORDER BY datatime DESC ";
$objq_search=mysqli_query($conn,$sql_search_month);
$sql_search_sum="SELECT sum(meter),sum(money) FROM datameter INNER JOIN address ON address.villageid=datameter.villageid WHERE (datatime between '$year_before-$month_before-01' and '$year_after-$month_after-31') and villageno='$villageno'";
$objq_sum=mysqli_query($conn,$sql_search_sum);
$objr_sum=mysqli_fetch_array($objq_sum);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>สถิติใช้น้ำ | หมู่ที่<?php echo $villageno?></title>
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
   
            <!-- form start -->
         <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
              <div class="box-body">
               <div class="box-header">
                <h3 class="box-title">สถิติการใช้น้ำ</h3>
               </div>
                 <table id="example" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                 <th class="text-center">วันที่</th>
                 <th class="text-center">จำนวนหน่วยน้ำที่ใช้</th>
                 <th class="text-center">จำนวนเงิน</th>
                 </tr>
                 </thead>
                 <tbody>
                 <?php require 'nav_bar/time.php';?>
                 <?php foreach ($objq_search as $m ):?>
                 
                 <tr>
                 <td class="text-center" width ="200"><?php echo DateThai($m['datatime'])?></td>
                 <td class="text-center" width="200"><?php echo $m['sum(meter)']?></td>
                 <td class="text-center" width="200"><?php echo $m['sum(money)']?></td>
                <?php endforeach;?>
                 </tr>
                 </tbody>
                 </table>          
              </div><br><br>
              <table id="example" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                     <th class="text-center">วันที่</th>
                     <th class="text-center">จำนวนหน่วยน้ำที่ใช้</th>
                     <th class="text-center">จำนวนเงินที่ได้รับ</th>
                 </tr>
                 </thead>
                 <tbody>
                 
                 <tr>
                     <td class="text-center"><?php echo $month_before?>-<?php echo $year_before?> ถึง  <?php echo $month_after?>-<?php echo $year_after?></td>
                     <td class="text-center"><?php echo $objr_sum['sum(meter)']?></td>
                     <td class="text-center"><?php echo $objr_sum['sum(money)']?></td>
                 </tr>
                 </tbody>
                 </table>
                 <a href="../../pdf_file/static_month.php?month_before=<?php echo $month_before;?>&year_before=<?php echo $year_before;?>&month_after=<?php echo $month_after;?>&year_after=<?php echo $year_after?>"  target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
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
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
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
