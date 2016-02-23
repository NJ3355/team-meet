
<!--I certify that this submission is my own original work
  Nick Johnson
  R01495898-->

<?php //setupusers.php
  require_once '../php/login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  $query = "CREATE TABLE user_privacy (
    privacyID int(32) unsigned NOT NULL AUTO_INCREMENT,
    userID INT(10) UNSIGNED NOT NULL,
    username varchar(32) NOT NULL,
    PhoneNum enum('All','Partial','None'),
    Email enum('All','Partial','None'),
    Company enum('All','Partial','None'),
    Address enum('All','Partial','None'),
    FirstName enum('All','Partial','None'),
    LastName enum('All','Partial','None'),
    PRIMARY KEY (privacyID),
    FOREIGN KEY (userID) references user_profile(id),
    FOREIGN KEY (username) references user_profile(username)

  )";
  
  $result = $connection->query($query);
  if (!$result) die($connection->error);

   //$query = "INSERT INTO messages(projectname)
   //VALUES('TestProject')";
    

  $result = $connection->query($query);
  if (!$result) die($connection->error);



?>
CREATE TABLE IF NOT EXISTS `user_privacy` (
  `PrivacyID` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `UserID` int(32) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `PhoneNum` enum('All','Partial','None') NOT NULL,
  `Email` enum('All','Partial','None') NOT NULL,
  `Company` enum('All','Partial','None') NOT NULL,
  `Address` enum('All','Partial','None') NOT NULL,
  `FirstName` enum('All','Partial','None') NOT NULL,
  `LastName` enum('All','Partial','None') NOT NULL,
  PRIMARY KEY ('PrivacyID'),
  FOREIGN KEY 'UserID' ('UserID'),
  FOREIGN KEY 'Username' ('Username')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
