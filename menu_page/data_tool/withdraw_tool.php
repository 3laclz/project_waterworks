<?php require 'algorithm_tool/algorithm_withdraw_tool.php';?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Invoice</title>
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
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> การประปา ตำบลบ้านถ้ำ
            <small class="pull-right">1111111</small>
          </h2>
        </div>
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
              <td class="text-center" width="33%"> <?php echo $objResult['Name']?>  <?php echo $objResult['lastname']?></td>
              <td class="text-center" width="33%"><?php echo $objResult['position']?></td>
              <td class="text-center" width="33%"><?php echo $_POST['type']?></td>
            </tr>
       
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <form action="cal_tool/cal_withdraw.php" method="post">
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>ลำดับ</th>
              <th>รหัสอุปกรณ์</th>
              <th>ฃื่ออุปกรณ์</th>
              <th>จำนวน</th>
              <th class="text-center" width="15%">จำนวนที่ต้องการ</th>
            </tr>
            </thead>
            <tbody>
              <input class = "hidden" type="text" name="type" value="<?php echo $_POST['type']?>">
            <?php 
            require '../../connect/connect.php';
            for($i=0;$i<count($_POST["menu"]);$i++)
            
            {
                if(trim($_POST["menu"][$i]) != "")
                {
                    $menu=$_POST['menu'][$i];
                    $sql_tool = "SELECT * FROM tool WHERE Num = $menu";
                    $objq_tool = mysqli_query($conn, $sql_tool);
                    $objr_tool = mysqli_fetch_array($objq_tool);
                    
            ?>
             <tr>
              <td><?php echo 'test' ?></td>
              <td><?php echo $objr_tool['ID_Tool'] ?></td>
              <td><?php echo $objr_tool['name'];?></td>
              <td><?php echo $objr_tool['Num_Tool']?></td>
              <td class="text-center" width="15%" ><input type="text" name="num_tool[]"  class="form-control col-md-2" placeholder="จำนวน">
              <input class = "hidden" type="text" name="id_tool[]" value="<?php echo $objr_tool['ID_Tool']?>">
              </td>
             </tr>
             <?php }?>
            <?php }?>
            </tbody>
          </table>
          <input type="submit" class="btn btn-success pull-right" value="ตกลง" onclick="if(confirm('ยืนยันการเบิกอุปกรณ์')) return true; else return false;">
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

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
