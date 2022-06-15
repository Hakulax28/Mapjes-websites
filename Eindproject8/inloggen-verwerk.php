<?php

require 'database.php';

session_start();

$_SESSION["temp_data"]["message"] = null;

if (empty($_POST["email"]) && empty($_POST["wachtwoord"])) {
   header("location: inloggen.php");
}

$email = $_POST["email"];
$wachtwoord = $_POST["wachtwoord"];

$sql = "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_query($conn, $sql);

if (is_object($result)) {
   $user = mysqli_fetch_assoc($result);

   if (is_null($user)) {
      $_SESSION["temp_data"]["message"] = "GEEN gebruiker met deze mail adres";
      header("location: inloggen.php");
   } else {
      if ($wachtwoord == $user['wachtwoord']) {
         //hier is een gebruiker bekend

         $_SESSION["email"] = $user["email"];
         $_SESSION["voornaam"] = $user["voornaam"];
         $_SESSION["is_logged_in"] = true;
         $_SESSION["ip-address"] = $_SERVER['ipaddress'];

         header("location: gebruiker-overzicht.php");
      } else {
         $_SESSION["temp_data"]["message"] = "Wachtwoord is niet correct";
         header("location: inloggen.php");
      }
   }
}
