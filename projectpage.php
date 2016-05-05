<?php
  require_once 'php/session.php';

$_SESSION['selected_category'] =  $_GET['category'];
 


?>

<!DOCTYPE html>
<html>
<head>
    <title>Team-Meet</title>
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<link rel="stylesheet" type="text/css" href="CSS/projectpage.css">
<link rel="stylesheet" type="text/css" href="CSS/jquery-ui.min.css"/>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/overcast/jquery-ui.css" type="text/css" media="all" />
 <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.5.min.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
 


</head>
<body>


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

 $('#x').click(function() {
    $('#edit').hide();
  });
  
  $( "#datePicker" ).datepicker();

  $( "#accordion" ).accordion(
	{
		autoHeight: false,
		collapsible: true
	});
 });

</script>

<div id="container">
	<div id="navbar">
			<h2>Team - Meet</h3>
				<ul>
					<a href="index.html"><li>Home</li></a>
					<a href="projects.php"><li>My Projects</li></a>
					<a href="contact.html"><li>Contact</li></a>
					<!--<a href="userprofile.php"><li>User Profile</li></a>-->
					<a href="php/logout.php"><li>Logout</li></a>
				</ul>
	</div>
	
	<div id="contentProjectPage">
		
		<div id="projectheader">
           
			<h1><?php include "php/listprojectname.php"; ?></h1>
			<p><?php include "php/listdescription.php"; ?></p>
             <button id="showEdit">Edit Project</button>
             <div id="edit">
				<form method="post" action="php/editprojectprofile.php" onsubmit="return validate(this)">
					<label for="pname2">Project Name</label><br />
					<input type="text" maxlength="32" name="pname2"><br />
					<label for="desc2">Project Description</label><br />
					<input type="text" maxlength="32" name="desc2"><br />
					<button type="submit">Update</button>
				</form>
            </div> 
		</div>
		
		<div id="user">
			<h2>Users</h2>
			<form  method="post" action="php/addprojectuser.php">
			 <input type="text" name="user">
			  <input type="submit" value="Add User"><br><br>
			</form>
			  <div style="color:white"><?php include "php/listusers.php"; ?></div>

		


			  <form id="deleteProject" method="post" action="php/deleteproject.php">
			  	<input type="submit" value="Delete Project">
			  </form>
		</div>
		<div id="projectBox">
			<div id="projectName">
				<h1>General Messages</h1>
			</div>
			<div id="chatbox">
				<?php include "php/listmessages.php"; ?>
			</div>
			<div id="typebox">
				<form action="php/post.php" method="post">
				<input id="textarea" type="text" name="message"size="100">
				<input  id="submit" onCLick="x.post()" type="submit" value="Send">
				</form>
			</div>
		</div>
		<!--<div id="typebox">
				<textarea id="postContent" rows="1" cols="40">
					   	
						</textarea>
						<button type="submit" onClick="x.post()">Submit</button>
			</div>-->
		
		
	</div>
	 <div id="accordion">
        <h3>Calendar & Attachments</h3>
        <div>
            <div id="bottomContent">
            <div class="bottomHalf borderRight borderBottom">
                <h2>Calendar</h2>
                <div id="datePicker">
                </div>
            </div>
            <div class="bottomHalf borderBottom">
                <h2>Uploads</h2>
                <form action="fileupload/upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
                </form>

                <?php include "php/listfiles.php"; ?>
            </div>
            </div>
        </div>
    <h3>Private Messaging</h3>
    <div>
    <div id="privateMessages">
       
        <div class="bottomHalf borderRight">
            <h2>Private Message Form</h2>
            <form action="php/privatemessages.php" method="post">
                Send To<br>
                <input type="text" name="name"><br>
                Message<br>
                <textarea name="message" cols="40" rows="5"></textarea><br>
                <input type="submit" value="Send">
                <input type="reset" value="Clear">
            </form>
        </div>
        <div id="myMessages" class="bottomHalf">
            <h2>My Messages</h2>
            <?php include "php/listprivatemessages.php"; ?>
        </div>

    </div>
	</div>
</div>

	<div id="footer">
	
	</div>


	</div>
</div>


<script>





jQuery(function($) {
    $( "#datePicker" ).datepicker();

    $( "#accordion" ).accordion(
        {
             autoHeight: false,
			 collapsible: true
        });
 
 });    



</script>


</body>
</html>