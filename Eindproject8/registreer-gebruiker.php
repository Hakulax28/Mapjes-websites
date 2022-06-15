<?php include 'header.php'; ?>

<form action="registreren-gebruiker-verwerk.php" method="post">
    <div class="form-group">
        <label for="voornaam">Voornaam: </label>
        <input type="text" name="voornaam" id="voornaam" class="form-control">
    </div><br>
    <div class="form-group">
        <label for="achternaam">Achternaam: </label>
        <input type="text" name="achternaam" id="achternaam" class="form-control">
    </div><br>
    <div class="form-group">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" class="form-control">
    </div><br>
    <div class="form-group">
        <label for="wachtwoord">Wachtwoord: </label>
        <input type="password" name="wachtwoord" id="wachtwoord" class="form-control">
    </div><br>
    <div class="form-group">
        <label for="geboortedatum">Geboortedatum: </label>
        <input type="date" name="geboortedatum" id="geboortedatum" class="form-control">
    </div><br>
    <div class="form-group">
        <label for="telefoonnummer">Telefoonnummer: </label>
        <input type="phone" name="telefoonnummer" id="telefoonnummer" class="form-control">
    </div><br>
    <div class="form-group">
        <label for="rol">Rol: </label>
        <input type="text" name="rol" id="rol" class="form-control">
    </div><br>

    <div class="form-group">
        <button type="submit" class="shadow-sm btn btn-primary" name="submit">Registreer gebruiker!</button>
        <a href="gebruiker-overzicht.php" class="shadow-sm btn btn-danger">Annuleer</a>
    </div>

</form>
<?php include 'footer.php'; ?>