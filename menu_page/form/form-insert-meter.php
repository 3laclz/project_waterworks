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
$address=$_POST['txtaddress'];
$villageno=$_POST['txtvillageno'];
/* check_address == NULL */
$sql_check = "SELECT villageno FROM address WHERE address='$address' AND villageno='$villageno'" ;
$objq_check = mysqli_query($conn,$sql_check);
$objR_check = mysqli_fetch_array($objq_check);
 
   if($objR_check==NULL){
                         header('location:../insert_meter.php');
                        }
   else{ 
          $sql_status = "SELECT status FROM datauser INNER JOIN address ON address.userid=datauser.userid WHERE address.address='$address' AND address.villageno='$villageno' ";
          $objq_status=mysqli_query($conn, $sql_status);
          $objr_status=mysqli_fetch_array($objq_status);
          
          $status=$objr_status['status'];
             if($status=='nonactive'){
                 header('location:nonactive.php');
             }
             else {
                   //search Address And name
                   $sql1 = "SELECT * FROM address INNER JOIN datauser ON address.userid=datauser.userid WHERE address.address='$address' AND address.villageno='$villageno'" ;
                   $objq1 = mysqli_query($conn,$sql1);
                   $objR1 = mysqli_fetch_array($objq1);
                   
                   $sql = "SELECT * FROM address INNER JOIN datameter ON address.villageid = datameter.villageid WHERE address='$address' AND villageno='$villageno' ";
                   $objq = mysqli_query($conn,$sql);
                   $objR = mysqli_fetch_array($objq);
                
                  }
        }
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
      <h1> แก้ไขค่าน้ำประปา      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li><a href="#">จัดการค่าน้ำประปา</a></li>
        <li class="active">แก้ไขค่าน้ำประปา</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <form action="../file_confirm/confirm_meter.php" class="form-horizontal"  method="post">
       <div class="col-md-5">
         
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> ข้อมูลส่วนตัว</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> ชื่อ</strong>

              <p class="text-muted">
               <?php echo $objR1['name']?> <?php echo $objR1['lastname']?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> ที่อยู่</strong>

              <p class="text-muted">บ้านเลขที่ :<?php echo $objR1['address']?>   หมู่ที่ : <?php echo $objR1['villageno']?></p>
              <hr>

              </div>
            <!-- /.box-body -->
          </div>
          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">กรุณากรอกมิเตอร์</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              <div class="box-body">       
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">ค่ามิเตอร์:</label>
                  <div class="col-sm-3">
                    <input type="text" name="txtmeter" class="form-control" id="inputEmail3" value="">
                    <input type="hidden" name="txtaddress" class="form-control" id="inputEmail3" value="<?=$address?>">
                    <input type="hidden" name="txtvillageno" class="form-control" id="inputEmail3" value="<?=$villageno?>">
                    <input type="hidden" name="txtvillageid" class="form-control" id="inputEmail3" value="<?php echo $objR1['villageid']?>">
                  </div>
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-info pull-left">ตกลง</button>
              </div>
              </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
          </div>
        </div>
        </form>
        
        <div class="col-md-7">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">ค่ามิเตอร์ย้อนหลัง</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>รหัส</th>
                  <th>รายการที่</th>
                  <th>ค่ามืเตอร์ทั้งหมด</th>
                  <th>ค่ามืเตอร์</th>
                  <th>จำนวนเงิน</th>
                  <th>วันที่</th>
                  
                </tr> 
                </thead>    
                <tbody>
               <?php foreach ($objq as $r):?>
                <tr>
                 <td><?php echo $r['villageid']?></td>
                 <td><?php echo $r['ID']?></td>
                 <td><?php echo $r['total_meter']?></td>
                  <td><?php echo $r['meter']?></td>
                
                 <td><?php echo $r['money']?></td>
                 <td><?php echo $r['datatime']?></td>
                </tr>
                 <?php endforeach;?>
                </tbody>
                
              </table>
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
