<?php

$conn = mysqli_connect("localhost", "root", "", "hackathon");
		
if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
                       
                        $Product_Name = $_POST['Product_Name'];
                        $price= $_POST['price'];
                        
                        $type = $_POST['type'];  echo $type."----";
                        $Chottogram = $_POST['Chottogram'];
                        $Barishal = $_POST['Barishal'];
                        $Rajshahi = $_POST['Rajshahi'];
                        $Shylet = $_POST['Shylet'];
                        $Khulna = $_POST['Khulna'];
                        $Rangpur = $_POST['Rangpur'];
                        $Mymensingh = $_POST['Mymensingh'];
                        $Dhaka = $_POST['Dhaka'];
                        
                        $myDate = $_POST['date']; 
                        $date = explode('-', $myDate);
                        $month = $date[1];
                        $day   = $date[2];
                        $year  = $date[0];

$Division = array('dhaka', 'chottogram','barishal','rajshahi','shylet','khulna','rangpur','mymensingh' );
$rate = array($Dhaka, $Chottogram, $Barishal, $Rajshahi, $Shylet, $Khulna, $Rangpur, $Mymensingh);
for($i=0; $i<8; $i++){
   echo "<br>".$Division[$i].$rate[$i];

$sq = "SELECT COUNT(product) as cnt FROM product where type='$type' AND product = '$Product_Name'AND area= '$Division[$i]'";
$resul = $conn->query($sq);
$row = $resul->fetch_assoc();
   echo " 1st :".$row['cnt']." ";

if ($row['cnt'] > 0) {

   if($price == 'wholesellPrice'){
   $sql=  "UPDATE product set  wholesellPrice  = '$rate[$i]',type='$type', day= '$day', month= '$month', year = '$year' WHERE area = '$Division[$i]' AND product = '$Product_Name'";
      }
      else{
         $sql=  "UPDATE product set retailPrice  = '$rate[$i]',type='$type', day= '$day', month= '$month', year = '$year' WHERE area = '$Division[$i]' AND product = '$Product_Name'";
      }
   $result = mysqli_query($conn,$sql);
   echo " 2nd :".$result." ";
   }
   
 
else { 
   if($price == 'wholesellPrice'){

                       $sql1 = "INSERT INTO product (product,type, wholesellPrice, area, day, month, year)
                                    VALUES ('$Product_Name','$type', '$rate[$i]', '$Division[$i]', $day,$month,$year)";
   }else{
      $sql1 = "INSERT INTO product (product,type, retailPrice, area, day, month, year)
                                    VALUES ('$Product_Name','$type', '$rate[$i]', '$Division[$i]', $day,$month,$year)";
   }   
                           
                         $result1 = mysqli_query($conn,$sql1);

                         echo " 3rd :".$result1." ";
          echo "success";

}      
 }                        

						$conn->close();

?>








