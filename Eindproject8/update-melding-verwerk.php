<?php

if (isset($_POST["submit"])) {

    $id = $_POST["id"];

    if (
        !empty($_POST["bericht"])
        && !empty($_POST["status"])
        && !empty($_POST["datum"])
        && !empty($_POST["opmerking"])

    ) {
        //allemaal moeten ze true zijn
        $bericht = $_POST["bericht"];
        $status = $_POST["status"];
        $datum = $_POST["datum"];
        $opmerking = $_POST["opmerking"];

        //database connectie

        require 'database.php';

        $sql = "UPDATE message SET 
        bericht = '$bericht',
        status = '$status',
        datum = '$datum',
        opmerking = '$opmerking' WHERE id = '$id'  ";

        // Voer de INSERT INTO STATEMENT uit

        if (mysqli_query($conn, $sql)) {
            header("location: melding-overzicht.php");
        }

        echo "Updated successfully";
        mysqli_close($conn); // Sluit de database verbinding

    }
}
