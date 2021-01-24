<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>officer</title>
    <link rel="stylesheet" type="text/css" href="officeDesign.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


  
   
    <form method="post"> 
    <div class="navbar" >
        <a href="index.php">HOME</a>
      
        <div class="dropdown">
          
          <button class="dropbtn" >INSERT
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
          <button  name ="insert"><a href='inputNBR.html' >PRODUCTION DATA</a></button>



                    
          </div>
          
        </div>

        <div class="dropdown">
            <button class="dropbtn" >VIEW TAX
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content"  >
              <button  name ="production"><a>RECEIVED TAX</a></button>
              <button  name ="demand"><a>NOT RECEIVED TAX</a></button>
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
    if(isset($_POST['demand'])){
      
      demandData();
        
    }
    else if(isset($_POST['production'])){
        
        uploadedData();
    }
?>

<?php
  function uploadedData()
  { echo "<div class='table'><table class='content-table'> <thead>
    <tr>
    
      <th>Product</th>
      <th>Import Quantity</th>
      
      <th>Unit</th>
      <th>Importer Licence No </th>
      <th>Import Country</th>
      <th>Import Cost</th>
      
      
    </tr>
  </thead>"; 
  
  echo "<tbody>";
  					echo "<tr>";
    					
						$conn = mysqli_connect("localhost", "root", "", "hackathon");
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
                        }
                        $yes = 'yes';
                        $sql = "SELECT productName, totalQuantity, unit, importerLicNo, country, totalCost FROM ccie_nbr where taxStatus = '$yes'";
						//$sql = "SELECT product_name,division, district,thana, bureauProductionQuantity, unit FROM localproduct";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<tr><td>" . $row["productName"]. "</td><td>" .$row["totalQuantity"] . "</td><td>" . $row["unit"]. "</td><td>". $row["importerLicNo"]. "</td><td>" . $row["country"] . "</td><td>" . $row["totalCost"]. "</td></tr>" ;
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
  function demandData()
  { echo "<div class='table'><table class='content-table'> <thead>
    <tr>
    
    <th>Product</th>
    <th>Import Quantity</th>
    
    <th>Unit</th>
    <th>Importer Licence No </th>
    <th>Import Country</th>
    <th>Import Cost</th>
    
      
    </tr>
  </thead>"; 
  
  echo "<tbody>";
  					echo "<tr>";
    					
						$conn = mysqli_connect("localhost", "root", "", "hackathon");
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
                        $yes = 'no';
                        $sql = "SELECT productName, totalQuantity, unit, importerLicNo, country, totalCost FROM ccie_nbr where taxStatus = '$yes'";
						
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<tr><td>" . $row["productName"]. "</td><td>" .$row["totalQuantity"] . "</td><td>" . $row["unit"]. "</td><td>". $row["importerLicNo"]. "</td><td>" . $row["country"] . "</td><td>" . $row["totalCost"]. "</td></tr>" ;
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