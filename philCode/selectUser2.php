<?php
#makes a cookie for where to store the data and session variables.
session_start();
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

function reponse($value)
{



}
#$sqlQuery="DataItem.Gx,DataItem.Gy,DataItem.Gz FROM DataItem JOIN DataEvent on DataEvent.DataEventID=DataItem.DataEventID join User on User.UserID=DataEvent.User_ID where User.Name in( Select User.Name from DataItem join DataEvent on DataEvent.DataEventID = DataItem.DataEventID join User on User.UserID=DataEvent.User_ID where User.Name=$user);";


$sqlQuery="SELECT DataItem.Gx,DataItem.Gy,DataItem.Gz,User.Name FROM DataItem join DataEvent on DataItem.DataEventID = DataEvent.DataEventID join User on DataEvent.USER_ID=User.UserID where User.Name = '$user'";
# and where MONTH(FROM_UNIXTIME(PositionStart)) = $month and where YEAR(FROM_UNIXTIME(PositionStart))= $year and where ADLActual = $ADL";


#$sqlQuery="SELECT DataItem.Gx,DataItem.Gy,DataItem.Gz,User.Name FROM DataItem join DataEvent on DataItem.DataEventID = DataEvent.DataEventID join User on DataEvent.USER_ID=User.UserID where User.Name = '$user'";
/*
$sqlQuery = >>>EOF

SELECT Gx,Gy,Gz FROM DataItem join DataItem on DataItem.DataEventID = DataEvent.DataEventID join DataEvent on
DataEvent.USER_ID=User.UserID where Name = $user 
and where MONTH(FROM_UNIXTIME(PositionStart)) = $month and where YEAR(FROM_UNIXTIME(PositionStart))= $year

EOF;

*/
$fetchInfo = mysqli_query($link, $sqlQuery);
#var_dump($fetchInfo);
//echo "<br><br>$fetchInfo";
echo mysqli_error($link);
$GxArray=array();
$GyArray=array();
$GzArray=Array();
$data_points=array();
$i=0;
while($row = mysqli_fetch_assoc($fetchInfo))
{

$points=array("X" => (float)$row['Gx'], "Y" => (float)$row['Gy'], "Z" => (float)$row['Gz']);
array_push($GxArray, (float)$row['Gx']);
array_push($GyArray, (float)$row['Gy']);
array_push($GzArray, (float)$row['Gz']);

array_push($data_points,$points);
$i++;
}
//gets the length of the array and assigns it into a variable
$GxLength=count($GxArray);
$GxLength=count($GyArray);
$GxLength=count($GzArray);
echo json_encode($data_points, JSON_NUMERIC_CHECK);

#echo $GxLength;
#echo var_dump($GxArray);
#echo var_dump($row), "<br>";
echo "<p> If you want to go back to the previous page click <a href=".$_SERVER['HTTP_REFERER'].">here</a></p>";
/*
$GxArray=json_encode($GxArray);
$GyArray=json_encode($GyArray);
$GzArray=json_encode($GzArray);
$_SESSION['graphData']=array($GxArray,$GyArray,$GzArray);
$_SESSION['graphData']=json_encode($_SESSION['dimensions']);
*/

/*
$_SESSION['accelX']=array(json_encode($GxArray));
$_SESSION['accelY']=array(json_encode($GyArray));
$_SESSION['accelZ']=array(json_encode($GzArray));
$_SESSION['accelXLength']=$GxLength;
$_SESSION['accelYLength']=$GyLength;
$_SESSION['accelZLength']=$GzLength;
#$_SESSION['graphData']=array($_SESSION['accelXLength'],$_SESSION['accelYLength'],$_SESSION['accelZLength']);

$_SESSION['dimensions']=$i;

*/
#creates the redirect to the graphPage
#header('Location:graphPage.php');

//echo this into javascript
json_encode($GxArray);

mysqli_close($link);
?>

<!DOCTYPE HTML>
<html>
<head>
<title> Graphing PHP </title>
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/canvasjs.js"> </script>
<script type="text/javascript">


$(document).ready(function (){
$.getJSON("

</script>
</head>



<body>
<div id="canvasGraph" name="canvas">


</div>


</body>



<script> 


var GxData=JSON.parse("<?php echo json_encode($GxArray); ?>");
alert(GxData.toSource());
alert(GxData.length);
var GxDataPoints=new Array();
for (var result in GxData)
{

if(GxData.hasOwnProperty(result))
{

GxDataPoints.push(GxData[res

}


}


</script>
</html>