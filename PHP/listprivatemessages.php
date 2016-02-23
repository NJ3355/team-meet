<?php // sqltest.php
require_once 'session.php';
  require_once 'login.php';
  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);  if ($conn->connect_error) die($conn->connect_error);

  $username = $_SESSION['username'];

  
  $query  = "SELECT * FROM private_messaging where recievingUsername = '$username'";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
   <div class="posts">
  
     $row[4]<br />
     <strong>$row[2]:</strong> $row[1]
            
  
  </div>
_END;
  }
  
  $result->close();
  $conn->close();
  
 /*function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }*/
?>
