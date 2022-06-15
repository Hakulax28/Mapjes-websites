<?php

print_r($_GET["id"]);

require 'database.php';

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("location: gebruiker-overzicht.php");
}
