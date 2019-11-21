<!DOCTYPE html>
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
        
        if ((isset($_POST['client'])== FALSE) && (isset($_POST['manager'])== FALSE) && (isset($_POST['nouveau'])== FALSE)){
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
            require 'Database.php';    
            $connection = new createConnexion();
            $connect = $connection->connect();
  
            if($connect != NULL){
                $req = mysqli_query("SELECT id FROM Client");
                while ($reponse = mysqli_fetch_array ($req))
                {
                    echo $reponse['libelle'] . '<br />';
                }

                $resultat = mysqli_query($connect,$req);
                if($resultat == false) {echo "Echec de la connexion <br>";}
                else {echo "produit enregistré <br>";}
                if(mysqli_close($connect)) {echo "Deconnexion reussi <br>";}
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

        }
        

        ?>
         <footer>
            <h1>Nous contacter :</h1>
            <p>Numéro de téléphone : 04 27 46 60 00</p><br>
            <p>Adresse : 12-14 Rue de l'Église, 75015 Paris</p>
        </footer>
    </body>
</html>
