<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="Authentification.css">
        <meta charset="UTF-8">
        <title>Authentification</title>
    </head>
    <body>
       <header>
            <figure>
                <img id="logo_ldlc" src="ldlc-logo.jpg" alt="logo" width="180" height="180"/>
            </figure>
            <h1>LDLC</h1>
       </header>
        <div>
        <?php
        
        //Intégration de la page Database.php contenant les fonctions lié à la bdd
        include 'Commun/Database.php';
        
        if ((isset($_POST['choix'])== FALSE) 
         && (isset($_POST['client_id'])== FALSE) && (isset($_POST['client_mot_de_passe'])== FALSE ) 
         && (isset($_POST['manager_id'])== FALSE) && (isset($_POST['manager_mot_de_passe'])== FALSE )){
            echo'
                <form action="Authentification.php" method="post">
            <p>
                Etes vous : 
                <input type="radio" id="client" name="choix" value="client"  /> <label for="client">Client</label>
                <input type="radio" id="manager" name="choix" value ="manager"/> <label for="manager">Manager</label>
                
                <input type="submit" value="Valider">
            </p>
            ';
            
        }
        
        if ((isset($_POST['choix'])) && $_POST['choix']=='client')
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
                
                include 'Commun/nav_client.php';
                setcookie('id', $_POST['client_id']);
            }
            else{
                printf('Le mot de passe est erronnée');
            }
        }
        
        if ((isset($_POST['choix'])) && $_POST['choix']=='manager'){
            echo '
            <form action="Authentification.php" method="post">
            <p>
                Manager :
                <input type="text" name="manager_id">
                <input type="password" name="manager_mot_de_passe">
                
                <input type="submit" value="Valider">
            </p>
            ';
        }
        
        if (isset($_POST['manager_id']) && isset($_POST['manager_mot_de_passe'])){
            if(authentification($_POST['manager_id'], $_POST['manager_mot_de_passe'])){
                setcookie('id', $_POST['manager_id'],time()+60*60*24*7);
                include'Commun/nav_manager.php';    
            }
            else{
                printf('Le mot de passe est erronnée');
            }
        }
        
        ?></div>
        <?php include 'Commun/footer.php'; ?>
    </body>
</html>
