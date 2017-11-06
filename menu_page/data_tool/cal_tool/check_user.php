<?php 
 require '../../../connect/connect.php';

 $name=$_GET['txtname'];
 $lastname=$_GET['txtlastname'];
 $sql_user="SELECT * FROM datauser WHERE name='$name' AND lastname='$lastname'";
 $objq=mysqli_query($conn, $sql_user);
 $objr=mysqli_fetch_array($objq);
$queryname=$objr['name'];
 $querylastname = $objr['lastname'];
 if(!$objr){
     echo 'NOOOOOOOOO';
 }
 
  else {
         header("location:../withdraw_tool.php?name=".$queryname."&lastname=".$querylastname);
       }
?>