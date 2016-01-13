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
   function refreshTables(){
			
			var dataString = "eventname=" +$('#EventSelector').val();
			$.ajax({
				type: "POST",
				data: dataString,
				url: "ajaxDisplayComments.php",
				success: function(data){
					
					$('#CommentsHeading').show();
					$('#CommentsTable').html(data);
					
				}
			});
			
			$.ajax({
				type: "POST",
				data: dataString,
				url: "ajaxDisplayStars.php",
				success: function(data){
					
					$('#StarsHeading').show();
					$('#StarsTable').html(data);
					
				}
			});
			
			$('#RateInterface').show();
			
		}
   
   
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
		  
		//Populate Events Selector
		$.ajax({
			url: "ajaxPopulateEventSelector.php",
			cache: false,
			success: function(data){
				$('#EventSelector').html(data);
			}
			
			
		});
		
		
		$('#EventButton').click(function(){
			
			var dataString = "eventname=" +$('#EventSelector').val();
			$.ajax({
				type: "POST",
				data: dataString,
				url: "ajaxDisplayComments.php",
				success: function(data){
					
					$('#CommentsHeading').show();
					$('#CommentsTable').html(data);
					
				}
			});
			
			$.ajax({
				type: "POST",
				data: dataString,
				url: "ajaxDisplayStars.php",
				success: function(data){
					
					$('#StarsHeading').show();
					$('#StarsTable').html(data);
					
				}
			});
			
			$('#RateInterface').show();
			
		});
		
		$('#SubmitButton').click(function(){
			var eventName = $('#EventSelector').val();
			var Comment = $('#EventComment').val();
			dataString = "comment=" + Comment + "&eventname=" + eventName;
			$.ajax({
				type: "POST",
				data: dataString,
				url: "ajaxAddComment.php",
				cache: false,
				success: function(data)
				{
					refreshTables();
				}
				
			});
			
		});
		
		$('#StarsSubmitButton').click(function(){
			var eventName = $('#EventSelector').val();
			var Stars = $('#EventStarRating option:selected').text();
			dataString = "stars=" + Stars + "&eventname=" + eventName;
			$.ajax({
				type: "POST",
				data: dataString,
				url: "ajaxAddStar.php",
				cache: false,
				success: function(data)
				{
					refreshTables();
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
					
	#RateInterface, #CommentsHeading, #StarsHeading{
		display: none;
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
     
		<h3>Event Name</h3>
		<select id = "EventSelector">
		</select>
		<button id = "EventButton">Select</button>

	
	<div id = "EventTables">
	<h3 id = "CommentsHeading">Comments</h3>
	<table id = "CommentsTable"></table>
	
	<h3 id = "StarsHeading">Events</h3>
	<table id = "StarsTable"></table>
	</div>
	
	<div id = "RateInterface">
	 <h3>Rate Event</h3>

		Stars
		<br>
		<select id = "EventStarRating">
			<option value = "1">1</option>
			<option value = "2">2</option>
			<option value = "3">3</option>
			<option value = "4">4</option>
			<option value = "5">5</option>
		</select><br>
		<button id = "StarsSubmitButton">Submit</button>
		<br>
		Comment<br>
		<textarea rows="4" cols="50" maxlength = "250" id = "EventComment">
			</textarea><br>
		<button id = "SubmitButton">Submit</button>
		</div>
	     <p id = "responseMessage"></p>
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