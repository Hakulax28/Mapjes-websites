<?php

require 'database.php';

$id = $_GET["id"]; //17

$sql = "SELECT * FROM categorie WHERE id = $id LIMIT 1";

if ($result = mysqli_query($conn, $sql)) {

    $user = mysqli_fetch_assoc($result);

    var_dump($user);

    if (is_null($user)) {
        header("location: categorie-overzicht.php");
    }
}

?>
<?php include 'header.php'; ?>

<form action="update-categorie-verwerk.php" method="post">

    <input type="hidden" name="id" value="<?php echo $user["id"] ?>">

    <div class="form-group">
        <label for="naam">Naam</label>
        <input type="text" name="naam" id="naam" class="form-control" value="<?php echo $user["naam"] ?>">
    </div><br>
    <div class=" form-group">
        <label for="beschrijving">Beschrijving</label>
        <input type="text" name="beschrijving" id="beschrijving" class="form-control" value="<?php echo $user["beschrijving"] ?>">
    </div><br>
    <div class=" form-group">
        <button type="submit" class="shadow-sm btn btn-info" name="submit">Update categorie!</button>
        <a href="categorie-overzicht.php" class="shadow-sm btn btn-danger">Annuleer</a>
    </div><br>

</form>
<?php include 'footer.php'; ?>