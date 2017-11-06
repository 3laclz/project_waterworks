<?php 
    require '../../connect/connect.php';
    $sql="UPDATE datauser INNER JOIN address ON datauser.userid=address.userid SET
          datauser.name='".$_POST["txtname"]."',
          datauser.lastname='".$_POST["txtlastname"]."',
          address.address='".$_POST["txtaddress"]."',
          address.villageno = '".$_POST["txtvillageno"]."'
          WHERE datauser.userid = '".$_POST["txtuserid"]."'
         ";
     $query=mysqli_query($conn, $sql);
         if($query){
             
             header("location:../edit_user.php");
         }
        else {
              echo "ผิดน่ะจ๊ะ";
        }
     mysqli_close($conn);
?>