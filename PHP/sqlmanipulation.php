<?php


function array_merge_limit($defaults) {

			$args = func_get_args();
			array_shift($args);

			$args = array_reverse($args);
			$final = array();

			foreach($args as $arg) {
			$final = array_merge($final, $args);
			}

			return array_intersect_key($defaults, $final);
			}

class myProject {

	public function checkUser(){
		//$username = $_POST['username'];
		//$password = $_POST['password'];

		  require_once 'login.php';
		  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

		  if ($connection->connect_error) die($connection->connect_error);

		 if (isset($_POST['username']) &&
		      isset($_POST['password']))
		  {
		    $un_temp = mysql_entities_fix_string($connection, $_POST['username']);
		    $pw_temp = mysql_entities_fix_string($connection, $_POST['password']);

		  $query = "SELECT * FROM users WHERE username='$un_temp'";
		    $result = $connection->query($query);

		    if (!$result) die($connection->error);
		  elseif ($result->num_rows)
		  {
		    $row = $result->fetch_array(MYSQLI_NUM);

		    $result->close();

		    $salt1 = "qm&h*";
		    $salt2 = "pg!@";
		        $token = hash('ripemd128', "$salt1$pw_temp$salt2");
		    
		    if ($token == $row[5])
		    {
		      session_start();
		      $_SESSION['username'] = $un_temp;
		      $_SESSION['password'] = $pw_temp;
		      $_SESSION['forename'] = $row[1];
		      $_SESSION['surname']  = $row[2];
		      $_SESSION['email']  = $row[3];
		     // echo "$row[0] $row[1] : Hi $row[0],
		       // you are now logged in as '$row[3]'";
		      die (header("location:projects.php"));
		    }
		    else die("Invalid username/password combination<br><a href=index.html>Go back home!</a>");
		  }
		  else die("Invalid username/password combination<br><a href=index.html>Go back home!</a>");
		  }
		  else
		  {
		    echo "<a href='index.html'> Try again! </a>";
		    die ("Please enter your username and password");
		  }

		  $connection->close();

		  function mysql_entities_fix_string($connection, $string)
		  {
		    return htmlentities(mysql_fix_string($connection, $string));
		  } 

		  function mysql_fix_string($connection, $string)
		  {
		    if (get_magic_quotes_gpc()) $string = stripslashes($string);
		    return $connection->real_escape_string($string);


		  }
		  header("Cache-Control: no-cache, must-revalidate");
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Content-Type: application/xml; charset=utf-8");
	}

	public function addUser($parameters){
		$forename = $parameters['fname'];
	    $surname = $parameters['lname'];
	    $username = $parameters['user'];
	   $password = $parameters['pass'];
	    $pass2 = $parameters['pass2'];
	    $email = $parameters['email'];
		

		
		//$parameters = array_merge_limit(['forename', 'surname', 'username', 'password', 'pass2', 'email'], $parameters);


		//$parameters = array_map('fix_string', $parameters);
		
		//extract($parameters, EXTR_SKIP);
		  


		/*  $fail  = validate_forename($parameters['forename']);
		  $fail .= validate_surname($surname);
		  $fail .= validate_username($username);
		  $fail .= validate_password($password);
		  $fail .= validate_password($pass2);
		  $fail .= validate_email($email);*/

		  echo "<!DOCTYPE html>\n<html><head><title>An Example Form</title>";


		    // This is where you would enter the posted fields into a database,
		    // preferably using hash encryption for the password.

		  require_once 'session.php';
		  require_once 'login.php';
		  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

		  if ($connection->connect_error) die($connection->connect_error);

		 
		  $salt1    = "qm&h*";
		  $salt2    = "pg!@";


		  if($password == $pass2)
		  {
		  $token    = hash('ripemd128', "$salt1$password$salt2");


		  add_user($connection, $forename, $surname, $email, $username, $token);
		 
		}
		else if($password != $pass2) {
		  die("Passwords do not match");
		}

		echo "<a href='checkuserform.html'>Click here to log-in</a>";

		  function add_user($connection, $fn, $sn, $email, $un, $pw)
		  {
		    $query  = "INSERT INTO users (forename, surname, email, username, password)VALUES('$fn', '$sn', '$email', '$un', '$pw')";
		    $result = $connection->query($query);
		    if (!$result)

			exit;
		 }

  

		  // The PHP functions
					 $errors = [];

			if($forename === null) {
			$errors[] = "Forename must be set";
			}

			if(count($errors)) {
			return $errors;
			}
		  function validate_forename($field)
		  {
		  	//return ($field == null) ? "No Forename was entered<br>": "";
		  	if($field === null) {
			$errors .= "Forename must be set<br>";
			}

			if($errors) {
			return $errors;
			}
		 }
		  
		  function validate_surname($field)
		  {
		  	return($field == "") ? "No Surname was entered<br>" : "";
		  }
		  
		  function validate_username($field)
		  {
		    if ($field == "") return "No Username was entered<br>";
		    else if (strlen($field) < 5)
		      return "Usernames must be at least 5 characters<br>";
		    else if (preg_match("/[^a-zA-Z0-9_-]/", $field))
		      return "Only letters, numbers, - and _ in usernames<br>";
		    return "";		
		  }
		  
		  function validate_password($field)
		  {
		    if ($field == "") return "No Password was entered<br>";
		    else if (strlen($field) < 6)
		      return "Passwords must be at least 6 characters<br>";
		    else if (!preg_match("/[a-z]/", $field) ||
		             !preg_match("/[A-Z]/", $field) ||
		             !preg_match("/[0-9]/", $field))
		      return "Passwords require 1 each of a-z, A-Z and 0-9<br>";
		    return "";
		  }
		  

		  
		  function validate_email($field)
		  {
		    if ($field == "") return "No Email was entered<br>";
		      else if (!((strpos($field, ".") > 0) &&
		                 (strpos($field, "@") > 0)) ||
		                  preg_match("/[^a-zA-Z0-9.@_-]/", $field))
		        return "The Email address is invalid<br>";
		    return "";
		  }
		  
		  function fix_string($string)
		  {
		    if (get_magic_quotes_gpc()) $string = stripslashes($string);
		    return htmlentities ($string);
		  }

	}

	public function addProject(){
		  require_once 'session.php';
		  require_once 'login.php';
		  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);  if ($conn->connect_error) die($conn->connect_error);
		echo "<a href='projects.php'>Return to projects?</a>";




		  if (isset($_POST['projectname'])   &&
		      isset($_POST['description']))    
		      
		  {
		    $projectname   = get_post($conn, 'projectname');
		    $description    = get_post($conn, 'description');
		   
		    
		    $query    = "INSERT INTO projects VALUES" .
		      "('$projectname', '$description')";
		    $result   = $conn->query($query);

		  	if (!$result) echo "INSERT failed: $query<br>" .
		      $conn->error . "<br><br>";
		  }

		  if (isset($_POST['delete']) && isset($_POST['projectname']))
		  {
		    $projectname   = get_post($conn, 'projectname');
		    $query  = "DELETE FROM table WHERE projectname='$projectname'";
		    $result = $conn->query($query);
		    if (!$result) echo "DELETE failed: $query<br>" .
		      $conn->error . "<br><br>";
		  }

		 /* echo <<<_END
		  <form action="addrecord.php" method="post"><pre>
		First Name <input type="text" name="fname">
		 Last Name <input type="text" name="lname">
		       Age <input type="text" name="age">
		        ID <input type="text" name="ID">
		      
		           <input type="submit" value="ADD RECORD">
		  </pre></form>
		_END;*/

		 
		  
		  
		  
		  $conn->close();
		  
		  function get_post($conn, $var)
		  {
		    return $conn->real_escape_string($_POST[$var]);
		  }

	}

	public function listProjects(){
	  require_once 'session.php';
	  require_once 'login.php';
	  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);  if ($conn->connect_error) die($conn->connect_error);



	  
	  $query  = "SELECT * FROM projects";
	  $result = $conn->query($query);
	  if (!$result) die ("Database access failed: " . $conn->error);

	  $rows = $result->num_rows;
	  
	  for ($j = 0 ; $j < $rows ; ++$j)
	  {
	    $result->data_seek($j);
	    $row = $result->fetch_array(MYSQLI_NUM);

	    echo <<<_END
	  <pre>
	     Project Name $row[0]
	      Description $row[1]
	            
	  </pre>

_END;
	  }
	  
	  $result->close();
	  $conn->close();
	  
	  function get_post($conn, $var)
	  {
	    return $conn->real_escape_string($_POST[$var]);
	  }

	}
}




?>