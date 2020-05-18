<html>
<head>
<style>
body {background-color: skyblue;
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
$v6= $_POST['type'];
$v1= $_POST['room_no'];
$v2= $_POST['Patient-id'];
$v3= $_POST['no_of_days'];
$v4= $_POST['availability'];
$v5= $_POST['submit'];

if(empty($v6))
{

$msg="All the fields are required*";
 echo "<script type='text/javascript'> alert('$msg');</script>";
}
else
{
  if($v5)
{
   if(empty($v2) || empty($v3) || empty($v1))
{

$msg="All the fields are required*";
 echo "<script type='text/javascript'> alert('$msg');</script>";
}
else
{

    $sql6="select type from rooms where room_no='$v1'";
   $res6=$conn->query($sql6);
   $sql7="select availability from rooms where room_no='$v1'";
   $res7=$conn->query($sql7);
  $row6=mysqli_fetch_array($res6);
 $row7=mysqli_fetch_array($res7);
$v10=$row6[0];
$v11=$row7[0];
 if($v11!=1 || $v10!=$v6)
{

 if($v11!=1) 
 {
   
 echo "Sorry,This room is not available.";
  
 }
echo "<br>";
if($v10!=$v6)
  
 {
echo "sent";
echo $v6;
echo "room";
echo $v10;
echo "Sorry,This room is not of required type.";
   
 }
}
else
{
   $sql2="insert into occupied_rooms values('$v1','$v2','$v3')";
   $res2=$conn->query($sql2);
    $sql3="update rooms set availability=0 where room_no='$v1'";
   $res3=$conn->query($sql3);
   $sql5="select rent from rooms where room_no='$v1'";
   $res5=$conn->query($sql5);
  $row = mysqli_fetch_array($res5);
 $v9=$row[0];
 
 $v10 = $v9 * $v3;
   $sql4="update bill set room_charges='$v10' where patient_ID='$v2'";
   $res4=$conn->query($sql4);
  header('location:w2.html');
}
}
 }
else
{
  $sql1="select * from rooms where type='$v6' and availability=1";
  $res1=$conn->query($sql1);
    if(mysqli_num_rows($res1) > 0)
{ 
        echo "<table border='1'>"; 
            echo "<tr>"; 
                echo "<th>Room No.</th>";
                echo "<th>Rent</th>"; 
            echo "</tr>"; 
        while($row = mysqli_fetch_array($res1))
{ 
            echo "<tr>"; 
                echo "<td>" . $row[0] . "</td>"; 
                echo "<td>" . $row[1] . "</td>"; 
            echo "</tr>"; 
        } 
        echo "</table>"; 
        mysqli_free_result($res1); 
    }
 else{ 
        echo "No available rooms of this type."; 
    } 
  
}
}
?>
</body>

</html>
