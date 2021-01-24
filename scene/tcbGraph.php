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
  <a href="TCB.php">home</a>
  
  
  </form>
 
<?php

if(isset($_POST['submit'])){
   $Startdate = $_POST['Startdate'];
   $endDate = $_POST['endDate'];
   //$Product_Name = $_POST['Product_Name'];
   $date1 = explode('-', $Startdate);
   $month1 = $date1[1];
   $day1   = $date1[2];
   $year1  = $date1[0];

   $date2 = explode('-', $endDate);
   $month2 = $date2[1];
   $day2   = $date2[2];
   $year2  = $date2[0];
   


   //echo $Startdate. $endDate. $Product_Name;

$conn = mysqli_connect("localhost", "root", "", "hackathon");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//...........................................

//$phpArray1 = array("Dhaka","Chottogram","Barishal","Rajshahi","Shylet","Khulna","Rangpur","Mymensingh");
$phpArray1 = array('Onion','Tomato','Potato','Ginger','Garlic','Eggplant');
$ee=0;

for($i=0; $i<6; $i++){
$sql= "SELECT SUM(bureauProductionQuantity) as sum, SUM(bureauDemandQuantity) as dem FROM localproduct where (product_name= '$phpArray1[$i]')  AND (month BETWEEN '$month1' and '$month2') AND (year BETWEEN '$year1' and '$year2') ";
            $sql1 = "SELECT SUM(totalQuantity) as d from ccie_nbr where (productName='$phpArray1[$i]') AND (month BETWEEN '$month1' and '$month2') AND (year BETWEEN '$year1' and '$year2')";
			$result = $conn->query($sql);$result1 = $conn->query($sql1);
            $row = $result->fetch_assoc();$row1 = $result1->fetch_assoc();
            $var = (float)number_format($row['sum'], 2, '.', '');   $vardem = (float)number_format($row['dem'], 2, '.', '');
            $var1 = (float)number_format($row1['d'], 2, '.', '');
            $sum1 = $var + $var1;

//echo "sum ".$sum1." -- ".$vardem."<br>";
                            if($ee ==0){
                    $phpArray2 = array($sum1);
                    $phpArray3 = array($vardem);
                    $ee++;
                }else{
                    array_push($phpArray2, $sum1);
                    array_push($phpArray3, $vardem);
                }          


            }

        }


//.......................................
/*
$sql = "SELECT DISTINCT division, bureauProductionQuantity, bureauDemandQuantity FROM localproduct WHERE (product_name = '$Product_Name' ) AND (day between '$day1' and '$day2') AND (month BETWEEN '$month1' and '$month2') AND (year BETWEEN '$year1' and '$year2')";
//$sql = "SELECT DISTINCT division, bureauProductionQuantity, bureauDemandQuantity FROM localproduct";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
//$cont=1;
$row = $result->fetch_assoc();
$phpArray1 = array($row["division"]);
$phpArray2 = array($row["bureauProductionQuantity"]);
$phpArray3 = array($row["bureauDemandQuantity"]);
while($row = $result->fetch_assoc()) {
  
  /*if($cont== 0){
    // $phpArray = array([$row["WholesalePrice"].  $row["RetailPrice"]]);
     $cont++;

                    $phpArray1 = array($row["District"]);
                    $phpArray2 = array($row["WholesalePrice"]);
                    $phpArray3 = array($row["RetailPrice"]);




  }
  else{*/
 /*   array_push($phpArray1, $row["division"]);
    array_push($phpArray2, $row["bureauProductionQuantity"]);
    array_push($phpArray3, $row["bureauDemandQuantity"]);
    
  //}
  //echo  $row["product"].  $row["quantity"] . $row["unit"] ;
}
  
   // 
 
    

  //echo "</table>";
}
else { echo "0 results"; }
$conn->close();
}*/
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
          ['PRODUCT', 'SUPPLY Quantity', 'Demand Quantity'] ];     
  
       for ( var i=0; i<= jArray1.length; i++){
        array_name.push([jArray1[i],  Number(jArray2[i]),      Number(jArray3[i])]); 
       }
        
        /*array_name.push([jArray1[0],  Number(jArray2[0]),      Number(jArray3[0])],
          [jArray1[1],  Number(jArray2[1]),      Number(jArray3[1])],
          [jArray1[2],  Number(jArray2[2]),      Number(jArray3[2])]);
        array_name.push(
          
          ["rajshahi",  540,      1020],
          ["sylhet",  320,      960]
        );
        */
       
        var data = google.visualization.arrayToDataTable(array_name);

        var options = {
          title: 'Supply & Demand Graph',
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
