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
        <?php include 'Commun/footer.php'; ?>
        <?php
        if( (!isset($_POST['id'])) && (!isset($_POST['telephone'])) && (!isset($_POST['adress']))){
            echo '
                    <form action="Authentification.php" method="post">
            <p>
                <input type="text" name="nom">
                <input type="text" name="prenom">
                <input type="number" name="age">
                <input type="number" name="telephone" value="8 chiffres commence par 0">
                <input type="text" name="adress" value="Code postal, Rue ,Ville">
                <input type="password" name="id">
                <input type="password" name="mot_de_passe">
                <input type="password" name="mot_de_passe_verif">
                <input type="hidden" name="nouveau" value=1>
                
                <input type="submit" value="Valider">
                ';
            }
            
            elseif(verif_nouveau($_POST['nom'], $_POST['prenom'], $_POST['id'], $_POST['telephone'], $_POST['adress'], $_POST['mot_de_passe'], $_POST['mot_de_passe_verif'])){
            {
                ajoutez_utilisateur($_POST['nom'], $_POST['prenom'], $_POST['age'], $_POST['id'], $_POST['telephone'], $_POST['adress'], $_POST['mot_de_passe'], 1);
            }
            }
        ?>
    </body>
</html>
