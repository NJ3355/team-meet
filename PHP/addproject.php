
<!--I certify that this submission is my own original work
  Nick Johnson
  R01495898-->

<?php // sqltest.php
  require_once 'session.php';
  require_once 'login.php';
  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);  if ($conn->connect_error) die($conn->connect_error);
echo "<a href='../projects.php'>Return to projects?</a>";

$username = $_SESSION['username'];


  if (isset($_POST['projectname'])   &&
      isset($_POST['description']))    
      
  {
    $projectname   = get_post($conn, 'projectname');
    $description    = get_post($conn, 'description');
   
    
    $query    = "INSERT INTO projects (projectname, description) VALUES" .
      "('$projectname', '$description')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";


    $id = mysqli_insert_id($conn);






    $query2    = "INSERT INTO users_assigned (username, projectsID, projectname, projectdescription) VALUES" .
      "('$username', '$id', '$projectname', '$description')";
    $result2   = $conn->query($query2);

    if (!$result2) echo "INSERT failed: $query2<br>" .
      $conn->error . "<br><br>";
  }

  /*if (isset($_POST['delete']) && isset($_POST['projectname']))
  {
    $projectname   = get_post($conn, 'projectname');
    $query  = "DELETE FROM projects WHERE projectname='$projectname'";
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }*/

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
