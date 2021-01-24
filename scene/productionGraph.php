<html>
  <head>
  <style>
		form{
			height:150px;
			width: 396px;
			margin : auto;
			padding: 20px;
			background:#663366;
			font-size: 20px;
			font-family: verdana;
			color: white;

		}
		input[type=submit]{
			width: 80%;
			padding: 5px;
			font-size: 18px;
		}
		input[type=submit]{
			padding: 5px;
			font-size: 20px;
			width: 100px
		}
		select{
			font-size: 20px;
			padding: 5px;
			background: #e0d3e8;
		}
		h1{
			text-align: center;
			padding: 30px;
		}
a{
    color: black;
    margin-left:220px ;
}


  </style>
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
  <a href="BUREAU.php">home</a>
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


   //echo $Startdate. $endDate. $Product_Name;

$conn = mysqli_connect("localhost", "root", "", "hackathon");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$phpArray1 = array("Dhaka","Chottogram","Barishal","Rajshahi","Shylet","Khulna","Rangpur","Mymensingh");
//$phpArray1 = array('Onion','Tomato','Potato','Ginger','Garlic','Eggplant');
for($i=0; $i<6; $i++){
$sql= "SELECT SUM(bureauProductionQuantity) as sum, SUM(bureauDemandQuantity) as dem FROM localproduct where (division='$phpArray1[$i]' )  AND (month BETWEEN '$month1' and '$month2') AND (year BETWEEN '$year1' and '$year2') AND (product_name= '$Product_Name') ";
            //$sql1 = "SELECT SUM(totalQuantity) as d from ccie_nbr where (productName='$phpArray1[$i]')AND (day between '$day1' and '$day2') AND (month BETWEEN '$month1' and '$month2') AND (year BETWEEN '$year1' and '$year2')";
			$result = $conn->query($sql);//$result1 = $conn->query($sql1);
            $row = $result->fetch_assoc();//$row1 = $result1->fetch_assoc();
            $var = (float)number_format($row['sum'], 2, '.', '');
             $vardem = (float)number_format($row['dem'], 2, '.', '');
            //$var1 = (float)number_format($row1['d'], 2, '.', '');
            //$sum1 = $var + $var1;

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
               // echo "sum ".$var." -- ".$vardem."<br>";

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
          ['Division', 'PRODUCTION', 'DEMAND'] ];     
  
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
          title: 'Production & Demand record of BUREAU',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 1400px; height: 500px"></div>
    
  </body>
  
</html>
