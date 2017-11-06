<?php 

 require '../../connect/connect.php';
 $userid=$_POST['txtvillageid'];
 $meter=$_POST['txtmeter'];
 $money=0;
 $address=$_POST['txtaddress'];
 $villageno=$_POST['txtvillageno'];

 //check Max meter
 $sql_check="SELECT MAX(total_meter) FROM datameter WHERE villageid = $userid";
 $objq_check=mysqli_query($conn, $sql_check);
 $objr_check=mysqli_fetch_array($objq_check);
 $check_meter= $objr_check['MAX(total_meter)'];
 // check count of id
 $sql_count_check_row = "SELECT total_meter,count(villageid) FROM datameter WHERE villageid = $userid"; // นับว่ามี กี่ colum 
 $query_count = $conn->query($sql_count_check_row);

     if($meter < $check_meter){
         header("location:Error_meter.php?txtaddress=$address&txtvillageno=$villageno");
     }
         else {
                    foreach ($query_count as $q){
                         $count = $q['count(villageid)'];
                    }
                        if ($count==0){ // ยังไม่มีข้อมูล
                                    $meter_cal=$meter;
                                    require 'cal_money.php';
                                     
                            $sql="INSERT INTO datameter(villageid,total_meter,meter,money) VALUE ('$userid','$meter','$meter','$money')";
                            $objq = mysqli_query($conn,$sql);
                            
                        }
                        else{ // มีข้อมูลแล้ว
                      
                            $sql_data = "SELECT  count(ID) FROM datameter WHERE villageid = $userid"; //นับ แถวข้อมูลของตัวเองว่ามีกี่แถว
                            $query_data= $conn->query($sql_data);
                            $q = $query_data->fetch_assoc();
                            $check_month = 0;
                           
                             $count_id =  $q['count(ID)']; // คำตอบว่ามีกี่แถว
                           
                           $sql_meter_end = "SELECT * FROM datameter WHERE villageid = $userid"; // เลือกทั้งหมดของตารางมา
                           $query_meter_end = $conn->query($sql_meter_end);
                           foreach ($query_meter_end as $q_meter){                  // วนเพื่อเอา meter ตัวสุดท้ายของเดือนที่แล้ว
                                 $meter_end = $q_meter['total_meter'];
                            } 
                            
                            $meter_cal = $meter - $meter_end;  //เอา meter ที่รับมา ลบกับ meter ของเดือนที่แล้ว
                            require 'cal_money.php';
                           
                            $sql="INSERT INTO datameter(villageid,total_meter,meter,money) VALUE ('$userid','$meter','$meter_cal','$money')";
                            $objq = mysqli_query($conn,$sql);
                        }
         
         
         }
 
 

?>