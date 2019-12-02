<?php 
    if(isset($_COOKIE['id'])){
    $connection = new createConnexion();
    $connect = $connection->connect();
    
    if($stmt = mysqli_prepare($connect,"SELECT Client FROM Utilisateur WHERE Id = ?")){
    $stmt->bind_param("s", $_COOKIE['id']);
    $stmt->execute();
    $stmt->bind_result($res);
    $stmt->fetch();
 
    if($res =='1'){ 
    echo'<nav >';
                echo'<a href="Client/Modifier_ses_informations.php"> Modifier ses information   </a>';
                echo'<a href="Client/Consulter_son_profil.php"> Consulter son profil </a> ';   
                echo'<a href="Client/Passer_une_commande.php"> Passer une commande</a>';
                echo'<a href="Client/Ajouter_un_commentaire.php"> Ajouter un commentaire </a>';
    echo'</nav>';
    }

    if($res =='0'){
    echo'<nav>';            
                echo'<a href="Manager/Ajoutez_un_produit.php"> Ajouter un produit </a>';
                echo'<a href="Manager/Modifier_un_produit.php"> Modifier un produit </a>';
                echo'<a href="Manager/Supprimer_un_produit.php"> Supprimer un produit </a>';
                echo'<a href="Manager/Consulter_un_produit.php"> Consulter un produit </a>';
                echo'<a href="Manager/Afficher_la_liste_des_commentaires_d_un_client_donné.php"> Afficher la liste des commentaires d un client donné</a>';
    echo'</nav>';
    }
    }
    }
?>
