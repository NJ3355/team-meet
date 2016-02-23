<?php


  
  /*$username = $_SESSION['username'];
  

  



  require_once 'session.php';
  require_once 'login.php';

 


 //add_record($connection,$username);
 



 
    $query  = "INSERT INTO login_Records (username)VALUES('$username')";
    $result = $connection->query($query);
    if (!$result)

	
  

  

  /*
  
  function fix_string($string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities ($string);
*/
  require_once 'session.php';
  require_once 'login.php';
  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);  if ($conn->connect_error) die($conn->connect_error);
echo "<a href='../projects.php'>Return to projects?</a>";

$username = $_SESSION['username'];


   
    
    $query    = "INSERT INTO login_records (username)VALUES('$username')";
    $result   = $conn->query($query);

    if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  

 

 
  
  
  
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }


?>


