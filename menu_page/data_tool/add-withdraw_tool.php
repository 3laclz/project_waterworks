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
 $sql_tool="SELECT * FROM tool INNER JOIN data_add_tool ON tool.Num=data_add_tool.Num GROUP BY id_add_tool DESC";
 $objq_tool=mysqli_query($conn, $sql_tool);
 $objr_tool=mysqli_fetch_array($objq_tool);



 $datatime=$objr_tool['datatime'];
 $datatime = new DateTime($datatime);
     function DateThai($strDate)
     {
         $strYear = date("Y",strtotime($strDate))+543;
         $strMonth= date("n",strtotime($strDate));
         $strDay= date("j",strtotime($strDate));
         $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
         $strMonthThai=$strMonthCut[$strMonth];
         return "$strDay $strMonthThai $strYear";
     }
     $strDate = $datatime->format('M-Y');
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
        ประวัติเพิ่ม-เบิกอุปกรณ์ 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li><a href="#">อุปกรณ์</a></li>
        <li class="active">ประวัติเพิ่ม-เบิกอุปกรณ์</li>
      </ol>
    </section>
    
    <!-- Main content -->
      <section class="content">
       <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ประวัติเพิ่ม-ถอนอุปกรณ์</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-message">
               <table class="table table-hover table-striped table-bordered">
                  <tbody> 
                  <tr>
                    <th class="text-center" width="25%">ชื่ออุปกรณ์</th>
                    <th class="text-center" width="25%">จำนวนเพิ่ม-ถอน</th>
                    <th class="text-center" width="25%">วันที่</th>
                    <th class="text-center" width="25%">ชื่อพนักงานเพิ่ม-เบิกอุปกรณ์</th>
                   <?php foreach ($objq_tool as $tool):?> 
                  <tr>
                    <td class="text-center" width="25%"><?php echo $tool['name']?></td>
                    <td class="text-center" width="25%"><?php  if($tool['status']=='add'){
                                                                    echo '<b><font color="green">';
                                                                    echo '+'; echo  $tool['add_tool'] ; 
                                                                    echo '</font><b>';
                                                                }
                                                                
                                                                else {
                                                                    echo '<b><font color="red">';
                                                                    echo '-'; echo  $tool['add_tool'] ;
                                                                    echo '</font><b>';
                                                                }
                                                                ?></td> 
                    <td class="text-center" width="25%"><?php  echo DateThai($tool['datatime'])?></td>
                    <td class="text-center" width="25%">

                      <?php 
                          require'../../connect/connect.php';
                          $sql_name="SELECT * FROM member WHERE UserID = $tool[UserID]";
                          $obq_name= mysqli_query($conn,$sql_name);
                          $obj_name = mysqli_fetch_array($obq_name);
                          echo $obj_name['Name'];?>
                          &nbsp; <?php echo $obj_name['lastname']?>
                      
                        
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>CPE XII-UP</strong>
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
