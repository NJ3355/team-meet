<?php 
  require_once 'session.php';
  

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
 <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


</head>
<body>

<div id="container">
	<div id="navbar">
			<h2>Team - Me</h3>
				<ul>
					<a href="index.html"><li>Home</li></a>
					<a href="projects.php"><li>My Teams</li></a>
					<a href="projectpage.php"><li>Meet The Makers</li></a>
					<a href="#"><li>Contact</li></a>
				</ul>
	</div>
	<div id="header">
		
		<div id="slideshow">

                
                <img src ="header2.png" />
               
		</div>
	</div>
	<div id="content">
		<div id="userContent">
			<fieldset>
	    		<legend><h1><?php echo $_SESSION['username'];?></h1></legend>
	    		<div id="project">
	    			
	    			<div id="users">
	    				<h3>Users</h3>
	    			</div>
	    			<div id="projectContent">
	    				<h1>Project Name</h1>

	    			</div>

	    	 <div id="post">
			    		<textarea id="postContent" rows="1" cols="40">
					   	Type Here!
						</textarea>
						<button type="submit" onClick="x.post()">Submit</button>
	    			</div>
	    			
	    		</div>
	    			
				<div id="logout">
					<button>Logout</button>
				</div>   
	  		</fieldset>
  		</div>
	</div>
	


	<div id="footer">
		Last Updated September 17, 2015
	</div>


	</div>
</div>


<script>




var Post = function (){
	
	var postBox = document.getElementById('postContent');
	var content = document.getElementById('projectContent');
	

	this.post = function(){
		
		var post = postBox.value;
		content.innerHTML += "<div class='posts'>" + "<p>" + post + "</p>" + "</div>";
		

	}

	this.deletePost = function(){

	}



}

var x = new Post();
</script>


</body>
</html>