<?php include 'header.php'; ?>

<?php require 'database.php'; ?>

<?php

$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);

$all_users = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<?php

$sql = "SELECT * FROM categorie";

$result = mysqli_query($conn, $sql);

$all_categorie = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<form action="registreren-melding-verwerk.php" method="post">
    <div class="form-group">
        <label for="gebruiker">Gebruiker: </label>
        <select class="form-select" name="gebruiker">
            <?php
            foreach ($all_users as $use) : ?>
                <option selected='selected' value='<?php echo $use['id'] ?>'><?php echo $use['voornaam'] ?> <?php echo $use['achternaam'] ?></option>
            <?php endforeach ?>
        </select>
    </div><br>
    <div class="form-group">
        <label for="bericht">Gebruikers bericht: </label>
        <input type="text" name="bericht" id="bericht" class="form-control">
    </div><br>
    <div class=" form-group">
        <label for="status">Status: </label>
        <input type="text" name="status" id="status" class="form-control">
    </div><br>
    <div class="form-group">
        <label for="categorie">Categorie: </label>
        <select class="form-select" name="categorie">
            <?php
            foreach ($all_categorie as $cat) : ?>
                <option selected='selected' value='<?php echo $cat['id'] ?>'><?php echo $cat['naam'] ?></option>
            <?php endforeach ?>
        </select>
    </div><br>
    <div class="form-group">
        <label for="datum">Datum: </label>
        <input type="date" name="datum" id="datum" class="form-control">
    </div><br>
    <div class="form-group">
        <label for="personeel">Personeel die het gaat behandelen: </label>
        <select class="form-select" name="personeel">
            <?php
            foreach ($all_users as $use) : ?>
                <option selected='selected' value='<?php echo $use['id'] ?>'><?php echo $use['voornaam'] ?> <?php echo $use['achternaam'] ?></option>
            <?php endforeach ?>
        </select>
    </div><br>
    <div class=" form-group">
        <button type="submit" class="shadow-sm btn btn-info" name="submit">Registreer melding</button>
        <a href="melding-overzicht.php" class="shadow-sm btn btn-danger">Annuleer</a>
    </div>
</form>
<?php include 'footer.php'; ?>