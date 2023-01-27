<?php
error_reporting(0);
define('DB_HOST', 'localhost');
define('DB_USER', 'mylesjamesremi');
define('DB_PASSWORD', 'mjr');
define('DB_NAME', 'mangas_one');
define('DB_DSN', 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port=3306;charset=UTF8');


$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$sql = "SELECT titre, url_image, description,prix FROM mangas_one.produit";
// Exécution de la requête de sélection
$resultat = $dbh->query($sql);
$les_produits = $resultat->fetchAll(PDO::FETCH_ASSOC);

// AFFICHER TOUT LES ELEMENT PRODUIT DANS LARRAY
//print_r($les_produits);
$dbh = null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangas One - Page Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script src="main.js" defer></script>


    <style>
        #sizeproduit {
            width: 20%;


            /*flex: 0 0 auto;*/
            margin-left: 1%;
            padding-right: calc(var(--bs-gutter-x) * .5);
            padding-left: calc(var(--bs-gutter-x) * .5);
            margin-top: var(--bs-gutter-y);
            text-align: center !important;
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
        }

        #container{
            display: flex !important;
            flex-direction: row !important;
           /*flex-direction: row;*/
        }
    </style>
</head>
<body class="light">
<?php require_once ('header.php'); ?>

<?php
foreach ($les_produits as $un_produit) {


?>
<!--1ere case-->
<section id="container">
<div id="sizeproduit">
    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal"><?php echo $un_produit['titre']; ?></h4>
            </div>
            <div  class="card-body">
                <h1><?php echo'<img alt="photo" src="' . $un_produit['url_image']. '" style="width:90%" />'."<br>"; ?> </h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li><?php echo "Description : ".$un_produit['description'] ?></li>
                    <li><?php echo "Categorie : ". $un_produit['id_genre'] ?></li>
                    <li><?php echo "Prix : ".$un_produit['prix'] ."€" ?></li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-outline-primary">Acheter</button>
            </div>
        </div>
    </div>

</div>
</section>
<?php
} // FIN DU FOREACH

?>
</body>

<?php //require_once('footer.php'); ?>
</html>
