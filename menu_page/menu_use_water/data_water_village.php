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
   //เดือน เเละ ปี ที่รับมา
   $month=$_GET['month'];
   $year=$_GET['year'];
   $village=$_GET['village'];
    
   //ค้นหาชื่อหมู่บ้านหมู่บ้าน
    require '../../connect/connect.php';
    $sql_time = "SELECT * FROM datameter INNER JOIN address ON datameter.villageid=address.villageid WHERE DATE_FORMAT(datatime,'%Y-%m')='$year-$month' AND villageno = '$village'";
    $objq_village = mysqli_query($conn, $sql_time);
    $objr_village = mysqli_fetch_array($objq_village);
    
        $datatime=$objr_village['datatime'];
        $datatime = new DateTime($datatime);
        function DateThai($strDate)
        {
            $strYear = date("Y",strtotime($strDate))+543;
            $strMonth= date("n",strtotime($strDate));
            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
            $strMonthThai=$strMonthCut[$strMonth];
            return " $strMonthThai $strYear";
        }
        $strDate = $datatime->format('M-Y');
      
   ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>รายการใช้น้ำ</title>
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
    
      <section class="content">
      <div class="col-md-12">
          <div class="box box-solid">
           
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>ชื่อพนักงาน</dt>
                <dd><?php echo $objResult['Name']?>  <?php echo $objResult['lastname']?></dd>
                <dt>หน้าที่</dt>
                <dd><?php echo $objResult['position']?></dd>
                <dt>ข้อมูลใช้น้ำประจำเดือน</dt>
                <dd><?php echo DateThai($objr_village['datatime'])?></dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
       <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">เมนู</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                  <li><a href="pdf_file/bill.php?village=<?php echo $village?>&month=<?php echo $month?>&year=<?php echo $year?>" Target="_blank"><i class="fa fa-minus-square"></i> พิมพ์ใบชำระเงินทั้งหมด </a></li>
                  <li><a href="#" data-toggle="modal" data-target="#myModal3"><i class="fa fa-filter"></i> ติดค้างชำระ</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
         <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ข้อมูลการใช้น้ำ หมู่ที่<?php echo $village?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <span> เลือกทั้งหมด</span>
              </div>
              <!--data table -->
              <form action="pdf_file/choose_bill.php?month=<?php echo $month?>&year=<?php echo $year?>" method="post" Target="_blank">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <thead> 
                   <tr>
                   <th></th>
                   <th class="text-center" width="15%">รหัสบ้าน</th>
                   <th class="text-center" width="15%">บ้านเลขที่</th>
                   <th class="text-center" width="15%">หมู่ที่</th>
                    <th class="text-center" width="15%">หน่วยน้ำที่ใช้</th>
                    <th class="text-center" width="15%">จำนวนเงิน</th>
                    <th class="text-center" width="20%">วันที่</th>
                   </tr>
                  </thead>
                  <tbody>
                  <?php $num=1; foreach ($objq_village as $village):?>
                   <tr> 
                     <td><input type="checkbox" name="check[]" value="<?php echo $village['villageid']?>"></td>
                     <td class="text-center" width="15%"><?php echo $village['villageid']?></td>
                     <td class="text-center" width="15%"><?php echo $village['address']?></td>
                     <td class="text-center" width="15%"><?php echo $village['villageno']?></td>
                     <td class="text-center" width="15%"><?php echo $village['meter']?></td>
                     <td class="text-center" width="15%"><?php echo $village['money']?></td>
                     <td class="text-center" width="15%"><?php echo DateThai($objr_village['datatime'])?></td>
                    </tr>
                   <?php $num+=1; endforeach;?>
                  
                  </tbody>
                  <tfoot></tfoot>
                </table>
                 <!-- /.table -->
               </div>
               <div class="box-footer">
                 <input type="submit" class="btn btn-info" value="ตกลง" >
               </div> 
               </form>
              <!-- /.mail-box-messages -->
            </div>
           
           
            <!-- /.box-body -->
          </div>
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
<script src="../../plugins/iCheck/icheck.min.js"></script>
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
    $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>
</body>
</html>

 