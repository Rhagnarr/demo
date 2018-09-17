<?php

    session_start();
    $_SESSION['id']=1;

    try{ // on essaie

        $bdd = new PDO('mysql:host=localhost;dbname=PatriMap;charset=utf8', 'root', ''); /*

        on stocke la connexion à la base de données dans une variable $bdd
        la connexion se fait via la fonction PDO qui contient trois paramètres
        le premier paramètre est en trois parties : l'hôte du mysql (localhost si on est en local), le nom de la base de données et son encodage
        le second paramètre est l'identifiant de connexion à la base de données
        le dernier paramètre est le mot de passe de connexion à la base de données (en local il n'y a pas de mot de passe)
        */
    }
    catch(Exception $e){ // sinon on attrape l'erreur
        die('Erreur : '.$e->getMessage()); // on arrête tous les processus et on affiche le message d'erreur
    }
	session_start();
	$errormessage='';
	if(isset($_POST['Deconnexion'])){
		$_SESSION['login']='';
		$_SESSION['id']='';
	}
	if(isset($_POST['inscription'])){ // si le bouton inscription a été cliqué alors
        

		if(!empty($_POST['nom'])){ // si le champ nom a été rempli alors
            
			$nom = $_POST['nom']; // stockage de la valeur du champ nom dans la variable $nom
            if(!empty($_POST['prenom'])){
		if(empty($_POST['nom'])) { // si le champ nom a été rempli alors
		    $errormessage= "<p class='error'>Le nom n'a pas été donné !</p>";
        }
        else{
			$nom = $_POST['nom']; // stockage de la valeur du champ nom dans la variable $nom
            if(empty($_POST['prenom'])) {
                $errormessage= "<p class='error'>Le prénom n'a pas été donné !</p>";
            }
            else {
				$prenom = $_POST['prenom'];
                if(empty($_POST['mail'])) {
                    $errormessage= "<p class='error'>Le mail n'a pas été donné !</p>";
                }
                else{
                    $mail = $_POST['mail'];
                    if(empty($_POST['mdp'])){
                        $errormessage= "<p class='error'>Le mot de passe n'a pas été donné !</p>";
                    }else {
                        $mdp = $_POST['mdp'];
						
                        if(empty($_POST['confmdp'])) {
                            $errormessage= "<p class='error'>Le mot de passe de confirmation n'a pas été donné !</p>";
                        }
                        else {

                            if($mdp != $_POST['confmdp']){
                                $errormessage= "<p class='error'>Les deux mots de passe sont différents !</p>";
                            }
                            else{
                                $nbrRows = $bdd->query('SELECT count(*) AS `count` FROM `Utilisateur` WHERE `Email` = "'.$mail.'"')->fetchColumn();
                                // nbrRows Vérifie que l'@ mail n'est pas déjà utilisée

                                if($nbrRows != "0"){
                                    $errormessage= "<p class='error'>Cette adresse mail est déjà utilisée !</p>";
                                } else {
                                    // Si @ mail inutilisée

                                    $mdp1 = $_POST['confmdp'];
                                    $grain = 'b54sFmjJ52';      // Grain
                                    $sel = 'a12Gfd51gzR';       // Sel
                                    $sha1 = sha1($grain.$mdp.$sel); // Chiffrement SHA1

                                    // Requête d'insertion
                                    $stmt = $bdd->prepare('INSERT INTO Utilisateur(Nom, Prenom, Email, Password) VALUES(:Nom, :Prenom, :Email, :Password)');
                                    $stmt->bindParam(':Nom', $nom);
                                    $stmt->bindParam(':Prenom', $prenom);
                                    $stmt->bindParam(':Email', $mail);
                                    $stmt->bindParam(':Password', $sha1);

                                    // exécution de la requête stockée dans la variable $insertion
                                    if($stmt->execute())
                                    {
                                        $errormessage= "<p class='valid'>Votre compte a été créé, veuillez vous connecter !</p>";
                                    }
                                    else {
                                        $errormessage= "<p class='error'>Une erreur est survenue !</p>";
                                    }
                                }
                            }
                        }
                    }
                }
            }
		}
    }
		}
	}
	if(isset($_POST['Connexion'])){
	// si le bouton Connexion a été cliqué alors
    if(!empty($_POST['mail'])){
        $mail = $_POST['mail'];
            if(!empty($_POST['mdp'])){
                $mdp = $_POST['mdp'];
                $reponse = $bdd->query('SELECT * FROM Utilisateur');
                 // exécution de la requête stockée dans la variable reponse
                $grain = 'b54sFmjJ52';
				$sel = 'a12Gfd51gzR';
				$sha1 = sha1($grain.$mdp.$sel);
				
				while ($row = $reponse->fetch()){
					if ($row['Email']==$mail){
				if($sha1 == $row['Password']){
					$insertion = $bdd->query('SELECT * FROM Utilisateur ');
					while ($donnees=$insertion->fetch()){
						if ($donnees['Email']==$mail){
							$_SESSION['login'] = $donnees['Prenom'];
							$_SESSION['id'] =$donnees['Id'];
						}
				}
				}
				
				
					
				else {
					$errormessage='Mauvais password !';
					
				}
					}
				}
            }
        }
	}
	
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>PatriMaps</title>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
              integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
              crossorigin=""/>
        <link rel="stylesheet" href="style.css" />

        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
                integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
                crossorigin=""></script>
    </head>
	<body>
<<<<<<< HEAD
		<header>
            <h1><a href="index.php"><?php echo "PatriMaps"; ?></a></h1>
			<?php include('navigation.php'); 
			?>
		</header>
		<?php echo $errormessage?>
		<section id="content">
=======
    <header id="wrap_header">

        <div class="header_gauche">
            <a href="index.php">Accueil</a>
            <a href="patrimoine.php">Mes Visites</a>
            <a href="">Mes Nouveautés</a>
        </div>

        <div class="logo_header">
            <a href="index.php"><img id="logo_img" src="images/logo.png" /></a>
        </div>

        <div class="header_droit">
            <input id="search_header" type="text" name="search" placeholder="Rechercher un patrimoine...">
            <a id="profil_header" href="profil.php">Mon Profil</a>
        </div>

    </header>
<section id="content">
>>>>>>> 35c020468c5f91fbefd0ac1a54193134f2e20d0c
