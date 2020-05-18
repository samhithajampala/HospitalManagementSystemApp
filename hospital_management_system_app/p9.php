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
$v1= $_POST['patient_ID'];
$v2= $_POST['submit'];
$v3= $_POST['menu'];
if(empty($v1))
{

$msg="All the fields are required*";
 echo "<script type='text/javascript'> alert('$msg');</script>";
}
else
{
 if($v2)
{
 $sql1="select doc_charges from bill where patient_ID='$v1'";
 $res1=$conn->query($sql1);
 $row1=mysqli_fetch_array($res1);
 $v3=$row1[0];
 $sql2="select room_charges from bill where patient_ID='$v1'";
 $res2=$conn->query($sql2);
 $row2=mysqli_fetch_array($res2);
 $v4=$row2[0];
 $sql3="select medicine_charges from bill where patient_ID='$v1'";
 $res3=$conn->query($sql3);
 $row3=mysqli_fetch_array($res3);
 $v5=$row3[0];
 echo "Doctor charges are:";
 echo $v3;
 echo "<br><br>";
 echo "Room charges are:\r\n ";
 echo $v4;
echo "<br><br>";
 echo "Medicine charges are:\r\n ";
 echo $v5;
echo "<br><br>";
 $v6 = $v3 + $v4+$v5;
 echo "Total charges are:\r\n ";
 echo $v6;
}
else
{
 $sql4="delete from bill where patient_ID='$v1'";
 $res4=$conn->query($sql4);
 header('location:w2.html');
}
}

?>
</body>

</html>
