


<?php // sqltest.php
  require_once 'session.php';
  require_once 'login.php';
  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);  if ($conn->connect_error) die($conn->connect_error);


$id = $_GET['id'];
 $projectID = $_SESSION['selected_category'];

echo "<a href='../projectpage.php?category=$projectID'>Image Deleted Return?</a>";

    
    $query  = "DELETE FROM files WHERE fileID= '$id'";
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  

  /*echo <<<_END
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
?>
