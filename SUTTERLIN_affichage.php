<?php
	//Initialisation de la session pour avoir accès aux variables de session
	session_start();

$_SESSION['choix'] = $_POST['choix']; //on enregistre le choix qu'à fait précédemment l'utilisateur, concernant la table à afficher.

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=facture;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css"  media= "screen"/>
		<link rel="stylesheet" type="text/css" href="ma_feuille_css_imprimante.css" media="print" />
        
    </head>

<?php
//on affiche la table qu'il a choisi, en récupérant les données  contenues dans la table dans un tableau. Le while continue jusqu'à ce que toute la table ait été affichée.
if($_POST['choix']=='client')
{
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
	  
	  
<?php
$reponse = $bdd->query('SELECT * FROM client');
while ($donnees = $reponse->fetch())
{
	
?>
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
?>
   
   
</table>
	
<div id="osef"> <!--le div sert à l'impression. Ce qui suit est effacé quand on affiche le tableau, de sorte à n'avoir que la facture. -->
<?php	
$reponse->closeCursor(); //on ferme la requete sql pour éviter les problèmes.
echo 'Si vous souhaitez implémenter une nouvelle ligne dans ce tableau, remplissez les champs ci-dessous. '; //le champ en dessous permet de rajouter une ligne dans la table qu'on avait sélectionné. Il est obligatoire de tout remplir.
?>

<form action="SUTTERLIN_rajout_table.php" method="post">
<p>
    
	<input type="text" name="NomClient"  required/>
	<input type="text" name="PrenomClient"  required/>
	<input type="text" name="AdresseClient"  required/>
	<input type="text" name="Cp"  required/>
	<input type="text" name="VilleClient"  required/>
	<input type="text" name="PaysClient"  required/>
	
	
    <input type="submit" value="Ajouter" />
</p>
</form>




<?php	
//$reponse->closeCursor();
echo 'Vous pouvez soit faire une modif dans la table, soit effectuer une recherche avec un critière, soit supprimer un client. Si vous faites une modif ou une supression, pensez à donner le numéro client ! Faites votre choix:'; //on choisit ce que l'on veut faire, puis on rempli un champ pour la recherche, pour la suppression et la modif il faut indiquer un nom client.
?>
	
	
	
<form action="SUTTERLIN_rajout_table.php" method="post">
<p>
     <select name="modifourecherche">
    <option value="modif">modification</option>
    <option value="recherche">recherche</option>
	 <option value="suppr">suppression</option>
   
</select>
     <p><label for "N-Client"> Numéro client (pour modifs): </label><input type="integer" name="N_Client"  ></p>
	<input type="text" name="NomClient2"  >
	<input type="text" name="PrenomClient2"  >
	<input type="text" name="AdresseClient2"  >
	<input type="text" name="Cp2"  >
	<input type="text" name="VilleClient2"  >
	<input type="text" name="Pays2">
	
	
    <input type="submit" value="Ajouter" />
</p>
</form>





<?php	
	
}



?>




<?php

if($_POST['choix']=='facture') //on affiche les autres tables de la même façon.
{
	?>
	
	<table>
   <caption>Factures</caption>
    <th>N facture </th>
    <th>date </th>
	 <th>N_Client</th>
<?php
$reponse = $bdd->query('SELECT * FROM facture');
while ($donnees = $reponse->fetch())
{
	
?>
<tr>
       <td><?php echo $donnees['N_facture']; ?></td>
       <td><?php echo $donnees['date']; ?></td>
       <td><?php echo $donnees['N_Client']; ?></td>
	
   </tr>	
	
	
	
	
	
<?php	
}
?>
   
   
</table>
	

	
<?php	

echo 'Si vous souhaitez implémenter une nouvelle ligne dans ce tableau, remplissez les champs ci-dessous. ';
?>

<form action="SUTTERLIN_rajout_table.php" method="post">
<p>
    <input type="integer" name="N_facture"  required/>
	<input type="date" name="Date"  required/>
	<input type="integer" name="N_Client"  required/>
	
	
    <input type="submit" value="Ajouter" />
</p>
</form>

























	
<?php	
	
	
}



?>






<?php

if($_POST['choix']=='detail')
{
	?>
	
	<table>
   <caption>Details</caption>
    <th>Qté </th>
    <th>N-facture </th>
	 <th>N_produit</th>
<?php
$reponse = $bdd->query('SELECT * FROM detail');
while ($donnees = $reponse->fetch())
{
	
?>
<tr>
       <td><?php echo $donnees['Quantité']; ?></td>
       <td><?php echo $donnees['N_facture']; ?></td>
       <td><?php echo $donnees['N_produit']; ?></td>
	
   </tr>	
	
	
	
	
	
<?php	
}
?>
   
   
</table>
	
	
<?php	
	
	
}



?>





<?php

if($_POST['choix']=='produit')
{
	?>
	
	<table>
   <caption>Produits</caption>
   <th>N produit </th>
    <th>libellé </th>
	 <th>PU</th>
   
<?php
$reponse = $bdd->query('SELECT * FROM produit');
while ($donnees = $reponse->fetch())
{
	
?>
<tr>
       <td><?php echo $donnees['N_produit']; ?></td>
       <td><?php echo $donnees['libellé']; ?></td>
       <td><?php echo $donnees['PU']; ?></td>
	
   </tr>	
	
	
	
	
	
<?php	
}
?>
   
   
</table>
	
	
<?php	
	
	
}



?>


</div>











