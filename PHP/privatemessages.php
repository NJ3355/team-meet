
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




  if (isset($_POST['message'])    &&
      isset($_POST['name']))    
      
  {
    $message  = get_post($conn, 'message');
    $toUser = get_post($conn, 'name');
    
    
   
    
    $query    = "INSERT INTO private_messaging (message, recievingUsername, sentUsername) VALUES" .
      "('$message', '$toUser', '$userName')";
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