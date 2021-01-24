<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>BUREAU</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<div class="main">
			<ul class="options">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="graph.php">Graph</a></li>
				
				<li><a href="login.php">LogIn</a></li>
			</ul>
		</div>


		<div class="tit">
            <h1> Price of
            <?php
			$date =  date("Y/m/d");
			echo $date;
			$date1 = explode('/', $date);
			$month1 = $date1[1];
			$day1   = $date1[2];
			$year1  = $date1[0];
			?> 

            </h1>
            
		</div>


        <form method="post">


        
		<div class = "divSelect"><td>Division :</td>
    <td><select name="Division" required="">
      <option selected="" hidden="" value="no">All Division</option>
      <option value="Dhaka">Dhaka</option>
      <option value="Chottogram">Chottogram</option>
      <option value="Barishal">Barishal</option>
      <option value="Rajshahi">Rajshahi</option>
      <option value="Shylet">Shylet</option>
      <option value="Khulna">Khulna</option>
      <option value="Rangpur">Rangpur</option>
      <option value="Mymensingh">Mymensingh</option>
     </select>
   </td>
   
   <td>Product :</td>
	<td><select name='Product_Name' required="">
      <option selected="" hidden="" value="no">All Product</option>
      <option value="onion">Onion</option>
      <option value="Potato">Potato</option>
      <option value="Ginger">Ginger</option>
      <option value="Garlic">Garlic</option>
      <option value="Tomato">Tomato</option>
      <option value="Eggplant">Eggplant</option>
     </select>
   </td></tr>
   <tr>
   <button  name = 'load'>SEARCH</button></div>
  
</form>

<?php
	


    if(isset($_POST['load'])){
		$Product_Name = $_POST['Product_Name'];
$Division = $_POST['Division'];
      if($Product_Name != 'no' && $Division != 'no'){
		  submit3();
	  }else{
		  if($Product_Name != 'no'){
				submit1();
		  }
		  if($Division != 'no'){
			  submit2();
		  }
	  }     
        
	}
	else{
			submit();
	}
	?>

<?php
function submit(){
	


	echo "<div class='table'><table class='content-table'> <thead>
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
						$date =  date("Y/m/d");
			$date1 = explode('/', $date);
			$month1 = $date1[1];
			$day1   = $date1[2];
			$year1  = $date1[0];
						//$sql = "SELECT product,type, wholesellPrice, retailPrice,area FROM product where day = '$day1' &  month = '$month1' & year='$year1';";
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

function submit1(){
	
	
	


	echo "<div class='table'><table class='content-table'> <thead>
    <tr>
    
      <th>Area</th>
	  <th>Product Type</th>
      <th>Quantity</th>
      <th>Unit</th>
      <th>Wholsell Price</th>
      <th>Retail Price</th>
      
      
      
    </tr>
  </thead>"; 
  
  echo "<tbody>";
  					echo "<tr>";
    					
						$conn = mysqli_connect("localhost", "root", "", "hackathon");
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						$date =  date("Y/m/d");
			$date1 = explode('/', $date);
			$month1 = $date1[1];
			$day1   = $date1[2];
			$year1  = $date1[0];
						$Product_Name = $_POST['Product_Name'];
$Division = $_POST['Division'];
//& day = '$day1' &  month = '$month1' & year='$year1'
						$sql = "SELECT type,area, wholesellPrice, retailPrice FROM product where product ='$Product_Name'  ";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<tr><td>" . $row["area"]. "</td><td>" . $row["type"]. "</td><td>" ."1" . "</td><td>" . "kg". "</td><td>". $row["wholesellPrice"]. "</td><td>" . $row["retailPrice"] . "</td></tr>" ;
							}
							//echo "</table>";
						} 
						else { echo "0 results"; }
						$conn->close();
					
  				echo "</tbody>";
  
  
 echo " </table>";
    
  echo "</div>";
  



  
}



function submit2(){
	
	


	echo "<div class='table'><table class='content-table'> <thead>
    <tr>
    
      <th>Product</th>

      <th>Quantity</th>
      <th>Unit</th>
      <th>Wholsell Price</th>
      <th>Retail Price</th>
      
      
      
    </tr>
  </thead>"; 
  
  echo "<tbody>";
  					echo "<tr>";
    					
						$conn = mysqli_connect("localhost", "root", "", "hackathon");
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						$date =  date("Y/m/d");
			$date1 = explode('/', $date);
			$month1 = $date1[1];
			$day1   = $date1[2];
			$year1  = $date1[0];
						$Product_Name = $_POST['Product_Name'];
$Division = $_POST['Division'];
//& day = '$day1' &  month = '$month1' & year='$year1'
						$sql = "SELECT product,type, wholesellPrice, retailPrice,area FROM product where area ='$Division' ";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<tr><td>" . $row["product"]." (".$row["type"].")". "</td><td>" ."1" . "</td><td>" . "kg". "</td><td>". $row["wholesellPrice"]. "</td><td>" . $row["retailPrice"] . "</td></tr>" ;
							}
							//echo "</table>";
						} 
						else { echo "0 results"; }
						$conn->close();
					
  				echo "</tbody>";
  
  
 echo " </table>";
    
  echo "</div>";
  



  
}




function submit3(){
	

	echo "<div class='table'><table class='content-table'> <thead>
    <tr>
		<th>Product Type</th>
      <th>Quantity</th>
      <th>Unit</th>
      <th>Wholsell Price</th>
      <th>Retail Price</th>
      
      
      
    </tr>
  </thead>"; 
  
  echo "<tbody>";
  					echo "<tr>";
    					
						$conn = mysqli_connect("localhost", "root", "", "hackathon");
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						$date =  date("Y/m/d");
			$date1 = explode('/', $date);
			$month1 = $date1[1];
			$day1   = $date1[2];
			$year1  = $date1[0];
						$Product_Name = $_POST['Product_Name'];
					$Division = $_POST['Division'];
//& day = '$day1' &  month = '$month1' & year='$year1'
						$sql = "SELECT  wholesellPrice,type, retailPrice FROM product where product ='$Product_Name' & area ='$Division' ";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<tr><td>".$row["type"]. "</td><td>"."1" . "</td><td>" . "kg". "</td><td>". $row["wholesellPrice"]. "</td><td>" . $row["retailPrice"] . "</td></tr>" ;
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