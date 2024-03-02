<?php 
   include './db/db.php';
   
    // perform query
    // change the query to one relevant to your database
    $q = "
      SELECT  count(*) as total FROM  lead where status = 'ordered'
      ";
    // $result = $conn->query($myquery);
    // while($row = $result->fetch_assoc()){
    //     // echo json_encode($row); 
    //     $arr[] = $row; 
    // }

    $result = $conn->query($q);
    $total = 0;

    while($row = $result->fetch_assoc()){
        $total = $row['total'];
    }

    echo $total;

    // $a = json_encode($arr);
        // $result = $conn->query($q);
        

    // foreach($arr as $val){
    //      json_encode($val);
    // }
   
    // encode data to json format
   
    // close connection
    // mysql_close($server);
  ?>
 
 <?php
 
$dataPoints = array( 
	array("y" => 3373.64, "label" => "Germany" ),
	array("y" => 2435.94, "label" => "France" ),
	array("y" => 1842.55, "label" => "China" ),
	array("y" => 1828.55, "label" => "Russia" ),
	array("y" => 1039.99, "label" => "Switzerland" ),
	array("y" => 765.215, "label" => "Japan" ),
	array("y" => 612.453, "label" => "Netherlands" )
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Gold Reserves"
	},
	axisY: {
		title: "Gold Reserves (in tonnes)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## tonnes",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html> 