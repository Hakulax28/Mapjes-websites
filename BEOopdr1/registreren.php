<!DOCTYPE html>
<html>
  <head>
    <link href="css/layout.css" rel="stylesheet" type="text/css" />
    <link href="css/form.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="header">
      <h1>SuperFit</h1>
      <p>
        Wacht niet langer op wat gaat komen - ga erop uit en laat het gebeuren!
      </p>
    </div>

    <div class="topnav">
      <a href="index.html">Thuis</a>
    </div>

    <div class="row">
		<div class="leftcolumn">
			<div class="card" style="background-color: #cfd8dc">
  
				<?php
					// variabalen initialiseren ( leegmaken)
					$inlognaam = "";
					$achterncaam = "";
					$email = "";
					$telefoon = "";
					$adres = "";
					$postcode = "";
					$woonplaats = "";
					// array voor invoerfouten definiteren
					$invoerfouten = array();
				
					// als op registreer wordt gedrukt
					if (isset($_POST['Registreer'])){
						$inlognaam		= $_POST['inlognaam'];
						$achternaam 	= $_POST['achternaam'];
						$email 			= $_POST['email'];
						$telefoon		= $_POST['telefoon'];
						$adres 			= $_POST['adres'];
						$postcode		= $_POST['postcode'];
						$woonplaats		= $_POST['woonplaats'];
						
						if (empty($inlognaam)){
							// als inlognaam niet is ingevuld(leeg), dan regel toevoegen aan array invoerfouten.
							array_push($invoerfouten,"Een inlognaam is verplicht");
						}
						if (empty($achternaam)){
							array_push($invoerfouten,"Een achternaam is verplicht");
						}
						if (empty($email)){
							array_push($invoerfouten,"Een email adres is verplicht");
						}
						
						// als in het array invoerfouten geen regels zijn
						if (count($invoerfouten)== 0){
							//connectie met database
							$connection = mysqli_connect("localhost","root","","webshop");	
					
							// insert statement samenstellen
							$sql = "insert into gebruikers(inlognaam,wachtwoord,achterncaam,email,telefoonnummer,adres,postcode,woonplaats)
												values('$inlognaam','$wachtwoord','$achternaam','$email','$telefoon','$adres','$postcode','$woonplaats')";
							// insert statement uitvoeren
							mysqli_query($connection, $sql);
							
							// terug naar homepagina
							header("Location:index.html");
						}
						else{
							//als er invoerfouten zijn, voor elke regel de fout tonen.
							foreach ($invoerfouten as $invoerfout){
								// voor iedere regel in het array de invoerfout tonen  tekstkleur rood.
								echo "<div style=color:red>".$invoerfout."</div>";
							}
						}

					} // einde if (isset($_POST['submit']))
			?>  <!-- einde php -->
			
			<form action="registreren.php" method="post">
				<div class="container">
					<label>Inlognaam *</label>
					<input type="text" name="inlognaam" />
					<label>Achternaam *</label>
					<input type="text" name="achternaam" />
					<label>Email adres *</label>
					<input type="text" name="email" />
					<label>Telefoon</label>
					<input type="text" name="telefoon" />
					<label>Adres</label>
					<input type="text" name="adres" />
					<label>Postcode</label>
					<input type="text" name="postcode" />
					<label>Woonplaats</label>
					<input type="text" name="woonplaats" />
					<div class="clearfix">
						<button type="submit" name="Registreer" class="submitbutton">
						Registreer
						</button>
					</div>
				</div> <!-- einde container -->
			</form>
       </div> <!-- einde card -->
      </div> /<!-- einde leftcolumn -->

      <div class="rightcolumn">
        <div class="card">
          <div class="news instructor"></div>
          <div class="card-content">
            <h2>Over mij</h2>
            <p>
              Hallo! Ik heet Kees en ik ben inmiddels meer dan 10 jaar
              sportinstructeur.<br /><br />
              Ik gebruik mijn ervaring graag om je beter te maken!
            </p>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <h3>Populaire berichten</h3>
            <div class="news news1">
              <p>Waar moet je op letten als je een sportschool uitkiest?</p>
            </div>
            <div class="news news2">
              <p>10 voordelen van sporten in een sportschool</p>
            </div>
            <div class="news news3">
              <p>
                De 2 meest verwachte ‘fouten’ als de sportscholen weer open gaan
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer">
      <h3>
        <span class="emphasize">Nova Fit</span> - De sportschool in Haarlem |
        Tel: <span class="emphasize">06-12345678</span> | Adres:
        <span class="emphasize">Sportlaan 1, 1000AA Haarlem</span>
      </h3>
    </div>
  </body>
</html>
