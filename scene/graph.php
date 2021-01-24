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
  <a href="CCI&E.php">home</a>
  </form>
 
<?php

if(isset($_POST['submit'])){
   $Startdate = $_POST['Startdate'];
   $endDate = $_POST['endDate'];
 
   $date1 = explode('-', $Startdate);
   $month1 = $date1[1];
   $day1   = $date1[2];
   $year1  = $date1[0];

   $date2 = explode('-', $endDate);
   $month2 = $date2[1];
   $day2   = $date2[2];
   $year2  = $date2[0];
   $ee=0;
 //echo $Startdate. $endDate. $Product_Name;

$conn = mysqli_connect("localhost", "root", "", "hackathon");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//...........................................

//$phpArray1 = array("Dhaka","Chottogram","Barishal","Rajshahi","Shylet","Khulna","Rangpur","Mymensingh");
$phpArray1 = array('Onion','Tomato','Potato','Ginger','Garlic','Eggplant');
for($i=0; $i<6; $i++){
  $sql= "SELECT sum(totalQuantity) as dem from ccie_nbr where  productName = '$phpArray1[$i]' AND (month BETWEEN '$month1' and '$month2') AND (year BETWEEN '$year1' and '$year2')";
//$sql= "SELECT SUM(bureauProductionQuantity) as sum, SUM(daeProductionQuantity) as dem FROM localproduct where (division='$phpArray1[$i]' ) AND (product_name= '$Product_Name')  AND (month BETWEEN '$month1' and '$month2') AND (year BETWEEN '$year1' and '$year2') ";
            //$sql1 = "SELECT SUM(totalQuantity) as d from ccie_nbr where (productName='$phpArray1[$i]')AND (day between '$day1' and '$day2') AND (month BETWEEN '$month1' and '$month2') AND (year BETWEEN '$year1' and '$year2')";
			$result = $conn->query($sql);//$result1 = $conn->query($sql1);
            $row = $result->fetch_assoc();//$row1 = $result1->fetch_assoc();
           // $var = (float)number_format($row['sum'], 2, '.', '');
             $vardem = (float)number_format($row['dem'], 2, '.', '');
            //$var1 = (float)number_format($row1['d'], 2, '.', '');
            //$sum1 = $var + $var1;

if($vardem == null){$vardem=0;}
       
                if($ee ==0){
                   // $phpArray2 = array($var);
                    $phpArray3 = array($vardem);
                    $ee++;
                }else{
                   // array_push($phpArray2, $var);
                    array_push($phpArray3, $vardem);
                }          
               // echo "sum ".$var." -- ".$vardem."<br>";

            }
            $conn->close();
        }

?>

<?php

for($i=0; $i<6; $i++){
  //  echo $phpArray1[$i]." - ".$phpArray2[$i]." - ".$phpArray3[$i]."<br>";
}
?>





  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
 
        var jArray1 = <?php echo json_encode($phpArray1); ?>;  
       
        var jArray3 = <?php echo json_encode($phpArray3); ?>;
        var array_name = [
          ['Product', 'Import '] ];     
  
       for ( var i=0; i<= jArray1.length; i++){
        array_name.push([jArray1[i],  Number(jArray3[i])]); 
       }



        var data = google.visualization.arrayToDataTable(array_name);

        var options = {
          title: 'Import Quantity Record',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  
    <div id="piechart_3d" style="width: 1000px; height: 700px;"></div>
  </body>
</html>
