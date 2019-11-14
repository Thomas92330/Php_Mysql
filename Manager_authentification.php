<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manager authentification</title>
    </head>
    <body>
     
        <?php
        if ($_POST['manager_mot_de_passe'] == 'bdd')
        //Le mot de passe est bon
        {
        echo'
            <nav class="menu">
            <ul>
                <li><a href="Manager/Ajoutez_un_produit.php"> Ajouter un produit </a>
                <li><a href="Manager/Modifier_un_produit.php"> Modifier un produit </a></li>
                <li><a href="Manager/Supprimer_un_produit.php"> Supprimer un produit </a></li>
                <li><a href="Manager/Consulter_un_produit.php"> Consulter un produit </a></li>
                <li><a href="Manager/Afficher_la_liste_des_commentaires_d_un_client_donné.php"> Afficher la liste des commentaires d un client donné</a></li>
            </ul>
        </nav>
        ';
            echo'<p> Bienvenue </p>';
           
        }
           
        else
        {
            echo'<p>Mot de passe incorrecte</p>';
            echo $_POST['manager_mot_de_passe'];
        }
        ?>
    </body>
</html>
