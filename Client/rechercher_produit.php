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

                <label for="categorie">Catégorie : </label>
                <input type="text" name="categorie" required>
                <label for="marque">Marque : </label>
                <input type="text" name="marque" required>
                <label for="mini">Prix minimum : </label>
                <input type="number" name="mini" required>
                <label for="maxi">Prix maximum : </label>
                <input type="number" name="maxi"required>

                <input type="submit" value="Valider">
                            </form>
            </p>
        </div>
        <?php
        include '../Commun/footer.php';
        ?>
    </body>

</html>


