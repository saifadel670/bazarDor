<?php

$conn = mysqli_connect("localhost", "root", "", "hackathon");
		
if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
                       
                        $Product_Name = $_POST['Product_Name'];                        
                        $importCountry =$_POST['importCountry'];
                        $licence = $_POST['licence'];
                        $Quantity =$_POST['Quantity'];
                        $Unit  =$_POST['Unit'];
                        $totalCost = $_POST['totalCost'];
                        
                        
                        $myDate = $_POST['date']; 
                        $date = explode('-', $myDate);
                        $month = $date[1];
                        $day   = $date[2];
                        $year  = $date[0];
                        if($Unit == 'Kg'){
                            $tmp = 0.001;
                            $Quantity = $Quantity* $tmp;
                            echo $Unit." deamnd <br>";
                        }
                        $Unit = 'Matric Ton'; $no = 'no';

                        $sql = "INSERT INTO ccie_nbr (productName, importerLicNo , country, totalQuantity , unit, totalCost, day, month, year, taxStatus)
                            VALUES('$Product_Name', '$licence', '$importCountry', '$Quantity', '$Unit', '$totalCost','$day' ,'$month', '$year', '$no' )";
                           
                           $result = mysqli_query($conn,$sql);
                          

          echo "success";
						$conn->close();



?>






