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
		  
		  
		  //Fill User Name
		  $.ajax({
					url: "ajaxName.php",
					success: function(data){
						
							$("#UserWelcome").text("Welcome, " + data);
					}
					
		  });
		  
		  //Fill Events Table
		  $.ajax({
			  url: "ajaxLookUpTables.php",
			  success: function(data){
				  
				  $("#EventsTable").html(data);
			  }
		  }); 
		  
		  
			// Fill RSO List
			$.ajax({
				  url: "ajaxLookUpRSO.php",
				  success: function(data){
					  
					  $("#RSOList").html(data);
				  }
			  });
			
		
	  });
  //Script to look up all affiliated RSOs and put them in an unordered list
  //Script to look up Public events, along with events affiliated with the same RSOs as the student
	//And then put them in a table based on date
  
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
	
	table{
		table-layout: fixed;
		width 100%;
	}
	
	table, th, td {
		margin: 5px;
		padding: 3px;
		border: 1px solid black;
		text-align: center;
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
      <h3 id = "UserWelcome">Welcome, USER</h3>
	  
	 <br><br>
	
	  
	  <p>Affiliated RSOs</p>
	  <ul id = "RSOList">
	  </ul>
	  
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
	<div class="container">
		 <p>Upcoming Events</p>
		  <p id = "EventsTable" style="width:100%">
		  </p>
	  
	</div>
	
	<br>
	<p id = "testMessage"></p>


  </div>
</div>



</body>
</html>