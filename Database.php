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

