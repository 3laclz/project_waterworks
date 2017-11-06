
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

  require '../../connect/connect.php';
 	$sql = "INSERT INTO datauser(userid, name, lastname) 
     VALUES ('".$_GET['userid']."','".$_GET['name']."','".$_GET['lastname']."')";
 	$query = mysqli_query($conn,$sql);
 	
 	$sql2 = "INSERT INTO address(villageid, address, villageno, userid)
     VALUES ('".$_GET['villageid']."','".$_GET['address']."','".$_GET["villageno"]."','".$_GET["userid"]."')";
 	
 	$query = mysqli_query($conn,$sql2);
 	if($query) {
 	    header('location:../form_succress/succress_insert.php');
 	}
 	else {
 	    echo 'ไม่สามารถเพิ่มได้';
 	}
	mysqli_close($conn);
?>
