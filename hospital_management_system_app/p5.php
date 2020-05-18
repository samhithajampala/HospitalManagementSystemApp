<html>
<head>
<style>
body {background-color:skyblue;
              color:black;
}

table
{
 border-style:solid;
 border-width:2px;
 border-color:grey;
}

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
$v1= $_POST['specialisation'];
$v2= $_POST['Patient-id'];
$v3= $_POST['Doctor-id'];
$v4= $_POST['availability'];
$v5= $_POST['submit'];
if(empty($v1))
{

$msg="All the fields are required*";
 echo "<script type='text/javascript'> alert('$msg');</script>";
}
else
{

  if($v5)
{
   if(empty($v2) || empty($v3))
{

$msg="All the fields are required*";
 echo "<script type='text/javascript'> alert('$msg');</script>";
}
else
{
   $sql7="select availability from doctor where doctor_ID='$v3'";
  $res7=$conn->query($sql7);
  $sql8="select specialisation from doctor where doctor_ID='$v3'";
  $res8=$conn->query($sql8);
  $row4 = mysqli_fetch_array($res7);
  $v10=$row4[0];
 $row5 = mysqli_fetch_array($res8);
  $v11=$row5[0];
 if($v10!=1 || $v11!=$v1)
{

 if($v10!=1) 
 {
   
 echo "Sorry,This doctor is not available.";
  
 }
echo "<br>";
if($v11!=$v1)
 {echo "Sorry,This doctor doesn't have required specialisation in this field.";
   
 }
}
 else
{

 $sql11="select * from appointment where patient_ID='$v2'";
 $res11=$conn->query($sql11);
  if(mysqli_num_rows($res11) > 0)
{  
  
  echo "This patient is already appointed to another doctor";
  
}

 else
{
   $sql2="insert into appointment values('$v3','$v2')";
   $res2=$conn->query($sql2);
    $sql3="update doctor set availability=0 where doctor_ID='$v3'";
   $res3=$conn->query($sql3);
   $sql5="select consultant_fee from doctor where doctor_ID='$v3'";
   $res5=$conn->query($sql5);
  $row = mysqli_fetch_array($res5);
 $v9=$row[0];
  $sql6="select doc_charges from bill where patient_ID='$v2'";
  $res6=$conn->query($sql6);
  $row6 = mysqli_fetch_array($res6);
 $v10=$row6[0];
 $v20=$v9+$v10;
   $sql4="update bill set doc_charges='$v20' where patient_ID='$v2'";
   $res4=$conn->query($sql4);
  header('location:w2.html');
}
}
}
 }
else
{
  $sql1="select * from doctor where specialisation='$v1' and availability=1";
  $res1=$conn->query($sql1);
    if(mysqli_num_rows($res1) > 0)
{ 
        echo "<table border='1'>"; 
            echo "<tr>"; 
                echo "<th>Doctor's name  </th>";
                echo "<th>Doctor's ID     </th>"; 
                echo "<th>phone number     </th>"; 
                  echo "<th>gender       </th>"; 
                echo "<th>consultant fee    </th>"; 
            echo "</tr>"; 
        while($row = mysqli_fetch_array($res1))
{ 
            echo "<tr>"; 
                echo "<td>" . $row[1] . "</td>"; 
                echo "<td>" . $row[0] . "</td>"; 
                echo "<td>" . $row[2] . "</td>"; 
                echo "<td>" . $row[3] . "</td>"; 
                echo "<td>" . $row[5] . "</td>"; 
            echo "</tr>"; 
        } 
        echo "</table>"; 
        mysqli_free_result($res1); 
    }
 else{ 
        echo "No doctors are available in this specialisation"; 
    } 
  
}
}
?>
</body>

</html>
