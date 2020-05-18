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
$v1= $_POST['Room_no'];
if(empty($v1))
{

$msg="All the fields are required*";
 echo "<script type='text/javascript'> alert('$msg');</script>";
}
else
{
 $sql1="update rooms set availability=1 where room_no='$v1'";
 $res1=$conn->query($sql1);
 $sql2="select patient_ID from occupied_rooms where room_no='$v1'";
 $res2=$conn->query($sql2);
  $row=mysqli_fetch_array($res2);
 $v3=$row[0];
 $sql3="delete from patient where patient_ID='$v3'";
 $res3=$conn->query($sql3);
 $sql4="delete from occupied_rooms where room_no='$v1'";
 $res4=$conn->query($sql4);
 header('location:w2.html');
}

?>
</body>

</html>
