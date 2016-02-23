
<!--I certify that this submission is my own original work
	Nick Johnson
	R01495898-->

<?php

session_start();
session_unset();  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
echo "You've Logged out!";
header("Location: ../index.html");
?>
