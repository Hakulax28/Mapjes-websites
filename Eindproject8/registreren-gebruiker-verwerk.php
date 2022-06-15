<?php

if (isset($_POST["submit"])) {

    if (
        !empty($_POST["voornaam"])
        && !empty($_POST["achternaam"])
        && !empty($_POST["email"])
        && !empty($_POST["wachtwoord"])
        && !empty($_POST["geboortedatum"])
        && !empty($_POST["telefoonnummer"])
        && !empty($_POST["rol"])

    ) {
        //allemaal moeten ze true zijn
        $voornaam = $_POST["voornaam"];
        $achternaam = $_POST["achternaam"];
        $email = trim($_POST["email"]);
        $wachtwoord = $_POST["wachtwoord"];
        $geboortedatum = $_POST["geboortedatum"];
        $telefoonnummer = $_POST["telefoonnummer"];
        $rol = $_POST["rol"];

        //database connectie

        require 'database.php';

        $sql = "INSERT INTO users (voornaam, achternaam, email, wachtwoord, geboortedatum, telefoonnummer, rol)
                VALUES ('$voornaam', '$achternaam','$email', '$wachtwoord', '$geboortedatum', '$telefoonnummer', '$rol')";

        // Voer de INSERT INTO STATEMENT uit
        if (mysqli_query($conn, $sql)) {
            header("location: gebruiker-overzicht.php");
        }

        mysqli_close($conn); // Sluit de database verbinding

    }
}
