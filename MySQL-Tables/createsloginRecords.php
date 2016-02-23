
<!--I certify that this submission is my own original work
  Nick Johnson
  R01495898-->

<?php //setupusers.php
  require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  $query = "CREATE TABLE loginRecords (
    userID INT UNSIGNED AUTO_INCREMENT,
    username VARCHAR(32) NOT NULL,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (userID),
    FOREIGN KEY (userID) references users(id),
    FOREIGN KEY (username) references users(username)
    

  )";
  $result = $connection->query($query);
  if (!$result) die($connection->error);

?>
