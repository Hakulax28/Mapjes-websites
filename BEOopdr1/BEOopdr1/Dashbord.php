<!DOCTYPE html>
<html>
<head>
    <link href="css/layout.css" rel="stylesheet" type="text/css" />
    <link href="css/form.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="header">
    <h1>SuperFit</h1>
</div>

<div class="topnav">
    <a href="index.html">Thuis</a>
</div>

<div class="row">
    <div class="card" style="background-color: #cfd8dc">

        <form action="queries.php" method="post">
            <div class="container">
                <input type="submit" name="telefoonlijst" value="Telefoonlijst" class="overzichtbutton" />
                <input type="submit" name="lijstwoonplaats" value="Klanten per woonplaats" class="overzichtbutton" />
                <input type="submit" name="omzetsoortles" value="Omzet per soort les" class="overzichtbutton" />
            </div> <!-- einde container -->
        </form>

        <?php
        if (isset($_POST['telefoonlijst'])){
            $connection = mysqli_connect("localhost","root","","webshop");
            $select = "SELECT achterncaam, telefoonnummer from gebruikers order by achterncaam";
            $result = mysqli_query($connection,$select);
            echo "<table>";
            while ($row = mysqli_fetch_array($result)){

                $telefoonnummer          = $row['telefoonnummer'];
                $achternaam                     = $row['achterncaam'];

                echo      "<tr>".
                    "<td>".
                    $achternaam.
                    "</td>".
                    "<td>".
                    $telefoonnummer.
                    "</td>".
                    "</tr>";
            }
            echo "</table>";
        }
        if (isset($_POST['lijstwoonplaats'])){
            $connection = mysqli_connect("localhost","root","","webshop");
            $select = "SELECT DISTINCT(woonplaats) , count(*) from gebruikers GROUP BY woonplaats";
            $result = mysqli_query($connection,$select);
            echo "<table>";
            while ($row = mysqli_fetch_array($result)){
                $woonplaats      = $row['woonplaats'];
                $aantal                                 = $row['count(*)'];
                echo      "<tr>".
                    "<td>".
                    "Woonplaats:".$woonplaats.
                    "</td>".
                    "<td>".
                    "Aantal:".$aantal.
                    "</td>".
                    "</tr>";
            }
            echo "</table>";
        }
        if (isset($_POST['omzetsoortles'])){
            $connection = mysqli_connect("localhost","root","","webshop");
            $select = "SELECT soortgroepsles , sum(aantallessen*prijsperles) from inschrijvingen GROUP BY soortgroepsles ORDER BY 2 DESC";
            $result = mysqli_query($connection,$select);
            // TotaalOmzet initialiseren
            $TotaalOmzet=0;
            $Teller=0;
            echo "<table>";
            // kopjes
            echo      "<tr>".
                "<td>".
                "<u>Groepsles</u>".
                "</td>".
                "<td>".
                "<u>Omzet</u>".
                "</td>".
                "</tr>";
            while ($row = mysqli_fetch_array($result)){
                $soortgroepsles               = $row['soortgroepsles'];
                $omzet                        = $row['sum(aantallessen*prijsperles)'];
                $TotaalOmzet                  = $TotaalOmzet+$omzet;
                $Teller                       = $Teller + 1;
                echo      "<tr>".
                    "<td>".
                    "<span style=\"color:blue\">$soortgroepsles</span>".
                    "</td>".
                    "<td>".
                    "$omzet".
                    "</td>".
                    "</tr>";
            }
            echo      "<tr>".
                "<td>".
                "<b>Totaal:</b>".
                "</td>".
                "<td>".
                "<b>$TotaalOmzet</b>".
                "</td>".
                "</tr>";

            $GemiddeldeOmzet = $TotaalOmzet / $Teller;
            // op 2 cijfers achter de komma:
            $GemiddeldeOmzet = number_format((float)$GemiddeldeOmzet,2,',','');
            echo      "<tr>".
                "<td>".
                "<b>Gemiddeld:</b>".
                "</td>".
                "<td>".
                "<b><i>$GemiddeldeOmzet</i></b>".
                "</td>".
                "</tr>";

            echo "</table>";

        }
        ?>
    </div> <!-- einde card -->
</div> <!-- einde row -->

</body>
</html>
