<?php 
  require_once 'php/session.php';
  


?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="CSS/index.css"/>
<link rel="stylesheet" type="text/css" href="CSS/jquery-ui.min.css"/>
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
					<a href="userprofile.php"><li>User Profile</li></a>
					<a href="php/logout.php"><li>Logout</li></a>
				</ul>
	</div>
	
	<div id="header">
		
		<div id="slideshow">

                <!--<img name="slide" src="landheader.jpg">-->
                <img src ="images/tmlogo1.jpg" />
               
		</div>
	</div>
	<div id="contentProject">
		<div id="userContent">
			<fieldset>
	    		<legend><h1>	<?php echo $_SESSION['username'];?></h1></legend>
	    		<div id="myProjects">
					<div id="newProject">
						<form method="post" action="php/addproject.php">
							<label for="projectName">Project Name</label><br />
							<input type="text" maxlength="32" name="projectname"><br />
							<label for="description">Description</label><br />
							<textarea maxlength="120" name="description"></textarea><br />
							<input type="submit" value="Submit">
						</form>
	    			</div>
	    			<h2>My Projects</h2>
	    			<?php include "php/listprojects.php"; ?>
	    		</div>
				<div id="logout">
					<button id="show">Create New Project</button>
				</div>   
	  		</fieldset>
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
