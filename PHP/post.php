
<!--I certify that this submission is my own original work
  Nick Johnson
  R01495898-->

<?php // sqltest.php
  require_once 'session.php';
  require_once 'login.php';
  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);  if ($conn->connect_error) die($conn->connect_error);
//echo "<a href='projects.php'>Return to projects?</a>";

  $projectID = $_SESSION['selected_category'];
$userName = $_SESSION['username'];




  if (isset($_POST['message']))    
      
  {
    $message  = get_post($conn, 'message');
    $user  = $_SESSION['username'];
    
   
    
    $query    = "INSERT INTO forum_messages (message, user, projectID) VALUES" .
      "('$message', '$userName', '$projectID')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }



 
  
  
  
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>

<script type="text/javascript">location.href = "../projectpage.php?category=<?php echo $projectID; ?>"</script>