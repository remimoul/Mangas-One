<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangas One - Recherche</title>
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
<?php include_once('header.php');
require_once('db_connect.php');

// requète pour le select dynamique
$sql = "SELECT nom FROM genre";
$resultat = $dbh->query($sql);
//var_dump($resultat);
$les_genres = $resultat->fetchAll(PDO::FETCH_ASSOC);

?>
<form action="" method="get"  >
    <!--<label for="name"></label>-->
<!--barre de recherche du catalogue-->
        <input type="search" name="recherche" id="rechercheId" placeholder="Tu cherche ? Tu trouve ..." >
<!--select pour la recherche par catégorie-->
        <select class="btn btn-primary" id="genre" name="genre">
<!--            <option selected></option>-->
    <?php
            foreach ($les_genres as $key)
            {
           // echo $key['nom'];
            echo "<option name=".$key['nom'].">".$key['nom']."</option>";
            }
    ?>
        </select>
<!---->
    <input  class="btn btn-primary" type="submit" value="Recherche">

</form>

<?php

// selection de le requète en fonction du mode de recherche
if(isset($_GET['recherche']) AND !empty($_GET['recherche']) AND empty($_GET['genre'])) {
    $recherche = htmlspecialchars($_GET['recherche']);
    $sql = "SELECT * FROM produit INNER JOIN genre ON produit.id_genre=genre.id WHERE produit.titre LIKE '%$recherche%' OR produit.description LIKE '%$recherche%'";
    $resultat = $dbh->query($sql);
}
elseif(isset($_GET['genre']) AND !empty($_GET['genre']) AND empty($_GET['recherche'])) {
    $genre = htmlspecialchars($_GET['genre']);
    $sql = "SELECT * FROM produit INNER JOIN genre ON produit.id_genre=genre.id WHERE genre.nom = '$genre'";

    $resultat = $dbh->query($sql);
}
elseif(isset($_GET['recherche']) AND !empty($_GET['recherche']) AND isset($_GET['genre']) AND !empty($_GET['genre']))
{
    $recherche = htmlspecialchars($_GET['recherche']);
    $genre = htmlspecialchars($_GET['genre']);

    $sql = "SELECT * FROM produit INNER JOIN genre ON produit.id_genre=genre.id WHERE genre.nom = '$genre' AND (produit.titre LIKE '%$recherche%' OR produit.description LIKE '%$recherche%')";

    $resultat = $dbh->query($sql);
}
else {
    $resultat = 0;
    echo"Aucun Resultat !";
}


if (isset($resultat)) {
    $les_produits = $resultat->fetchAll(PDO::FETCH_ASSOC);
}
//$les_produits = $resultat->fetchAll(PDO::FETCH_ASSOC);
if (isset($sql)){
    echo "<pre>";
    //var_dump($les_produits);

    foreach ($les_produits as $key)
    {
        echo "<section id='container'>";
        echo "<div id='sizeproduit'>";
        echo"<div class='col'>";
        echo '<div class="card mb-4 rounded-3 shadow-sm">';
        echo '<div class="card-header py-3">';
                echo "<h4 class='my-0 fw-normal'>".$key['titre']."</h4>";
        echo '</div>';
        echo '<div class="card-body">';

        echo'<h1>';
//        echo "<img src='".$key['url_image']."' />";


        echo "<img src='".$key['url_image']."' style=width:90%  />";
        echo'</h1>';

                echo'<ul class="list-unstyled mt-3 mb-4">';


                echo "<li>"."Prix :".$key['prix']." €</li>";


                echo "<li>"."Description :".$key['description']."</li>";



                echo "<li>"."Genre :".$key['nom']."</li>";

                echo'</ul>';


            echo '</div>';
            echo "</div>";
        echo "</div>";
        echo '</div>';
        echo "</section>";
    }




} else {
    echo 'test -- $sql mort';

}


//suppression des variables liées à la recherche
unset($recherche);
unset($resultat);
unset($les_produits);





if (isset($_GET['toto']) ){
//futur panier
echo $_SESSION['panier'] = $_GET['toto'];

}

;
?>

</body>
</html>