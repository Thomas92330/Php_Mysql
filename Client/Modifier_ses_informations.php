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
        <?php include '../Commun/nav.php';
        include '../Commun/Database.php';
        ?>
        <table>
            <th>
            <tr>'Nom'</tr>
            <tr>'Prénom'</tr>
            <tr>'Age'</tr>
            <tr>'Telephone'</tr>
            <tr>'Adresse'</tr>
            <tr>'Genre'</tr>
            <tr>'Date de naissance'</tr>
            <tr>'Situation familiale'</tr>
        </th>

        <th>
        <tr>
        <form action="Modifier_ses_informations.php" method="get">'
            <input type="radio" id="btn" name="choix" value ="Nom"/> <label for="btn">Modifier</label>
            <input type="text" id="btn" name="valeure" /> <label for="btn">Nouvelle valeure</label>
            <input type="submit" value="Valider">
            </tr>
            <tr>
            <form action="Modifier_ses_informations.php" method="get">'
                <input type="radio" id="btn" name="choix" value ="Prenom"/> <label for="btn">Modifier</label>
                <input type="text" id="btn" name="valeure" /> <label for="btn">Nouvelle valeure</label>
                <input type="submit" value="Valider">
                </tr>
                <tr>
                <form action="Modifier_ses_informations.php" method="get">'
                    <input type="radio" id="btn" name="choix" value ="Age"/> <label for="btn">Modifier</label>
                    <input type="text" id="btn" name="valeure" /> <label for="btn">Nouvelle valeure</label>
                    <input type="submit" value="Valider">
                    </tr>

                    <tr>
                    <form action="Modifier_ses_informations.php" method="get">'
                        <input type="radio" id="btn" name="choix" value ="Telephone"/> <label for="btn">Modifier</label>
                        <input type="number" id="btn" name="valeure" /> <label for="btn">Nouvelle valeure</label>
                        <input type="submit" value="Valider">
                        </tr>

                        <tr>
                        <form action="Modifier_ses_informations.php" method="get">'
                            <input type="radio" id="btn" name="choix" value ="Adresse"/> <label for="btn">Modifier</label>
                            <input type="text" id="btn" name="valeure" /> <label for="btn">Nouvelle valeure</label>
                            <input type="submit" value="Valider">
                            </tr>

                            <tr>
                            <form action="Modifier_ses_informations.php" method="get">'
                                <input type="radio" id="btn" name="choix" value ="Sexe"/> <label for="btn">Modifier</label>
                                <input type="text" id="btn" name="valeure" /> <label for="btn">Nouvelle valeure</label>
                                <input type="submit" value="Valider">
                                </tr>

                                <tr>
                                <form action="Modifier_ses_informations.php" method="get">'
                                    <input type="radio" id="btn" name="choix" value ="Date_de_naissance"/> <label for="btn">Modifier</label>
                                    <input type="date" id="btn" name="valeure" /> <label for="btn">Nouvelle valeure</label>
                                    <input type="submit" value="Valider">
                                    </tr>

                                    <tr>
                                    <form action="Modifier_ses_informations.php" method="get">'
                                        <input type="radio" id="btn" name="choix" value ="Familiale"/> <label for="btn">Modifier</label>
                                        <input type="text" id="btn" name="valeure" /> <label for="btn">Nouvelle valeure</label>
                                        <input type="submit" value="Valider">
                                        </tr>
                                        </th>


                                        <?php
                                        if (isset($_GET['choix'])) {
                                            if ($_GET['choix'] == 'Nom' && isset($_GET['valeure'])) {
                                                modifier_info($_GET['valeure'], 'Nom');
                                            }

                                            if ($_GET['choix'] == 'Prenom' && isset($_GET['valeure'])) {
                                                modifier_info($_GET['valeure'], 'Prenom');
                                            }

                                            if ($_GET['choix'] == 'Age' && isset($_GET['valeure'])) {
                                                modifier_info($_GET['valeure'], 'Age');
                                            }

                                            if ($_GET['choix'] == 'Adresse' && isset($_GET['valeure'])) {
                                                modifier_info($_GET['valeure'], 'Adresse');
                                            }

                                            if ($_GET['choix'] == 'Telephone' && isset($_GET['valeure'])) {
                                                modifier_info($_GET['valeure'], 'Telephone');
                                            }

                                            if ($_GET['choix'] == 'Sexe' && isset($_GET['valeure'])) {
                                                modifier_info($_GET['valeure'], 'Sexe');
                                            }

                                            if ($_GET['choix'] == 'Familiale' && isset($_GET['valeure'])) {
                                                modifier_info($_GET['valeure'], 'Familiale');
                                            }
                                        }
                                        ?>
                                        </body>
                                        </html>
