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
  
function afficher_les_commentaires($id) {
    $connection = new createConnexion();
    $connect = $connection->connect();
    if($connect){
    $req = mysqli_prepare($connect,"SELECT commentaires FROM Commentaire WHERE id = ?");
    $req -> bind_param('s',$id);
    $req -> execute();
    
    $resultat = $req->fetch();
    echo $resultat['commentaires'];
    
    return ($resultat);
}}

//_______________________________VALIDE_PAR_LA_STREET_________________________________
function ajoutez_utilisateur($nom,$prenom,$age,$id,$tel,$adresse,$mdp,$client){
 $connection = new createConnexion();
 $connect = $connection->connect();
    $req = mysqli_prepare($connect,"INSERT INTO Utilisateur (Nom,Prenom,Age,Id,Mot_de_passe,Adresse,Telephone,Client)VALUES (?,?,?,?,?,?,?,?)");
    $req -> bind_param('ssssssss',
          $nom,
          $prenom ,
          $age,
          $id,
          $mdp,
          $adresse,
          $tel,
          $client
      );
    $req->execute();

      if($req == false) {echo "Echec de la connexion <br>";}
      else {echo "personne enregistré <br>";}
      if(mysqli_close($connect)) {echo "Deconnexion reussi <br>";}    
    
}

function verif_nouveau($nom,$prenom,$id,$tel,$adresse,$mdp,$mdp_verif) {
    if((strlen($nom)<=2) || (strlen($prenom)<=2 )) {
        echo 'Le nom et le prenom doivent faire au moins 2 caractere de long' . '<br />';
        return false;
    }
    if((!preg_match ("/[0-9]/",$tel)||(substr($tel,0,1)!=0))){
        echo 'Le tel doit commencer par 0' . '<br />';
        return false;
    }
    if(!preg_match("/[0-9]/",substr($adresse,0,5))){
        echo 'L\'adresse doit commencer par un code postal de 5 chiffres'  . '<br />';
        return false;
    }
    if($mdp != $mdp_verif){
        echo 'Le mot de pase ne correspond pas au mot de passe de verification' . '<br />';
        return false;
    }
    if(strlen($mdp)<=8){ echo'Le mot de passe doit faire au moins 8 chara <br/>'; return false;}
    if(!preg_match("/[A-Z]/",substr($mdp,0,1))){echo'Le mot de passe doit commencer par une Maj <br/>';return false;}
    if(!preg_match("/[a-z]/",substr($mdp,strlen($mdp)-1,1))){echo'Le mot de passe doit finir par une Min <br/>';return false;}
           
    return true;
}

function authentification($id, $mdp_verif) {
    $connection = new createConnexion();
    $connect = $connection->connect();
    $req = mysqli_prepare($connect,"SELECT mot_de_passe FROM Utilisateur WHERE id = ?");
    $req -> bind_param('s',
          $id
      );
    $req->execute();
    $req ->bind_result($res);
    $resultat = array();
    while ($req -> fetch())
    {
        $resultat = $res;
    }    
    if ($resultat == $mdp_verif){
        return true;
    }
    else{
        return false;
    }
}

function ajoutez_commentaire($id,$libelle,$commentaire){
 $connection = new createConnexion();
 $connect = $connection->connect();
    $req = mysqli_prepare($connect,"INSERT INTO Commentaire (Id,Libelle,Commentaires)VALUES (?,?,?)");
    $req -> bind_param('sss',
          $id,
          $libelle,
          $commentaire
      );
    $req->execute();

      if($req == false) {echo "Echec de la connexion <br>";}
      else {echo "personne enregistré <br>";}
      if(mysqli_close($connect)) {echo "Deconnexion reussi <br>";}    
    
}

function ajoutez_un_produit($libelle ,$categorie,$marque,$quantite,$prix,$description) {
    $connection = new createConnexion();
    $connect = $connection->connect();
    $req = mysqli_prepare($connect,"INSERT INTO Produit (Libelle, Categorie, Marque, Quantite, Prix, Description) VALUES (?,?,?,?,?,?)");
    $req -> bind_param('ssssss',
          $libelle ,
          $categorie,
          $marque,
          $quantite,
          $prix,
          $description
      );
    $req -> execute();
}

function modifier_produit($libelle ,$categorie,$marque,$quantite,$prix,$description,$libelle_changer) {
    $connection = new createConnexion();
    $connect = $connection->connect();
    if($connect){  
    $req = mysqli_prepare($connect,"UPDATE Produit SET Libelle = ?, Categorie = ?, Marque = ?, Quantite = ?, Prix = ? , Description = ? WHERE libelle = ?");
    $req -> bind_param('sssssss',
          $libelle,
          $categorie,
          $marque,
          $quantite,
          $prix,
          $description,
          $libelle_changer
      );
      $req -> execute();
      if($req==false){echo 'Echec modification <br/>';}
      else{echo 'Modification réussi <br/>';}
}

      }

function supprimer_produit($libelle){
    $connection = new createConnexion();
    $connect = $connection->connect();
    if($connect){
    $resultat = get_quantite($libelle);
    if($resultat > 0){
        $req = mysqli_prepare($connect,"DELETE FROM Produit Where libelle = ?");
        $req -> bind_param('s', $libelle);
        $req->execute();
    }
    else{echo'Quantité insuffisante';}
    if($req==false){echo 'Echec de la supression <br/>';}
    else{echo 'Supression réussie <br/>';}
}
}

function get($select,$from) {
    $connection = new createConnexion();
    $connect = $connection->connect();
    $req = mysqli_prepare($connect,"SELECT ? FROM ?");
    $req -> bind_param('ss',
          $select,$from
      );
    $req->execute();
    $req ->bind_result($res);
    $resultat = array();
    while ($req -> fetch())
    {
        $resultat = $res;
    }
    return($resultat);
}

function get_quantite($libelle){
    $connection = new createConnexion();
    $connect = $connection->connect();
    $req = mysqli_prepare($connect,"SELECT quantite FROM Produit WHERE libelle = ? ");
    $req -> bind_param('s',
          $libelle
      );
    $req -> execute();
    $req ->bind_result($res);
    $resultat = array();
    while ($req -> fetch())
    {
        $resultat = $res;
    }
    return ($resultat);
}
?>


