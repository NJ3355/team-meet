
<!--I certify that this submission is my own original work
  Nick Johnson
  R01495898-->

<?php //setupusers.php
  require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  $query = "CREATE TABLE projects (
    id INT UNSIGNED AUTO_INCREMENT,
    projectname VARCHAR(32) NOT NULL,
    description VARCHAR(140) NOT NULL,
    PRIMARY KEY (id)
  )";
  
  $result = $connection->query($query);
  if (!$result) die($connection->error);

   $query = "INSERT INTO projects(projectname)
    VALUES('TestProject')";
    

  $result = $connection->query($query);
  if (!$result) die($connection->error);



?>
