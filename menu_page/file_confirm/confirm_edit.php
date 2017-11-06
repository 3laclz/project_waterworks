<?php 
  require '../../connect/connect.php';
  
  $ID = $_GET['id'];
  $villageid = $_GET['villageid'];
  $address = $_GET['address'];
  $villageno = $_GET['villageno'];
 
//   $sql_count = "SELECT COUNT(ID) FROM datameter WHERE villageid = '$villageid'";
//   $objq_count = mysqli_query($conn, $sql_count);
//   echo $objr_count['COUNT(ID)'];
//   die();

  
 //QUERY MONEY 
  $sql_price="SELECT * FROM price_water";
  $objq_price=mysqli_query($conn, $sql_price);
  $objr_price=mysqli_fetch_array($objq_price);
  $i=0;
  foreach ( $objq_price as $p) :
  $cal[$i]=$p['cal'];// 3 6 9 12
  $price[$i] = $p['price'];
  $i+=1; 
  endforeach;
  //-----------------------------------------------------
  
  
  $sql_meter = "SELECT * FROM datameter WHERE ID = '$ID'";
  $objq_meter = mysqli_query($conn, $sql_meter);
  $objr_meter = mysqli_fetch_array($objq_meter);
  
  
  $meter_use = $objr_meter['meter'];
  $meter_before = $objr_meter['total_meter'];
  $meter_after = $_GET['edit_meter'];
  $meter = 0;
  $money = 0;
       if($meter_before<$meter_after){
           $meter = $meter_after-$meter_before;
           $total_meter = $meter + $meter_use;
           if(($total_meter>= 0) && ($total_meter<= 80)){
               $money = $total_meter * $cal[0];
               }
               elseif ($total_meter>='81' && $total_meter<='100'){
                   $money = (($total_meter-80)*$cal[1])+$price[1];
               }
               elseif ($total_meter>='101' && $total_meter<='200'){
                   $money = (($total_meter-100)*$cal[2])+$price[2];
               }
               else $money = (($total_meter-200)*$cal[3])+$price[3];
               
          }
           elseif ($meter_before>$meter_after){
               $meter = $meter_before-$meter_after;
                 $total_meter=$meter_use-$meter;
                 
                 if($total_meter<=0){
                       $meter_after = $meter_before;
                       $money = $objr_meter['money'];
                       $total_meter = $objr_meter['meter'];
                 }
                 elseif(($total_meter>= 1) && ($total_meter<= 80)){
                     $money = $total_meter * $cal[0];
                 }
                 elseif ($total_meter>='81' && $total_meter<='100'){
                     $money = (($total_meter-80)*$cal[1])+$price[1];
                 }
                 elseif ($total_meter>='101' && $total_meter<='200'){
                     $money = (($total_meter-100)*$cal[2])+$price[2];
                 }
                 else $money = (($total_meter-200)*$cal[3])+$price[3];
                 
          }
          else
           {
             echo "ERROR";
           }
       
   $sql_update = "UPDATE datameter SET total_meter='$meter_after',meter='$total_meter',money='$money' WHERE ID='$ID'";    
   mysqli_query($conn, $sql_update);    
   
   header("location:../form/form_edit_meter.php?txtaddress=$address&txtvillageno=$villageno");
   

?>