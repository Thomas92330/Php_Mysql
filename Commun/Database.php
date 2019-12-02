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
            }
        return $this->myconn;
    }

    function close() {
        mysqli_close($this->myconn);
        
    }
}
  
function afficher_les_commentaires($id) {
    $connection = new createConnexion();
    $connect = $connection->connect();
    if($connect){
    $req = mysqli_prepare($connect,"SELECT Commentaires FROM Commentaire WHERE Id = ?");
    $req -> bind_param('s',$id);
    $req -> execute();
    
    while($resultat = $req->fetch()){
    echo $resultat['commentaires'];
    }
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
}

function verif_nom($nom){
    if(strlen($nom)<= 2) {
        echo 'Le nom doivent faire au moins 2 caractere de long' . '<br />';
        return false;
    }
    return true;
}

function verif_prenom($prenom){
    if(strlen($prenom)<= 2) {
        echo 'Prenom doit faire au moins 2 caractere de long' . '<br />';
        return false;
    }
    return true;
}

function verif_tel($tel){
    if((!preg_match ("/[0-9]/",$tel)||(substr($tel,0,1)!=0))){
        echo 'Le tel doit commencer par 0' . '<br />';
        return false;
    }
    return true;
}

function verif_adresse($adresse){
    if(!preg_match("/[0-9]/",substr($adresse,0,5))){
        echo 'L\'adresse doit commencer par un code postal de 5 chiffres'  . '<br />';
        return false;
    }
    return true;
}

function verif_id($id,$nom,$prenom){
    list($verif_nom,$temp) = explode('.',$id);
    list($verif_prenom,$temp) = explode('@',$temp);
    if($verif_nom != $nom){return false;}
    if($verif_prenom != $prenom){return false;}
    $connection = new createConnexion();
    $connect = $connection->connect();
    $req = mysqli_query($connect,"SELECT Id FROM Utilisateur");
    while ($resultat = $req->fetch()){
       if($resultat == $id){return false; } 
    }
    return true;
}

function verif_nouveau($nom,$prenom,$id,$tel,$adresse,$mdp,$mdp_verif) {
    if(!verif_nom($nom)){return false;}
    if(!verif_prenom($prenom)){return false;}
    if(!verif_adresse($adresse)){return false;}
    if(!verif_tel($tel)){return false;}
    if(!verif_id($id,$nom,$prenom)){return false;}
    
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

function ajoutez_commentaire($id,$reference,$commentaire){
 $connection = new createConnexion();
 $connect = $connection->connect();
    $req = mysqli_prepare($connect,"INSERT INTO Commentaire (Id,Reference,Commentaires)VALUES (?,?,?)");
    $req -> bind_param('sss',
          $id,
          $reference,
          $commentaire
      );
    $req->execute();

      if($req == false) {echo "Echec <br>";}
      else {echo "Commentaire ajouté avec brio <br>";}
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

function modifier_produit($valeure, $set,$reference) {    
    $connection = new createConnexion();
    $connect = $connection->connect();
    if($connect){  
    $req = mysqli_prepare($connect,"UPDATE Produit SET ? = ? WHERE Reference = ?");
    $req -> bind_param('sss',
          $set,
          $valeure,
          $reference
      );
      $req -> execute();
      if($req==false){echo 'Echec modification <br/>';}
      else{echo 'Modification réussi <br/>';}
}
      }
      
function modifier_info($valeure, $set) {
    $connection = new createConnexion();
    $connect = $connection->connect();
    if($connect){  
    $req = mysqli_prepare($connect,"UPDATE Utilisateur SET ? = ? WHERE Id = ?");
    $req -> bind_param('ss',
          $set,
          $valeure,
          $_COOKIE['Id']
      );
      $req -> execute();
}
}

function supprimer_produit($libelle){
    $connection = new createConnexion();
    $connect = $connection->connect();
    if($connect){
    $resultat = get('quantite','Produit','libelle ='.$libelle);
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

function get($select,$from,$where) {
    
    $connection = new createConnexion();
    $connect = $connection->connect();
    
    if($where == ''){
        if($req = mysqli_prepare($connect,"SELECT * FROM Produit")){
        $req -> bind_param('ss',
        $select,$from
        );
        }
        else{
            var_dump($req);
        }
    }
    else{
        $req = mysqli_prepare($connect,"SELECT ? FROM ? WHERE ?");
        $req -> bind_param('sss',
        $select,$from,$where
        );
    }
    
    $req = mysqli_prepare($connect,"SELECT * FROM Produit");
    $req->execute();
    $resultat = $req->fetch_all();
    //$req->bind_result($res);
    //$resultat = array();
    //while ($req -> fetch())
    //{
      //  $resultat = $res;
    //}
    return($resultat);
}


?>


