<?php
  session_start();
  if (isset($_SESSION['naam']))
  {
    echo "Welkom " . $_SESSION['naam'] . "</br>";
  } else{
    echo "Niet ingelogd! </br>";
    header('location: ../index.html');
    exit();
  }
 ?>
