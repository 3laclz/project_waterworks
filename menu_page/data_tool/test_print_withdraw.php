<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>รายการถอนอุปกรณ์</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<!--   <![endif]--> 

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h3 class="page-header">
          <i class="fa fa-globe"></i> กองการประปา สำนักงานเทศบาลตำบลบ้านถ้ำ อำเภอดอกคำใต้ จังหวัดพะเยา
        </h3>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
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
              <td class="text-center" width="33%"> คำเเก้ว มารุ</td>
              <td class="text-center" width="33%">ช่างเทคนิค</td>
              <td class="text-center" width="33%">ติดตั้งประปา</td>
            </tr>
       
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
    <!-- /.row -->

    <!-- Table row -->
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
            <?php 
           
            require '../../connect/connect.php';
            
            $total_money=0;
            $balance_tool=0;
            $menu_num=1;
            for($i=0;$i<count($_POST["id_tool"]);$i++)
            
            {
                if(trim($_POST["id_tool"][$i]) != ""){
                    $id_tool=$_POST['id_tool'][$i];
                    $num_tool=$_POST['num_tool'][$i];
                    $sql_select_num = "SELECT Num,Num_Tool,price,name FROM tool WHERE ID_Tool = '$id_tool' ";
                    $objq_num_tool = mysqli_query($conn, $sql_select_num);
                    $objr_num_tool = mysqli_fetch_array($objq_num_tool);
                    
                    $Num = $objr_num_tool['Num'];
                    $price = $objr_num_tool['price'];
                    $num_tool2 = $objr_num_tool['Num_Tool'];
                    $money = $num_tool*$price;
                    $balance_tool = $num_tool2-$num_tool;
            ?>
            <tr>
              <td class="text-center" ><?php echo $menu_num?></td>
              <td class="text-center" ><?php echo $id_tool?></td>
              <td class="text-center" ><?php echo $objr_num_tool['name']?></td>
              <td class="text-center" ><?php echo $num_tool?> </td>
              <td class="text-center" ><?php echo $price?></td>
              <td class="text-center" ><?php echo $money?></td>
            </tr>
            <?php       
                   }
               }
            ?>
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
                <td><?php echo $_POST['total_money']?></td>
                 <td>บาท</td>
              </tr>
              <tr>
                <th>ภาษีมูลค่าเพิ่ม (7.0%)</th>
                <td><?php //echo $total_tax;?></td>
                <td>บาท</td>
              </tr>
              <tr>
                <th>ยอดชำระ</th>
                <td><?php // echo $total_price;?></td>
                <td>บาท</td>
              </tr>
            </table>
          </div>
        </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- <!-- ./wrapper --> -->
</body>
</html>
