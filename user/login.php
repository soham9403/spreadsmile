<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style type="text/css">


</style>
<div id="content">
	<div class="form-style-10" >
		<h1>login as agent!<span>Fill up Deatils for login</span></h1>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<form id="agent_registration_form" onsubmit="return false" enctype="multipart/form-data" >

			
			<div class="inner-wrap">
				<span id="username_errorbox" style="color: red"></span>
				<label>Username <span class="requirederr" id="usernameerr" style="color:red;"></span> <input type="text" id="username" name="username" fieldname="username" onblur="validation(this.id)" onchange="validation(this.id)" oninput="checkUserName()" class="required"/></label>
				<span id="password_errorbox" style="color: red"></span>
				<label>Password <span class="requirederr" id="passworderr" style="color:red;"></span><input type="password" id="password" name="password" fieldname="password" onblur="validation(this.id)" oninput="validation(this.id)" class="required" maxlength="6" minlength="6" placeholder="Enter 6 digit password" /></label>
			</div>

			<div class="button-section">
				<input type="submit" onclick="login()" name="submit"  />
			</div>
			<div style="border-top:2px dashed black;border-bottom: 2px dashed black;padding: 10px;text-align: center;margin:10px 0px; ">
				New registration
			</div>
			<div class="button-section">
				<button class="btn btn-primary" style="width: 100%;margin: 10px 0px;" onclick="signup()">sign up</button>
			</div>		
		</form>
	</div>
</div>
<script type="text/javascript">
	function login()
	{
		var username = $('#username').val();
		var password = $('#password').val();
		$.ajax({
			url:"usernamecheck.php",
			method:"post",
			data:{"action":"login","username":username,"password":password},
			success:function(data)
			{
				if(data=="password is wrong")
				{
					$('#password_errorbox').html(data);
					$('#username_errorbox').html("");
				}
				else if(data=="user name is wrong")
				{
					$('#username_errorbox').html(data);
					$('#password_errorbox').html("");
				}
				else if(data=="success")
				{
					$('#username_errorbox').html("");
					$('#password_errorbox').html("");
					$.ajax({
						url:"agentpage.php",
						method:"post",
						success:function(data_of_agentpage)
						{
							$("#content").html(data_of_agentpage);
						}
					});
				}

					
			}
		});	 
	}

	function signup()
	{
		$.ajax({
				url:"agentregistration.php",
				method:"post",
				success:function(data_of_registration)
				{
					$("#content").html(data_of_registration);
				}
			});
	}
</script>
<script type="text/javascript" src="../javascript/formvalidation.js"></script>