<?php

if (isset($_POST["submit"])) {

    $id = $_POST["id"];

    if (
        !empty($_POST["naam"])
        && !empty($_POST["beschrijving"])

    ) {
        //allemaal moeten ze true zijn
        $naam = $_POST["naam"];
        $beschrijving = $_POST["beschrijving"];

        //database connectie

        require 'database.php';

        $sql = "UPDATE categorie SET 
        naam = '$naam',
        beschrijving = '$beschrijving' WHERE id = '$id'  ";

        // Voer de INSERT INTO STATEMENT uit

        if (mysqli_query($conn, $sql)) {
            header("location: categorie-overzicht.php");
        }

        echo "Updated successfully";
        mysqli_close($conn); // Sluit de database verbinding

    }
}
