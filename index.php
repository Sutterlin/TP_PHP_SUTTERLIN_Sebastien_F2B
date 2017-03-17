<!--
BUT : Page qui gère le formulaire de connexion et la suppression des variables de session suite à l'appui sur le bouton de déconnexion
-->
<?php
	//Initialisation de la session pour avoir accès aux variables de session
	session_start();
?>

<?php
//<!-- On crée le lien avec la base de données. Le try "essaie" de faire l'instruction, si il ne réussit pas à se connecter il passe à la suite. Le "catch" attraoe les erreurs et les affiche ensuite. -->
 try  
{
	$bdd = new PDO('mysql:host=localhost;dbname=facture;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        echo $e->getMessage(); 
}
?>


<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
		<link rel="stylesheet" href="style.css">
		<script src="script.js"></script>
	</head>
	<body>
	<!-- on intégre le header-->
	<header>
	<h1>Connexion</h1>
	<p>
			Veuillez vous connecter au site pour voir vos factures.
	</p>
</header>
	<!-- On vérifier si une demande de déconnexion est présente-->
	<?php 
		if (isset($_POST['deco']))
		{
			session_destroy();
		}
	?>
	<!-- Formulaire de connexion -->
	<div id="corps">
		<form id="login" action="SUTTERLIN_Accueil.php" method="POST">
			<div>
				<p><label for="id">Identifiant : </label><input type="text" name="identifiant"  required /></p>
				<p><label for="password">Mot de passe : </label><input type="password" name="mdp" required /></p>
				<p><input type="submit" value="Connexion" /></p>				
			</div>
		</form>		
	</div>
	
	
<p> Inscrivez vous si vous n'avez pas d'identifiants</p>
                     <form id="login" action="SUTTERLIN_Ajout.php" method="POST">
					<p><label for="id">Identifiant : </label><input type="text" name="identifiant2"  required /></p>
				<p><label for="password">Mot de passe : </label><input type="password" name="mdp2" required /></p>
				<p><input type="submit" value="Connexion" /></p>			

                   </form>


	</body>	
</html>

