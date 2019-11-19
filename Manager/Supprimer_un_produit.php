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
      
      $resultat = mysqli_query($connect,$req);
      if($resultat == false) {echo "Echec de la connexion <br>";}
      else {echo "produit enregistré <br>";}
      if(mysqli_close($connect)) {echo "Deconnexion reussi <br>";}
  }
        ?>
        
    </body>
</html>
