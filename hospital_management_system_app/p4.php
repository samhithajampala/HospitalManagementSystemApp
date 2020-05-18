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
$v1= $_POST['Doctor-id'];
$v2= $_POST['Doctor-name'];
$v3= $_POST['Doctor-phone-number'];
$v4= $_POST['gender'];
$v5= $_POST['specialisation'];
$v6= $_POST['Consultant-fee'];
$sql1="select * from doctor where doctor_ID = '$v1'";
$res1=$conn->query($sql1);
if(empty($v1) ||empty($v2)||empty($v3)||empty($v5) ||empty($v4) || empty($v6))
{

$msg="All the fields are required*";
 echo "<script type='text/javascript'> alert('$msg');</script>";
}
else
{
  if($res1->num_rows > 0)
{
$row = $res1->fetch_assoc();
 $msg2="DoctorID already exists.Try another.";
 echo "<script type='text/javascript'> alert('$msg2');</script>";
}
else
{
 $sql="insert into doctor values('$v1','$v2','$v3','$v4','$v5','$v6',1)";
 $result=$conn->query($sql);
 header('location:w2.html');
}
}
?>
</body>

</html>
