
<!--I certify that this submission is my own original work
  Nick Johnson
  R01495898-->

<?php //setupusers.php
  require_once '../php/login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  $query = "CREATE TABLE private_messaging(
    privateMessageID INT UNSIGNED AUTO_INCREMENT,
    message VARCHAR(140) NOT NULL,
    sentUserName VARCHAR(20) NOT NULL,
    recievingUsername VARCHAR(20) NOT NULL,
    PRIMARY KEY (privateMessageID),
    FOREIGN KEY (sentUsername) references user_profile(username)
  )";
  
  $result = $connection->query($query);
  if (!$result) die($connection->error);

   //$query = "INSERT INTO messages(projectname)
   //VALUES('TestProject')";
    

  $result = $connection->query($query);
  if (!$result) die($connection->error);



?>
