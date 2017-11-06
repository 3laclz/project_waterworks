<?php
require '../../connect/connect.php';

$sql = "DELETE FROM member WHERE userid = ".$_GET['delete'];
$query = mysqli_query($conn,$sql);

if ($query){
    header("location:../edit_personnel.php");
}else{
    echo "ไม่สามารถลบข้อมูลได้<br>";
    echo mysqli_error($conn);
}