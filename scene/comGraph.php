<html>
  <head>
  <link rel="stylesheet" href="styleGraph.css">
  </head>
  <body>

  <form action=""   method="post">
  
   	<br>
    <td>PERIOD :</td>
  <input type="Date"  name="Startdate" />
  <label>TO</label>
  <input type="Date"  name="endDate" /><br>

  
  <input type="submit" value="LOAD" name ="submit" id="sub">
  <a href="minCom.php">home</a>
  </form>
 
<?php

if(isset($_POST['submit'])){
   $Startdate = $_POST['Startdate'];
   $endDate = $_POST['endDate'];
   $date1 = explode('-', $Startdate);
   $month1 = (int)$date1[1];
   $day1   = (int)$date1[2];
   $year1  = (int)$date1[0];

   $date2 = explode('-', $endDate);
   $month2 = (int)$date2[1];
   $day2   = (int)$date2[2];
   $year2  = (int)$date2[0];
   
   $ee=0;

   

$conn = mysqli_connect("localhost", "root", "", "hackathon");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$phpArray1 = array('Onion','Tomato','Potato','Ginger','Garlic','Eggplant');
for($i=0; $i<6; $i++){
  
$sql= "SELECT bureauDemandQuantity - bureauProductionQuantity as sum FROM localproduct where (product_name= '$phpArray1[$i]') AND  (month BETWEEN '$month1' and '$month2') AND (year BETWEEN '$year1' and '$year2') ";
            $sql1 = "SELECT SUM(totalQuantity) as d from ccie_nbr where (productName='$phpArray1[$i]')AND  (month BETWEEN '$month1' and '$month2') AND (year BETWEEN '$year1' and '$year2')";
			$result = $conn->query($sql);$result1 = $conn->query($sql1);
            $row = $result->fetch_assoc();$row1 = $result1->fetch_assoc();
            $var = (float)number_format($row['sum'], 2, '.', '');
             $vardem = (float)number_format($row1['d'], 2, '.', '');

if($var == null ){
  $var = 0;
} 
if($vardem == null ){
  $vardem = 0;
}           
                if($ee ==0){
                    $phpArray2 = array($var);
                    $phpArray3 = array($vardem);
                    $ee++;
                }else{
                    array_push($phpArray2, $var);
                    array_push($phpArray3, $vardem);
                }          


            }
            $conn->close();

        }
?>


 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
     <?php echo " google.charts.setOnLoadCallback(drawChart);" ?>
            
      function drawChart() {
        
        var jArray1 = <?php echo json_encode($phpArray1); ?>;  
        var jArray2 = <?php echo json_encode($phpArray2); ?>;
        var jArray3 = <?php echo json_encode($phpArray3); ?>;
        for(var i=0; i<jArray3.length; i++){
      
 
    }
        var array_name = [
          ['PRODUCT', 'NEED ', 'Imported'] ];     
  
       for ( var i=0; i<= jArray1.length; i++){
        array_name.push([jArray1[i],  Number(jArray2[i]),      Number(jArray3[i])]); 
       }
       
        var data = google.visualization.arrayToDataTable(array_name);

        var options = {
          title: 'NEED & Imported Graph',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    
  </body>
  
</html>
