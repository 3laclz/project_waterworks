<html>
<head>
</head>
<body>
<?php
  $idtool = $_GET['txttoolid'];
  require '../../../connect/connect.php';
   
    $sql_checkid="SELECT * FROM tool WHERE ID_Tool='$idtool'";
    $objq_checkid = mysqli_query($conn, $sql_checkid);
            $result  = mysqli_fetch_array($objq_checkid);
            if ($result['ID_Tool']){
                header('location:../tool.php?status=HaveData');
            }else {
                $sql = "INSERT INTO tool(ID_tool, name, Num_Tool, price)
                 VALUES ('".$_GET['txttoolid']."','".$_GET['txtname_tool']."','".$_GET['txtnum']."','".$_GET['txtprice']."')";
                $query = mysqli_query($conn,$sql);
                if($query) {
                    header('location:../tool.php');
                }
                else {
                    echo 'ERROR';
                }
                mysqli_close($conn);
            }
?>
</body>
</html>