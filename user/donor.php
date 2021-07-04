<?php 
include 'connection.php';
include '../phpcrudfiles/addresscrud.php';
include '../phpcrudfiles/donorcrud.php';
//for inserting district in district box
$address = new address($con);
$district_list = $address->avialableDistrictList();
//for submmiiting form
$donor = new donor($con);
$donor->insert_info($_POST,$con);
 ?>
 <style type="text/css">
 	
 </style>
 <div style="margin-top: 0px;position: relative;overflow-y: scroll;">
 	
	<div class="form-style-10">
		<h1>Donate Now!<span>Fill up Deatils and Donate!</span></h1>

		<form id="donationform" onsubmit="return false">
			<div class="section"><span>1</span>Name</div>
			<div class="inner-wrap">
				<label>Your Full Name <span class="requirederr" id="fullnameerr" style="color:red;"></span><input type="text" id="fullname" name="fullname" fieldname="Full name" onblur="validation(this.id)" oninput="validation(this.id)" class="required" /></label>
			</div>

			<div class="section"><span>2</span>Email & Phone</div>
			<div class="inner-wrap">
				<label>Email Address <span class="requirederr" id="emailerr" style="color:red;"></span> <input type="email" id="email" name="email" fieldname="Email" onblur="validation(this.id)" oninput="validation(this.id)" class="required"/></label>
				<label>Phone Number <span class="requirederr" id="phone_noerr" style="color:red;"></span><input type="text" id="phone_no" name="phone_no" fieldname="phone no." onblur="validation(this.id)" oninput="validation(this.id)" class="required" /></label>
			</div>

			<div class="section"><span>3</span>Address</div>
			<div class="district">
				<label>City</label><span class="requirederr" id="districterr" style="color:red;"></span>
				<select id="district" name="district_id" fieldname="City" onblur="validation(this.id)" oninput="validation(this.id)" class="required">
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

					</optgroup>
				</select>
			</div>
			<div class="inner-wrap">
				<label>Landmark <span class="requirederr" id="landmarkerr" style="color:red;"></span><textarea name="landmark" id="landmark" fieldname="landmark" onblur="validation(this.id)" oninput="validation(this.id)" class="required"></textarea></label>
			</div>

			<div class="section"><span>4</span>For how many person</div>
			<div class="number">
				<span class="requirederr" id="person_counterr" style="color:red;"></span>
				<label><input type="number" name="person_count" id="person_count" fieldname="count" onblur="validation(this.id)" oninput="validation(this.id)" class="required"></label>
			</div>
			<div class="button-section">
				<input type="submit" onclick="sendData()" name="submit" />
			</div>	
		</form>
	</div>
 	
 </div>
	<script type="text/javascript">

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
			var myform = document.getElementById('donationform');
	        var formData = new FormData(myform);
	        var obj = {};
			for (var key of formData.keys())
			{
				obj[key] = formData.get(key);
			}
			if(obj.fullname!="" && obj.email!="" && obj.phone_no!="" && obj.area_id!="" && obj.district_id!="" && obj.landmark!=""  && obj.person_count!="")
			{
				$('.loader').fadeToggle();
				$.ajax({
					url:"donor.php",
					method:"post",
					data:formData,
					cache : false,
					contentType: false,
		            processData: false,
					success:function(mydata)
					{
						$('#content').html(mydata);
						$('.loader').fadeToggle();
						alert('your donation is suuccesfully sent');
					}
				});
			}
			else
			{
				formValidation('donationform');
			}
		}
	</script>
