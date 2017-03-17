<?php 
session_start();
$Found=false; //une variable pour les recherches.
if(isset($_POST['modifourecherche'])){
	$_SESSION['modifourecherche']=$_POST['modifourecherche'];
}	//on garde en mémoire le choix qu'on a fait concernant les modifs, les suppressions ou les recherches.
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=facture;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}




if(($_SESSION['choix']=='client') and (isset($_POST['NomClient'])) and (isset($_POST['PrenomClient']))) //si on a choisi la table client et que nom et client existent, on insère la ligne entière.
{
	
	

	 $req = $bdd->prepare('INSERT INTO client( NomClient, PrenomClient, AdresseClient, Cp, VilleClient, PaysClient) VALUES(:NomClient, :PrenomClient, :AdresseClient, :Cp, :VilleClient, :PaysClient)');
$req->execute(array(
	 'NomClient' => $_POST['NomClient'],
	 
	 'PrenomClient'=> $_POST['PrenomClient'],
	 'AdresseClient'=> $_POST['AdresseClient'],
	 'Cp'=> $_POST['Cp'],
	 'VilleClient'=> $_POST['VilleClient'],
	 'PaysClient'=>$_POST['PaysClient'],
	 ));
	
	 echo 'La table a été mise à jour! ';
	
	
	
	
	
	
	
	?>
	
	<p>Cliquez <a href="SUTTERLIN_Accueil.php">ici</a> pour revenir</p> <!--//on revient à la page du choix d'affichage de la table. -->
	
	
	
	
	
	<?php 
	
	
	
	
	
	$req->closeCursor();
	
	
	
	
	
	
	
	
}

else{
	//si on ajoute pas de ligne
	
		if(isset ($_POST['NomClient2']) and $_SESSION['modifourecherche']=='recherche'){ //si recherche a été choisi et que seulement le nom du client existe, on cherche à partir de ce dernier dans la table client. C'est la même chose pour lles prochaines lignes, avec des critères différents.
			
			$reponse = $bdd->query('SELECT * FROM client');
			while ($donnees = $reponse->fetch()){
				
		if ($_POST['NomClient2']==$donnees['NomClient']){
				$Found=true;
				?>
				
                <table>
   <caption>Clients</caption>
    <th>N_Client</th>
    <th>Nom</th>
	 <th>Prénom</th>
	  <th>Adresse</th>
    <th>Code Postal </th>
	 <th>Ville</th>
	  <th>Pays</th>

<tr>
       <td><?php echo $donnees['N_Client']; ?></td>
       <td><?php echo $donnees['NomClient']; ?></td>
       <td><?php echo $donnees['PrenomClient']; ?></td>
	    <td><?php echo $donnees['AdresseClient']; ?></td>
       <td><?php echo $donnees['Cp']; ?></td>
       <td><?php echo $donnees['VilleClient']; ?></td>
	    <td><?php echo $donnees['PaysClient']; ?></td>
   </tr>		  
				<?php	
				}
				
				
					
					
					
				
				
			}
				
		}
	
	
		if(isset ($_POST['PrenomClient2'])and $_SESSION['modifourecherche']=='recherche'){
			
			$reponse = $bdd->query('SELECT * FROM client');
			while ($donnees = $reponse->fetch()){
				
		if ($_POST['PrenomClient2']==$donnees['PrenomClient']){
				$Found=true;	
				?>
                <table>
   <caption>Clients</caption>
    <th>N_Client</th>
    <th>Nom</th>
	 <th>Prénom</th>
	  <th>Adresse</th>
    <th>Code Postal </th>
	 <th>Ville</th>
	  <th>Pays</th>

<tr>
       <td><?php echo $donnees['N_Client']; ?></td>
       <td><?php echo $donnees['NomClient']; ?></td>
       <td><?php echo $donnees['PrenomClient']; ?></td>
	    <td><?php echo $donnees['AdresseClient']; ?></td>
       <td><?php echo $donnees['Cp']; ?></td>
       <td><?php echo $donnees['VilleClient']; ?></td>
	    <td><?php echo $donnees['PaysClient']; ?></td>
   </tr>		  
				<?php	
				}
				
				
					
					
					
				
				
			}
				
		}
	
	
	
		if(isset ($_POST['AdresseClient2'])and $_SESSION['modifourecherche']=='recherche'){
			
			$reponse = $bdd->query('SELECT * FROM client');
			while ($donnees = $reponse->fetch()){
				
		if ($_POST['AdresseClient2']==$donnees['AdresseClient']){
				$Found=true;	
				?>
                <table>
   <caption>Clients</caption>
    <th>N_Client</th>
    <th>Nom</th>
	 <th>Prénom</th>
	  <th>Adresse</th>
    <th>Code Postal </th>
	 <th>Ville</th>
	  <th>Pays</th>

<tr>
       <td><?php echo $donnees['N_Client']; ?></td>
       <td><?php echo $donnees['NomClient']; ?></td>
       <td><?php echo $donnees['PrenomClient']; ?></td>
	    <td><?php echo $donnees['AdresseClient']; ?></td>
       <td><?php echo $donnees['Cp']; ?></td>
       <td><?php echo $donnees['VilleClient']; ?></td>
	    <td><?php echo $donnees['PaysClient']; ?></td>
   </tr>		  
				<?php	
				}
				
				
					
					
					
				
				
			}
				
		}
		
			if(isset ($_POST['Cp2'])and $_SESSION['modifourecherche']=='recherche'){
			
			$reponse = $bdd->query('SELECT * FROM client');
			while ($donnees = $reponse->fetch()){
				
		if ($_POST['Cp2']==$donnees['Cp']){
				$Found=true;	
				?>
                <table>
   <caption>Clients</caption>
    <th>N_Client</th>
    <th>Nom</th>
	 <th>Prénom</th>
	  <th>Adresse</th>
    <th>Code Postal </th>
	 <th>Ville</th>
	  <th>Pays</th>

<tr>
       <td><?php echo $donnees['N_Client']; ?></td>
       <td><?php echo $donnees['NomClient']; ?></td>
       <td><?php echo $donnees['PrenomClient']; ?></td>
	    <td><?php echo $donnees['AdresseClient']; ?></td>
       <td><?php echo $donnees['Cp']; ?></td>
       <td><?php echo $donnees['VilleClient']; ?></td>
	    <td><?php echo $donnees['PaysClient']; ?></td>
   </tr>		  
				<?php	
				}
				
				
					
					
					
				
				
			}
				
		}
		
			if(isset ($_POST['VilleClient2'])and $_SESSION['modifourecherche']=='recherche'){
			
			$reponse = $bdd->query('SELECT * FROM client');
			while ($donnees = $reponse->fetch()){
				
		if ($_POST['VilleClient2']==$donnees['VilleClient']){
				$Found=true;	
				?>
                <table>
   <caption>Clients</caption>
    <th>N_Client</th>
    <th>Nom</th>
	 <th>Prénom</th>
	  <th>Adresse</th>
    <th>Code Postal </th>
	 <th>Ville</th>
	  <th>Pays</th>

<tr>
       <td><?php echo $donnees['N_Client']; ?></td>
       <td><?php echo $donnees['NomClient']; ?></td>
       <td><?php echo $donnees['PrenomClient']; ?></td>
	    <td><?php echo $donnees['AdresseClient']; ?></td>
       <td><?php echo $donnees['Cp']; ?></td>
       <td><?php echo $donnees['VilleClient']; ?></td>
	    <td><?php echo $donnees['PaysClient']; ?></td>
   </tr>		  
				<?php	
				}
				
				
					
					
					
				
				
			}
				
		}
		
		
			if(isset ($_POST['PaysClient2'])and $_SESSION['modifourecherche']=='recherche'){
			
			$reponse = $bdd->query('SELECT * FROM client');
			while ($donnees = $reponse->fetch()){
				
		if ($_POST['PaysClient2']==$donnees['PaysClient']){
				$Found=true;	
				?>
                <table>
   <caption>Clients</caption>
    <th>N_Client</th>
    <th>Nom</th>
	 <th>Prénom</th>
	  <th>Adresse</th>
    <th>Code Postal </th>
	 <th>Ville</th>
	  <th>Pays</th>

<tr>
       <td><?php echo $donnees['N_Client']; ?></td>
       <td><?php echo $donnees['NomClient']; ?></td>
       <td><?php echo $donnees['PrenomClient']; ?></td>
	    <td><?php echo $donnees['AdresseClient']; ?></td>
       <td><?php echo $donnees['Cp']; ?></td>
       <td><?php echo $donnees['VilleClient']; ?></td>
	    <td><?php echo $donnees['PaysClient']; ?></td>
   </tr>		  
				<?php	
				}
				
				
					
					
					
				
				
			}
				
		}
		
		if( $_SESSION['modifourecherche']=='modif') {
			
		if(!empty ($_POST['NomClient2'])){                 //si on a choisi modifier, on prendra les critères qui ont été remplis, et on les ajoute à la table au bon endroit.
$req = $bdd->prepare('UPDATE client SET NomClient = :NomClient WHERE N_Client = :N_Client');
$req->execute(array(
	'NomClient' => $_POST['NomClient2'],
	'N_Client' => $_POST['N_Client']
	));

		}	
			
			if(!empty ($_POST['PrenomClient2'])){
$req = $bdd->prepare('UPDATE client SET PrenomClient = :PrenomClient WHERE N_Client = :N_Client');
$req->execute(array(
	'PrenomClient' => $_POST['PrenomClient2'],
	'N_Client' => $_POST['N_Client']
	));

		}		
			
			if(!empty ($_POST['AdresseClient2'])){
$req = $bdd->prepare('UPDATE client SET AdresseClient = :AdresseClient WHERE N_Client = :N_Client');
$req->execute(array(
	'AdresseClient' => $_POST['AdresseClient2'],
	'N_Client' => $_POST['N_Client']
	));

		}		
		
        	if(!empty ($_POST['Cp2'])){
$req = $bdd->prepare('UPDATE client SET Cp = :Cp WHERE N_Client = :N_Client');
$req->execute(array(
	'Cp' => $_POST['Cp2'],
	'N_Client' => $_POST['N_Client']
	));

		}			
			
			if(!empty ($_POST['VilleClient2'])){
$req = $bdd->prepare('UPDATE client SET VilleClient = :VilleClient WHERE N_Client = :N_Client');
$req->execute(array(
	'VilleClient' => $_POST['VilleClient2'],
	'N_Client' => $_POST['N_Client']
	));

		}		
		
         	if(!empty($_POST['Pays2'])){
$req = $bdd->prepare('UPDATE client SET PaysClient = :PaysClient WHERE N_Client = :N_Client');
$req->execute(array(
	'PaysClient' => $_POST['Pays2'],
	'N_Client' => $_POST['N_Client']
	));

		}			
			
			
			
			
		}
}
if($_SESSION['modifourecherche']=='suppr'){
	
	$req = $bdd->prepare('DELETE FROM client WHERE N_Client= :N_Client');
$req->execute(array(
	'N_Client'=> $_POST['N_Client']
	));
	
	
	
	//on supprime la ligne que l'on a choisi à l'aide du numéro client.
	
	
	
	
	
	
	
	
	
	
	
}







If ($Found==false and $_SESSION['modifourecherche']=='recherche'){
	echo 'Il n y a pas de cellule contenant ce que vous avez saisi.';//on affiche ça si la recherche n'a rien donné.
}
?>

<p> C'est bon, cliquez <a href="Sutterlin_Accueil.php">Ici </a> pour revenir en arrière. </p>
<?php
if($_SESSION['choix']=='facture')
{
	
	
	$req = $bdd->prepare('INSERT INTO facture(N_facture, date, N_Client) VALUES(?,?,?)'); //début de script pour ajouter une ligne dansla facture en changeant la façon d'écrire la requête.
$req->execute(array(
	  $_POST['N_facture'],
	 $_POST['Date'],
	$_POST['N_Client'],
	
	 ));
	
	
	
	echo 'La table a été mise à jour! ';
	?>
	
	<p>Cliquez <a href="SUTTERLIN_Accueil.php">ici</a> pour revenir</p>
	
	
	
	
	
	<?php 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}









?>
















