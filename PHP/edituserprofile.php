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

 $forename = $surname = $company = $address = $email = "";

  if (isset($_POST['fname2']))
    $forename = fix_string($_POST['fname2']);
  if (isset($_POST['lname2']))
    $surname  = fix_string($_POST['lname2']);
  if (isset($_POST['company']))
    $company  = fix_string($_POST['company']);
  if (isset($_POST['address']))
    $address  = fix_string($_POST['address']);
  if (isset($_POST['email2']))
    $email    = fix_string($_POST['email2']);



  echo "<a href='../userprofile.php'>Update Complete. Click To return!</a>";


    // This is where you would enter the posted fields into a database,
    // preferably using hash encryption for the password.

  require_once 'session.php';
  require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

 
  $username = $_SESSION['username'];

   $query  = "UPDATE user_profile SET forename='$forename',surname='$surname',email='$email', company='$company', address='$address' WHERE username = '$username'";
    
    $result = $connection->query($query);



    if (!$result)
    

  exit;



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
