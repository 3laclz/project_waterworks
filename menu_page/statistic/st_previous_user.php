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
    $sql="SELECT * FROM datauser INNER JOIN address ON datauser.userid=address.userid WHERE id = '".$_GET["seach"]."' ";
    $objq_user=mysqli_query($conn, $sql);
    $objr_user=mysqli_fetch_array($objq_user);
    
    $userid=$objr_user['villageid'];
    
    $sql_meter="SELECT * FROM datameter WHERE villageid = '$userid' ";
    $objq_meter=mysqli_query($conn, $sql_meter);
    $sql_count="SELECT sum(money) FROM datameter WHERE villageid = '$userid' ";
    $objq_count=mysqli_query($conn, $sql_count);
    $objr_count=mysqli_fetch_array($objq_count);
  
    
   
   ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ข้อมูลใช้น้ำ</title>
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
                 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>ที่อยู่</th>
                  <th></th>
                </tr> 
                </thead>     
                 <tr>
                 <td width="125"><?php echo $objr_user["id"]?></td>
                 <td width="200"><?php echo $objr_user["name"]?>   <?php echo $objr_user["lastname"]?></td>
                 <td>บ้านเลขที่<?php echo $objr_user["address"]?>   หมู่ที่<?php echo $objr_user["villageno"]?> ต.บ้านถ้ำ อ.ดอกคำใต้ จ.พะเยา</td>
                 </tr>
              </table><br><br>
              
              
                   <h4>ข้อมูลการใช้น้ำ</h4>
                  <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                      <th>วันที่</th>
                      <th>ค่ามิเตอร์ก่อนหน้า</th>
                      <th>ค่ามิเตอร์หลัง</th>
                      <th>จำนวนเงิน</th>
                
                     
                    </tr> 
                    </thead>    
                     <?php foreach ($objq_meter as $m): ?>
                     <tr>
                     <td width="200"><?php echo $m["datatime"]?></td>
                     <td><?php echo $m["meter"]?></td>
                     <td><?php echo $m["total_meter"]?></td>
                     <td><?php echo $m["money"]?></td>
                      </tr>
                      <?php endforeach; ?>
                      <tfoot>
                     <tr>
                  <th colspan="3">รวมเป็นเงิน</th>
                  <th><?php echo $objr_count['sum(money)'];?></th>
                    </table>
            </div>  
                
                <!-- /.post -->
              </div>
            
           
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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
    reserved.
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
