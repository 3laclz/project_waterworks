 <?php
  session_start();
  if($_SESSION['UserID'] == "")
  {
      header("location:../../../login/login_admin.php");
    exit();
  }

  if($_SESSION['Status'] != "admin")
  {
    echo "Homepage_admin";
    exit();
  } 
  
   require '../../../connect/connect.php';
  $strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
  $objQuery = mysqli_query($conn,$strSQL);
  $objResult = mysqli_fetch_array($objQuery);
?>
 <?php 
 require '../../../connect/connect.php';
 $sql_seach = "SELECT * FROM tool";
 $objq_seach = mysqli_query($conn,$sql_seach);
 ?>
  
   <!DOCTYPE html>
   <html>
   <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>AdminLTE 2 | Invoice</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
   <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
   
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
       
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
       
  <header class="main-header">
    <!-- Logo -->
    <a href="../../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
       
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
       
                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
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
               ใบเสร็จเบิกอุปกรณ์
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li><a href="#">ข้อมูลอุกรณ์</a></li>
        <li class="active">ใบเสร็จเบิกอุปกรณ์</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
        
          <h2 class="page-header">
            <i class="fa fa-globe"></i> กองการประปา สำนักงานเทศบาลตำบลบ้านถ้ำ อำเภอดอกคำใต้ จังหวัดพะเยา

          </h2>
        </div>
        <!-- /.col -->
      </div>
        
        <div class="row">
        <div class="col-xs-6 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th class="text-center" width="33%">ข้าพเจ้า</th>
              <th class="text-center" width="33%">ตำแหน่ง</th>
              <th class="text-center" width="33%">วัตถุประสงค์</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td class="text-center" width="33%"><?php echo $objResult['Name'];?>&nbsp;&nbsp;<?php echo $objResult['lastname'];?> </td>
              <td class="text-center" width="33%"><?php echo $objResult['position']; ?></td>
              <td class="text-center" width="33%"><?php echo $_POST['type'] ?></td>
            </tr>
       
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- Table row -->
      <form action="../test_print_withdraw.php" method="post">
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
            <tr>
              <th class="text-center" >รายการ</th>
              <th class="text-center" >รหัสอุปกรณ์</th>
              <th class="text-center" >รายการ</th>
              <th class="text-center" >จำนวน</th>
              <th class="text-center" width="15%">ราคา/หน่วย</th>
              <th class="text-center" width="15%">รวมเป็นเงิน</th>
            </tr>
            </thead>
            <tbody>
             <?php require '../algorithm_tool/algorithm_cal_withdraw.php';?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
   
      <!-- /.row -->
       
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
        
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">รวมเป็นเงิน</th>
                <td><?php echo $total_money;?>
                    <input class ="hidden" type="text" name="total_money" value="<?php echo $total_money;?>">
                </td>
                 <td>บาท</td>
              </tr>
              <tr>
                <th>ภาษีมูลค่าเพิ่ม (7.0%)</th>
                <td><?php //echo $total_tax;?></td>
                <td>บาท</td>
              </tr>
              <tr>
                <th>ยอดชำระ</th>
                <td><?php //echo $total_price;?></td>
                <td>บาท</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
       
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-success pull-right" ><i class="fa fa-print"></i> พิมพ์รายการ
          </button>
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>CPE XIII-UP</strong>
  </footer>
       
  
                <!-- /.control-sidebar -->
                <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
                    
<!-- jQuery 3 -->
<script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
</body>
</html>
   
 