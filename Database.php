<?php

class createConnexion  {
    var $host = 'localhost';
    var $user = 'root';
    var $pass = '';
    var $db = 'gestion_personne';
    var $myconn;

  
    function connect() {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db, 3307);
        if (!$con) {
            die('Could not connect to database!');
        } else {
            $this->myconn = $con;
            echo 'Connection established! <br>';}
        return $this->myconn;
    }

    function close() {
        mysqli_close($this->myconn);
        echo 'Connection closed!';
    }
}
        //Renvoi tout les id de la table client sous forme de tableau
function get_id_client() {
        
}
        //Renvoi tout les mdp de la table client sous forme de tableau
function get_mdp_client() {
    
}   
        //Renvoi tout les id de la table manager sous forme de tableau
function get_id_manager() {
    
}
        //Renvoi tout les mdp de la table manager sous forme de tableau
function get_mdp_manager() {
    
}
        //Renvoi tout les libelle de la table Produit sous forme de tableau
function get_libelle(){
    
}
        //Renvoi la quantite du produit 
        //prend en argument libelle
function get_quantite(){
    
}
        //Ajoute un produit a la table Produit
function ajoutez_un_produit() {
    $req = mysqli_prepare("INSERT INTO Produit (Reference, Libelle, Categorie, Marque, Quantite, Prix, Description) VALUES (:reference,:libelle,:categorie,:marque,:quantite,:prix,:description)");
    $req = mysqli_execute(array(
          'reference' => $reference,
          'libelle' => $libelle ,
          'categorie' => $categorie,
          'marque' => $marque,
          'quantite' => $quantite,
          'prix' => $prix,
          'description' => $description
      ));  
}
        //Supprime un produit de la table Produit 
        //Prend en argument un libelle
        //Verifier que la quantité du produit est a 0
function supprimer_produit(){
    $req = mysqli_query("SELECT libelle FROM Produit");
      while ($reponse = mysqli_fetch_array ($req))
      {
          $req2 = mysqli_prepare("SELECT quantite FROM Produit WHERE libelle = :reponse_libelle");
          $req2 = mysqli_execute(array(
              'reponse_libelle' => $reponse['libelle']
          ));
          while ($reponse_quantite = mysqli_fetch_array($req2)){
                if($reponse_quantite['quantite'] == 0 ) {
                    echo reponse['libelle'] . '<br/>';
                }
          }
      }
      
}
        //Modifie les informations d'un élément produit
        //Prend en Argument un libelle
function modifier_produit() {
    $req = mysqli_query("SELECT libelle FROM Produit");
      while ($reponse = mysqli_fetch_array ($req))
      {
          echo $reponse['libelle'] . '<br />';
      }
   
      $req = mysqli_prepare("UPDATE Produit SET Reference = :reference, Libelle = :libelle, Categorie = :categorie, Marque = :marque, Quantite = :quantite, Prix = :prix , Description = :description) WHERE libelle = :libelle_changer");
      $req = mysqli_execute(array(
          'libelle_changer' => $libelle_changer,
          'reference' => $reference,
          'libelle' => $libelle ,
          'categorie' => $categorie,
          'marque' => $marque,
          'quantite' => $quantite,
          'prix' => $prix,
          'description' => $description
      ));
      
}
        //Affiche les commentaires d'un client
        //Prend en argument un id de client
function afficher_les_commentaires() {
    $req = mysqli_query("SELECT nom FROM Client");
      while ($reponse = mysqli_fetch_array ($req))
      {
          echo $reponse['nom'] . '<br />';
      }
   
}
        //Verifie l'authentification
        //Prend en argument id et mdp d'un manager
function authentification_manager() {
    
}
        //Verifie l'authentification
        //Prend en argument id et mdp d'un client
function authentification_client() {
    
}
        //Verifie la creation d'un compte
        //Prend en argument id et mdp d'un cient
        //Pas moins de 2 character
        //Pas plus de 12
        //Et bien plus encore, faut checker le sujet
function verification_nouveau() {
    
}
?>

<!--

Exemple d'utilisation

  require 'Database.php';
  

  $connection = new createConnexion();
  $connect = $connection->connect();
  if($connect != NULL){
      $req = "INSERT INTO Manager (nom, prenom, age, manager, password) VALUES ('Durand','Nadia','28','1','oui')";
      echo $req;
      $resultat = mysqli_query($connect,$req);
      if($resultat == false) {echo "Echec de la connexion <br>";}
      else {echo "personne enregistré <br>";}
      if(mysqli_close($connect)) {echo "Deconnexion reussi <br>";}
  }

        ?>

-->

