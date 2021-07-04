<!DOCTYPE html>
<html>
<head>
	<title>Spread Smile</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--site icon -->
	<link rel="icon" href="../images/preloader.png">
	<!-- responsive layout -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="footer, address, phone, icons" />
	<!-- bootstrap4 -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  	<!-- icon --> 	
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
  	<!-- font family -->
  	<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
  	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  	<!-- external css -->
  		<!-- this file css -->
  		<link rel="stylesheet" type="text/css" href="../css/spreadsmile.css">
  		<!-- for all form applied css -->
	  	<link rel="stylesheet" type="text/css" href="../css/formstyle.css">
	  	
	  	
 <style type="text/css">
 	#content
 	{
 		transition: transform 1s linear,opacity 1s linear;
 		overflow-x: hidden;
 		padding-top: 60px;
 		margin: 0px;
 		position: relative;
 		background-color: #ffffd7;
 	}
 	.loader
 	{
 		background: url('../images/loader.gif') no-repeat center;
 		display: none;
        height: 100vh;
        width: 100%;
        margin: 0px;
        background-color: rgb(0, 0,0,.4);
        position: fixed;
        z-index:99999999999999999999;
 	}
 	.img01{
        align-self: center;
        width: 500px;
        height: 500px;
        margin-left: auto;
        margin-right: auto; 
        margin-top: 20vh;
        cursor: pointer;
        border-radius: 20px;
        border:2px inset black;
        box-shadow: 5px 5px 10px white,-5px -5px 10px white;
      }
      .modalss{
        display: none;
        cursor: pointer;
        height: 100vh;
        width: 100%;
        margin: 0px;
        background-color: rgb(0, 0,0,.9);
        position: fixed;
        z-index:99999999999999999999;
      }
 	@media screen and (max-width: 600px)
      {
        .img01
        {
          width: 80%;
          height: 50%;
          margin-top: 30%;
        }
      }
 </style>
</head>
<body style="overflow-x: hidden;"> 
	
	<div class="preloader" id="preloader" >
		<div class="preloaderimage">
			
		</div>
	</div>
	<div class="loader">
 		
 	</div>
 	<div class="modalss" id="modal01" onclick="this.style.display='none'" style="position: fixed;">
	  <img id="img01" class="img01"> 
	</div>
<?php 
include 'navbar.php';
?>
<!-- all pages will be loaded in this container -->
<div id="content">
	
</div>
<?php
include 'footer.php';
 ?>

 <!-- this file js -->
 <script type="text/javascript" src="../javascript/spreadsmile.js"></script>
 <!-- form validation file -->
 <script type="text/javascript" src="../javascript/formvalidation.js"></script>
 <!-- homepage js -->
 





</body>
</html>