
<!--I certify that this submission is my own original work
  Nick Johnson
  R01495898-->

<?php // sqltest.php
  require_once 'session.php';
  require_once 'login.php';
  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);  if ($conn->connect_error) die($conn->connect_error);
/*echo "<a href='../projectpage.php'>User add to project..Return to project?</a>";*/

 $projectID = $_SESSION['selected_category'];
 $projectName = $_SESSION['projectname'];
  $projectDescription = $_SESSION['projectdescription'];


  if (isset($_POST['user']))    
      
  {
    $username   = get_post($conn, 'user');
    
   
    
    $query    = "INSERT INTO users_assigned (username, projectsID, projectname, projectdescription ) VALUES" .
      "('$username', '$projectID', '$projectName', '$projectDescription')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
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

<script type="text/javascript">location.href = "../projectpage.php?category=<?php echo $projectID; ?>"</script>