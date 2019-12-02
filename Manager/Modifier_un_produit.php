<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="../Communn/authentification.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php include '../Commun/nav.php'; 
              include '../Commun/Database.php';    ?>
        
                  <table>
            <th>
            <tr>'Libelle'</tr>
            <tr>'Categorie'</tr>
            <tr>'Marque'</tr>
            <tr>'Description'</tr>
            <tr>'Prix'</tr>
        </th>

        <th>
        <tr>
        <form action="Modifier_un_produit.php" method="get">'
            <input type="radio" id="btn" name="choix" value ="Libelle"/> <label for="btn">Modifier</label>
            <input type="text" id="btn" name="valeure" /> <label for="btn">Nouvelle 
                <input type="hidden" name="reference" value=<?php$_GET['reference']?>/>
            <input type="submit" value="Valider">
            </tr>
            <tr>
            <form action="Modifier_un_produit.php" method="get">'
                <input type="radio" id="btn" name="choix" value ="Categorie"/> <label for="btn">Modifier</label>
                <input type="text" id="btn" name="valeure" /> <label for="btn">Nouvelle 
                    <input type="hidden" name="reference" value=<?php$_GET['reference']?>/>
                <input type="submit" value="Valider">
                </tr>
                <tr>
                <form action="Modifier_un_produit.php" method="get">'
                    <input type="radio" id="btn" name="choix" value ="Marque"/> <label for="btn">Modifier</label>
                    <input type="text" id="btn" name="valeure" /> <label for="btn">Nouvelle 
                        <input type="hidden" name="reference" value=<?php$_GET['reference']?>/>
                    <input type="submit" value="Valider">
                    </tr>

                    <tr>
                    <form action="Modifier_un_produit.php" method="get">'
                        <input type="radio" id="btn" name="choix" value ="Description"/> <label for="btn">Modifier</label>
                        <input type="telephone" id="btn" name="valeure" /> <label for="btn">Nouvelle 
                            <input type="hidden" name="reference" value=<?php$_GET['reference']?>/>
                        <input type="submit" value="Valider">
                        </tr>

                        <tr>
                        <form action="Modifier_un_produit.php" method="get">'
                            <input type="radio" id="btn" name="choix" value ="Prix"/> <label for="btn">Modifier</label>
                            <input type="number" id="btn" name="valeure" /> <label for="btn">Nouvelle 
                                <input type="hidden" name="reference" value=<?php$_GET['reference']?>/>
                            <input type="submit" value="Valider">
                            </tr>
                            <tr>
                                        </th>


                                        <?php
                                        if (isset($_GET['choix'])) {
                                            if ($_GET['choix'] == 'Libelle' && isset($_GET['valeure'])) {
                                                modifier_produit($_GET['valeure'], 'Libelle',$_GET['reference']);
                                            }

                                            if ($_GET['choix'] == 'Categorie' && isset($_GET['valeure'])) {
                                                modifier_produit($_GET['valeure'], 'Categorie',$_GET['reference']);
                                            }

                                            if ($_GET['choix'] == 'Marque' && isset($_GET['valeure'])) {
                                                modifier_produit($_GET['valeure'], 'Marque',$_GET['reference']);
                                            }

                                            if ($_GET['choix'] == 'Prix' && isset($_GET['valeure'])) {
                                                modifier_produit($_GET['valeure'], 'Prix',$_GET['reference']);
                                            }

                                            if ($_GET['choix'] == 'Description' && isset($_GET['valeure'])) {
                                                modifier_produit($_GET['valeure'], 'Description',$_GET['reference']);
                                            }
                                        }
                                        ?>
                                        </body>
                                        </html>
            
       
        
        ?>
    </body>
</html>
