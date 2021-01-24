<?php

$conn = mysqli_connect("localhost", "root", "", "hackathon");
		
if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
                       
                                               
                        $importCountry =$_POST['importCountry'];
                        $licence = $_POST['licence'];
                        $taxAmount =$_POST['totalCost'];
                        $myDate = $_POST['date']; 
                        $date = explode('-', $myDate);
                        $month =(int) $date[1];
                        $day   =(int) $date[2];
                        $year  = (int)$date[0];
                       $t = 'yes'; $ty = 'no';

                       $sq = "SELECT totalCost as d from ccie_nbr WHERE importerLicNo = '$licence' AND country = '$importCountry' AND day='$day' AND month = '$month' and year = '$year'";
                       $resul = $conn->query($sq);
                       $row = $resul->fetch_assoc();
                       $trt = $row['d'];
                       $sum = $trt + $taxAmount;
                       echo $sum."<br>";
                     
$sql = "UPDATE ccie_nbr set taxStatus = '$t', totalCost = '$sum' where taxStatus = '$ty' AND importerLicNo='$licence'  AND country= '$importCountry' AND  day='$day' AND month='$month' AND year ='$year'";   
                           $result = mysqli_query($conn,$sql);
                          

          echo "success". $result;
                           
                           
                           
                           
                           
						$conn->close();



?>








