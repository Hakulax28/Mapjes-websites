<?php

session_start();

if (!$_SESSION["is_logged_in"]) {
    header("location: inloggen.php");
}
//if ($_SESSION["rol"] == "personeel") {
//    echo "U kan nu alles doen";
//} else if ($_SESSION["rol"] == "gebruiker") {
//    echo "U kan alleen een melding registreren registreren";
//}

?>

<?php include 'header.php'; ?>

<?php require 'database.php'; ?>

<?php

$sql = "SELECT * FROM users ";

if (isset($_POST["submit"])) {
    $rol = $_POST["rol"];

    $sql = "SELECT *, users.id as users_id, users.voornaam as users_voornaam, users.rol as users_rol FROM users WHERE rol = '$rol'";
}

if ($result = mysqli_query($conn, $sql)) {
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

echo "Welcome , Je bent er nu in ";
?>
<a href="registreer-gebruiker.php" class="shadow-sm btn btn-success">Nieuwe gebruiker</a>
<a href="loguit.php" class="shadow-sm btn btn-danger">Log uit</a>

<p></p> <!-- Zorgt er voor dat het er netjes uit ziet. -->

<div class="row">
    <div class="col">
        <form action="" method="post">
            <input type="radio" name="rol" id="personeel" value="personeel" class="form-check-input">
            <label for="personeel" class="form-check-label">Personeel </label>
            <br>
            <input type="radio" name="rol" id="gebruiker" value="gebruiker" class="form-check-input">
            <label for="gebruiker" class="form-check-label">Gebruiker </label>
            <br>
            <input type="radio" name="rol" id="beide" value="beide" class="form-check-input" disabled>
            <label for="beide" class="form-check-label">Beide </label>
            <br>
            <button type="submit" name="submit" class="btn btn-info">Zoek!</button>
        </form>
    </div>
</div><br>
<p></p>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Email</th>
            <th>Wachtwoord</th>
            <th>Geboortedatum</th>
            <th>Telefoonnummer</th>
            <th>Rol</th>
            <th>Verwijder</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user["id"] ?></td>
                <td><?php echo $user["voornaam"] ?></td>
                <td><?php echo $user["achternaam"] ?></td>
                <td><?php echo $user["email"] ?></td>
                <td><?php echo $user["wachtwoord"] ?></td>
                <td><?php echo $user["geboortedatum"] ?></td>
                <td><?php echo $user["telefoonnummer"] ?></td>
                <td><?php echo $user["rol"] ?></td>
                <td><a href="gebruiker-delete.php?id=<?php echo $user["id"] ?>" class="btn btn-danger">Delete</a></td>
                <td><a href="gebruiker-update.php?id=<?php echo $user["id"] ?>" class="btn btn-warning">Update</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>