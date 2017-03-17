<!--
BUT : Page qui gère le formulaire de connexion et la suppression des variables de session suite à l'appui sur le bouton de déconnexion
-->
<?php
	//Initialisation de la session pour avoir accès aux variables de session
	session_start();



try
{
	$bdd = new PDO('mysql:host=localhost;dbname=facture;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>



<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Enregistrement</title>
		<link rel="stylesheet" href="style.css">
		<script src="script.js"></script>
	</head>
	<body>
	<!-- on intégre le header-->
	<header>
	<h1>Enregistrement</h1>
	<p>
			Veuillez vous enregistrez. Si vous avez déjà un compte, <a href="SUTTERLIN_Connexion.php">connectez vous </a>
	</p>
</header>
	<!-- On vérifier si une demande de déconnexion est présente-->
	<?php 
		if (isset($_POST['deco']))
		{
			session_destroy();
		}
	?>
	
	
	<!-- Formulaire d'enregistrement -->
	<div id="corps">
		<form id="login" action="SUTTERLIN_Ajout.php" method="POST">
			<div>
				<p><label for="id">Identifiant : </label><input type="text" name="identifiant"  required /></p>
				<p><label for="password">Mot de passe : </label><input type="password" name="mdp" required /></p>
				<p><input type="submit" value="Connexion" /></p>				
			</div>
		</form>		
	</div>
	<!-- Appel de la page de vérification des identifiants-->
	 <?php 
	
	
?>
	</body>	
</html>

