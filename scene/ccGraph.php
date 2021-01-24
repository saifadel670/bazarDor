<html>
  <head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
  <link rel="stylesheet" href="styleGraph.css">

  </head>

  <body>
  <form action=""   method="post">
  <td>Product :</td>
	<td><select name="Product_Name" required="">
      <option selected="" hidden="" value="">Select product</option>
      <option value="Onion">Onion</option>
      <option value="Potato">Potato</option>
      <option value="Ginger">Ginger</option>
      <option value="Garlic">Garlic</option>
      <option value="Tomato">Tomato</option>
      <option value="Eggplant">Eggplant</option>
     </select>
   </td></tr>
   <tr><br><br>

   	<br>
    <td>PERIOD :</td>
  <input type="Date"  name="Startdate" />
  <label>TO</label>
  <input type="Date"  name="endDate" /><br>

  
  <input type="submit" value="LOAD" name ="submit" id="sub">
  <a href="CC.php">home</a>
  </form>
 
<?php

if(isset($_POST['submit'])){
   $Startdate = $_POST['Startdate'];
   $endDate = $_POST['endDate'];
   $Product_Name = $_POST['Product_Name'];
   $date1 = explode('-', $Startdate);
   $month1 = $date1[1];
   $day1   = $date1[2];
   $year1  = $date1[0];

   $date2 = explode('-', $endDate);
   $month2 = $date2[1];
   $day2   = $date2[2];
   $year2  = $date2[0];
   $ee=0;


$conn = mysqli_connect("localhost", "root", "", "hackathon");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$phpArray1 = array("Dhaka","Chottogram","Barishal","Rajshahi","Shylet","Khulna","Rangpur","Mymensingh");
for($i=0; $i<6; $i++){
$sql= "SELECT SUM(bureauProductionQuantity) as sum, SUM(ccDemandQuantity) as dem FROM localproduct where (division='$phpArray1[$i]' ) AND (product_name= '$Product_Name')  AND (month BETWEEN '$month1' and '$month2') AND (year BETWEEN '$year1' and '$year2') ";
         
			$result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $var = (float)number_format($row['sum'], 2, '.', '');
             $vardem = (float)number_format($row['dem'], 2, '.', '');
 

if($vardem == null){$vardem=0;}
if($var == null){$var=0;}          
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

  <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
 
        var jArray1 = <?php echo json_encode($phpArray1); ?>;  
        var jArray2 = <?php echo json_encode($phpArray2); ?>;
        var jArray3 = <?php echo json_encode($phpArray3); ?>;
        var array_name = [
          ['Division', 'CC '] ];     
  
       for ( var i=0; i<= jArray1.length; i++){
        array_name.push([jArray1[i],  Number(jArray3[i])]); 
       }

        var data = google.visualization.arrayToDataTable(array_name);

        var options = {
          title: 'CC Demand Record',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <div id="piechart_3d" style="width: 1000px; height: 700px;"></div>
  </body>
</html>
