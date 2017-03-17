<?php
session_start(); 

$mdphash=password_hash($_POST['mdp2'], PASSWORD_DEFAULT); //on sauvegarde le mot de passe, et on le hashe au passage.




try
{
	$bdd = new PDO('mysql:host=localhost;dbname=facture;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$req = $bdd->prepare('INSERT INTO utilisateurs(Pseudo, MDP) VALUES(:Pseudo, :MDP)'); //On rajoute, dans la table utilisateurs, le pseudo et le mdp hashé du nouvel utilisateur.
$req->execute(array(
	'Pseudo' => $_POST['identifiant2'],
	'MDP' => $mdphash,
	));
	
	
	echo 'Voilà '.$_POST['identifiant2']. ' , vous êtes bien enregistré. Votre mot de passe est désormais:  '.$mdphash. ' , pensez à le noter! '; //On lui affiche le mot de passe. Il est haché, il faut le copier coller pour se connecter.
$req->closeCursor();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Forum</title>
    </head>

    <body>
    <p> Cliquez <a href="index.php">ici  </a> pour vous connecter .</p>
    </body>
</html>

