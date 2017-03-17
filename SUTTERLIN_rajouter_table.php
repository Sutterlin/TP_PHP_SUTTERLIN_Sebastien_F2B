<?php 
session_start();

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=facture;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


echo $_SESSION['choix'];

if($_SESSION['choix']=='client')
{
	
	
	$req = $bdd->prepare('INSERT INTO client(N_Client, PrenomClient, AdresseClient, Cp, VilleClient, PaysClient) VALUES(:N_Client, :PrenomClient, :AdresseClient, :Cp, :VilleClient, :PaysClient)');
$req->execute(array(
	'N_Client' => $_POST['N_Client'],
	'PrenomClient'=> $_POST['PrenomClient'],
	'AdresseClient'=> $_POST['AdresseClient'],
	'Cp'=> $_POST['Cp'],
	'VilleClient'=> $_POST['VilleClient'],
	'PaysClient'=>$_POST['PaysClient'],
	));
	
	echo 'La table a été mise à jour! '
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}









?>