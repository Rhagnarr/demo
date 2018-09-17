<?php
include('header.php');
$errorMessage = '';
if(isset($_POST['Connexion'])){ // si le bouton Connexion a été cliqué alors
    if(!empty($_POST['mail'])){
        $mail = $_POST['mail'];
            if(!empty($_POST['mot de passe'])){
                $mdp = $_POST['mot_de_passe'];
                $insertion = $bdd->prepare('SELECT Mot_de_passe FROM Utilisateur WHERE Email="'.$mail.'"');
                $insertion->execute(); // exécution de la requête stockée dans la variable $insertion
                $grain = 'b54sFmjJ52';
				$sel = 'a12Gfd51gzR';
				$sha1 = sha1($grain.$mdp.$sel);

				if($sha1==$insertion){
					session_start(); 
					$insertion = $bdd->prepare('SELECT nom FROM Utilisateur WHERE Email="'.$mail.'"');
					$insertion->execute();
					$_SESSION['login'] = $insertion;
				}
				else {
					$errorMessage = 'Mauvais password !';
					
				}
            }
        }
	}
>>>>>>> 35c020468c5f91fbefd0ac1a54193134f2e20d0c
?>

<div id="wrap_index">

    <div id="mapid" style="width=100%;height:600px;"></div>
    <script>
        var mymap = L.map('mapid').setView([47.729373, 7.310629], 13);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoiZ3BpYWxsYSIsImEiOiJjamlhcWI1ajExYTFxM2tyeHh4MWF1bjRxIn0.xsG8CN5ZyPV4JwYojldaLg'
        }).addTo(mymap);

        <?php
            $reponse = $bdd->query("SELECT * FROM Patrimoine");
            while($row = $reponse->fetch()) {
                echo 'var marker = L.marker(['.$row['Latitude'].', '.$row['Longitude'].']).addTo(mymap);';
                echo 'marker.bindPopup("<b>'.$row['Nom'].'</b><br>'.$row['Description'].'");';
            }
        ?>

    </script>

</div>

<?php include('footer.php'); ?>

