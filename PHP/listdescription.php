<?php // sqltest.php
require_once 'session.php';
  require_once 'login.php';
  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);  if ($conn->connect_error) die($conn->connect_error);

  $projectID = $_SESSION['selected_category'];

  
  $query  = "SELECT * FROM projects WHERE id = $projectID";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);


    echo <<<_END
     
   <div class="description">
    
     $row[2]
            
  
  </div>
_END;
  }

  
  $result->close();
  $conn->close();
  
 /* function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }*/
?>
