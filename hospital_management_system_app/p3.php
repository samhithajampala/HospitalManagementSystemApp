<html>
<head>
<style>
body {background-color:skyblue;
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
$v2= $_POST['Patient-name'];
$v3= $_POST['Patient-phone-number'];
$v4= $_POST['gender'];
$v5= $_POST['Patient-age'];
$v6= $_POST['Patient-health-issue'];
$sql1="select * from patient where patient_ID = '$v1'";
$res1=$conn->query($sql1);
if(empty($v1) || empty($v2)||empty($v4)||empty($v5)||empty($v6)||empty($v3) )
{

$msg="All the fields are required*";
 echo "<script type='text/javascript'> alert('$msg');</script>";
}
else
{
  if($res1->num_rows > 0)
{
$row = $res1->fetch_assoc();
 $msg2="PatientID already exists.Try another.";
 echo "<script type='text/javascript'> alert('$msg2');</script>";
}
else
{
 $sql="insert into patient values('$v1','$v2','$v3','$v4','$v5','$v6')";
 $result=$conn->query($sql);
 $sql1="insert into bill values('$v1',0,0,0)";
 $result1=$conn->query($sql1);
 header('location:w2.html');
}
}
?>
</body>

</html>
