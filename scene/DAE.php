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
        <a href="daegraph2.php" name = 'graph' >GRAPH</a>
        
        <div class="dropdown">
          
          <button class="dropbtn" >INSERT
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
          <button  name ="insert"><a href='inputDAE.html' >PRODUCTION DATA</a></button>
                  
          </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn" >VIEW
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content"  >
              <button  name ="view"><a>UPLOADED PRODUCTION DATA</a></button>
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
    if(isset($_POST['insert'])){
      echo "shamim hasan";
      echo "<a ></a>";
        
    }
    else if(isset($_POST['view'])){
        
        uploadedData();
    }
?>

<?php
  function uploadedData()
  { echo "<div class='table'><table class='content-table'> <thead>
    <tr>
    
      <th>Product</th>
      <th>Production Quantity</th>
      
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
						$sql = "SELECT product_name,division, district,thana, daeProductionQuantity, unit FROM localproduct";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["product_name"]. "</td><td>" . $row["daeProductionQuantity"]. "</td><td>" . $row["unit"]. "</td><td>". $row["division"]. "</td><td>" . $row["district"] . "</td><td>" . $row["thana"]. "</td></tr>" ;
                }
							//echo "</table>";
						} 
						else { 
              echo "0 results";
            }
						$conn->close();
					
  				echo "</tbody>";
  
 echo " </table>";
    
  echo "</div>";

  }

?>




</header>
    
</body>
</html>