<?php

session_start();

if (!$_SESSION["is_logged_in"]) {
    header("location: inloggen.php");
}

?>

<?php include 'header.php'; ?>

<?php require 'database.php'; ?>

<?php

// hier moet de info van de anderen tabelen te voor schijn komen. 

$sql = "SELECT * FROM message";

$sql = "SELECT *, categorie.naam as categorie_naam, us1.voornaam as gebr_voornaam, us2.voornaam as pers_voornaam
FROM message  
JOIN categorie 
ON categorie.id = message.categorie_id 
JOIN users as us1
ON us1.id = message.gebruiker_id 
JOIN users as us2
ON us2.id = message.personeel_id";

if ($result = mysqli_query($conn, $sql)) {
    $messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

echo "Welcome , Je bent er nu in ";

?>

<a href="registreer-melding.php" class="shadow-sm btn btn-success">Voeg een melding toe</a>
<a href="loguit.php" class="shadow-sm btn btn-danger">Log uit</a>

<p></p>

<table class="table table-striped table-dark">

    <thead>
        <tr>
            <!--<th>ID</th>-->
            <th>Gebruikers die de bericht hebben gemaakt</th>
            <th>Bericht</th>
            <th>Status</th>
            <th>Categorie</th>
            <th>Datum</th>
            <th>Opmerking</th>
            <th>Personeels die het behandelen</th>
            <th>Verwijder</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($messages as $message) : ?>
            <tr>
                <!--<td><?php echo $message["id"] ?></td>-->
                <td><?php echo $message["gebr_voornaam"] ?></td>
                <td><?php echo $message["bericht"] ?></td>
                <td><?php echo $message["status"] ?></td>
                <td><?php echo $message["categorie_naam"] ?></td>
                <td><?php echo $message["datum"] ?></td>
                <td><?php echo $message["opmerking"] ?></td>
                <td><?php echo $message["pers_voornaam"] ?></td>
                <?php

                if ($_SESSION['rol'] == "personeel") : ?>
                    <td><a href="melding-delete.php?id=<?php echo $message["id"] ?>" class="btn btn-danger">Delete</a></td>
                    <td><a href="melding-update.php?id=<?php echo $message["id"] ?>" class="btn btn-warning">Update</a></td>
                <?php endif ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>