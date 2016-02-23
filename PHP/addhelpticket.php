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

 $name = $phone = $email = $message = "";

  if (isset($_POST['name']))
    $name = fix_string($_POST['name']);
  if (isset($_POST['phone']))
    $phone  = $_POST['phone'];
  if (isset($_POST['email']))
    $email = fix_string($_POST['email']);
  if (isset($_POST['message']))
    $message = fix_string($_POST['message']);
  

  

  


    // This is where you would enter the posted fields into a database,
    // preferably using hash encryption for the password.

  require_once 'session.php';
  require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

 


  add_help($connection, $name, $phone, $email, $message);
 



  function add_help($connection, $n, $p, $e, $m)
  {
    $query  = "INSERT INTO help_requests (name, phone, email, message)VALUES('$n', '$p', '$e', '$m')";
    $result = $connection->query($query);
    if (!$result)

	exit;
  }

  

  
  
  function fix_string($string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities ($string);
  }






$field_name = $name;
$field_email = $email;
$field_message = $message;

$mail_to = 'njohn33555@gmail.com';
$subject = 'Message from a site visitor '.$field_name;

$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Message: '.$field_message;

$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) { ?>
  <script language="javascript" type="text/javascript">
    alert('Thank you for the message. We will contact you shortly.');
    window.location = 'contact.html';
  </script>
<?php
}
else { ?>
  <script language="javascript" type="text/javascript">
    alert('Message failed. Please, send an email to gordon@template-help.com');
    window.location = 'contact.html';
  </script>

}
?>

<script type="text/javascript">location.href = "../contact.html"</script>