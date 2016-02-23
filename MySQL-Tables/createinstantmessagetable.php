
<!--I certify that this submission is my own original work
  Nick Johnson
  R01495898-->

<?php //setupusers.php
  require_once '../php/login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  $query = "CREATE TABLE instant_messaging (
    instantMessageID int(32) UNSIGNED NOT NULL AUTO_INCREMENT,
    userID int(10) unsigned NOT NULL,
    message varchar(255) not null,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (instantMessageID),
     FOREIGN KEY (userID) REFERENCES user_profile(id)
  )";
  
  $result = $connection->query($query);
  if (!$result) die($connection->error);

   //$query = "INSERT INTO messages(projectname)
   //VALUES('TestProject')";
    

  $result = $connection->query($query);
  if (!$result) die($connection->error);



?>


CREATE TABLE IF NOT EXISTS `instant_messaging` (
  `InstantMessageID` int(32) NOT NULL,
  `ProjectID` int(32) NOT NULL,
  `UserID` int(32) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;