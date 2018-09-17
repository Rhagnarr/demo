<?php
	include('header.php');

	if(isset($_POST['ajout'])) // On est en mode "ajout"
	{
		if(!empty($_POST['Nom']) && !empty($_POST['Description']) && !empty($_POST['Longitude']) && !empty($_POST['Latitude']))
		{
			$Note = $_POST['Note'];
			$Nom = $_POST['Nom'];
			$Description = $_POST['Description'];
			$Latitude = $_POST['Latitude'];
			$Longitude = $_POST['Longitude'];

			$error_format = False;

			if(!is_numeric($Longitude)) {
                echo "<p class='error'>Saisir un nombre réel pour la longitude</p>";
                $error_format = True;
			}
			
			if(!is_numeric($Latitude)) {
                echo "<p class='error'>Erreur, saisir un nombre réel pour la latitude</p>";
                $error_format = True;
			}

			if(!$error_format){
                // Préparation et configuration
                $stmt = $bdd->prepare("INSERT INTO Patrimoine (Nom, Description, Longitude, Latitude) VALUES (:Nom, :Description, :Longitude, :Latitude)");
                // On remplace les paramètres
                $stmt->bindParam(':Nom', $Nom);
                $stmt->bindParam(':Description', $Description);
                $stmt->bindParam(':Longitude', $Longitude);
                $stmt->bindParam(':Latitude', $Latitude);

                $res = $stmt->execute();
                // Execution, on affiche un message suivant le résultat de la requête
                if($res){
                    echo "<p class='valid'>Le patrimoine a été ajouté</p>";
                }
                else {
                    echo "<p class='error'>Une erreur est survenue, le patrimoine n'a pas pu être ajouté !</p>";
                }
            }
		}
		else {
            echo "<p class='error'>Un ou plusieurs champs n'ont pas été complétés</p>";
        }
	}
?>
	

	<h2>Informations sur le patrimoine</h2>
	<form method="post" action="modification.php">
		<p>
			<label for="Nom">Nom :</label>
			<input type="varchar" name="Nom" placeholder="Nom du patrimoine" />
		</p>
		<p>
			<label for="Description">Description :</label>
			<input type="text" name="Description" placeholder="Description du patrimoine" />
		</p>

		<p>
			<h3>Les coordonnées:</h3>
		</p>
		
		<p>
			<label for="Longitude">Longitude :</label>
			<input id="lng_input" type="real" name="Longitude" placeholder="Saisir la longitude" />
		</p>
		
		<p>
			<label for="Latitude">Latitude :</label>
			<input id="lat_input" type="real" name="Latitude" placeholder="Saisir la latitude" />
		</p>

        <div id="mapid" style="width=100%;height:200px;"></div>

		<p>
			<input type="submit" value="Ajouter le patrimoine" name="ajout" />
			<input type="reset" value="Vider le formulaire" />
		</p>
	</form>

    <script src="scripts/modification_map.js"></script>
<?php
	include('footer.php');
?>