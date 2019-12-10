<html>
    <head>
        <link rel="stylesheet" href="../Css/Authentification.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <header>
            <figure>
                <img id="../Css/logo_ldlc" src="../Css/ldlc-logo.jpg" alt="logo" width="180" height="180"/>
            </figure>
            <h1>LDLC</h1>
        </header>
        <div>
            <?php
            include_once '/opt/lampp/htdocs/ProjetPhp/Commun/Database.php';
            include_once '/opt/lampp/htdocs/ProjetPhp/Commun/nav.php';
            ?>


            <?php
            if (isset($_GET['produit']) && !isset($_GET['quantite'])) {
                tableau_quantite_achete();
            }
            if (isset($_GET['produit']) && isset($_GET['quantite'])) {
                achete();
            }
            ?>
        </div>                
        <?php
        restore_include_path();
        include '../Commun/footer.php';
        ?>
    </body>
</html>
