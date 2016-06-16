<?php 
  require_once 'php/session.php';
  
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="CSS/index.css"/>
<link rel="stylesheet" type="text/css" href="CSS/jquery-ui.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Josefin+Slab:400,700' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="JavaScript/jquery-ui.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    
  $('#edit').dialog(
	{
		resizeable: false,
		draggable: false,
		modal: true,
		autoOpen: false,
		show: 'clip',
		hide: 'blind'
	});
	
	$('#showEdit').click(function(){
		$('#edit').dialog('open');		
	});

 });

</script>
<style>
	#userProfile {
		width: 80%;
		margin: auto;
		padding: auto;
		overflow:hidden;
		
	}
	table {
		margin: auto;
		padding: auto;
	}
	td {
		text-align: center;
	}

	#buttonWrapper {
		margin:auto;
	}
	button {
		margin: auto;
	}

	h1 {
		font-size:2.5em;
		display: inline-block;
		margin-left: 1em;
	}

	img {
		width:254px;
		height:200px;
	}

	#container {
		background-image: url("images/tile.jpg");
		min-height: 650px;
		color: white;
	}

	#userHeader {
		width:80%;
		margin-top:1em;
	    display:flex;
        align-items: center;
        justify-content: center;
	}

	#userInfo {

		width:25%;
		margin: auto;
		margin-top:3em;

	}

	#userInfo li {
		margin-bottom: 2em;

	}

	.info {
		font-size: 2em;
	}

</style>
</head>
<body>

<div id="container">
	<div id="navbar">
			<h2>Team - Meet</h2>
				<ul>
					<a href="indexUser.html"><li>Home</li></a>
					<a href="projects.php"><li>My Projects</li></a>
					<a href="contact.html"><li>Contact</li></a>
					<a href="userprofile.php"><li>User Profile</li></a>
					<a href="php/logout.php"><li>Logout</li></a>
				</ul>
	</div>
	<div id="userProfile">
		<div id="userHeader">
			<div id="testing">
				<img src="images/portrait.jpg" /><br/>
				<button id="showEdit">Edit Profile</button>
				<button id="showEdit">Upload Image</button>
			</div>
			<h1><?php echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname'];?></h1>
	    </div>
	    <?php include "php/listuserprofile.php"; ?>
	</div>
	
		<div id="edit">
			<form method="post" action="php/edituserprofile.php" onsubmit="return validate(this)">
				<label for="fname2">First Name</label><br />
				<input type="text" maxlength="32" name="fname2"><br />
				<label for="lname2">Last Name</label><br />
				<input type="text" maxlength="32" name="lname2"><br />
				<label for="company">Company</label><br />
				<input type="text" maxlength="32" name="company"><br />
				<label for="address">Address</label><br />
				<input type="text" maxlength="32" name="address"><br />
				<label for="email2">Email</label><br />
				<input type="text" maxlength="64" name="email2"><br />
				<button type="submit">Update</button>
			</form>
		</div>
		
	</div>
	

	



	<div id="footer">
		
	</div>
</body>
</html>