<?php 
	include 'connection.php';
	include '../phpcrudfiles/agentcrud.php';
	include '../phpcrudfiles/addresscrud.php';
	error_reporting(0);
	$agent_info = new agent_info($con);
	$agent_info->insert_info($_POST);

	
$address = new address($con);
$district_list = $address->getDistrictList();

 ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style type="text/css">
.form-style-10
{
	width:450px;
	padding:30px;
	margin:40px auto;
	background: #FFF;
	border-radius: 10px;
	-webkit-border-radius:10px;
	-moz-border-radius: 10px;
	box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
	-moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
	-webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
}
.form-style-10 .inner-wrap,.district,.area,.number{
	padding: 30px;
	background: #F8F8F8;
	border-radius: 6px;
	margin-bottom: 15px;
}
.form-style-10 h1{
	background: #2A88AD;
	padding: 20px 30px 15px 30px;
	margin: -30px -30px 30px -30px;
	border-radius: 10px 10px 0 0;
	-webkit-border-radius: 10px 10px 0 0;
	-moz-border-radius: 10px 10px 0 0;
	color: #fff;
	text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
	font: normal 30px 'Bitter', serif;
	-moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	-webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	border: 1px solid #257C9E;
}
.form-style-10 h1 > span{
	display: block;
	margin-top: 2px;
	font: 13px Arial, Helvetica, sans-serif;
}
.form-style-10 label{
	display: block;
	font: 13px Arial, Helvetica, sans-serif;
	color: #888;
	margin-bottom: 15px;
}
.form-style-10 input[type="text"],
.form-style-10 input[type="date"],
.form-style-10 input[type="datetime"],
.form-style-10 input[type="email"],
.form-style-10 input[type="number"],
.form-style-10 input[type="search"],
.form-style-10 input[type="time"],
.form-style-10 input[type="url"],
.form-style-10 input[type="password"],
.form-style-10 textarea,
.form-style-10 select {
	display: block;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	width: 100%;
	padding: 8px;
	border-radius: 6px;
	-webkit-border-radius:6px;
	-moz-border-radius:6px;
	border: 2px solid #fff;
	box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
	-moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
	-webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
}

.form-style-10 .section{
	font: normal 20px 'Bitter', serif;
	color: #2A88AD;
	margin-bottom: 5px;
}
.form-style-10 .section span {
	background: #2A88AD;
	padding: 5px 10px 5px 10px;
	position: absolute;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border: 4px solid #fff;
	font-size: 14px;
	margin-left: -45px;
	color: #fff;
	margin-top: -3px;
}
.form-style-10 input[type="button"], 
.form-style-10 input[type="submit"]{
	background: #2A88AD;
	padding: 8px 20px 8px 20px;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	color: #fff;
	text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
	font: normal 30px 'Bitter', serif;
	-moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	-webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	border: 1px solid #257C9E;
	font-size: 15px;
}
.form-style-10 input[type="button"]:hover, 
.form-style-10 input[type="submit"]:hover{
	background: #2A6881;
	-moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
	-webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
	box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
}
.form-style-10 .privacy-policy{
	float: right;
	width: 250px;
	font: 12px Arial, Helvetica, sans-serif;
	color: #4D4D4D;
	margin-top: 10px;
	text-align: right;
}
input,select,textarea:focus
{
	outline: 0px;
}

</style>
	<div class="form-style-10">
		<h1>Register as agent!<span>Fill up Deatils and be a part of spread smile!</span></h1>
		
		<form id="agent_registration_form" onsubmit="return false" enctype="multipart/form-data" >
			<div class="section"><span>1</span>Name</div>
			<div class="inner-wrap">
				<label>Your Full Name <span class="requirederr" id="nameerr" style="color:red;"></span><input type="text" id="name" name="name" fieldname="Full name" onblur="validation(this.id)" oninput="validation(this.id)" class="required" /></label>
			</div>

			

			<div class="section"><span>3</span>username and password</div>
			<div class="inner-wrap">
				<span id="errorbox"></span>
				<label>Username <span class="requirederr" id="usernameerr" style="color:red;"></span> <input type="text" id="username" name="username" fieldname="username" onblur="validation(this.id)" onchange="validation(this.id)" oninput="checkUserName()" class="required"/></label>
				<label>Password <span class="requirederr" id="passworderr" style="color:red;"></span><input type="password" id="password" name="password" fieldname="password" onblur="validation(this.id)" oninput="validation(this.id)" class="required" maxlength="6" minlength="6" placeholder="Enter 6 digit password by which u can log in" /></label>
			</div>

			<div class="section"><span>3</span>Email & Phone</div>
			<div class="inner-wrap">
				<label>Email Address <span class="requirederr" id="emailerr" style="color:red;"></span> <input type="email" id="email" name="email" fieldname="Email" onblur="validation(this.id)" oninput="validation(this.id)" class="required"/></label>
				<label>Phone Number <span class="requirederr" id="phone_noerr" style="color:red;"></span><input type="text" id="phone_no" name="phone_no" fieldname="phone no." onblur="validation(this.id)" oninput="validation(this.id)" class="required" /></label>
			</div>

			<div class="section"><span>4</span>Address</div>
			<div class="district">
				<label>City</label><span class="requirederr" id="districterr" style="color:red;"></span>
				<select id="district" fieldname="City" onblur="validation(this.id)" oninput="validation(this.id)" class="required" name="district_id">
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
				<select id="area" name="area_id" fieldname="Area" onblur="validation(this.id)" oninput="validation(this.id)" class="required">
					<option value="">----area----</option>
					<optgroup id="areamenu" label="area">

					</optgroup>
				</select>
			</div>
			<div class="inner-wrap">
				<label>Landmark <span class="requirederr" id="landmarkerr" style="color:red;"></span><textarea name="landmark" id="landmark" fieldname="landmark" onblur="validation(this.id)" oninput="validation(this.id)" class="required"></textarea></label>
			</div>

			<div class="section"><span>5</span>photo of agent</div>
			<div class="number">
				<div id="image_errorbox" style="color: red"></div>
				<span class="requirederr" id="agent_imageerr" style="color:red;"></span>
				<label><input type="file" name="agent_image" id="agent_image" fieldname="image" oninput="validation(this.id)" onchange="get_image()" class="required"></label>
				<img src="" height="100" width="100" id="output_image" alt="your image" style="display: none;">
			</div>
			<div class="button-section">
				<input type="submit" onclick="sendData()" name="submit"  />
			</div>	
		</form>
	</div>
<script type="text/javascript">

	$(document).ready(function(){
			
		$('#district').on('change',function(){
			$.ajax({
				url:"arealist.php",
				method:"post",
				data:{"district_id":$('#district').val(),"for":"agent"},
				success:function(mydata)
				{
					$('#areamenu').html(mydata);
				}
			});
		});
	});
	function checkUserName()
	{
		var username = $('#username').val();
		$.ajax({
			url:"usernamecheck.php",
			method:"post",
			data:{"action":"check","username":username},
			success:function(data)
			{
				$('#errorbox').html(data);
				if($('#errorbox').html()=="username is already exists")
				{
					$('#username').css('border','2px solid red');
					$('#errorbox').css('color','red');
				}
				else if($('#errorbox').html()=="username is valid")
				{
					$('#username').css('border','2px solid rgb(0,255,0)');
					$('#errorbox').css('color','rgb(0,255,0)');
				}	
			}
		});	 
	}
	function get_image()
	{ 

       	var files = $('#agent_image')[0].files[0];
        var output_image = document.getElementById('output_image');
		var type = files.type;
		var size = files.size;

		if(type=="image/png" || type=="image/jpg" || type=="image/jpeg")
		{
			if(size<=5242880)
			{
				output_image.src = URL.createObjectURL(files);
				$('#image_errorbox').html("");
				$('#output_image').show();
			}
			else
			{
				$('#image_errorbox').html("Insert file less than 5MB");
				output_image.src="";
				$('#agent_image').val("");
				$('#output_image').hide();
			}
		}
		else
		{
			$('#image_errorbox').html("given File is not valid type.");
			output_image.src="";
			$('#agent_image').val("");
			$('#output_image').hide();
		}	
	}


	function sendData()
	{
		var files = $('#agent_image')[0].files[0];
        var myform = document.getElementById('agent_registration_form');
        var formData = new FormData(myform);
		formData.append('agent_image',files);
		var obj = {};
		for (var key of formData.keys())
		{
			obj[key] = formData.get(key);
		}
		var errorbox_msg =  $('#errorbox').html();
		if(obj.name!="" && obj.username!="" && obj.password!="" && obj.email!="" && obj.phone_no!="" && obj.area_id!="" && obj.landmark!="" && obj.agent_image.name!="" && errorbox_msg!="username is already exists")
		{
			$.ajax({
					url:"agentregistration.php",
					method:"post",
					data:formData,
					contentType: false,
		            processData: false,
					success:function(mydata)
					{
						$.ajax({
							url:"login.php",
							method:"post",
							success:function(my_data)
							{
								$('#content').html(my_data);
							}
						});
					}
				});
		}
		else
		{
			formValidation('agent_registration_form');
		}

	}
</script>

 <script type="text/javascript" src="../javascript/formvalidation.js"></script>