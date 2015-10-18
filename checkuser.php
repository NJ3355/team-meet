
<!--I certify that this submission is my own original work
  Nick Johnson
  R01495898-->

<?php // authenticate2.php

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

  
      
      
?>
