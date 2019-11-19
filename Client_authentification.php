<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Client authentification</title>
    </head>
    <body>
        
        
        
        <?php
        if (isset($_POST['client_mot_de_pase']) AND $_POST['client_mot_de_passe'] == 'bdd')
        //Le mot de passe est bon
        {
              echo'
                  <nav class="menu">
            <ul>
                <li><a href="Client/Inscription.php"> Ajouter un produit </a></li>
                <li><a href="Client/Modifier_ses_informations.php"> Modifier un produit </a>
                <li><a href="Client/Consulter_son_profil.php"> Consulter un produit </a></li>    
                <li><a href="Client/Passer_une_commande.php"> Passer une commande</a></li>
                <li><a href="Client/Ajouter_un_commentaire.php"> Ajouter un commentaire </a></li>
            </ul>
        </nav>
        
            ';
            
        
        }
           
        else
        {
            echo'<p>Mot de passe incorrecte</p>';
        }
        ?>
         <footer>
            <h1>Nous contacter :</h1>
            <p>Numéro de téléphone : 04 27 46 60 00</p><br>
            <p>Adresse : 12-14 Rue de l'Église, 75015 Paris</p>
        </footer>
    </body>
</html>
