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
echo "yes";
die("Database connection failed:".$conn->connect_error());
}

$usrname=$_POST["username"];
$passwd=$_POST["password"];

$sql="select * from usertable where username='$usrname' and password='$passwd'";
$result=$conn->query($sql);

if($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
  header('location: w2.html');
}
else
{
 header('location: w11.html');
}
?>

    </body>
</html>
