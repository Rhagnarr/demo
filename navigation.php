<?php 
if ($_SESSION['login']!='')
echo'Bonjour '.$_SESSION['login'];
?>
    <nav>
        <?php 
		
		if ($_SESSION['login']=='') echo '<a href="connexion.php">Connexion </a>';
		else 
		echo '<form method="post" action="index.php" >
		<p>
					<input type="submit" value="Deconnexion" name="Deconnexion">
		</p>';
		?>
        <a href="profil.php">Mon Profil</a>
        <a href="">Rechercher</a>
        <a href="inscription.php">Inscription</a>
    </nav>
