<?php 
require '../../connect/connect.php';
$sql="UPDATE member SET
      Name='".$_POST["txtname"]."',
      Lastname = '".$_POST["txtlastname"]."',
      Username = '".$_POST["txtusername"]."',
      Password = '".$_POST["txtpassword"]."',
      position = '".$_POST["txtposition"]."',
      Status   = '".$_POST["txtstatus"]."'
      WHERE UserID = '".$_POST["txtuserid"]."'
     ";

 $query=mysqli_query($conn, $sql);
 if($query){
     
     header("location:../edit_personnel.php");
 }
else {
      echo "ไม่สารถเพิ่มได้่";
}
 mysqli_close($conn);
?>