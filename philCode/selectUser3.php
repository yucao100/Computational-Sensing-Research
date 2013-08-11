<?php
#makes a cookie for where to store the data and session variables.
session_start();
header('Content-Type: application/json');
$user ="Philip";
$pass = "CS220lab";
$hostname = "107.20.150.132";
$dbselect="android";

$link=mysqli_connect($hostname,$user,$pass,$dbselect);


$month = $_POST['Month'];
$user = $_POST['User'];
$ADL = $_POST['adlActual'];
$year=$_POST['Year'];
$mins=$_POST['minutes'];
$hrs=$_POST['time'];
#converts month from a name to a number
$month = date('m',strtotime($month));

#This will get the numerical representation of the month

echo "The user from the post data is $user <br>";
#we use mktime to convert the month and year to a unix timestamp.
echo mktime(0,0,0,$month,0,$year), "<br>";





$sqlQuery="SELECT DataItem.Gx,DataItem.Gy,DataItem.Gz,User.Name FROM DataItem join DataEvent on DataItem.DataEventID = DataEvent.DataEventID join User on DataEvent.USER_ID=User.UserID where User.Name = '$user'";
# and where MONTH(FROM_UNIXTIME(PositionStart)) = $month and where YEAR(FROM_UNIXTIME(PositionStart))= $year and where ADLActual = $ADL";



$fetchInfo = mysqli_query($link, $sqlQuery);

echo mysqli_error($link);

$data_points=array();

while($row = mysqli_fetch_assoc($fetchInfo))
{

$points=array("X" => (float)$row['Gx'], "Y" => (float)$row['Gy'], "Z" => (float)$row['Gz']);

array_push($data_points,$points);

}

echo json_encode($data_points, JSON_NUMERIC_CHECK);


#echo "<p> If you want to go back to the previous page click <a href=".$_SERVER['HTTP_REFERER'].">here</a></p>";

#json_encode($GxArray);

mysqli_close($link);
header('Location:graphingData.php');
?>