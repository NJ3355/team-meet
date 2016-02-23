
<!--I certify that this submission is my own original work
  Nick Johnson
  R01495898-->

<?php // sqltest.php
  require_once 'session.php';
  require_once 'login.php';
  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);  if ($conn->connect_error) die($conn->connect_error);
echo "<a href='../projects.php'>Return to projects?</a>";



$projectID = $_SESSION['selected_category'];


  $query3  = "DELETE FROM files WHERE projectID= '$projectID'";
    $result3 = $conn->query($query3);
    if (!$result3) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";

     $query4  = "DELETE FROM forum_messages WHERE projectID= '$projectID'";
    $result4 = $conn->query($query4);
    if (!$result4) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
    
    $query  = "DELETE FROM projects WHERE id= '$projectID'";
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  

  $query2  = "DELETE FROM users_assigned WHERE projectsid= '$projectID'";
    $result2 = $conn->query($query2);
    if (!$result2) echo "DELETE failed: $query<br>" .
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
