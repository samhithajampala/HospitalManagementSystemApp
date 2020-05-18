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
$v1= $_POST['Patient-id'];
if(empty($v1))
{

$msg="All the fields are required*";
 echo "<script type='text/javascript'> alert('$msg');</script>";
}
else
{
 $sql1="select doctor_ID from appointment where patient_ID='$v1'";
 $res1=$conn->query($sql1);
 $row=mysqli_fetch_array($res1);
 $v2=$row[0];
 $sql2="delete from appointment where patient_ID='$v1'";
 $res2=$conn->query($sql2);
  $sql3="update doctor set availability=1 where doctor_ID='$v2'";
 $res3=$conn->query($sql3);
 
 header('location:w2.html');
}

?>
</body>

</html>
