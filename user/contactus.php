<?php 
	include 'connection.php';
	include '../phpcrudfiles/feedbackcrud.php';
	$feedback = new feedback($con);
	$feedback->insert_feedback($_POST);

 ?>
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
	.h1{
		width: 100%;
		background-color: brown;
		color: white;
		padding: 10px;
		text-align: center;
	}
	#mapcontainer
	{
		width: 60%;height: 50vh;border: 2px solid black;margin-left: auto;margin-right: auto;
		border-radius: 10px;
	}
	.selectedStar
	{
		display: none;
	}
</style>
<h1 class="h1"  >Our head department location</h1>

<div id="mapcontainer" style="">
	
</div>


<h1 class="h1" style="margin-top: 20px;">Please give your feedback to us</h1>

<div class="form-style-10">
<h1>Feedback <span>Please Provide your feedback below!</span></h1>
	<form id="feedbackform" onsubmit="return false">
        <div><h4>Your thoughts, concerns and problems are important to us.<br>Share them here so we can make it better for you!</h4></div>
        <div class="section"><span>1</span>Name</div>
		<div class="inner-wrap">
            <label>Your Name:<input type="text" name="name"></label>
        </div>
        <div class="section"><span>2</span>Rate Us!</div>
		<div class="starcontainer">
			<span class="star">
				<img src="../images/star.png" height="50" width="50" class="selectedStar" onclick="starSelect(1)">
				<img src="../images/blankstar.png"  height="50" width="50" class="notSelectedStar" onclick="starSelect(1)">
			</span>			
			<span class="star">
				<img src="../images/star.png" height="50" width="50" class="selectedStar" onclick="starSelect(2)">
				<img src="../images/blankstar.png"  height="50" width="50" class="notSelectedStar" onclick="starSelect(2)">
			</span>
			<span class="star">
				<img src="../images/star.png" height="50" width="50" class="selectedStar" onclick="starSelect(3)">
				<img src="../images/blankstar.png"  height="50" width="50" class="notSelectedStar" onclick="starSelect(3)">
			</span>
			<span class="star">
				<img src="../images/star.png" height="50" width="50" class="selectedStar" onclick="starSelect(4)">
				<img src="../images/blankstar.png"  height="50" width="50" class="notSelectedStar" onclick="starSelect(4)">
			</span>
			<span class="star">
				<img src="../images/star.png" height="50" width="50" class="selectedStar" onclick="starSelect(5)">
				<img src="../images/blankstar.png"  height="50" width="50" class="notSelectedStar" onclick="starSelect(5)">
			</span>
		</div>

        <input type="hidden" name="feedback_star" id="feedback_star">
        <div class="section"><span>3</span>Message</div>
        <div class="inner-wrap">
		    <label>Message For us:<textarea name="feedback_msg" id="feedback_msg"></textarea></label>
            <label>Any Suggestion?<textarea name="feedback_sugg" id="feedback_sugg"></textarea></label>
        </div>
        <div class="button-section">
            <input type="submit" name="submit" value="POST" id="submit" onclick="sendData()">
        </div>
	</form>
</div>






<script type="text/javascript">
var zoomimg = 13;
function initMap() 
{
  var markerlocations = {lat: 23.001907, lng: 72.653914}; 
  var mapcontainer = document.getElementById('mapcontainer');
  var map = new google.maps.Map(mapcontainer, {zoom: 13, center: markerlocations,gestureHandling: 'none',
          zoomControl: false});

   var icon = {
			    url: "../images/marker.png", // url
			    scaledSize: new google.maps.Size(50, 50), // scaled size
			    origin: new google.maps.Point(0,0), // origin
			    anchor: new google.maps.Point(0, 0) // anchor
			};

	// for marker
  var marker = new google.maps.Marker({position: markerlocations, map: map,icon:icon});
  var infowindow = new google.maps.InfoWindow({
	  content:"<img src='../images/logo.png' height='100' width='100'>"
	  
	});

  google.maps.event.addListener(marker, 'dblclick', function() {infowindow.open(map,marker);});
 	google.maps.event.addListener(marker, 'click', function() {
  		zoomimg+=2;
		var pos = map.getZoom();
		map.setZoom(zoomimg);
		map.setCenter(marker.getPosition());
		window.setTimeout(function() {map.setZoom(pos);},3000);
	});
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDN1ovwHfmWSRpYN0v2OUj24BeP-miH9s4&callback=initMap"></script>
<script type="text/javascript">
	function starSelect(id)
	{
		$('#feedback_star').val(id);
		$('.selectedStar').hide();
		$('.notSelectedStar').show();		
		for(var i=0;i<id;i++)
		{
			$('.selectedStar').eq(i).show();
			$('.notSelectedStar').eq(i).hide();
		}
	}

	function sendData()
	{
		var myform = document.getElementById('feedbackform');
        var formData = new FormData(myform);
       $('.loader').fadeToggle();
			$.ajax({
				url:"contactus.php",
				method:"post",
				data:formData,
				cache : false,
				contentType: false,
	            processData: false,
				success:function(mydata)
				{
					$('.loader').fadeToggle();
					$('#content').html(mydata);
					alert('Thank you for your feedback');
				}
			});
		
	}
</script>
