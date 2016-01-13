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
		  
		  //Populate Selector
		  $.ajax({
			  url: "ajaxPopulateSelector.php",
			  success: function(data)
			  {
				  $("#RSOSelector").html(data);
			  }
		  });
		  
		  //Add Event
		  $("#EventCreateButton").click(function() {
			
			var eventName = $("#EventName").val();
			
			var eventDay = $("#EventDay").val();
			var eventMonth = $("#EventMonth").val();
			var eventYear = $("#EventYear").val();
			
			var eventDate = "" + eventYear + "-" + eventDay + "-" + eventMonth;
			
			var eventLocation = $("#EventLocation").val();
			var eventCategory = $("#EventCategory").val();
			var eventDesc = $("#EventDesc").val();
			var eventPrivacyLevel = $("#EventPrivacyLevel").val();
			var eventEmail = $("#EventEmail").val();
			var eventPhone = $("#EventPhone").val();
			var eventRSO = $("#RSOSelector :selected").text();
			
			
			if($.trim(eventName).length>0 && $.trim(eventLocation).length>0 && $.trim(eventCategory).length >0 &&
					$.trim(eventDesc).length>0 && $.trim(eventPrivacyLevel).length>0 && $.trim(eventEmail).length>0&&
					$.trim(eventPhone).length>0)
			{
			var dataString =  "eventname= " +eventName+ "&eventdate=" +eventDate+ "&eventlocation=" +eventLocation+
				"&eventcategory=" +eventCategory+ "&eventdesc=" +eventDesc+ "&eventprivacylevel=" +eventPrivacyLevel+
				"&eventemail=" +eventEmail+ "&eventphone=" +eventPhone+ "&eventrso=" +eventRSO;
			$.ajax({
					type: "POST",
					url: "ajaxCreateEvent.php",
					data: dataString,
					cache: false,
					success: function(data){
						if(data)
						{
							
							$("#ResponseMessage").text("Successfully created an Event!");
						}
						
						else
						{
							$("#ResponseMessage").text("Unable to register new event");
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
    <div class="col-sm-8">
      
	  <h1>Event Registration</h1>
			<h3>General Information</h3>
			Event Name<br>
			<input type = "text" id = "EventName"><br><br>
			Date (DD\MM\YYYY)<br>
					 <input type = "text" id = "EventDay" maxlength = "2" size = "2"> \ 
					 <input type = "text" id = "EventMonth" maxlength = "2" size = "2"> \ 
					 <input type = "text" id = "EventYear" maxlength = "4" size = "4"><br>
			Location<br>
			<input type = "text" id = "EventLocation" maxlength = "50" size = "25"><br>
			Category<br>
			<input type = "text" id = "EventCategory" maxlength = "25" size = "10"><br>
			Description<br>
			<textarea rows="4" cols="50" maxlength = "250" id = "EventDesc">Event Description
			</textarea><br>
			
			Privacy Level<br>
			<select id = "EventPrivacyLevel">
				<option value = "Public">Public</option>
				<option value = "Private">My University Only</option>
				<option value = "RSO">My RSO Only</option>
			</select><br>
			
			<h3>Contact Information</h3>
			Phone Number<br>
			<input type = "text" id = "EventPhone" maxlength = "10" size = "10"><br><br>
			Email Address<br>
			<input type = "text" id = "EventEmail"><br><br>
			RSO_Affiliation<br>
			<select id = "RSOSelector">
				<!-- Code to populate list with RSOs the user is associated with -->
			</select><br>
			
			<button id = "EventCreateButton"> Create Event</button><br>
			<p id = "ResponseMessage"></p>
	  
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