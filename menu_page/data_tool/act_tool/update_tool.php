<html>
<head>
</head>
<body>
<?php



  require '../../../connect/connect.php';
     $sql="UPDATE tool SET
      name='".$_GET["txtnametool"]."',
      Num_Tool='".$_GET["txtnumtool"]."',
      ID_Tool='".$_GET["txtidtool"]."',
      price = '".$_GET["txtpricetool"]."'
      WHERE Num = '".$_GET["txtkeytool"]."'
     ";
 	
     $query = mysqli_query($conn,$sql);
 	
 	if($query) {
 	    header('location:../tool.php');
 	}
 	else {
 	    echo 'ผิดไอ้ควาย';
 	}
 	

	mysqli_close($conn);
?>
</body>
</html>