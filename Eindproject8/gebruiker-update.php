<?php

require 'database.php';

$id = $_GET["id"]; //17

$sql = "SELECT * FROM users WHERE id = $id LIMIT 1";

if ($result = mysqli_query($conn, $sql)) {

    $user = mysqli_fetch_assoc($result);

    var_dump($user);

    if (is_null($user)) {
        header("location: gebruiker-overzicht.php");
    }
}

?>
<?php include 'header.php'; ?>

<form action="update-gebruiker-verwerk.php" method="post">

    <input type="hidden" name="id" value="<?php echo $user["id"] ?>">

    <div class="form-group">
        <label for="voornaam">Voornaam</label>
        <input type="text" name="voornaam" id="voornaam" class="form-control" value="<?php echo $user["voornaam"] ?>">
    </div><br>
    <div class=" form-group">
        <label for="achternaam">Achternaam</label>
        <input type="text" name="achternaam" id="achternaam" class="form-control" value="<?php echo $user["achternaam"] ?>">
    </div><br>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo $user["email"] ?>">
    </div><br>
    <div class="form-group">
        <label for="wachtwoord">Wachtwoord</label>
        <input type="text" name="wachtwoord" id="wachtwoord" class="form-control" value="<?php echo $user["wachtwoord"] ?>">
    </div><br>
    <div class="form-group">
        <label for="geboortedatum">Geboortedatum</label>
        <input type="text" name="geboortedatum" id="geboortedatum" class="form-control" value="<?php echo $user["geboortedatum"] ?>">
    </div><br>
    <div class="form-group">
        <label for="telefoonnummer">Telefoonnummer</label>
        <input type="text" name="telefoonnummer" id="telefoonnummer" class="form-control" value="<?php echo $user["telefoonnummer"] ?>">
    </div><br>
    <div class="form-group">
        <label for="rol">Rol: </label>
        <input type="text" name="rol" id="rol" class="form-control" value="<?php echo $user["rol"] ?>">
    </div><br>
    <div class=" form-group">
        <button type="submit" class="shadow-sm btn btn-info" name="submit">Update gebruiker!</button>
        <a href="gebruiker-overzicht.php" class="shadow-sm btn btn-danger">Annuleer</a>
    </div><br>

</form>
<?php include 'footer.php'; ?>