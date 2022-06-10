<!DOCTYPE html>
<html>
  <head>
    <link href="css/layout.css" rel="stylesheet" type="text/css" />
    <link href="css/form.css" rel="stylesheet" type="text/css" />
    <link href="css/productcard.css" rel="stylesheet" type="text/css" />
  </head>
 
  <body>
    <div class="header">
      <h1>SuperFit</h1>
    </div>
 
    <div class="topnav">
      <a href="index.html">Thuis</a>
    </div>
 
    <div class="card" style="background-color: #cfd8dc">
                              
        <form action="queries3.php" method="post">
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
                                                                                                             
                        $telefoonnummer = $row['telefoonnummer'];
                        $achternaam     = $row['achterncaam'];
 
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
                        
                        $woonplaats = $row['woonplaats'];
                        $aantal     = $row['count(*)'];
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
                    $select = "SELECT instructeur, soortgroepsles, count(*) as aantal_leden, sum(prijsperles) as totale_omzet, round(sum(prijsperles) / count(*),2) as gemiddelde_per_klant, sum(aantallessen*prijsperles) from inschrijvingen GROUP BY instructeur, soortgroepsles";
                    $result = mysqli_query($connection,$select);
                    // TotaalOmzet initialiseren
                    
                    $TotaalOmzet=0;
                    $teller=0;
                    $Leden=0;
                    $Gemiddelde=0;
                    $Les=0;
                    echo "<table>";
                    
                    echo "<div class=\"row\">";
                    echo "<div class=\"grid\">";
                    
                    while ($row = mysqli_fetch_array($result)){
                        
                        $soortgroepsles = $row['soortgroepsles'];
                        $Les  	        = $row['totale_omzet'];
                        $omzet          = $row['sum(aantallessen*prijsperles)'];
                        $Leden          = $row['aantal_leden'];
                        $GemiddeldeOmzet= $row['gemiddelde_per_klant'];
                        $TotaalOmzet    = $TotaalOmzet + $omzet;
                        $teller         = $teller + 1;
                        $instructeur    = $row['instructeur'];
                        
                        echo "  <div class=\"gridcolumn\">";
                        echo "     <div class=\"productcard\">";
                        echo "        <h1>$soortgroepsles</h1>";
                        echo "        <p><b>Instructeur: $instructeur</b></p>";
                        echo "        <p><b>Aantal leden: $Leden</b></p>";
                        echo "        <p><b>Omzet: € $Les </b></p>";
                        echo "        <p class=\"price\"><b>Totaal: Euro $omzet </b></p>";
                        echo "        <p class=\"price\"><b>Gemiddelde per klant: Euro $GemiddeldeOmzet </b></p>";
                        echo "     </div>";
                        echo "  </div>";
                    }
                    
                    $Gemiddelde = $TotaalOmzet / $teller;
                    $Gemiddelde = number_format((float)$Gemiddelde,2,',','');

                    echo "  <div class=\"gridcolumn\">";
                    echo "     <div class=\"productcard\">";
                    echo "        <h1>Gehele totaal: </h1>";
                    echo "        <p><b>Totaal: $TotaalOmzet </b></p>";
                    echo "        <p><b>Gemiddelde per klant: $Gemiddelde</b></p>";
                    echo "     </div";
                    echo "   </div";

                    echo "   </div>"; // einde div class grid
                    echo "</div>"; // einde div class row           
                    
                    echo "</table>";                   
                }
            ?>
    </div> <!-- einde card -->
 
  </body>
</html>