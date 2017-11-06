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
 
 $address = $_GET['txtaddress'];
 $villageno = $_GET['txtvillageno'];
 
 $sql_seach_villageid = "SELECT villageid FROM address WHERE address='$address' AND villageno='$villageno'";
 $objq_seach_villageid = mysqli_query($conn, $sql_seach_villageid);
 $objr_seach_villageid = mysqli_fetch_array($objq_seach_villageid);
 
 $villageid = $objr_seach_villageid['villageid'];
 $sql_search_meter = "SELECT MAX(ID) FROM datameter WHERE villageid = '$villageid'";
 $objq_search_meter = mysqli_query($conn, $sql_search_meter);
 $objr_search_meter = mysqli_fetch_array($objq_search_meter);
 
 $max_meter=$objr_search_meter['MAX(ID)'];
 $sql_meter_max = "SELECT * FROM datameter WHERE ID = $max_meter"; 
 $objq_meter_max = mysqli_query($conn, $sql_meter_max);
 $objr_meter_max = mysqli_fetch_array($objq_meter_max);
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
      <h1> เพิ่มค่ามิเตอร์      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li><a href="#">จัดการค่าน้ำประปา</a></li>
        <li class="active">เเก้ไขค่าน้ำประปา</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">เเก้ไขค่าน้ำประปา</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="col-md-12">
             <font size="3" color="red">*สามารถแก้ไขได้เฉพาะเดือนล่าสุดเท่านั้น</font><br>
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>รหัส</th>
                  <th>หน่วยมิเตอร์ทั้งหมด</th>
                  <th>หน่วยมิเตอร์ที่ใช้มิเตอร์</th>
                  <th>จำนวนเงิน</th>
                  <th>วันที่</th>                  
                </tr> 
                </thead>    
                <tbody>
                <tr>
                 <td><?php echo $objr_meter_max['villageid']?></td>
                 <td><?php echo $objr_meter_max['total_meter']?></td>
                 <td><?php echo $objr_meter_max['meter']?></td>
                 <td><?php echo $objr_meter_max['money']?></td>
                 <td><?php echo $objr_meter_max['datatime']?></td>
                </tr>
                </tbody>
                
              </table>
             </div>
            </div>
            <div class="box-body">
            <div class="col-md-4">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>รหัส</th>
                  <th>ค่ามิเตอร์ที่ต้องการเปลี่ยน</th>               
                </tr> 
                </thead>    
                <tbody>
                <tr>
                 <td><?php echo $objr_meter_max['villageid']?></td>
                 <td>
                  <form action="../file_confirm/confirm_edit.php" name="form1" method="get">
                   <div class="input-group input-group-sm">
                    <input type="text" name="edit_meter" class="form-control" id="edit_meter" placeholder="กรุณากรอกค่ามิเตอร์">
                    <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $max_meter?>">
                    <input type="hidden" name="villageid" class="form-control" id="villageid" value="<?php echo $villageid?>">
                    <input type="hidden" name="address" class="form-control" id="address" value="<?php echo $address?>">
                    <input type="hidden" name="villageno" class="form-control" id="villageno" value="<?php echo $villageno?>">
                     <span class="input-group-btn">
                      <button name="btnSubmit1" type="submit" value="Submit" class="btn btn-info btn-flat" onclick="return confirm('ยืนยันเก้ไขข้อมูลค่าน้ำ')">ตกลง</button>
                    </span>
                   </div>
                  </form>
                 </td>
                </tr>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
       </section>
       </div>
     </div>
   
   
    
    <!-- /.content -->
  
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
