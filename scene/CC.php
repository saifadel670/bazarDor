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
        <a href="ccGraph.php" name = 'graph' >GRAPH</a>
        
        <div class="dropdown">
          
          <button class="dropbtn" >INSERT
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
          <button  name ="insert"><a href='inputCC.html' >PRODUCTION DATA</a></button>
                  
          </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn" >VIEW
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content"  >
              <button  name ="view"><a>UPLOADED DATA</a></button>
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
    
      <th>product</th>      
      <th>unit</th>
      <th>DHAKA</th>
      <th>Chottogram </th>
      <th>Barishal </th>
      <th>Rajshahi</th>
      <th>Shylet</th>
      <th>Khulna</th>
      <th>Rangpur</th>
      <th>Mymensingh</th>
      
      
    </tr>
  </thead>"; 
  
  echo "<tbody>";
  					echo "<tr>";
    					
						$conn = mysqli_connect("localhost", "root", "", "hackathon");
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
            }
            $product = array("Potato","Tomato","Eggplant", "Ginger", "Garlic","Onion");

            
            for ($x = 0; $x <= 5; $x++){

            $sql = "SELECT SUM(ccDemandQuantity) as sum from localproduct WHERE product_name = '$product[$x]' AND division = 'Dhaka'";
          
            $sql1 = "SELECT SUM(ccDemandQuantity) as sum from localproduct WHERE product_name = '$product[$x]' AND division = 'Chottogram'";
            $sql2 = "SELECT SUM(ccDemandQuantity) as sum from localproduct WHERE product_name = '$product[$x]' AND division = 'Barishal'";
            $sql3 = "SELECT SUM(ccDemandQuantity) as sum from localproduct WHERE product_name = '$product[$x]' AND division = 'Rajshahi'";
            $sql4 = "SELECT SUM(ccDemandQuantity) as sum from localproduct WHERE product_name = '$product[$x]' AND division = 'Shylet'";
            $sql5 = "SELECT SUM(ccDemandQuantity) as sum from localproduct WHERE product_name = '$product[$x]' AND division = 'Khulna'";
            $sql6 = "SELECT SUM(ccDemandQuantity) as sum from localproduct WHERE product_name = '$product[$x]' AND division = 'Rangpur'";
            $sql7 = "SELECT SUM(ccDemandQuantity) as sum from localproduct WHERE product_name = '$product[$x]' AND division = 'Mymensingh'";
            $result = $conn->query($sql);
            $result1 = $conn->query($sql1); 
            $result2 = $conn->query($sql2);
            $result3 = $conn->query($sql3);
            $result4 = $conn->query($sql4);
            $result5 = $conn->query($sql5);
            $result6 = $conn->query($sql6);
            $result7 = $conn->query($sql7);
						
						// output data of each row
							while($row = $result->fetch_assoc() ) {
                $row1 = $result1->fetch_assoc();
                $row2 = $result2->fetch_assoc();
                $row3 = $result3->fetch_assoc();
                $row4 = $result4->fetch_assoc();
                $row5 = $result5->fetch_assoc();
                $row6 = $result6->fetch_assoc();
                $row7 = $result7->fetch_assoc();
                echo "<tr><td>" . $product[$x]. "</td><td>" . "Matric Ton" . "</td><td>" . $row["sum"]. "</td><td>" . $row1["sum"]. "</td><td>" . $row2["sum"]. "</td><td>" . $row3["sum"]. "</td><td>" . $row4["sum"]. "</td><td>" . $row5["sum"]. "</td><td>" . $row6["sum"]. "</td><td>" . $row7["sum"]. "</td></tr>" ;
              }
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