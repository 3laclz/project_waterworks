
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

  require '../../connect/connect.php';
	$sql = "INSERT INTO member(Username ,Password ,Name ,lastname ,position ,Status ) 
    VALUES ('".$_POST["txtusername"]."','".$_POST["txtpassword"]."','".$_POST["txtname"]."','".$_POST["txtlastname"]."','".$_POST["txtposition"]."','".$_POST["txtstatus"]."')";
	$query = mysqli_query($conn,$sql);
	if($query) {
		header("location:../edit_personnel.php");
	}

	mysqli_close($conn);
?>