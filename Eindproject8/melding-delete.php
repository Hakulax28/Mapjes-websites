<?php

session_start();

print_r($_GET["id"]);

require 'database.php';

$id = $_GET['id'];

$sql = "DELETE FROM message WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("location: melding-overzicht.php");
}
