<?php

session_start();

require 'database.php';

$id = $_GET["id"]; //17

$sql = "SELECT * FROM message WHERE id = $id LIMIT 1";

if ($result = mysqli_query($conn, $sql)) {

    $user = mysqli_fetch_assoc($result);

    var_dump($user);

    if (is_null($user)) {
        header("location: melding-overzicht.php");
    }
}

?>
<?php include 'header.php'; ?>

<form action="update-melding-verwerk.php" method="post">

    <input type="hidden" name="id" value="<?php echo $user["id"] ?>">

    <div class=" form-group">
        <label for="bericht">Bericht</label>
        <input type="text" name="bericht" id="bericht" class="form-control" value="<?php echo $user["bericht"] ?>">
    </div><br>
    <div class=" form-group">
        <label for="status">Status</label>
        <input type="text" name="status" id="status" class="form-control" value="<?php echo $user["status"] ?>">
    </div><br>
    <div class="form-group">
        <label for="datum">Datum</label>
        <input type="date" name="datum" id="datum" class="form-control" value="<?php echo $user["datum"] ?>">
    </div><br>
    <div class="form-group">
        <label for="opmerking">Opmerking van personeel</label>
        <input type="text" name="opmerking" id="opmerking" class="form-control" value="<?php echo $user["opmerking"] ?>">
    </div><br>
    <div class=" form-group">
        <button type="submit" class="shadow-sm btn btn-info" name="submit">Update gebruiker!</button>
        <a href="melding-overzicht.php" class="shadow-sm btn btn-danger">Annuleer</a>
    </div><br>

</form>
<?php include 'footer.php'; ?>