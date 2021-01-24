<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCB</title>
    <link rel="stylesheet" type="text/css" href="officeDesign.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


  
   
    <form method="post"> 
    <div class="navbar" >
        <a href="index.php">HOME</a>
        <a href="comGraph.php" name = 'graph' >GRAPH</a>
        
        
        <div class="dropdown">
            <button class="dropbtn" >MONITOR
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content"  >
              <button  name ="production"><a>UPLOADED IMPORTED DATA</a></button>
              
              <button  name ="supply"><a> TOTAL IMPORTED DATA</a></button>
              <button  name ="price"><a> Product Price</a></button>
              
            </div>
          </div>
          
          <div class="dropdown">
            <button class="dropbtn">ACOOUNT
              <i class="fa fa-caret-down"></i>
            </button>
            
            <div class="dropdown-content">
            <a href="logout.php">Logout</a>           
           
            </div>
          </div>
          
      </div> 
      </form> 

<header>

      <?php
    if(isset($_POST['production'])){
      production();
        
    }
    else if(isset($_POST['supply'])){
        
      supply();
  }
  else if(isset($_POST['price'])){
        
    price();
}
  
?>
<?php
  function Price()
  { echo "<div class='table'><table class='content-table'> <thead>
    <tr>
    
      <th>Product</th>

      <th>Quantity</th>
      <th>Unit</th>
      <th>Wholsell Price</th>
      <th>Retail Price</th>
      <th>Area</th>
      
      
    </tr>
  </thead>"; 
  
  echo "<tbody>";
  					echo "<tr>";
    					
						$conn = mysqli_connect("localhost", "root", "", "hackathon");
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						$sql = "SELECT product,type, wholesellPrice, retailPrice,area FROM product;";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<tr><td>" . $row["product"]." (".$row["type"].")". "</td><td>" ."1" . "</td><td>" . "kg". "</td><td>". $row["wholesellPrice"]. "</td><td>" . $row["retailPrice"] . "</td><td>" .$row["area"]."</td></tr>" ;
							}
							//echo "</table>";
						} 
						else { echo "0 results"; }
						$conn->close();
					
  				echo "</tbody>";
  
  
 echo " </table>";
    
  echo "</div>";
  



  }

?>
<?php
  function production()
  { echo "<div class='table'><table class='content-table'> <thead>
    <tr>
    
      <th>Product</th>
      <th>Import Country</th>
      <th>Total Quantity</th>
      <th>Unit</th>
      <th>Total Cost</th>
      
      
    </tr>
  </thead>"; 
  
  echo "<tbody>";
  					echo "<tr>";
    					
						$conn = mysqli_connect("localhost", "root", "", "hackathon");
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
            }
            $sql= "SELECT productName, country, totalQuantity,unit, totalCost from ccie_nbr";
						
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<tr><td>" . $row["productName"]. "</td><td>" . $row["country"]. "</td><td>" . $row["totalQuantity"]. "</td><td>". $row["unit"]. "</td><td>" . $row["totalCost"] . "</td></tr>" ;
							}
							//echo "</table>";
						} 
						else { echo "0 results"; }
						$conn->close();
					
  				echo "</tbody>";
  
  
 echo " </table>";
    
  echo "</div>";
  



  }

?>


<?php
  function supply()
  { echo "<div class='table'><table class='content-table'> <thead>
    <tr>
    
      <th>Product</th>
      <th>Unit</th>
      <th>Total Imported Quantity</th>
      
      
      
      
      
    </tr>
  </thead>"; 
  
  echo "<tbody>";
  					echo "<tr>";
    					
						$conn = mysqli_connect("localhost", "root", "", "hackathon");
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
            }
            $product = array('Onion','Potato','Ginger','Garlic','Tomato','Eggplant');
            for($i=0; $i<6; $i++){
            //$sql= "SELECT SUM(bureauProductionQuantity) as sum, SUM(daeProductionQuantity) as dae FROM localproduct where product_name= '$product[$i]' ";
            $sql1 = "SELECT SUM(totalQuantity) as d from ccie_nbr where productName='$product[$i]'";
						//$sql = "SELECT product_name,division, district,thana, bureauProductionQuantity, unit FROM localproduct";
                        //$result = $conn->query($sql);
                        $result1 = $conn->query($sql1);
            //$row = $result->fetch_assoc();
            $row1 = $result1->fetch_assoc();
           // $sum1 = $row['sum'] + $row1['d']; 
            //echo $product[$i]."--".$row['sum']."--".$row1['d']."---ggggg :".$sum1."<br>";
            $var = (float)number_format($row1['d'], 2, '.', '');
            //$var1 = (float)number_format($row['dae'], 2, '.', '');
            //$sum1 = $var + $var1;
               // echo $var."--".$var1;
            
						// output data of each row
							
								echo "<tr><td>" . $product[$i]. "</td><td>"."Matric Ton"."</td><td>" . $var.  "</td></tr>" ;
							
							//echo "</table>";
						} 
			
						$conn->close();
					
  				echo "</tbody>";
  
  
 echo " </table>";
    
  echo "</div>";
  



  }

?>


<?php
  function uploadedData3()
  { echo "<div class='table'><table class='content-table'> <thead>
    <tr>
    
      <th>Product</th>
      <th>Demand Quantity</th>
      <th>Unit</th>
      <th>Division</th>
      <th>District</th>
      <th>Thana</th>
      
      
    </tr>
  </thead>"; 
  
  echo "<tbody>";
  					echo "<tr>";
    					
						$conn = mysqli_connect("localhost", "root", "", "hackathon");
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						$sql = "SELECT product_name,division, district,thana, bureauDemandQuantity, unit FROM localproduct";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<tr><td>" . $row["product_name"]. "</td><td>" .$row["bureauDemandQuantity"] . "</td><td>" . $row["unit"]. "</td><td>". $row["division"]. "</td><td>" . $row["district"] . "</td><td>" . $row["thana"]. "</td></tr>" ;
							}
							//echo "</table>";
						} 
						else { echo "0 results"; }
						$conn->close();
					
  				echo "</tbody>";
  
  
 echo " </table>";
    
  echo "</div>";
  



  }

?>




</header>
    
</body>
</html>