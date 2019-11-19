<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <nav class="menu">
            <ul>
                <li><a href="Ajoutez_un_produit.php"> Ajouter un produit </a>
                <li><a href="Modifier_un_produit.php"> Modifier un produit </a></li>
                <li><a href="Supprimer_un_produit.php"> Supprimer un produit </a></li>
                <li><a href="Consulter_un_produit.php"> Consulter un produit </a></li>
                <li><a href="Afficher_la_liste_des_commentaires_d_un_client_donné.php"> Afficher la liste des commentaires d un client donné</a></li>
            </ul>
        </nav>
        <?php
         require 'Database.php';    
         $connection = new createConnexion();
         $connect = $connection->connect();
  
  if($connect != NULL){
      $req = mysqli_query("SELECT nom FROM Client");
      while ($reponse = mysqli_fetch_array ($req))
      {
          echo $reponse['nom'] . '<br />';
      }
   
      $resultat = mysqli_query($connect,$req);
      if($resultat == false) {echo "Echec de la connexion <br>";}
      else {echo "produit enregistré <br>";}
      if(mysqli_close($connect)) {echo "Deconnexion reussi <br>";}
  }
        ?>
    </body>
</html>
