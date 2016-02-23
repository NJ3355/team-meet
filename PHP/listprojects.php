<?php // sqltest.php
require_once 'session.php';
  require_once 'login.php';
  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);  if ($conn->connect_error) die($conn->connect_error);


  $username = $_SESSION['username'];
  
  $query  = "SELECT * FROM users_assigned where username = '$username'";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;


  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    $_SESSION['projectname'] = $row[5]; 
    $_SESSION['projectdescription'] = $row[6];

    
    echo <<<_END
   <a href="projectpage.php?category=$row[4]"><div class="projectsClass">
    <img src="images/projectlogo.png"/><br/>
     $row[5] <br/>
    $row[6]<br/></a>
  </div>

_END;
  }
  
  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>
