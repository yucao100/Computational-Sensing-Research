<?php
/*
# This syntax will allow you to connect to mysql remotely
$user ="Philip";
$pass = "CS220lab";
$hostname = "107.20.150.132";
$dbselect="android";
/* Changing to localhost you have to be connected remotely and from the remote session use localhost to connect to mySQL */
#$hostname="localhost";
/*
$link = mysqli_connect($hostname,$user,$pass,$dbselect);

if(!$link)
{
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

 echo "Success logging in with $user "  .  mysqli_get_host_info($link) . "<br><br>";
 
 //closing the link early caused the connection to mysql to end prematurely
 //effecting the mysqli_query();
 #mysqli_close($link);

 
 $sqlStatement ='SELECT  DataItem.Gx , DataItem.Gy , DataItem.Gz FROM DataItem ';
 
 $result=mysqli_query($link, $sqlStatement);
 
 if(! $result)
 {
 
 die('Unable to get data from the mysql Database check your query and your table schema.' . mysqli_error($link). "\n");
 
 
 }
 else
 {
 echo "Just before while loop <br><br>";
  $GxArray=array();
  $GyArray=array();
  $GzArray=array();
  
 
 while($row=mysqli_fetch_assoc($result))
 {
echo "Inside while loop \n";
	  
	  #pushes data inside of the G* arrays.
      array_push($GxArray,$row['Gx']);
	  array_push($GyArray,$row['Gy']);
	  array_push($GzArray,$row['Gz']);
	  
	  /*
 echo "Entry Below " . "\n".
      "Gx FLOAT : {$row['Gx']} ,<br>" . "\n" .
	  "Gy FLOAT : {$row['Gy']}, <br>" . "\n" .
	  "Gx FLOAT : {$row['Gz']}, <br>" . "\n" .
	  "----------------------------------------------- <br>" ;
	 

	  */
	  
	  # This is the code to store values in different arrays to pass into javascript
	  
	  
	  
	  /*
	  $GxArray[]=$row['Gx'];
	  $GyArray[]=$row['Gy'];
	  $GzArray[]=$row['Gz'];
	  
	  */
	  
	  
	  
	  
	  /*echo

	  count($GxArray), count($GyArray), count($GzArray) . "<br>";
	  echo "empty($GxArray), empty($GyArray), empty($GzArray) . \"<br>";
      
	  $_POST[$GxArray];
	  $_POST[$GyArray];
	  $_POST[$GzArray];
	  */
	  
	  #another idea
	  /*
	  GxArray=array($_POST["$row['Gx']"]);
	  GyArray=array($_POST["$row['Gy']"]);
	  GzArray=array($_POST["$row['Gz']"]);
	  
	  echo "Printing X data points " . print_r($GxArray) . "&nbsp";
	  echo "Printing Y data points " . print_r($GyArray) . "&nbsp";
	  echo "Printing Z data points " . print_r($GzArray) . "&nbsp";
 */
 #}
 /*
 #verifies if there is data in the array.
 if(!empty($GxArray))
	  {
	  
	  $GxLength=count($GxArray)-1;
	  
	  }
  else 
  {
  
  echo 'GxLength is empty'."<br>";
  }
  if(!empty($GyArray))
	  {
	  
	  $GyLength=count($GyArray)-1;
	  
	  }
  else 
  {
  
  echo 'GyLength is empty'."<br>";
  }
  if(!empty($GzArray))
	  {
	  
	  $GzLength=count($GzArray)-1;
	  
	  }
  else 
  {
  
  echo 'GzLength is empty'."<br>";
  }
  
  #checks to see if there is data inside of the Arrays
   echo "<br><br>The value length of x is: $GxLength, \" <br><br>The length of y is: $GyLength, \" <br><br>The length of Z is : $GzLength";
   echo "The X values are <br>" ;
   echo print_r($GxArray);
   echo "<br><br>The Y values are <br>" ;
   echo  print_r($GyArray);
  
  echo "<br>Fetched Data successfully\n";
 mysqli_close($link);
 
 //end of else
 }
 #echo "Fetched Data successfully\n";
 #mysqli_close($link);
*/
?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Data Visualization for Clinical Decision Support - UTC REU 2012</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<!-- 1140px Grid styles for IE -->
	<!--[if lte IE 9]><link rel="stylesheet" href="1140_CssGrid_2/css/ie.css" type="text/css" media="screen" /><![endif]-->

	<!-- The 1140px Grid - http://cssgrid.net/ -->
	<link rel="stylesheet" href="1140_CssGrid_2/css/1140.css" type="text/css" media="screen" />
	
	<!-- Your styles -->
	<link rel="stylesheet" href="1140_CssGrid_2/css/styles.css" type="text/css" media="screen" />
	
	<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
	<script type="text/javascript" src="1140_CssGrid_2/js/css3-mediaqueries.js"></script>

<script src="mrdoob-three.js-46c0a84\build\Three.js"></script>
<script src="jquery-1.7.2.min.js"></script>
<script src="rainbowvis.js"></script>
<script src="jqueryFileTree/jqueryFileTree.js"></script>
<script src="freqdec-fd-slider-4cd0633/js/fd-slider.js"></script>
<script src="TrackballControlsCustom.js"></script>
<script src="jquery.scrollTo-1.4.2-min.js"></script>

<link href="jqueryFileTree/jqueryFileTree.css" rel="stylesheet" type="text/css" media="screen" />
<link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
<link href="freqdec-fd-slider-4cd0633/css/fd-slider.css" rel="stylesheet" type="text/css" media="screen" />

	<script type="text/javascript">
    	var globalClock = new THREE.Clock(); //Main clock to sync all visualizations to
    	var pause = false;
    	var storedTime; //For pausing
    	animMultiplier = 10; // Adjust to speed up/slow down animation
		var dataLength = 100;

		//Scale factor for size of visualization panels
		visPanelFactor = 0.4;

		//Load the visualization panels
	    $(document).ready( function() {
	        $.get("kinect.html", {}, function(pgData){
	        	$("#kinect").html(pgData);
	        });
	        $.get("ecg.html", {}, function(pgData){
	        	$("#ecg").html(pgData);
	        });
	        $.get("eeg.html", {}, function(pgData){
	        	$("#eeg").html(pgData);
	        });
	        $.get("gait.html", {}, function(pgData){
	        	$("#gait").html(pgData);
	        });
	        $.get("fall.html", {}, function(pgData){
	        	$("#fall").html(pgData);
	        });

	        //Hide the file picker and credits
	    	$('#filepick').hide();
	    	$('#credits').hide();

	    	//file loader
	    	var location = window.location.pathname;
        	var path = location.substring(1, location.lastIndexOf('/')+1);
	        $('#filepick').fileTree({ root: 'PatientData/', script: 'jqueryFileTree/connectors/jqueryFileTree.php', multiFolder: false }, function(file) { 
	        		if (file.substring(0,1) != 'x') { //Check for non-data-folder flag
	        			//Load all the data for all the visualizations
		                kinectSubfolder = file;
		                kinectLoadCoords();

			            eegFolder = file;
			            loadEEGdata();

			            gaitFolderpath = file;
			            loadGaitData();

			            fallDataFolder = file;
	            		fallLoadData();

	            		ecgDataFolder = file;
	            		ecgloadData(replaceTimeline); //when it's done loading, replace the timeline
	        		}

	        }, true, path); //True to only show folders

	        //Create timeline slider
			createSlider();


	    });

		function replaceTimeline() {
    		//Replace the timeline slider with one having an appropriate length for the new data
    		dataLength = heartrates.length;
    		fdSlider.destroySlider('timelineForm');
    		$('.fd-slider').remove();
			createSlider();
		}

	    function advanceTime() {
        	//Move the slider
        	if (!pause) {
        		var time = globalClock.getElapsedTime();
	        	$("#timelineForm").val(time *animMultiplier );
	        	fdSlider.updateSlider('timelineForm');
        	}

        	//Reset slider when it gets to the end
        	if ($("#timelineForm").val() >= dataLength) {
        		$("#timelineForm").val("0.0");
        		fdSlider.updateSlider('timelineForm');
        		globalClock = new THREE.Clock(); //Reset the clock
        	}

        	//Continue animation
        	window.requestAnimationFrame(advanceTime);
	    }

	    //Toggle timeline auto-advancing
	    function toggleTime() {
	    	if (pause) {
	    		globalClock.start();
	    	} else {
	    		globalClock.stop();
	    	}
	    	pause = !pause;
	    }

	    function createSlider() {
			fdSlider.createSlider({
			  // Associate the slider with the form element 
			  inp:document.getElementById("timelineForm"),
			  // A minimum value of 5
			  min:0,
			  // A maximum value of 15
			  max: dataLength,
			  // A step/increment of 0.2
			  step:1,
			  // Hide the input box
			  hideInput:true,
			  //
			  forceValue:true
			});

		    //Kickstart timeline
		    advanceTime();
	    }
	</script>

</head>


<body>
<noscript id="critical">
<p> This site requires javascript inorder to work </p>
</noscript>
<div class="container">
	<div class="row">
		<div class="twelvecol last">
			<a href="#"><span id="loadLink"><b>Load</b></span></a>
			<h1>Data Visualization for Clinical Decision Support</h1>
		</div>
	</div>
</div>

<div class="fileDialog">
    <div id="filepick" class='fileselect'></div>
</div>

<script type="text/javascript">
    $('#loadLink').click( function() { //Toggle the file selection dialog
        $('#filepick').toggle();
    });
</script>

<div class="container">
	<div class="row">
		<div class="fourcol" id="kinect">
		</div>
		<div class="fourcol" id="ecg">
		</div>
		<div class="fourcol last" id="eeg">
		</div>
	</div>
</div>

<div class="container bottom">
	<div class="row">
		<div class="fourcol" id="fall">
		</div>
		<div class="fourcol" id="gait">
		</div>
		<div class="fourcol last" id="notesContainer">
			<span id="notes">
				<p>Click and drag to move camera.<br/><br/>
				Press <b>Spacebar</b> to revert all cameras to their original camera positions.<br/><br/>
				<span id="creditsLink"><a href="#">Credits</a></span></p>
			</span>
			<span id="credits"><p>
				Developed by Chris Lenk, under direction from Dr. Yu Cao at the University of Tennessee in Chattanooga during the summer of 2012.<br/><br/>

				This app uses the following frameworks and libraries:<br/>
				- <a href="http://webgl.org/">WebGL</a> - low-level 3D graphics API<br/>
				- <a href="http://mrdoob.github.com/three.js/">Three.js</a> - 3D library that makes working with WebGL a lot easier<br/>
				- <a href="http://jquery.com/">jQuery</a> - very useful JavaScript library<br/>
				- <a href="http://github.com/anomal/RainbowVis-JS/">RainbowVis</a> - library for color gradients, used in EEG visualization<br/>
				- <a href="http://abeautifulsite.net/blog/2008/03/jquery-file-tree/">jQuery File Tree</a> - jQuery plugin for file selection<br/>
				- <a href="http://github.com/freqdec/fd-slider/">FD-Slider</a> - HTML5 range element polyfill, used for the timeline slider<br/>
				- <a href="http://flesler.blogspot.com/2007/10/jqueryscrollto.html">jQuery ScrollTo</a> - jQuery plugin for scrolling to particular part of the page<br/>
				- <a href="http://cssgrid.net/">1140 CSS Grid</a> - Fluid grid layout<br/><br/>

				The following Three.js tutorials were used to learn the library, and some of my code is based off of them:<br/>
				- <a href="http://aerotwist.com/tutorials/getting-started-with-three-js/">Getting Started With Three.js</a> by Paul Lewis<br/>
				- <a href="http://fhtr.org/BasicsOfThreeJS/">Basics of Three.js</a> by Ilmari Heikkinen<br/>
				- <a href="http://learningthreejs.com/blog/2012/01/20/casting-shadows/">Casting Shadows</a> by Jerome Etienne<br/>
				- <a href="http://learningthreejs.com/blog/2011/08/30/window-resize-for-your-demos/">Window Resize for Your Demos</a> by Jerome Etienne<br/>
				- <a href="http://96methods.com/2012/02/three-js-importing-a-model/">Three.js: Importing a Model</a> by Graham Blake<br/>
				- <a href="http://kadrmasconcepts.com/blog/2011/06/06/three-js-blender-2-5-ftw/">Three.js + Blender 2.5 = FTW</a> <br/>
				- <a href="http://kadrmasconcepts.com/blog/2011/06/08/three-js-blender-part-2/">Three.js + Blender Part 2</a><br/>
				- <a href="http://kadrmasconcepts.com/blog/2012/01/24/from-blender-to-threefab-exporting-three-js-morph-animations/">From Blender to Threefab. Exporting three.js morph animations</a><br/>
				- <a href="http://catchvar.com/threejs-animating-blender-models/">Three.js - Animating Blender Models</a><br/>
				- The many examples at the <a href="http://mrdoob.github.com/three.js/">official Three.js site</a><br/><br/>

				The following Blender tutorials were used to learn basic 3D modeling and to create the models in the app:<br/>
				- <a href="http://cgcookie.com/blender/get-started-with-blender/">Get Started With Blender</a><br/>
				- <a href="http://en.wikibooks.org/wiki/Blender_3D:_Noob_to_Pro/">Blender 3D: Noob to Pro</a><br/>
				- <a href="http://liquidblue.com.br/2010/11/01/modelling-a-simple-heart-in-blender-2-54/">Modelling a simple heart in Blender 2.54</a> by Sergio Moura<br/>
				- <a href="http://wiki.blender.org/index.php/Doc:2.6/Manual/Your_First_Animation/1.A_static_Gingerbread_Man/">Your First Animation in 30 plus 30 Minutes Part I</a><br/>
				- <a href="http://wiki.blender.org/index.php/Doc:2.4/Tutorials/Animation/BSoD/Character_Animation/">Blender Summer of Documentation Character Animation tutorial</a><br/><br/>

				The app also uses the <a href="http://ir-ltd.net/infinite-3d-head-scan-released/">head model released by Lee Perry-Smith</a><br/><br/>

				<a href="#" id="creditsClose">Close</a>
			</p></span>
		</div>
	</div>
</div>

<script>
	//Toggle the credits dialog
	$('#creditsLink').click( function() {
		$('#kinect').toggle();
		$('#ecg').toggle();
		$('#eeg').toggle();
		$('#fall').toggle();
		$('#gait').toggle();

		$('#notes').hide();
		$('#credits').show();
		
        $('#notesContainer').toggleClass('fourcol twelvecol');
	});
	$('#creditsClose').click( function() {
		$('#kinect').toggle();
		$('#ecg').toggle();
		$('#eeg').toggle();
		$('#fall').toggle();
		$('#gait').toggle();

		$('#notes').show();
		$('#credits').hide();

        $('#notesContainer').toggleClass('fourcol twelvecol');
	});
</script>
<p><a href="visualization.html" title="click here to go to see visualization"> Visualization </a></p>
<div class="container" id="timeline">
	<div class="row">
		<p>
			<a href="#"><img src="icons/pause.png" id="pause"></a>
       		<script>
				$('#pause').click( function() {
					toggleTime();
				});
			 </script>

       		<input type="text" name="timelineForm" id="timelineForm" value="0" />
       	</p>
	</div>
</div>

<div id=getInfo">
<form action="selectUser3.php" method="POST" enctype="multipart/form-data">

<?php

$user ="Philip";
$pass = "CS220lab";
$hostname = "107.20.150.132";
$dbselect="android";

$getUSER='SELECT DISTINCT Name FROM User ';
$getACTUAL='SELECT DISTINCT ADLActual FROM DataEvent';
#$unixTime;

#$Filter='SELECT DataEvent.ADLActual,DataItem.Gx, DataItem.Gy, DataItem.Gz from DataItem join DataEvent on DataItem.DataEventID=DataEvent.DataEventID join User on DataEvent.User_ID=User.UserID WHERE USER = '. "$_POST['user']";
$link = mysqli_connect($hostname,$user,$pass,$dbselect);

if(!$link)
{
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

 echo "Success logging in with $user "  .  mysqli_get_host_info($link) . "<br><br>";

 $result=mysqli_query($link, $getUSER);
 $result2=mysqli_query($link,$getACTUAL);
 if(! $result)
 {
 
 die('Unable to get data from the mysql Database check your query and your table schema.' . mysqli_error($link). "\n");
 
 
 }
else
{
echo "<fieldset>";
 echo "<select name='User'>";
 while($row=mysqli_fetch_assoc($result))
 {
 
    if(isset($row['Name']))
    echo "<option value=" .$row['Name'].">". $row['Name'] ."</option>";
	else
	continue;

 }
echo "</select>","<br /><br />" ;


echo "<br><br />";
echo "<select name='adlActual'>";
while($row=mysqli_fetch_assoc($result2))
{

echo "<option value=".$row['ADLActual']."\">". $row['ADLActual'] ."</option>"; 

}

echo "</select>";
}


?>

<br /> <br />
<select name="Month">
<option value="january"> January</option>
<option value="february"> Februrary</option>
<option value="march"> March</option>
<option value="april"> April</option>
<option value="may"> May</option>
<option value="june"> June</option>
<option value="july"> July</option>
<option value="august"> August</option>
<option value="september"> September</option>
<option value="october"> Ocotober</option>
<option value="november"> November</option>
<option value="december"> December</option>
</select>

<!-- <select name="Year">  -->

<?php

#does a year comparision between when the database started year 2013 until the current Year
$i=2013;
do
{
echo "<select name='Year'>";
echo "<option value=$i> $i </option>";
$i++;
}
while($i<date(Y));

echo "</select>";
?>

<select name="time">
<option value="00">12AM </option>
<option value="01">1AM </option>
<option value="02">2AM </option>
<option value="03">3AM </option>
<option value="04">4AM </option>
<option value="05">5AM </option>
<option value="06">6AM </option>
<option value="07">7AM </option>
<option value="08">8AM </option>
<option value="09">9AM </option>
<option value="10">10AM </option>
<option value="11">11AM </option>
<option value="12">12PM </option>
<option value="13">1PM </option>
<option value="14">2PM </option>
<option value="15">3PM </option>
<option value="16">4PM </option>
<option value="17">5PM </option>
<option value="18">6PM </option>
<option value="19">7PM </option>
<option value="20">8PM </option>
<option value="21">9PM </option>
<option value="22">10PM </option>
<option value="23">11PM </option>
</select>

<?php

echo "<select name='minutes'>";
$min=00;


for($min; $min<=59;$min++)
{
if(strlen($min)==1)
{

$min2="0$min";
echo "<option value=\"$min2\"> $min2 </option>";


}
else
{
echo "<option value=\"$min\"> $min </option>";

}
}
echo "</select><br></fieldset>";

?>



<!-- </select> -->
<input type="submit" value="submit" />
</form>
<script type="text/javascript" src="ajaxCal.js"></script> 
<script type="text/javascript" src="ajax.js"> </script>
</div>
</body>


<script type="text/javascript" src=" ">

</script>
<script type="text/javascript">



var bottom = getElementbyId('graph');
bottom.createElement('canvas').setAttribute(id,map);
bottom.setAttribute(width, '100%');
bottom.setAttribute(height, '250px');


</script>



</html>

