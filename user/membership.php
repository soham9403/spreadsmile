<?php 
include 'connection.php';
include '../phpcrudfiles/addresscrud.php';
include '../phpcrudfiles/monthly_donorcrud.php';
$monthly_donor = new monthly_donor($con);
$monthly_donor->insert_info($_POST);


$address = new address($con);
$district_list = $address->avialableDistrictList();

 ?>
    <style type="text/css">
		
		.para{
			font-family:  'Hoefler Text', Georgia, 'Times New Roman', serif;
 			font-weight: normal;
        	font-size: 1.75em;
 			letter-spacing: .2em;
			line-height: 1.1em;
 			text-align: justify;
 			text-align: center;
 			text-transform: uppercase;
 			word-wrap: break-word;
 			width: 100%;
 			padding: 20px;
			display: block;
			color: peru;
		}
		h1 { 
			color: #d54d7b;
			font-family: "Great Vibes", cursive; 
			font-size: 50px; 
			line-height: 50px; 
			font-weight: normal; 
			margin-bottom: 100px; 
			margin-top: 0px; 
			 /* text-align: center;
			 float: left;  */
			text-shadow: 0 1px 1px #fff; 
		}
		.heading,.thank{
			text-align: center;
			width: 100%;
			margin: 10px;
		}
		.memebrshipcontent
		{
			width: 40%;
			margin-bottom: 80px;
			float: left;
		}

		.form-style-10
		{
			box-sizing: border-box;
			float: left;
			margin-left: 10%;
			border: 2px solid black;
		}
		#membershipform
		{
			display: none;
		}
		.openMembershipbtn
		{
			cursor: pointer;
		}
		.openMembershipbtn:hover
		{
			color: black;
		}
		@media screen and (max-width:900px) 
		{
			.memebrshipcontent
			{
				width: 100%;
			}
			.form-style-10
			{
				width: 70%;
				margin-right: 15%;
				margin-left: 15%;
			}

		}
		@media screen and (max-width:460px) 
		{
			.memebrshipcontent
			{
				width: 100%;
			}
			.form-style-10
			{
				width: 90%;
				margin-left: 5%;
			}
		}
</style>
<div class="memebrshipcontent">
	<div class="heading">
		<h1>It's Time to <br>Score on <br>Hunger!</h1>
	</div>
	<div class="para" id="para">
		<p><span class="span">In Membership of our organization,</span></br> 
		<span class="span">We'll collect food from the member monthly.</span><br>
		<span class="span">You can choose various type of food while registering.</span><br>
		<span class="span"> On the first day of every month,</span><br>
		<span class="span"> agent will come to your door to collect food.</span></p>
	</div>
	<div class="thank">
		<h1>THANKS for GIVING!!!</h1>
	</div>

</div>

<div class="form-style-10">
	<h1 class="openMembershipbtn">Be a Member Now!<span>Fill up Deatils!</span></h1>
	<form id="membershipform" onsubmit="return false">
		<div class="section"><span>1</span>Name</div>
		<div class="inner-wrap">
			<label>Your Full Name <span class="requirederr" id="fullnameerr" style="color:red;"></span><input type="text" id="fullname" name="fullname" fieldname="Full name" onblur="validation(this.id)" oninput="validation(this.id)" class="required" /></label>
		</div>

		<div class="section"><span>2</span>Email & Phone</div>
		<div class="inner-wrap">
			<label>Email Address <span class="requirederr" id="emailerr" style="color:red;"></span> <input type="email" id="email" name="email" fieldname="Email" onblur="validation(this.id)" oninput="validation(this.id)" class="required"/></label>
			<label>Phone Number 1<span class="requirederr" id="phone_no1err" style="color:red;"></span><input type="text" id="phone_no1" name="phone_no1" fieldname="phone no." onblur="validation(this.id)" oninput="validation(this.id)" class="required" /></label>
			<label>Phone Number 2<span class="requirederr" id="phone_no2err" style="color:red;"></span><input type="text" id="phone_no2" name="phone_no2" fieldname="phone no." onblur="validation(this.id)" oninput="validation(this.id)" class="required" /></label>
		</div>

		<div class="section"><span>3</span>Permanent Address</div>
		<div class="district">
			<label>City</label><span class="requirederr" id="districterr" style="color:red;"></span>
			<select id="district" fieldname="City" name="district_id" onblur="validation(this.id)" oninput="validation(this.id)" class="required">
				<option value="">----district----</option>
				<optgroup id="districtmenu" title="district" translate="true" label="district">
					<?php 
					foreach ($district_list as $key => $value) 
					{
					?>
						<option value="<?php echo $value['district_id'];  ?>"><?php echo $value['district'];  ?></option>
					<?php
					}
					 ?>
				</optgroup>
			</select>
		</div>
		<div class="area" >
			<label>Area</label><span class="requirederr" id="areaerr" style="color:red;"></span>
			<select id="area" fieldname="Area" name="area_id" onblur="validation(this.id)" oninput="validation(this.id)" class="required">
				<option value="">----area----</option>
				<optgroup id="areamenu" label="area">
					<option value="">--select city first--</option>
				</optgroup>
			</select>
		</div>
		<div class="inner-wrap">
			<label>Landmark <span class="requirederr" id="landmarkerr" style="color:red;"></span><textarea name="landmark" id="landmark" fieldname="landmark" onblur="validation(this.id)" oninput="validation(this.id)" class="required"></textarea></label>
		</div>

        <div class="section"><span>4</span>What can you donate?</div>
        <div>
            
            <label for="wheat"><input type="checkbox" name="wheat" id="wheat" value="wheat">Wheat</label>
        </div>
        <div>
            <label for="rice"><input type="checkbox" name="rice" id="rice" value="rice">Rice</label>  
        </div>
        <div>
            <label for="Beans"><input type="checkbox" name="Beans" id="Beans" value="Beans">Beans</label>  
        </div>
        <div>
            <label for="Fruit"><input type="checkbox" name="Fruit" id="Fruit" value="Fruit">Fruit</label>  
        </div>
        <div>
            <label>Other:</br>
            <input type="text" id="other" name="other"></label>  
        </div>

		<div class="button-section">
			<input type="submit" onclick="sendData()" name="submit" />
		</div>	
	</form>
</div>
<script type="text/javascript">
	$('.openMembershipbtn').click(function(){

		$('#membershipform').slideToggle(1000);

	});
	$(document).ready(function(){
			
		$('#district').on('change',function(){
			$.ajax({
				url:"arealist.php",
				method:"post",
				data:{"district_id":$('#district').val(),"for":"donor"},
				success:function(mydata)
				{
					$('#areamenu').html(mydata);
				}
			});
		});
	});

	function sendData()
	{
		var myform = document.getElementById('membershipform');
        var formData = new FormData(myform);
        var obj = {};
		for (var key of formData.keys())
		{
			obj[key] = formData.get(key);
		}
		console.log(obj);
		if(obj.fullname!="" && obj.email!="" && obj.phone_no1!="" && obj.phone_no2!=""  && obj.district_id!="" && obj.landmark!="" && obj.other!="")
		{
			$('.loader').fadeToggle();
			$.ajax({
				url:"membership.php",
				method:"post",
				data:formData,
				cache : false,
				contentType: false,
	            processData: false,
				success:function(mydata)
				{
					$('#content').html(mydata);
					$('.loader').fadeToggle();	
				}
			});
		}
		else
		{
			formValidation('membershipform');
		}
	}
</script>