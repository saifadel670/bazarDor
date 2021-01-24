<?php

$conn = mysqli_connect("localhost", "root", "", "hackathon");
		
if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
                     
                        $Product_Name = $_POST['Product_Name'];
                        $Division= $_POST['Division'];
                        $District =$_POST['District'];
                        $Thana = $_POST['Thana'];
                        $ProdutctionQuantity = $_POST['Quantity'];
                        $ProdutctionUnit  = $_POST['Unit'];
                        
                        $myDate = $_POST['date']; 
                        if($ProdutctionUnit == 'Kg'){
                            $tmp = 0.001;
                            $ProdutctionQuantity = $ProdutctionQuantity* $tmp;
                            echo $ProdutctionQuantity. "production <br>";
                        }
                        
                        $Unit = 'Matric Ton';
                        echo $myDate;
                        $date = explode('-', $myDate);
                        $month = $date[1];
                        $day   = $date[2];
                        $year  = $date[0];

                    $sql = "UPDATE localproduct set daeProductionQuantity = $ProdutctionQuantity where product_name = '$Product_Name'AND division = '$Division'AND district = '$District'AND thana ='$Thana' AND month = '$month'AND year = '$year'";
                           
                    $result = mysqli_query($conn,$sql);


          echo "success";
                           
                           
                           
                           
                           
						$conn->close();



?>

<?php

if ($result == 1){
session_start(); // Starting Session

if(session_destroy()) // Destroying All Sessions
{
header("Location: DAE.php"); // Redirecting To Home Page
}
}

else {
    echo "<h1>please try agail</h1>";
}
?>







