<?php

if (isset($_POST["submit"])) {

    if (
        !empty($_POST["naam"])
        && !empty($_POST["beschrijving"])

    ) {
        //allemaal moeten ze true zijn
        $naam = $_POST["naam"];
        $beschrijving = $_POST["beschrijving"];

        //database connectie

        require 'database.php';

        $sql = "INSERT INTO categorie (naam, beschrijving)
                VALUES ('$naam', '$beschrijving')";

        // Voer de INSERT INTO STATEMENT uit
        if (mysqli_query($conn, $sql)) {
            header("location: categorie-overzicht.php");
        }

        mysqli_close($conn); // Sluit de database verbinding

    }
}
