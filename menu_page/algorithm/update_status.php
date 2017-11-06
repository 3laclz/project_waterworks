 <?php 
  require '../../connect/connect.php';
  $sql="UPDATE datauser SET status ='".$_POST["status"]."' WHERE userid='".$_POST["username"]."'";
  $query=mysqli_query($conn, $sql);
       if($query){
           header('location:../user_status.php');
       }
       else 
       {
           echo ERROR;
       }
       
       mysqli_close($conn);
?>