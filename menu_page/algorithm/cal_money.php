<?php 
require '../../connect/connect.php';
 $sql_price="SELECT * FROM price_water";
 $objq_price=mysqli_query($conn, $sql_price);
 $objr_price=mysqli_fetch_array($objq_price);
    
      $i=0;
    
     foreach ( $objq_price as $p) :
          $cal[$i]=$p['cal'];// 3 6 9 12
           $price[$i] = $p['price'];
          $i+=1;         
     endforeach;

 if(($meter_cal>= 0) && ($meter_cal<= 80)){
    $money = $meter_cal * $cal[0];
 }
 elseif ($meter_cal>='81' && $meter_cal<='100'){
     $money = (($meter_cal-80)*$cal[1])+$price[1];
 }
 elseif ($meter_cal>='101' && $meter_cal<='200'){
       $money = (($meter_cal-100)*$cal[2])+$price[2];
 }
 else $money = (($meter_cal-200)*$cal[3])+$price[3];

?>