<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script>
	  $(document).ready(function(){
		$('#RegisterButton').click(function(){
		
		
		var username = $("#UserName").val();
		var userpass = $("#UserPass").val();
		var useremail = $("#UserEmail").val();
		var dataString = 'username='+username+'&password='+userpass+'&email='+useremail;
		
			if($.trim(username).length>0 && $.trim(userpass).length>0)
			{
				
				
				$.ajax({
					type: "POST",
					url: "ajaxRegister.php",
					data: dataString,
					cache: false,
					success: function(data){
						if(data)
						{
							window.location.href = "LogIn.php";
						}
						
						else
						{
							$("#responseMessage").text("Unable to register new account");
						}
						
				}
				});
			
		}
	  });
  
	  });
  
  </script> 
  <style>
	body {
		background-color: gray;
	}
	
	.row{
		min-height:100%;
		height: 100%;
		background-color: white;
	}
	.jumbotron{ background-image: url("background.jpg");
				background-size: 100% 100%;
				background-repeat: no-repeat; }
				
	.jumbotron h1{ color: white;
					}
	.jumbotron p{	color: white;
					}
					

  </style>
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h1>Univents</h1>
    <p>Your first stop for Orlando Events</p> 
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-5">
      
	  <h3>Student Registration</h3>
			Username<br>
			<input type = "text" id = "UserName"><br><br>
			Password<br>
			<input type = "text" id = "UserPass"><br><br>
			Email Address<br>
			<input type = "text" id = "UserEmail"><br>
			<p id = "responseMessage"></p><br>
			
			<button id = "RegisterButton" >Register</button><br>
			<a href="LogIn.php">Already have an account?</a><br>
	  
    </div>
   
    
	

  </div>
</div>

</body>
</html>