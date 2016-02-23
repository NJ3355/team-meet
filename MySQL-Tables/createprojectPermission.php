
<!--I certify that this submission is my own original work
  Nick Johnson
  R01495898-->

<?php //setupusers.php
  require_once '../php/login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  $query = "CREATE TABLE users_assigned (
    permissionID INT(10) UNSIGNED AUTO_INCREMENT,
    permission VARCHAR(20) NOT NULL,
    projectID int unsigned,
    PRIMARY KEY (permissionID),
    FOREIGN KEY (projectID) references projects(id),
    FOREIGN KEY (permissionID) references user_profile(id)

  )";
  
  $result = $connection->query($query);
  if (!$result) die($connection->error);

   //$query = "INSERT INTO messages(projectname)
   //VALUES('TestProject')";
    

  $result = $connection->query($query);
  if (!$result) die($connection->error);



?>
