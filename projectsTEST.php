<?php 
  require_once 'php/session.php';
  


?>

<!DOCTYPE html>
<html>
<head>
<title></title>

<link rel="stylesheet" type="text/css" href="CSS/jquery-ui.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="JavaScript/jquery-ui.min.js"></script>


<style>
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}




#header {
	width:100%;
	
	

}

#navbar {
	width:100%;
	padding:1em;
	background-color: #800000;
	font-family: 'Arvo', serif;
	overflow: hidden;
	

}

#navbar a {
	color: white;
}

#navbar a:hover {
	color: gray;
}

#navbar h2 {
	display: inline;
	padding-left: 2em;
	color: white;
	font-size: 1.3em;
}

#navbar ul {
	display: inline-block;
	float: right;
	font-size: 1.3em;

}

#navbar li {
	float:left;
	list-style-type: none;
	padding-right: 75px;
}

#slideshow {
	
	width:100%;
	
	overflow:hidden; 
}
	
#slideshow img {
	display:block; /* prevents gapping underneath images displayed inline or inline block, also allows margins */
	 /* 100% height and width to fill up our #slideshow container */
	height:475px;
	margin:auto;
}

#contentProject {
	width:100%;
	overflow: hidden;
	
	background-color:#808080;
	font-family: 'Arvo', serif;
	background-image: url("images/tile.jpg");
	overflow: hidden;
}

#button {
	margin: auto;
	padding: 1em;
	width:168px;
}

#contentProject h1, #contentProject h2 {
	font-size: 4em;
	color: white;
	text-align: center;
	padding-top:.5em;
}



#userContent {
	position: relative;
	width:85%;
	text-align: center;
	margin: auto;
	

}

#myProjects {
	text-align: center;
}

#myProjects table input {
	height: 2em;

}

#myProjects img {
	width:100px;
	height:100px;
}

.delete {
	margin-left:0;
}
tbody {
	text-align: left;
}
.projectsClass {
	
	
	width: 28.333333%;
	display: inline-block;
	background-color:;
	margin: 1em;
	border-style: solid;
    border-width: 2px;
}
	


.projectsClass a {
	text-decoration: none;
	color:gray;
}

.delete {
	margin-left: 0;
}

#logout {
	position: absolute;
	bottom:0;
	right:0;
	
}

.hide {
	border-style: solid;
	height: 20px;
	width:60px;
}

#footer {
	padding:1.5em;
	width:100%;
	background-color: #800000;
	text-align: center;
	color:white;


	
}

#wholeFooter {
	
	bottom:0;
	width:100%;
	position: absolute;
}





body {
	margin: 0;
	padding:0;
box-sizing: border-box;
}
*, *:before, *:after {
box-sizing: inherit;
}




</style>


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
					<a href="userprofile.php"><li>User Profile</li></a>
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
