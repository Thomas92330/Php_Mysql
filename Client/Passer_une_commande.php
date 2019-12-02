<html>
    <head>
        <link rel="stylesheet" href="../Css/Authentification.css">
        <meta charset="UTF-8">
        <title></title>
        <style>
            #Acheter_produit {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #Acheter_produit td, #Acheter_produit th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #Acheter_produit tr:nth-child(even){background-color: #f2f2a3;}

            #Acheter_produit th:hover {background-color: grey ;}

            #Acheter_produit tr {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>

        <header>
            <figure>
                <img id="logo_ldlc" src="../Css/ldlc-logo.jpg" alt="logo" width="180" height="180"/>
            </figure>
            <h1>LDLC</h1>
        </header>
        <div style = "overflow-x:auto;">
            <?php
            restore_include_path();
            include '../Commun/Database.php';
            restore_include_path();
            include '../Commun/nav.php';
            ?>

            <table  id = "Acheter_produit">
                <tr> 
                    <th>'Référence'</th>
                    <th>'Libellé'</th>
                    <th>'Catégorie'</th>
                    <th>'Marque'</th>
                    <th>'Quantité'</th>
                    <th>'Prix'</th>
                    <th>'Description'</th>
                    <th>'Commander'</th>
                    <th>'Commenter'</th>
                </tr>

                <?php
                $connection = new createConnexion();
                $connect = $connection->connect();
                $result = mysqli_query($connect, "SELECT * FROM Produit");
                while ($res = mysqli_fetch_assoc($result)) {
                    echo'<tr>';
                    echo'<th>' . $res['Reference'] . '</th>';
                    echo'<th>' . $res['Libelle'] . '</th>';
                    echo'<th>' . $res['Categorie'] . '</th>';
                    echo'<th>' . $res['Marque'] . '</th>';
                    echo'<th>' . $res['Quantite'] . '</th>';
                    echo'<th>' . $res['Prix'] . '</th>';
                    echo'<th>' . $res['Description'] . '</th>';
                    echo'<th>'
                    . '<form action="Achete.php" method="get">'
                    . '<input type="radio" id="btn_achat" name="produit" value =' . $res["Reference"] . '/> <label for="btn_achat">Acheter</label>      
        <input type="submit" value="Valider">'
                    . '</form>'
                    . '</th>';
                    echo'<th>'
                    . '<form action="Ajouter_un_commentaire.php" method="get">'
                    . '<input type="radio" id="btn_commenter" name="produit" value =' . $res["Reference"] . '/> <label for="btn_commenter">Commenter</label>      
        <input type="submit" value="Valider">'
                    . '</form>'
                    . '</th>';
                    echo'</tr>';
                }
                ?>
            </table>
        </div>
        <?php
        restore_include_path();
        include '../Commun/footer.php';
        ?>
    </body>

</html>
