<?php require '../connect/connect.php';
   $sql_totalmeter="SELECT SUM(meter) FROM datameter WHERE YEAR(datatime)='2017' GROUP BY MONTH(datatime)";
   $objq_totalmeter=mysqli_query($conn, $sql_totalmeter);
   $objr_totalmeter=mysqli_fetch_array($objq_totalmeter);
 //  var_dump($objr_totalmeter['SUM(meter)']); die();
   
   $count_month=0;
 

   foreach ($objq_totalmeter as $obj){
       
       $month_meter[$count_month] = $obj['SUM(meter)']; // เก็บ meter ต่อ เดือน
     
       $count_month+=1; // จำนวนเดือน
    }
    $month = array(11); //เก็นค่า meter ทั้งหมด ไม่ว่าจะมีหรือไม่มี
    if ($count_month == 12){
        for ($i=0;$i<=11;$i++){
             $month[$i] = $month_meter[$i];
        }
    }else{
       
        for ($i=0;$i<$count_month;$i++){
             $month[$i] = $month_meter[$i];
            
        }
        $result_count = 12-$count_month;
        for ($j=0;$j<$result_count;$j++){
             $month[$i] = "0";
           $i+=1;
        }
    }

?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		
	},
	axisY: {
		
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "หน่วยน้ำต่อเดือน",
		dataPoints: [      
			{ y: <?=(int)$month[0]?>, label: "มกราคม" },
			{ y: <?=(int)$month[1]?>,  label: "กุมภาพันธ์" },
			{ y: <?=(int)$month[2]?>,  label: "มีนาคม" },
			{ y: <?=(int)$month[3]?>,  label: "เมษายน" },
			{ y: <?=(int)$month[4]?>,  label: "พฤษภาคม" },
			{ y: <?=(int)$month[5]?>, label: "มิถุนายน" },
			{ y: <?=(int)$month[6]?>,  label: "กรกฏาคม" },
			{ y: <?=(int)$month[7]?>,  label: "สิงหาคม" },
			{ y: <?=(int)$month[8]?>,  label: "กันยายน" },
			{ y: <?=(int)$month[9]?>,  label: "ตุลาคม" },
			{ y: <?=(int)$month[10]?>,  label: "พฤศจิกายน" },
			{ y: <?=(int)$month[11]?>,  label: "ธันวาคม" },
		]
	}]
});
chart.render();

}
</script>
</head>
<body>

 
            <div class="box-header">
              <h3 class="box-title">สถิติใช้น้ำประจำปี 2560</h3>
            </div>
            <div class="box-body">
              <div id="chartContainer" style="height: 250px; width: 100%;">
              </div>
            </div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
