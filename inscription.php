<?php
	include('header.php');
	
?>

<h2>Inscription</h2>
    <form method="post" action="connexion.php" >
        <p>
            <label for="nom">Nom : </label>
            <input type="text" name="nom" placeholder="Votre nom"  />

        </p>
        <p>
            <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" placeholder="Votre prenom"  />

        </p>
        <p>
            <label for="mail">Mail : </label>
            <input type="email" name="mail" placeholder="Votre mail"  />

        </p>
        <p>
            <label for="mdp">Mot de passe :</label>
            <br/>
            <input type ="password" name="mdp" placeholder="votre mot de passe"/>
        </p>
        <p>
            <label for="confmdp">Confirmation Mot de passe :</label>
            <br/>
            <input type ="password" name="confmdp" placeholder="Confirmez votre mot de passe"/>
        </p>

        <p>
            <input type="submit" value="inscription" name="inscription">
            <input type="reset" value="Vider le formulaire">
        </p>
    </form>

<?php
	include('footer.php');
?>