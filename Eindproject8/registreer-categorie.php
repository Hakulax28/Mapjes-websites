<?php include 'header.php'; ?>

<form action="registreren-categorie-verwerk.php" method="post">
    <div class="form-group">
        <label for="naam">Naam: </label>
        <input type="text" name="naam" id="naam" class="form-control">
    </div><br>
    <div class="form-group">
        <label for="beschrijving">Beschrijving: </label>
        <input type="text" name="beschrijving" id="beschrijving" class="form-control">
    </div><br>
    <div class="form-group">
        <button type="submit" class="shadow-sm btn btn-primary" name="submit">Registreer categorie!</button>
        <a href="categorie-overzicht.php" class="shadow-sm btn btn-danger">Annuleer</a>
    </div>

</form>
<?php include 'footer.php'; ?>