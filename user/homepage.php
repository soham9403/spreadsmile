<!-- home page css -->
<link rel="stylesheet" type="text/css" href="../css/homepage.css">
<style type="text/css">
	.imagecontainer
	{
	}
	
	@media screen and (max-width:450px) 
	{
		
	}
</style>

	<div class="image_main_container" style="">
		<div class="imagecontainer">
			<div class="imagebox" style="box-sizing: content-box;margin: 0 0 0 0;opacity: 1;">
				<img src="../images/slide3.jpg" class="image" alt="image cant load">
			</div>
			<div class="imagebox right" style="margin: 0% 0% 0% 100%;">
				<img src="../images/slide22.jpg" class="image" alt="image cant load">
			</div>
			<div class="imagebox right">
				<img src="../images/slide1.jpg" class="image" alt="image cant load">
			</div>
			<div class="imagebox right" style="margin: 0% 0% 0% -100%">
				<img src="../images/slide4.jpg" class="image" alt="image cant load">
			</div>		
		</div>
		<div class="slideshowbtn" style="left: 0" onclick="slideshow('back')">
				<i class="fa fa-angle-double-left"></i>
			</div>
			<div class="slideshowbtn" style="right: 0" onclick="slideshow('next')">
				<i class="fa fa-angle-double-right"></i>
			</div>	
	</div>


	<div class="Content container-fluid">

        <div class="content1 container">
        	<div class="text-center">
        		<h1 id="heading1">Why To Donate?<img src="../images/think.png" width="100px"></h1>
	            <p>
	                In India, 40% of food produced is wasted. <br>It is further estimated that the value of the food wasted is Rs.92,000 Crores in annum.<br>UN has reported that about 190 million Indians remain undernourished and<br> around 1.2 million childern are dying of hunger, while we throw away food.<br>
	                So, We all have to pledge that we all start to prevent food wastage and help the needy people.
	            </p>	
        	</div>
        </div>
        <div class="content2 container">
        	<div class="text-center">
        		<h1 id="heading2">What we do?<img src="../images/stairing.png" width="100px"></h1>
	            <p>
	                Wasting Food is like stealing it from the needy...<br>
	                So here is the SOLUTION.😎<br>
	                We are collecting food from you and our agent will give that to needy and poor people.
	                <br>
	                So, like this we could stop wasting food and..
	                <br>
	                    Imagine..Like this How many people we could feed!!!
	            </p>
        	</div>       
        </div>
    </div>

    <script type="text/javascript">
    	var hei = $(window).height()-60;

    	$('.imagecontainer').css('height',hei+"px")
    	
    </script>
    <script type="text/javascript" src="../javascript/homepage.js"></script>
