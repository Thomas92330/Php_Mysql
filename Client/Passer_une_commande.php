<html>
    <head>
        <link rel="stylesheet" href="../Css/Authentification.css">
        <meta charset="UTF-8">
        <title>Paser_une_commande</title>
        <style>
            #Tableau {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #Tableau td, #Tableau th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #Tableau tr:nth-child(even){background-color: #739DDE;}

            #Tableau th:hover {background-color: grey ;}

            #Tableau tr {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4E6890;
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
         include_once '/opt/lampp/htdocs/ProjetPhp/Commun/nav.php';
            ?>
            <table  id = "Tableau">
                <tr> 
                    <th>Référence</th>
                    <th>Libellé</th>
                    <th>Catégorie</th>
                    <th>Marque</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Commander</th>
                    <th>Commenter</th>
                </tr>

            
                <?php
                
                $connect = $connection->connect();
                if (!isset($_POST['categorie']) && !isset($_POST['marque']) && !isset($_POST['mini']) && !isset($_POST['maxi'])) {
                passer_commande_selection();
                    }
                else {
                        passer_commande();
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


 
