<?php
session_start();

if(!isset($_SESSSION['logged_id']) || $_SESSSION['logged_id'] === false) {
  die('Niste ulogovani');
}


?>

<p><?php echo $_SESSION['user']['email']; ?> </p>

<a href="logout.php"> Logout </a>

