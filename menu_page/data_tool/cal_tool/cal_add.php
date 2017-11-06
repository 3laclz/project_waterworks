<?php 
 require '../../../connect/connect.php';
  
  //เพิ่มข้อมูลรายการอุปกรณ์
   $sql_sert_tool="INSERT INTO data_add_tool(Num,add_tool,status,UserID)
   VALUES ('".$_GET['txtkeytool']."','".$_GET['addtool']."','add','".$_GET['userId']."')";
   $objq_sert_tool=mysqli_query($conn,$sql_sert_tool);
  
 //ดึงข้อมูล จำนวนอุปกรณ์  
   $sql_search_tool ="SELECT Num_Tool FROM tool WHERE Num='$_GET[txtkeytool]'";
   $objq_search = mysqli_query($conn, $sql_search_tool);
   $objr_search = mysqli_fetch_array($objq_search);
      
      $id = $_GET['txtkeytool'];
      $num1 = $_GET['addtool'];
      $num2 = $objr_search['Num_Tool'];
      $total=0;
      $total = $num1+$num2;
     
 //update num_tool
   $sql_update="UPDATE tool SET Num_Tool = '$total' WHERE Num = '$id'";
   mysqli_query($conn, $sql_update);
   
   
   header('location:../tool.php');
?>