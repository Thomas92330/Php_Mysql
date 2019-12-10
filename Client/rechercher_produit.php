<html>
    <head>
        <link rel="stylesheet" href="../Css/Authentification.css">
        <meta charset="UTF-8">
        <title>Recher un produit</title>

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

            <p>
            <form action="Passer_une_commande.php">

                <input type="text" name="categorie">
                <input type="text" name="marque">
                <input type="number" name="mini">
                <input type="number" name="maxi">

                <input type="submit" value="Valider">
                            </form>
            </p>
        </div>
        <?php
        include '../Commun/footer.php';
        ?>
    </body>

</html>


