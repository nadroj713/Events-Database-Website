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
  //Script to change USER to the username
  	  $(document).ready(function(){
		  
		  
		  //Hide Features Based on Access
		  $.ajax({
			  url: "ajaxHideFeatures.php",
			  cache: false,
			  success: function(data){
				  
				  if(data == "student")
				  {
					  $(".adminFeature").hide();
					  $(".superFeature").hide();
				  }
				  
				  else if(data == "admin")
				  {
					  $(".superFeature").hide();
				  }
			  }
		  });
		  
		  $('#UniCreateButton').click(function(){
			//Create University
			var UniName = $("#UniName").val();
			var UniLocation = $("#UniLocation").val();
			var UniDesc = $("#UniDesc").val();
			var NumStudents = $("#NumStudents").val();
			
			$("#responseMessage").text(dataString);
			if($.trim(UniName).length>0 && $.trim(UniDesc).length>0 && $.trim(UniDesc) && NumStudents >= 0)
			{
				var dataString = 'UniName=' +UniName+ '&UniLocation=' +UniLocation+ '&UniDesc=' +UniDesc+ '&NumStudents=' +NumStudents;
			
				$.ajax({
					type: "POST",
					url: "ajaxCreateUniversity.php",
					data: dataString,
					cache: false,
					success: function(data)
					{
						if(data)
						{
							window.location.href = "Home.php";
						}
						
						else
						{
							$("#responseMessage").text("Unable to create new university profile");
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
				
	#UniDesc{
				height: 100px;
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
    <div class="col-sm-8">
      
	  <h1>University Registration</h1>
			<h3>General Information</h3>
			University Name<br>
			<input type = "text" id = "UniName"><br><br>
			Location<br>
			<input type = "text" id = "UniLocation" maxlength = "50" size = "25"><br>

			Description<br>
			<textarea rows="4" cols="50" maxlength = "250" id = "UniDesc">
			</textarea><br>

			Number of Students<br>
			<input type = "text" id = "NumStudents" size = "15"><br>
			<p id = "responseMessage"></p><br>
			<button id = "UniCreateButton">Register University</button><br>
	  
    </div>
   
    <div class="col-sm-4">
		<p>Navigation</p>
		<ul>
		
		<li><a href="Home.php">Home Page</a></li>
		<li><a href="ELookUp.php">Look Up an Event</a></li>
		<li><a href="JoinRSO.php">Join an RSO</a></li>
		<li><a href="CreateRSO.php">Create a New RSO</a></li>
		<li class = "adminFeature"><a href="ECreate.php">Create a New Event</a></li>
		<li><a href="ERate.php">Comment on and Rate an Event</a></li>
		<li class = "superFeature"><a href="UniCreate.php">Register a New University</a></li>
		<li><a href="LogIn.php">Sign Out</a></li>
		
		</ul>
    </div>
	

  </div>
</div>

</body>
</html>