<?php

require 'config.php';

$response = $_POST["g-recaptcha-response"];

$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
  'secret' => '6Lc5W-QZAAAAAK_lUAV2N4hwhXh9jphg6vvoUXHo',
  'response' => $_POST["g-recaptcha-response"]
);
$options = array(
  'http' => array (
    'method' => 'POST',
    'content' => http_build_query($data)
  )
);
$context  = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$captcha_success=json_decode($verify);

if ($captcha_success->success==false) {
  echo "<p>You are a bot! Go away!</p>";
} else if ($captcha_success->success==true) {
    echo "<p>You are not not a bot!</p>";


  if (isset($_POST['submit']))
  {

    $naam = $_POST['gebruikersnaam'];
    $ww = $_POST['wachtwoord'];

    $ww2 = sha1($ww);

    $query = "SELECT * FROM back2_users WHERE username = '$naam' AND wachtwoord = '$ww2'";
    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result)>0){
      echo "ingelogd!</br>";
      $_SESSION['naam'] = $naam;
      echo "Welkom " . $_SESSION ['naam'] . " </br>";
      echo "<a href='read/user_uitlees.php'>VOEG TOE</a>";
    } else{
      echo "fout, probeer opnnieuw";
    }

  } else{
    echo "geen formulier.";
  }
}

?>
