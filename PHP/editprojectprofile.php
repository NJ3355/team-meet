<?php // adduser.php
 /* include 'sqlmanipulation.php';

$adduser = new myProject();
$status = $adduser->addUser($_POST);

if($status === true) {
//everything worked
} else {
echo "Errors occurred: $status";
}*/
  // Start with the PHP code

 $projectName = $description = "";

  if (isset($_POST['pname2']))
    $projectName = fix_string($_POST['pname2']);
  if (isset($_POST['desc2']))
    $description  = fix_string($_POST['desc2']);
  



  


    // This is where you would enter the posted fields into a database,
    // preferably using hash encryption for the password.

  require_once 'session.php';
  require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);


  $projectID = $_SESSION['selected_category'];

   $query  = "UPDATE projects SET projectname='$projectName',description ='$description' WHERE id = $projectID";
    
    $result = $connection->query($query);



    

$query2  = "UPDATE users_assigned SET projectname='$projectName',projectdescription ='$description' WHERE projectsID = $projectID";
    
    $result2 = $connection->query($query2);



   

echo "<a href='../projectpage.php?category=$projectID'>Update Complete. Click To return!</a>";

  //edit_user($connection, $firstname,$lastname, $email);
  
 


/*echo "<a href='checkuserform.html'>Click here to log-in</a>";

  function edit_user($connection, $fn, $sn, $email)
  {
    $query  = "update users set forename = replace(forename, $firstname, $forename )"
    
    $result = $connection->query($query);



    if (!$result)
    

  exit;
  }*/


 

  
  
  function fix_string($string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities ($string);
  }
?>
