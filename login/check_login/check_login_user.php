<?php
session_start();
$serverName   = "localhost";
$userName     = "root";
$userPassword = "";
$dbName   = "waterwork";
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

$strAddress = mysqli_real_escape_string($conn,$_POST['txtaddress']);
$strVillageno = mysqli_real_escape_string($conn,$_POST['txtvillageno']);
$strPassword = mysqli_real_escape_string($conn,$_POST['txtpassword']);

$strSQL = "SELECT * FROM address WHERE address = '".$strAddress."'and villageno = '".$strVillageno."'and password = '".$strPassword."'";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery);

if(!$objResult)
{
    header("location:../login_user.php");
}
else
{
    $_SESSION["villageid"] = $objResult["villageid"];
    session_write_close();
    header("location:../../menu_user/homepage_user.php");
    
}
mysql_close();
?>