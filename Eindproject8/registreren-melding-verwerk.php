<?php

if (isset($_POST["submit"])) {


    //database connectie
    if (
        !empty($_POST["gebruiker"])
        && !empty($_POST["bericht"])
        && !empty($_POST["status"])
        && !empty($_POST["categorie"])
        && !empty($_POST["datum"])
        && !empty($_POST["personeel"])

    ) {
        //allemaal moeten ze true zijn
        $gebruiker = $_POST["gebruiker"];
        $bericht = $_POST["bericht"];
        $status = $_POST["status"];
        $categorie = $_POST["categorie"];
        $datum = $_POST["datum"];
        $personeel = $_POST["personeel"];

        require 'database.php';

        $sql = "INSERT INTO message (`gebruiker_id`, `bericht`, `status`, `categorie_id`, `datum`, `personeel_id`) 
        VALUES ('$gebruiker', '$bericht', '$status', '$categorie', '$datum', '$personeel')";

        // Voer de INSERT INTO STATEMENT uit
        if (mysqli_query($conn, $sql)) {
            header("location: melding-overzicht.php");
        }

        mysqli_close($conn); // Sluit de database verbinding

    }
}
