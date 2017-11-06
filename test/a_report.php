<?php
   die();
   require '../connect/connect.php';
   
   $sql = "INSERT INTO report(form_report ,userid  )
    VALUES ('".$_POST["txtreport"]."','".$_POST["txtuserid"]."')";
   $query = mysqli_query($conn,$sql);
   if($query) {
       header("location:report.php");
   }
   
   mysqli_close($conn);


?>