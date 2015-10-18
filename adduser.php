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

 $forename = $surname = $username = $password = $pass2 = $email = "";

  if (isset($_POST['fname']))
    $forename = fix_string($_POST['fname']);
  if (isset($_POST['lname']))
    $surname  = fix_string($_POST['lname']);
  if (isset($_POST['user']))
    $username = fix_string($_POST['user']);
  if (isset($_POST['pass']))
    $password = fix_string($_POST['pass']);
  if (isset($_POST['pass2']))
    $pass2      = fix_string($_POST['pass2']);
  if (isset($_POST['email']))
    $email    = fix_string($_POST['email']);

  $fail  = validate_forename($forename);
  $fail .= validate_surname($surname);
  $fail .= validate_username($username);
  $fail .= validate_password($password);
  $fail .= validate_password($pass2);
  $fail .= validate_email($email);

  echo "<!DOCTYPE html>\n<html><head><title>An Example Form</title>";


    // This is where you would enter the posted fields into a database,
    // preferably using hash encryption for the password.

  require_once 'session.php';
  require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

 
  $salt1    = "qm&h*";
  $salt2    = "pg!@";


  if($password == $pass2)
  {
  $token    = hash('ripemd128', "$salt1$password$salt2");


  add_user($connection, $forename, $surname, $email, $username, $token);
 
}
else if($password != $pass2) {
  die("Passwords do not match");
}

echo "<a href='checkuserform.html'>Click here to log-in</a>";

  function add_user($connection, $fn, $sn, $email, $un, $pw)
  {
    $query  = "INSERT INTO users (forename, surname, email, username, password)VALUES('$fn', '$sn', '$email', '$un', '$pw')";
    $result = $connection->query($query);
    if (!$result)

	exit;
  }

  

  // The PHP functions

  function validate_forename($field)
  {
  	return ($field == "") ? "No Forename was entered<br>": "";
  }
  
  function validate_surname($field)
  {
  	return($field == "") ? "No Surname was entered<br>" : "";
  }
  
  function validate_username($field)
  {
    if ($field == "") return "No Username was entered<br>";
    else if (strlen($field) < 5)
      return "Usernames must be at least 5 characters<br>";
    else if (preg_match("/[^a-zA-Z0-9_-]/", $field))
      return "Only letters, numbers, - and _ in usernames<br>";
    return "";		
  }
  
  function validate_password($field)
  {
    if ($field == "") return "No Password was entered<br>";
    else if (strlen($field) < 6)
      return "Passwords must be at least 6 characters<br>";
    else if (!preg_match("/[a-z]/", $field) ||
             !preg_match("/[A-Z]/", $field) ||
             !preg_match("/[0-9]/", $field))
      return "Passwords require 1 each of a-z, A-Z and 0-9<br>";
    return "";
  }
  

  
  function validate_email($field)
  {
    if ($field == "") return "No Email was entered<br>";
      else if (!((strpos($field, ".") > 0) &&
                 (strpos($field, "@") > 0)) ||
                  preg_match("/[^a-zA-Z0-9.@_-]/", $field))
        return "The Email address is invalid<br>";
    return "";
  }
  
  function fix_string($string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities ($string);
  }
?>
