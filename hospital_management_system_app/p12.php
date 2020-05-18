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
$v1= $_POST['selection'];
$v2= $_POST['Medicine-id'];
$v3= $_POST['Quantity'];
$v4= $_POST['availability'];
$v5= $_POST['submit'];
$v16= $_POST['Patient-id'];
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
  $sql11="select cost from medicine where medicine_ID='$v2'";
 $res11=$conn->query($sql11);
 $row11 = mysqli_fetch_array($res11);
 $v11=$row11[0];
 $v13=$v11*$v3;
 $sql13="select medicine_charges from bill where patient_ID='$v16'";
 $res13=$conn->query($sql13);
 $row13 = mysqli_fetch_array($res13);
 $v14=$row13[0];
 $v15=$v14+$v13;
  $sql15="update bill set medicine_charges='$v15' where patient_ID='$v16'";
 $res15=$conn->query($sql15);
  header('location:w2.html');
}
 }
else
{
  $sql1="select * from medicine where name='$v1'";
  $res1=$conn->query($sql1);
    if(mysqli_num_rows($res1) > 0)
{ 
        echo "<table border='1'>"; 
            echo "<tr>"; 
                echo "<th>Medicine-ID  </th>";
                echo "<th>Medicine-name    </th>"; 
                echo "<th>dose     </th>"; 
                  echo "<th>cost      </th>"; 
            echo "</tr>"; 
        while($row = mysqli_fetch_array($res1))
{ 
            echo "<tr>"; 
                echo "<td>" . $row[0] . "</td>"; 
                echo "<td>" . $row[1] . "</td>"; 
                echo "<td>" . $row[2] . "</td>"; 
                echo "<td>" . $row[3] . "</td>"; 
            echo "</tr>"; 
        } 
        echo "</table>"; 
        mysqli_free_result($res1); 
    }
}
}
?>
</body>

</html>
