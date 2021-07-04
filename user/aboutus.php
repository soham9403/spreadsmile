<style>
	*
	{
		box-sizing: border-box;
	}
	#main{
		border: solid 5px black;
		border-radius: 5%;
		padding: 2.5%;
	}
	.motto{
		float: center;
				width: 90%; 
				padding: 15px; 
				text-align:justify;

	}
	p{
		text-align: center;
		font-size: x-large;

		
	}
	h2{
		text-align: center;
		font-size: x-large;
		color:purple;
	}
	.doner a{
		text-decoration: none;
	}
	.doner a:hover{
		color:#000;
		opacity: 0.7;
	}
	h1{
		color: green;
		text-align: center;
		font-size: xx-large;
	}
	h5{
		text-align: center;
		font-size: large;
		color: brown;
	}
	
		

	#hidden1,#hidden2{
		margin: 0px;
		
		height: 100%;
		display: none;
		width: 100%;
		z-index: 1;
		position: absolute;
		background-color: rgb(0,0,0,.8);
		border:2px solid white;
		border-radius: 50px;
	}
	#container
	{
		height: 50vh;
		width: 100%;
		
	}
	#containerpic1,#containerpic2{
		height: 100%;
		width: 45%;
		margin:0px;
		margin-left: 2.5%;
		float: left;
		position: relative;
		cursor: pointer;
		
	}
	.aboutusimages{
		height: 100%;
		width: 100%;
		border: 5px solid black;
		border-radius: 50px;
	}
	#containerpic1:hover #hidden1
	{
		display: block;
	}
	#containerpic2:hover #hidden2
	{
		display: block;
	}
	span{
		font-size: larger;
		text-decoration: underline;
		/* text-align: center; */
	}
</style>
	<div id="main">
		<div class="motto">

			<p>
				<span> Our VISION </span> <h2> preventing food waste</h2></p><p > and help the poor people who daily suffer for food.Hunger solutions minnesota works to end hunger in our city.we take action to assure food security for  all minnesotans by supporting programs and agencies that provide food to those in need,advancing,sound public policy,and guiding grassroots advocacy.
			</p>
			<h1 >
				Wasting Food is like stealing it from the needy.
			</h1>
		</div>
		<div class="doner">
			<h3 style="color:brown;margin-top: 2%;float: center;margin-left: 20%;margin-right:20%">Hunger seems like some big,insurmountable problem,but this is a fight we can win.while hunger may not go away overnight,we have the power to create real solutions if we work together.<br><br>we provides the right channels for compassionate citizens to begin and manage initiatives, that solve for hunger locally.As the only statewide anti-hunger organization whose services reach every country of minnesota,we are not only fighting against hunger today,but also finding long-term solutions to end hunger in the future. </h3></a>
		</div>
		<div id="container">
			<div id="containerpic1"> 
				<a href="pic1.php">
					<div id="hidden1">
						<p style="width:100%;position:absolute;top:45%;color:white">How to give food?</p>
					</div>
					<img src="../images/firstimage.jpeg"  class="aboutusimages">
				</a>
			</div>
			<div id="containerpic2"> 
				<a href="pic2.php">
					<div id="hidden2">
						<p style="width:100%;position:absolute;top:45%;color:white">What We do?</p>
					</div>
					<img src="../images/pic4.jpeg"  class="aboutusimages">
				</a>
			</div>		
		</div>
		<h2>
			Imagine..Like this How many people we can feed!!!
		</h2>
		<p>
			If you are intrested in our work then you can join us by doing volunteering.If we like Your work then we will provide some surprise gift! In every three months we are going to give some rewards also.By joining our team you will surely encourages us. Your contribution will go a long way in ensuring a reliable supply of meals for our daily wager community during the current lockdowns in the region.
		</p>

		<h5>
			If you want to know more about us you can contact us by given below number and find us any social media sites.
		</h5>
	</div>
