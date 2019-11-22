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
        <?php include '../Commun/nav_manager.php'; ?>
        <?php
        if(isset($_POST['checker'])){
        include 'Database.php';    
        $connection = new createConnexion();
        $connect = $connection->connect();

        if($connect != NULL){
            supprimer_produit($libelle);
        }
            
        }
         
        else{
            echo'
                 <form action="Supprimer_un_produit.php" method="post">
            <p>
                <input type="text" name="libelle">
                <input type="hidden" name="checker" value=1>
                
                <input type="submit" value="Valider">
            </p>
            ';
             
        }
        ?>
        
    </body>
</html>
