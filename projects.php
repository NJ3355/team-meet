<?php 
  require_once 'php/session.php';
  


?>

<!DOCTYPE html>
<html>
<head>
<title></title>

<link rel="stylesheet" type="text/css" href="CSS/jquery-ui.min.css"/>
<link rel="stylesheet" type="text/css" href="CSS/projectscss.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="JavaScript/jquery-ui.min.js"></script>





<script type="text/javascript">
$(document).ready(function() { 
	$('#newProject').dialog(
	{
		resizeable: false,
		draggable: false,
		modal: true,
		autoOpen: false,
		hide: 'blind'
	});
	
	$('#show').click(function(){
		$('#newProject').dialog('open');		
	});	


	$(".projectsClass").hover(function() {
        $(this).css('background-color', '#393e41')
    }, function() {
        $(this).css('background-color', '')
    });

});
</script>
</head>
<body>

<div id="container">
	<div id="navbar">

			<h2>Team - Meet</h2>
				<ul>
					<a href="index.html"><li>Home</li></a>
					<a href="projects.php"><li>My Projects</li></a>
					<a href="contact.html"><li>Contact</li></a>
					<!--<a href="userprofile.php"><li>User Profile</li></a>-->
					<a href="php/logout.php"><li>Logout</li></a>
				</ul>
	</div>
	
<!--	<div id="header">
		
		<div id="slideshow">

                
                <img src ="images/team.jpg" />
               
		</div>
		
	</div>-->
	<div id="contentProject">
		<h1><?php echo $_SESSION['username'];?> Projects</h1>
		<div id="button">
		<button id="show">Create New Project</button>
		</div>
				<div id="newProject">
						<form method="post" action="php/addproject.php">
							<label for="projectName">Project Name</label><br />
							<input type="text" maxlength="32" name="projectname"><br />
							<label for="description">Description</label><br />
							<textarea maxlength="120" name="description"></textarea><br />
							<input type="submit" value="Submit">
						</form>
	    		</div>
		<div id="userContent">
		<?php include "php/listprojects.php"; ?>
	   </div>
	</div>
		


	<div id="footer">
	
	</div>


</div>


<script>
$( document ).ready(function() {
    
  $('#newProject').hide(); 
  $('.show').click(function() {
    $('#newProject').show();
  });

 $('.hide').click(function() {
    $('#newProject').hide();
  });

 });





</script>

</body>
</html>
