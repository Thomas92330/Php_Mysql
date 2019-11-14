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
        <form action="Manager_authentification.php" method="post">
            <p>
                Manager :
                <input type="pasword" name="manager_mot_de_passe">
                <input type="submit" value="Valider">
            </p>
        <form action="Client_authentification.php" method="post">
            <p>
                Client :
                 <input type="pasword" name="client_mot_de_passe">
                 <input type="submit" value="Valider">
            </p>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
