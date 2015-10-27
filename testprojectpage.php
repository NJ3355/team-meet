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

<style>
h1, h2 {
	text-align: center;
}

body {
	font-family: 'Arvo', serif;
}
#user {
	width:20%;
	height:540px;
	background-color: #767169;
	float: left;
}

#chatbox {
	width:100%;
	height:455px;
	background-color: #dddbd9;
	float: left;
	position: relative;
	overflow: auto;
	
}

#projectInfo {
	width:20%;
	height:540px;
	background-color: #767169;
	float: left;
}

#projectBox {
	width:60%;
	height:500px;
	float:left;
}

#typebox {
	background-color: white;
	height:40px;
	width: 99%;
	clear:both;
	
	border-style: solid;
}

#projectName {
	width: 100%;
	float:left;
	background-color: #dddbd9;
}


#typebox textarea {
	width:80%;
	float:left;
}

#typebox button {
	margin:0;
}

#bottomContent {
	width:100%;
	height: 300px;
	background-color: gray;
}

.bottomHalf {
	height:100%;
	width:48%;
	text-align: center;
	float:left;
	overflow: auto;
}

.borderRight {
	border-right: solid;
}

.imageUpload {
	width:250px;
	height:250px;
}
</style>

</head>
<body>

<div id="container">
	<div id="navbar">
			<h2>Team - Meet</h3>
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

		<div id="user">
			<h2>Users</h2>
		</div>
		<div id="projectBox">
			<div id="projectName">
				<h1>Project Name</h1>
			</div>
			<div id="chatbox">

			</div>
			<div id="typebox">
				<textarea id="postContent" rows="1" cols="40">
					   	
						</textarea>
						<button type="submit" onClick="x.post()">Submit</button>
			</div>
		</div>
		
		<div id="projectInfo">
			<h2>Description</h2>
		</div>

		<!--<div id="typebox">
				<textarea id="postContent" rows="1" cols="40">
					   	
						</textarea>
						<button type="submit" onClick="x.post()">Submit</button>
			</div>-->
		
		
	</div>
	<div id="bottomContent">
		<div class="bottomHalf borderRight">
			<h2>Calendar</h2>
		</div>
		<div class="bottomHalf">
			<h2>Uploads</h2>
		<form action="fileupload/upload.php" method="post" enctype="multipart/form-data">
    		Select image to upload:
    		<input type="file" name="fileToUpload" id="fileToUpload">
    		<input type="submit" value="Upload Image" name="submit">
		</form>

		<?php include "listimages.php"; ?>
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
	var content = document.getElementById('chatbox');
	

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