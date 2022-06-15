<?php

session_start();

if (!$_SESSION["is_logged_in"]) {
    header("location: inloggen.php");
}

?>

<?php include 'header.php'; ?>

<?php require 'database.php'; ?>

<?php

if (isset($_POST["zoekveld"])) {
    $zoekveld = $_POST["zoekveld"];
    $sql = "SELECT *, 
    products.id as product_id,
    producten.name as producten_name, 
    suppliers.naam as supplier_naam,
    FROM producten 
    LEFT JOIN suppliers ON suppliers.id = producten.supplier_id";
}

$sql = "SELECT * FROM categorie ";

if ($result = mysqli_query($conn, $sql)) {
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

echo "Welcome , Je bent er nu in ";
?>
<a href="registreer-categorie.php" class="shadow-sm btn btn-success">Voeg een categorie toe</a>
<a href="loguit.php" class="shadow-sm btn btn-danger">Log uit</a>

<p></p>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th>Verwijder</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user["id"] ?></td>
                <td><?php echo $user["naam"] ?></td>
                <td><?php echo $user["beschrijving"] ?></td>
                <td><a href="categorie-delete.php?id=<?php echo $user["id"] ?>" class="btn btn-danger">Delete</a></td>
                <td><a href="categorie-update.php?id=<?php echo $user["id"] ?>" class="btn btn-warning">Update</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>