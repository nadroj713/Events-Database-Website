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
		  
		  $('#UniSubmitButton').click(function() {
			  
			/*var eventDay = $("#UniEventDay").val();
			var eventMonth = $("#UniEventMonth").val();
			var eventYear = $("#UniEventYear").val();
			
			var eventDate = "" + eventYear + "-" + eventDay + "-" + eventMonth;
			var dataString = "searchparam=" + $('#UniversityName').val() + "&eventname=" + $('$UniEventName').val() +
								"&eventdate=" +eventDate+ "&eventcategory=" + $('#UniEventCategory').val() +
								"&eventrso=" +$('#UniEventRSO').val();
								
			$.ajax({
				type: "POST",
				url:"ajaxLookUpEvent.php",
				cache: false,
				data: dataString,
				success: function(data)
				{
					
				}
			});*/
			
			$("#responseMessage").text("Currently Unfunctional. Search by Location");
								
		  });
			
		  $('#LocSubmitButton').click(function() {
			  
			if( $('#LocationName').val() )
			{
				var locationName = $('#LocationName').val();
				var dataString = "searchparam=" + locationName;				
				
				if( $('#LocEventDay').val() && $('#LocEventYear').val() && $('#LocEventMonth').val() )
				{
				var eventDay = $('#LocEventDay').val();
				var eventMonth = $('#LocEventMonth').val();
				var eventYear = $('#LocEventYear').val();
				var eventDate = "" + eventYear + "-" + eventDay + "-" + eventMonth;
				dataString = dataString + "&eventdate=" +eventDate;
				}
				
				
				if( $('#LocEventName').val() )
				{
				var eventName = $('#LocEventName').val();
				dataString = dataString + "&eventname=" + eventName;
				}
				
				
				if( $('#LocEventCategory').val() )
				{
				var eventCategory = $('#LocEventCategory').val();
				dataString = dataString + "&eventcategory=" + eventCategory;
				}
				
				
				if( $('#LocEventRSO').val() )
				{
				var eventRSO = $('#LocEventRSO').val();
				dataString = dataString + "&eventrso=" + eventRSO;
				}
							
				
				$.ajax({
					type: "POST",
					url:"ajaxLookUpEvent.php",
					cache: false,
					data: dataString,
					success: function(data)
					{
						if(data == false)
						{
							$('#responseMessage').text("Unable to find any matching Events");
							$('#LocTable').html("");
						}
						
						else
						{
							$('#LocTable').html(data); 	
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
		padding: 3px;
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
		
	#UniForm, #LocForm {
		display: none;
		}

	#headerButton{
		min-width: 100%;
		width:100%;
		margin: 5px
	}
	
	table, th, td {
		margin: 5px;
		padding: 3px;
		border: 1px solid black;
		text-align: center;
	}
  </style>
  
  <script type="text/javascript">
		var UniToggleVar = 0;
		var LocToggleVar = 0;
	
	  function UniToggle(){
	  
		if(UniToggleVar == 0)
		{
			document.getElementById("UniForm").style.display="block";
			UniToggleVar = 1;
		}
		
		else
		{
			document.getElementById("UniForm").style.display="none";
			UniToggleVar = 0;
		}
	  }
	  
	  
	  function LocToggle(){
	  
		if(LocToggleVar == 0)
		{
			document.getElementById("LocForm").style.display="block";
			LocToggleVar = 1;
		}
		
		else
		{
			document.getElementById("LocForm").style.display="none";
			LocToggleVar = 0;
		}
	  }
  
  </script>
  
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h1>Univents</h1>
    <p>Your first stop for Orlando Events</p> 
  </div>
  <div class="row">
    <div class="col-sm-8">
		<button id = "headerButton" type=button id=showUniFormButton onclick='UniToggle()'>Look Up Event By University</button></br>
		<div id = "UniForm">
		University<br>
		<input type = "text" id = "UniversityName"><br><br>
		<p>Optional Search Constraints</p><br>
		<p>Event Name: </p><input type = "text" id = "UniEventName"><br>
		<p>Event Date: </p><input type = "text" id = "UniEventDay" maxlength = "2" size = "2"> / 
					 <input type = "text" id = "UniEventMonth" maxlength = "2" size = "2"> / 
					 <input type = "text" id = "UniEventYear" maxlength = "4" size = "4"><br>
		<p>Event Category: </p><input type = "text" id = "UniEventCategory"><br>
		<p>Event's RSO Affiliation: </p><input type = "text" id = "UniEventRSO"><br>
		
		<button id = "UniSubmitButton">Submit</button><br>
		</div>
		
		
		<button id = "headerButton" type=button id=showLocFormButton onclick="LocToggle()">Look Up Event By Location</button>
		<div id = "LocForm">
		Location<br>
		<input type = "text" id = "LocationName" ><br><br>
		<p>Optional Search Constraints</p><br>
		<p>Event Name: </p><input type = "text" id = "LocEventName"><br>
		<p>Event Date: </p><input type = "text" id = "LocEventDay" maxlength = "2" size = "2"> / 
					 <input type = "text" id = "LocEventMonth" maxlength = "2" size = "2"> / 
					 <input type = "text" id = "LocEventYear" maxlength = "4" size = "4"><br>
		<p>Event Category: </p><input type = "text" id = "LocEventCategory"><br>
		<p>Event's RSO Affiliation: </p><input type = "text" id = "LocEventRSO"><br>
		<button id = "LocSubmitButton">Submit</button><br>
		
		<table id = "LocTable"></table>
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