<<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Authentification</title>
    </head>
    <body>
      
    
        
        <?php
        include 'Database.php';
        
        if ((isset($_POST['client'])== FALSE) && (isset($_POST['manager'])== FALSE) 
         && (isset($_POST['client_id'])== FALSE) && (isset($_POST['client_mot_de_passe'])== FALSE ) 
         && (isset($_POST['manager_id'])== FALSE) && (isset($_POST['manager_mot_de_passe'])== FALSE )){
            echo'
                <form action="Authentification.php" method="post">
            <p>
                Etes vous : 
                <input type="radio" name="client" value="client"/>
                <input type="radio" name="manager"value ="manager"/>
                
                <input type="submit" value="Valider">
            </p>
            ';
            
        }
        
        if (isset($_POST['client']))
        {
            echo '
                <form action="Authentification.php" method="post">
            <p>
                Client :
                <input type="password" name="client_id">
                <input type="password" name="client_mot_de_passe">
                
                <input type="submit" value="Valider">
            </p>
            '; 
        }
        
        if (isset($_POST['client_id']) && isset($_POST['client_mot_de_passe'])){
            if(authentification($_POST['client_id'], $_POST['client_mot_de_passe'])){
                echo'
            <nav class="menu">
            <ul>
                <li><a href="Inscription.php"> Ajouter un produit </a></li>
                <li><a href="Modifier_ses_informations.php"> Modifier un produit </a>
                <li><a href="Consulter_son_profil.php"> Consulter un produit </a></li>    
                <li><a href="Passer_une_commande.php"> Passer une commande</a></li>
                <li><a href="Ajouter_un_commentaire.php"> Ajouter un commentaire </a></li>
            </ul>
            </nav>  
        ';
            }
        }
        
        if (isset($_POST['manager'])){
            echo '
            <form action="Authentification.php" method="post">
            <p>
                Manager :
                <input type="password" name="manager_id">
                <input type="password" name="manager_mot_de_passe">
                
                <input type="submit" value="Valider">
            </p>
            ';
        }
        
        if (isset($_POST['manager_id']) && isset($_POST['manager_mot_de_passe'])){
            if(authentification($_POST['manager_id'], $_POST['manager_mot_de_passe'])){
                echo '
            <nav class="menu">
            <ul>
                <li><a href="Ajoutez_un_produit.php"> Ajouter un produit </a>
                <li><a href="Modifier_un_produit.php"> Modifier un produit </a></li>
                <li><a href="Supprimer_un_produit.php"> Supprimer un produit </a></li>
                <li><a href="Consulter_un_produit.php"> Consulter un produit </a></li>
                <li><a href="Afficher_la_liste_des_commentaires_d_un_client_donné.php"> Afficher la liste des commentaires d un client donné</a></li>
            </ul>
            </nav> 
            ';
            }
        }    

        ?>
         <footer>
            <h1>Nous contacter :</h1>
            <p>Numéro de téléphone : 04 27 46 60 00</p><br>
            <p>Adresse : 12-14 Rue de l'Église, 75015 Paris</p>
        </footer>
    </body>
</html>
