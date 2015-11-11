<?php 
  require_once 'session.php';
  
  

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css"/>
 <script type="text/javascript" src="slideshowfile.js"></script>
 <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


</head>
<body>

<div id="container">
	<div id="navbar">

			<h2>Team - Meet</h2>
				<ul>
					<a href="index.html"><li>Home</li></a>
					<a href="projects.php"><li>My Projects</li></a>
					<a href="contact.html"><li>Contact</li></a>
				</ul>
	</div>
	<div id="header">
		
		<div id="slideshow">

                <!--<img name="slide" src="landheader.jpg">-->
                <img src ="header2.png" />
               
		</div>
	</div>
	<div id="contentProject">
		<div id="userContent">
			<fieldset>
	    		<legend><h1>	<?php echo $_SESSION['username'];?></h1></legend>
	    		<div id="myProjects">
	    			<div id="newProject">
		    			<table border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
					      <th colspan="2" align="center">Create New Project</th>
					      <form method="post" action="addproject.php">
					        <tr><td>Project Name</td>
					          <td><input type="text" maxlength="32" name="projectname"></td></tr>
					        <tr><td>Project Description</td>
					        	<td><textarea maxlength="120" name="description"></textarea></td></tr>
					        <tr><td colspan="2" align="center"><input type="submit" value="Submit"></td></tr>
					        <tr><td colspan="2" align="center"><div class="hide">CLOSE</div></td></tr>
					        
					      </form>
					      
					    </table>
	    			</div>
	    			<h2>My Projects</h2>
	    			<?php include "listprojects.php"; ?>
	    		</div>
				<div id="logout">
					<button class="show">Create New Project</button>
					<a href="logout.php"><button>Logout</button></a>
				</div>   
	  		</fieldset>
  		</div>
	</div>
	


	<div id="footer">
		Last Updated September 17, 2015
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
