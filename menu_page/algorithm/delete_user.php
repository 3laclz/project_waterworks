<?php
require '../../connect/connect.php';

$sql = "DELETE FROM datauser WHERE userid = ".$_GET['delete'];
$query = mysqli_query($conn,$sql);
$sql2 = "DELETE FROM address WHERE userid = ".$_GET['delete'];
$query = mysqli_query($conn,$sql2);

if ($query){
    header("location:../edit_user.php");
}else{
    echo "ไม่สามารถลบข้อมูลได้<br>";
    echo mysqli_error($conn);
}