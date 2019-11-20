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
    $req = mysqli_query(SELECT id FROM Client);
    return ($req);
}
        //Renvoi tout les mdp de la table client sous forme de tableau
function get_mdp_client($id_client) {
    $req = mysqli_prepare(SELECT mot_de_passe FROM Client WHERE id=:id);
    $req = mysqli_execute(array(
          'id' => $id_client
           ));
    return ($req);
}   
        //Renvoi tout les id de la table manager sous forme de tableau
function get_id_manager() {
    $req = mysqli_query(SELECT id FROM Manager);
    return ($req);
}
        //Renvoi le mdp d'un manager 
        //Prend en argument un id manager
function get_mdp_manager($id_manager) {
    $req = mysqli_prepare(SELECT mot_de_passe FROM Manager WHERE id=:id);
    $req = mysqli_execute(array(
          'id' => $id_manager
           ));
    return ($req);
}
        //Renvoi tout les libelle de la table Produit sous forme de tableau
function get_libelle(){
    $req = mysqli_query(SELECT libelle FROM Produit);
    return ($req);
}
        //Renvoi la quantite du produit 
        //prend en argument libelle
function get_quantite($libelle){
    $req = mysqli_prepare(SELECT quantite FROM Produit WHERE libelle=:libelle);
    $req = mysqli_execute(array(
          'libelle' => $libelle
           ));
    return ($req);
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
function afficher_les_commentaires($id_client) {
    $req = mysqli_prepare("SELECT commentaire FROM Client WHERE id = :id");
    $req = mysqli_execute(array(
        'id' => $id_client;
    ));
      return ($req);
   
}
        //Verifie l'authentification
        //Prend en argument id et mdp d'un manager
function authentification_manager($id_manager, $mdp_verif) {
    $req = mysqli_prepare("SELECT mot_de_passe FROM Manager WHERE id = :id");
    $req = mysqli_execute(array(
        'id' => $id_manager;
        ));
    if ($req == $mdp_verif){
        return true;
    }
    else{
        return false;
    }
}
        //Verifie l'authentification
        //Prend en argument id et mdp d'un client
function authentification_client($id_client, $mdp_verif) {
    $req = mysqli_prepare("SELECT mot_de_passe FROM Client WHERE id = :id");
    $req = mysqli_execute(array(
        'id' => $id_client;
        ));
    if ($req == $mdp_verif){
        return true;
    }
    else{
        return false;
    }
}
        //Verifie la creation d'un compte
        //Prend en argument id et mdp d'un cient
        //Pas moins de 2 character
        //Pas plus de 12
        //Et bien plus encore, faut checker le sujet
function verification_nouveau($nom,$prenom,$id,$tel,$adresse,$mdp,$mdp_verif) {
    if((strlen($nom)<=2) || (strlen($prenom)<=2 )) {
        echo 'Le nom et le prenom doivent faire au moins 2 caractere de long' . '<br />';
        return false;
    }
    if((!pregmatch ("/[0-9]/",$tel)||(substrat($tel,0,1)!=0))){
        echo 'Le tel doit commencer par 0' . '<br />';
        return false;
    }
    if(!pregmatch("/[0-9]/",substrat($adresse,0,5))){
        echo 'L\'adresse doit commencer par un code postal de 5 chiffres'  . '<br />';
        return false;
    }
    if($mdp != $mdp_verif){
        echo 'Le mot de pase ne correspond pas au mot de passe de verification' . '<br />';
        return false;
    }
    if((strlen($mdp)<=8) || (!pregmatch(substrat("/[A-Z]/",$mdp,0,1))) || (!pregmatch(substrat("/[A-Z]/",$mdp,strlen($mdp),1)))  ){
        echo'Le mdp doit faire au moins 8 cara, commencer par une Maj, finir par une Mini';
        return false;
    }
    return true;
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

