<?php
class ManagerClient
{
   // Instance de PDO.
   
try //on l'affiche à chaque début de page
{
	$bdd = new PDO('mysql:host=localhost;dbname=facture;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

  public function __construct($bdd)
  {
    $this->setDb($bdd);
  }

  public function add(Client $cli)
  {
      $q = $this->_db->prepare('INSERT INTO Client(N_Client, NomClient, PrenomClient, AdresseClient, Cp, VilleClient, PaysClient) VALUES(:N_Client, :NomClient, :PrenomClient, :AdresseClient, :Cp, :VilleClient, :PaysClient)');

    $q->bindValue(':N_Client', $cli->nom());
    $q->bindValue(':NomClient', $cli->forcePerso(), PDO::PARAM_INT);
    $q->bindValue(':PrenomClient', $cli->degats(), PDO::PARAM_INT);
    $q->bindValue(':AdresseClient', $cli->niveau(), PDO::PARAM_INT);
    $q->bindValue(':Cp', $cli->experience(), PDO::PARAM_INT);
	$q->bindValue(':VilleClient', $cli->experience(), PDO::PARAM_INT);
    $q->bindValue(':PaysClient', $cli->experience(), PDO::PARAM_INT);
    $q->execute();
  }

  public function delete(Client $cli)
  {
    // Exécute une requête de type DELETE.
  }

  public function get($id)
  {
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
  }

  public function getList()
  {
    // Retourne la liste de tous les personnages.
  }

  public function update(Client $cli)
  {
    // Prépare une requête de type UPDATE.
    // Assignation des valeurs à la requête.
    // Exécution de la requête.
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}

?>