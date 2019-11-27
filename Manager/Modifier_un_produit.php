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
        <title></title>
    </head>
    <body>
        <header>
            <figure>
                <img id="logo_ldlc" src="ldlc-logo.jpg" alt="logo" width="180" height="180"/>
            </figure>
            <h1>LDLC</h1>
       </header>
        <div>
        <?php include '../Commun/nav_manager.php'; ?>
        <?php       
        if(isset($_POST['checker'])){
        include 'Database.php';    
        $connection = new createConnexion();
        $connect = $connection->connect();

        if($connect != NULL){
             modifier_un_produit($_POST['libelle'], $_POST['categorie'], $_POST['$marque'], $_POST['quantite'], $_POST['prix'], $_POST['description']);
        }
            
        }
         
        else{
            echo'
                 <form action="Modifier_un_produit.php" method="post">
            <p>
                <input type="text" name="libelle">
                <input type="text" name="categorie">
                <input type="text" name="marque">
                <input type="number" name="quantite">
                <input type="number" name="prix">
                <input type="text" name="description">
                
                <input type="hidden" name="checker" value=1>
                
                <input type="submit" value="Valider">
            </p>
            ';
             
        }
        
        ?>
        </div>
        <?php include 'Commun/footer.php'; ?>
    </body>
</html>
