<?php
   $num = $_GET['Num'];
   require '../../../connect/connect.php';
   $sql = "DELETE FROM tool WHERE Num='$num'";
   if (mysqli_query($conn, $sql)) {
       header('Location:../tool.php');
   } else {
       echo "Error deleting record: " . mysqli_error($conn);
   }
   
   mysqli_close($conn);
   
   ?>