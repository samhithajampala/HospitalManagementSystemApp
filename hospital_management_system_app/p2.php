<html>
<head>
<style>
body {background-color:#DFE2DB;
              color:black;}



</style>

</head>
<body>
<?php
$servername="localhost";
$username="root";
$password="1234";
$dbname="hospitals";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn->connect_error){
die("Database connection failed:".$conn->connect_error());
}
$b1= $_POST['reg_pat'];
$b2= $_POST['reg_doc'];
$b3= $_POST['book_room'];
$b4= $_POST['vac_room'];
$b5= $_POST['take_app'];
$b6= $_POST['dis_appo'];
$b7= $_POST['bill'];
$b8= $_POST['logout'];
$b9= $_POST['buy_medicine'];

if(($b1)) 
{
   header('location: w3.html');
}

if(($b2)) 
{
   header('location: w4.html');
}

if(($b3)) 
{
   header('location: w7.html');
}
if(($b4)) 
{
   header('location: w8.html');
}
if(($b5)) 
{
   header('location: w5.html');
}
if(($b6)) 
{
   header('location: w6.html');
}
if(($b7)) 
{
   header('location: w9.html');
}
if(($b8)) 
{
   header('location: w1.html');
}
if(($b9)) 
{
   header('location: w12.html');
}

?>

</body>

</html>
