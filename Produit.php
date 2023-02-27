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
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">-->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://bootswatch.com/5/journal/bootstrap.min.css">
    <script src="main.js" defer></script>
</head>
<body class="light">


<?php require_once ('header.php'); ?>
<div class="row">
    <h1 class="text-center pt-2">Listes des mangas</h1>
<?php
foreach ($les_produits as $un_produit) {


?>
<!--1ere case-->


    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-3">
        <div class="card mb-3">
                <h4 class="card-header"><?php echo $un_produit['titre']; ?></h4>
                <?php echo'<img class="mx-auto my-3" alt="photo" src="' . $un_produit['url_image']. '" style="height:auto; max-width :200px; display:block />' ?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo "Description : ".$un_produit['description'] ?></li>
                    <li class="list-group-item"><?php echo "Categorie : ". $un_produit['id_genre'] ?></li>
                    <li class="list-group-item"><?php echo "Prix : ".$un_produit['prix'] ."€" ?></li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-outline-primary">Acheter</button>
        </div>
        </div>



<?php
} // FIN DU FOREACH

?>

</div>
</body>

<?php require_once('footer.php'); ?>
</html>
