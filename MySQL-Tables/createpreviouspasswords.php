
<!--I certify that this submission is my own original work
  Nick Johnson
  R01495898-->

<?php //setupusers.php
  require_once '../php/login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  $query = "CREATE TABLE user_previous_passwords (
    userID INT(10) UNSIGNED AUTO_INCREMENT,
    previousPassword VARCHAR(32) NOT NULL,
    projectID int unsigned,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (userID),
    FOREIGN KEY (userID) references user_profile(id)
   

  )";
  
  $result = $connection->query($query);
  if (!$result) die($connection->error);

   //$query = "INSERT INTO messages(projectname)
   //VALUES('TestProject')";
    

  $result = $connection->query($query);
  if (!$result) die($connection->error);



?>
CREATE TABLE IF NOT EXISTS `user_previous_passwords` (
  `UserID` int(32) NOT NULL,
  `PreviousPassword` int(32) NOT NULL,
  `TimeOfChange` int(11) NOT NULL,
  `TimeOfCreation` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
