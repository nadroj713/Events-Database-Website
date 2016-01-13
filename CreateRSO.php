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
		  
		$('#CreateRSOButton').click( function() {
			
			var newRSOName = $('#RSO_Name').val();
			var dataString = "rso_name=" +newRSOName;
			
			$.ajax({
				
				type: "POST",
				url: "ajaxCreateRSO.php",
				data: dataString,
				cache: false,
				success: function(data){
					
					if(data){
						$('#responseMessage').text("Successfully queued to create " +newRSOName);
					}
					
					else{
						$('#responseMessage').text("Regestration unsuccessful. Either this RSO already exists or you have already queued for this RSO");
					}
				}
			});
			
			
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
    <div class="col-sm-8">
      <h3>Type in the RSO you would like to Create</h3>
	  <input type = "text" id = "RSO_Name"><br><br>
	  
	  <p>You will be notified if the requisite number of members have applied and/or the RSO is approved.</p>
	  <p>If you are the first student request the creation of this RSO, you will be selected as the RSO's administrator.</p>
	  <p>The RSO administrator can be changed after the RSO's creation. Please plan accordingly.</p>
	  <p id = "responseMessage"></p>
	  <button id = "CreateRSOButton">Request to Create RSO</button>
	  
	  
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