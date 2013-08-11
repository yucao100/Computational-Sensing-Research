<?php

session_start();
#session variable works for the cookie and holding data

?>

<!DOCTYPE html>
<html>
<head>
<title> graphPage</title>
<style type="text/css">
/*
#hiddenData {display:none;}
*/
</style>
</head>
<body>

<h1> Graph Page</h1>

<div id="hiddenData">


<?php

$i=0;
echo "<div id=\"GxData\">";


foreach($_SESSION['accelX'] as $gxData)
{

echo "<p> $gxData <br></p>";

$i++;
}

echo "</div>";
?>

</div>
<div id="graph">



</div>

</body>
<script type="text/javascript"> 

var length=<?php echo $_SESSION['dimensions']; ?>;

//Check to see if the length variable works
alert(length);



var GxPoints = new Array();
var j=0;
var i=1; var length;
var elementLocation=document.body.div("GxData").getElementsByTagName("p");
condition=elementLocation.nodeValue.length;
for(i;i!=condition;i++)
{
length=elementLocation[j].innerHTML.substring(0,i)


if(length.su

}

<?php



?>
</script>
</html>