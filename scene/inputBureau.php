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
                        $perUniCost= $_POST['perUniCost'];
                        $DemandQuantity = $_POST['DemandQuantity'];
                        $DemandUnit  = $_POST['DemandUnit'];
                        $myDate = $_POST['date']; 
                        if($ProdutctionUnit == 'Kg'){
                            $tmp = 0.001;
                            $ProdutctionQuantity = $ProdutctionQuantity* $tmp;
                            echo $ProdutctionQuantity. "production <br>";
                        }
                        if($DemandUnit == 'Kg'){
                            $tmp = 0.001;
                            $DemandQuantity = $DemandQuantity* $tmp;
                            echo $DemandQuantity." deamnd <br>";
                        }
                        $Unit = 'Matric Ton';
                        echo $myDate;
                        $date = explode('-', $myDate);
                        $month = $date[1];
                        $day   = $date[2];
                        $year  = $date[0];
                        echo "<br> ff".$month,$day.$year;

                        $sql = "INSERT INTO localproduct (product_name,division, district, thana, bureauProductionQuantity,bureauDemandQuantity,unit, day, month, year,perunitCost) 
                            VALUES('$Product_Name', '$Division', '$District','$Thana',  '$ProdutctionQuantity', '$DemandQuantity',  '$Unit','$day', '$month', '$year','$perUniCost')";
                           
                           $result = mysqli_query($conn,$sql);


          echo "success";
                           
                           
                           
                           
                           
						$conn->close();



?>

<?php
session_start(); // Starting Session

if(session_destroy()) // Destroying All Sessions
{
header("Location: BUREAU.php"); // Redirecting To Home Page
}
?>







