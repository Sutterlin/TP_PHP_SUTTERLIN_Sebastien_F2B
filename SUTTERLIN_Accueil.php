<?php
	//Initialisation de la session pour avoir accès aux variables de session
	session_start();

if (isset($_POST['mdp']) ){
	$_SESSION['mdpasse']= $_POST['mdp']; //on crée des variables de sessions qui vont sauvegarder les données de l'utilisateur (mdp, pseudo)
}

if (isset($_POST['identifiant'])){ // les isset permettent de revenir à cette page sans passer par connexion
$_SESSION['identifiant']=$_POST['identifiant'];
}

try //on l'affiche à chaque début de page
{
	$bdd = new PDO('mysql:host=localhost;dbname=facture;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>








<?php
$identification_reussie = false ; //cette variable permet de vérifier que l'id est réussie.
$reponse = $bdd->query('SELECT * FROM utilisateurs'); //on "demande" la table utilisateurs, on récupère tout grâce à * et on le rend utilisable grace au fetch, qui envoie tout dans un array appellé données.
while ($donnees = $reponse->fetch())
{
	
	 if ($_SESSION['identifiant'] ==  $donnees['Pseudo'] AND $_SESSION['mdpasse']== $donnees['MDP']) // Si le mot de passe est bon
    {
     $identification_reussie=true;
	
	
    }
	
	
}
$reponse->closeCursor();

if ($identification_reussie) //si l'identification a réussi, on affiche ça
   {
    echo 'Bienvenue  ' .$_SESSION['identifiant'];
	
	echo "<br/>" ;                          //l'utilisateur peut choisir une table à afficher dans le menu déroulant.
	
	echo "Quelle table souhaites-tu afficher?" ; ?> 
	
	
	
	<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Forum</title>
    </head>

    <body>
	<form action="SUTTERLIN_affichage.php" method="post">
    <select name="choix">
    <option value="client">client</option>
    <option value="facture">facture</option>
    <option value="detail">detail</option>
    <option value="produit">produit</option>
</select>
	<p><input type="submit" value="Afficher la table" /></p>	
	
    </body>
</html>
	
	
	
<?php 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	}
	
else // Sinon, on affiche un message d'erreur
    {
        echo '<p>Mot de passe ou identifiant  incorrect</p>';
    }
?>