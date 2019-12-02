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
                echo'<a href="Modifier_ses_informations.php"> Modifier ses information   </a>';
                echo'<a href="Consulter_son_profil.php"> Consulter son profil </a> ';   
                echo'<a href="Passer_une_commande.php"> Passer une commande</a>';
                echo'<a href="Ajouter_un_commentaire.php"> Ajouter un commentaire </a>';
    echo'</nav>';
    }

    if($res =='0'){
    echo'<nav>';            
                echo'<a href="Ajoutez_un_produit.php"> Ajouter un produit </a>';
                echo'<a href="Modifier_un_produit.php"> Modifier un produit </a>';
                echo'<a href="Supprimer_un_produit.php"> Supprimer un produit </a>';
                echo'<a href="Consulter_un_produit.php"> Consulter un produit </a>';
                echo'<a href="Afficher_la_liste_des_commentaires_d_un_client_donné.php"> Afficher la liste des commentaires d un client donné</a>';
    echo'</nav>';
    }
    }
    }
?>
<!--
if($_COOKIE['id']=='client'): 
<nav >
                <a href="Modifier_ses_informations.php"> Modifier ses information   </a>;
                <a href="Consulter_son_profil.php"> Consulter son profil </a>    
                <a href="Passer_une_commande.php"> Passer une commande</a>
                <a href="Ajouter_un_commentaire.php"> Ajouter un commentaire </a>
</nav>


if($_COOKIE['id']=='manager'):
<nav>            
                <a href="../Ajoutez_un_produit.php"> Ajouter un produit </a>
                <a href="../Modifier_un_produit.php"> Modifier un produit </a>
                <a href="../Supprimer_un_produit.php"> Supprimer un produit </a>
                <a href="../Consulter_un_produit.php"> Consulter un produit </a>
                <a href="../Afficher_la_liste_des_commentaires_d_un_client_donné.php"> Afficher la liste des commentaires d un client donné</a>
</nav>

-->
