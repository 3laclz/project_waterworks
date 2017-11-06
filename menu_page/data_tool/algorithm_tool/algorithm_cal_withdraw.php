<?php 
           
            require '../../../connect/connect.php';
            $UerID=$objResult['UserID'];
            $total_money=0;
            $balance_tool=0;
            $menu_num=1;
            for($i=0;$i<count($_POST["id_tool"]);$i++)
            
            {
                if(trim($_POST["id_tool"][$i]) != ""){
                    $id_tool=$_POST['id_tool'][$i];
                    $num_tool=$_POST['num_tool'][$i];
                    $sql_select_num = "SELECT Num,Num_Tool,price,name FROM tool WHERE ID_Tool = '$id_tool' ";
                    $objq_num_tool = mysqli_query($conn, $sql_select_num);
                    $objr_num_tool = mysqli_fetch_array($objq_num_tool);
                    
                    $Num = $objr_num_tool['Num'];
                    $price = $objr_num_tool['price'];
                    $num_tool2 = $objr_num_tool['Num_Tool'];
                    $money = $num_tool*$price;
                    $balance_tool = $num_tool2-$num_tool;
                    if($balance_tool < 0){
                        echo 'จำนวนอุปกรณ์ไม่เพียงพอ';
                    }
                    else {
                        //บันทึกอุปกรณ์คงเหลือ
                        $sql_update_tool ="UPDATE tool SET Num_tool = '$balance_tool' WHERE ID_Tool = '$id_tool'";
                        mysqli_query($conn, $sql_update_tool);
                        //บันทึกรายการเพิ่มถอน
                        $sql_tool_wd = "INSERT INTO data_add_tool (add_tool,Num,UserID,status) VALUES ('$num_tool','$Num','$UerID','withdraw')";
                        mysqli_query($conn, $sql_tool_wd);
                    }
            ?>
            <tr>
              <td class="text-center" ><?php echo $menu_num?></td>
              <td class="text-center" ><?php echo $id_tool?></td>
              <td class="text-center" ><?php echo $objr_num_tool['name']?></td>
              <td class="text-center" ><?php echo $num_tool?> </td>
                  <input class ="hidden" type="text" name="id_tool[]" value="<?php echo $id_tool?>">
                  <input class ="hidden" type="text" name="num_tool[]" value="<?php echo $num_tool?>">
              <td class="text-center" ><?php echo $price?></td>
              <td class="text-center" ><?php echo $money?></td>
            </tr>
            <?php       
                   }
                   $menu_num+=1;
                   $total_money=$total_money+$money;
               }
            ?>