
<!--I certify that this submission is my own original work
  Nick Johnson
  R01495898-->

<?php //setupusers.php
  require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  $query = "CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT,
    forename VARCHAR(32) NOT NULL,
    surname  VARCHAR(32) NOT NULL,
    email  VARCHAR(32) NOT NULL,
    username VARCHAR(32) NOT NULL,
    password VARCHAR(32) NOT NULL,
    UNIQUE KEY unique_username (username),
    PRIMARY KEY (id)
  )";
  $result = $connection->query($query);
  if (!$result) die($connection->error);

  $salt1    = "qm&h*";
  $salt2    = "pg!@";

  $forename = 'Nick';
  $surname  = 'Johnson';
  $email = 'njohn@farmingdale.edu';
  $username = 'njohn';
  $password = 'mysecret';
  $token    = hash('ripemd128', "$salt1$password$salt2");


  add_user($connection, $forename, $surname, $email, $username, $token);

  function add_user($connection, $fn, $sn, $email,  $un, $pw)
  {
    $query  = "INSERT INTO users (forename, surname, email, username, password) VALUES ('$fn', '$sn', '$email', '$un', '$pw')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
  }
?>
