<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="../Css/Authentification.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php include '../Commun/nav.php'; ?>
        <table>
            <tr>
                <th>'Nom'</th>
                <th>'Prénom'</th>
                <th>'Age'</th>
                <th>'Id'</th>
                <th>'Telephone'</th>
                <th>'Adresse'</th>
                <th>'Genre'</th>
                <th>'Date de naissance'</th>
                <th>'Situation familiale'</th>
                <th>'Modifier'</th> 
            </tr>

            <?php
            include '../Commun/Database.php';
            $connection = new createConnexion();
            $connect = $connection->connect();
            $result = mysqli_prepare($connect, "SELECT * FROM Utilisateur WHERE Id = ?");
            $result = mysqli_stmt_bind_param($result, 's', $_COOKIE['id']);
            $res = mysqli_fetch_assoc($result); {
                echo'<tr>';
                echo'<th>' . $res['Nom'] . '</th>';
                echo'<th>' . $res['Prenom'] . '</th>';
                echo'<th>' . $res['Age'] . '</th>';
                echo'<th>' . $res['Id'] . '</th>';
                echo'<th>' . $res['Telephone'] . '</th>';
                echo'<th>' . $res['Adresse'] . '</th>';
                echo'<th>' . $res['Sexe'] . '</th>';
                echo'<th>' . $res['Date_de_naissance'] . '</th>';
                echo'<th>' . $res['Familiale'] . '</th>';
                echo'<th>
       <a href="Modifier_ses_informations.php"> Modifier </a>
       </th>';
                echo'</tr>';
            }
            ?>
    </body>
</html>
