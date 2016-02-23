<?php // sqltest.php
require_once 'session.php';
  require_once 'login.php';
  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);  if ($conn->connect_error) die($conn->connect_error);



  
  $query  = "SELECT * FROM user_profile where username = '$username'";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;


  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

  $_SESSION['firstname'] = $row[1];

    $_SESSION['lastname'] = $row[2];
 
    $_SESSION['email'] = $row[1];
	
	


    
    echo <<<_END

      <fieldset>

      <legend><h1>$row[4]</h1></legend>
      <table>
        <th>
          <td></td>
          <td style="textalign:left"><strong>Privacy Setting</strong></td>
        </th>
        <tr>
          <td class="left">Username:</td>
          <td>$row[4]</td>
          <td>PUBLIC</td>
        </tr>
        <tr>
          <td class="left">First Name:</td>
          <td>$row[1]</td>
          <td>PUBLIC</td>
        </tr>
        <tr>
          <td class="left">Last Name:</td>
          <td>$row[2]</td>
          <td>PRIVATE</td>
        </tr>
        <tr>
          <td class="left">Email:</td>
          <td>$row[3]</td>
          <td>PRIVATE</td>
        </tr>
        <tr>
          <td class="left">Company:</td>
          <td>$row[6]</td>
          <td>TEAM-MEMBERS ONLY</td>
        </tr>
        <tr>
          <td class="left">Address:</td>
          <td>$row[7]</td>
          <td>PRIVATE</td>
        </tr>
      </table>
		<button id="showEdit">Edit</button>
    </fieldset>

    
    
            
  
_END;
  }
  
  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>
