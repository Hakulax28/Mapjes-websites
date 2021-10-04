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
                                                                                                             
                		$telefoonnummer = $row['telefoonnummer'];
                		$achternaam     = $row['achterncaam'];
 
                		echo    "<tr>".
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
                    $select = "SELECT soortgroepsles , sum(aantallessen*prijsperles) from inschrijvingen GROUP BY soortgroepsles";
                    $result = mysqli_query($connection,$select);
                    echo "<table>";
                    while ($row = mysqli_fetch_array($result)){

						$soortgroepsles = $row['soortgroepsles'];
                    	$omzet          = $row['sum(aantallessen*prijsperles)'];

						echo "<div class=\"row\">";
							echo "<div class=\"grid\">"; 
								echo "	<div class=\"gridcolumn\">";
									echo "		<div class=\"productcard\">";
										echo "			<h1>$soortgroepsles </h1>";
										echo "			<p class=\"price\">Euro $omzet </p>";
									echo "		</div>";
								echo "	</div>";
							echo "</div>"; // einde div class grid
						echo "</div>"; // einde div class row
                	}
                	echo "</table>";
                }                                       
            ?>
       </div> <!-- einde card -->
     </div> <!-- einde row -->
 
  </body>
</html>