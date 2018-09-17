<?php
	include('header.php');
	
	
?>
	<h2>Connexion</h2>
	<form method="post" action="index.php" >
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
					<input type="submit" value="Connexion" name="Connexion">
					<input type="reset" value="Vider le formulaire">
				</p>
				
				
				
			</form>
	

<?php
	include('footer.php');
?>