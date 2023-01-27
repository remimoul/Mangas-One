<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangas One - Catalogue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script src="main.js" defer></script>

</head>
<body class="light">
<?php include_once('header.php');
require_once('db_connect.php');

// requète pour le select dynamique
$sql = "SELECT nom FROM genre";
$dbh =new PDO(DB_DSN, DB_USER, DB_PASSWORD);;
$resultat = $dbh->query($sql);
//var_dump($resultat);
$les_genres = $resultat->fetchAll(PDO::FETCH_ASSOC);
//echo $les_genres[0]['nom'];
//echo "<br>";
//echo $les_genres[1]['nom'];
//echo "<br>";
//echo $les_genres[2]['nom'];
//echo "<br>";

//var_dump($les_genres); ;
//foreach ($les_genres as $key) {
    //    echo $key['nom'];
    //   echo "<br>";
    //     echo $key['prix'];
    //     echo "<br>";
    //     echo $key['description'];
    //     echo "<br>";

    //     echo "<br>";
    //     echo "<br>";
    // }

?>
<form action="" method="get">
    <div>
    <!--<label for="name"></label>-->
<!--barre de recherche du catalogue-->
        <input type="text" name="recherche" id="rechercheId" placeholder="recherche" >
<!--select pour la recherche par catégorie-->
        <select id="genre" name="genre">
            <option selected></option>
    <?php
            foreach ($les_genres as $key)
            {
           // echo $key['nom'];
            echo "<option name=".$key['nom'].">".$key['nom']."</option>";
            }
    ?>
    <!--<option name="manga">Manga</option>
    <option name="video">Vidéo</option>
    <option name="serie">Série</option>-->
        </select>
    </div>
    <br>
    <div>
<!---->
    <input type="submit" value="Rechercher">
    </div>
    <br>

</form>

<?php

// selection de le requète en fonction du mode de recherche
if(isset($_GET['recherche']) AND !empty($_GET['recherche']) AND empty($_GET['genre'])) {
    $recherche = htmlspecialchars($_GET['recherche']);
    $sql = "SELECT * FROM produit INNER JOIN genre ON produit.id_genre=genre.id WHERE produit.titre LIKE '%$recherche%' OR produit.description LIKE '%$recherche%'";
    echo 'Requète1';
    $resultat = $dbh->query($sql);
}
elseif(isset($_GET['genre']) AND !empty($_GET['genre']) AND empty($_GET['recherche'])) {
    $genre = htmlspecialchars($_GET['genre']);
    $sql = "SELECT * FROM produit INNER JOIN genre ON produit.id_genre=genre.id WHERE genre.nom = '$genre'";
    echo 'Requète2';
    $resultat = $dbh->query($sql);
}
elseif(isset($_GET['recherche']) AND !empty($_GET['recherche']) AND isset($_GET['genre']) AND !empty($_GET['genre']))
{
    $recherche = htmlspecialchars($_GET['recherche']);
    $genre = htmlspecialchars($_GET['genre']);
    //echo $recherche;
    //echo '<br>';
    //echo $genre;
    //echo '<br>';
    echo 'Requète3';
    $sql = "SELECT * FROM produit INNER JOIN genre ON produit.id_genre=genre.id WHERE genre.nom = '$genre' AND (produit.titre LIKE '%$recherche%' OR produit.description LIKE '%$recherche%')";
    //echo $sql;
    //echo '<br>';
    $resultat = $dbh->query($sql);
}
else {
    $recherche = 0;
    echo "Veuillez écrire un mot dans la barre de recherche et/ou choisir une catégorie";
}


// echo $genre;
// echo $recherche;
//'. $recherche .'


// //
// if (isset($recherche)){
//$dbh = new PDO('mysql:host=localhost; dbname=mangas_one', 'root', 'root');


//$sql = "SELECT * FROM produit INNER JOIN genre ON produit.id_genre=genre.id WHERE produit.titre LIKE '%$recherche%' OR produit.description LIKE '%$recherche%'";
//echo $sql;
echo '<br>';
// Exécution de la requête de sélection
//$resultat = $dbh->query($sql);
// unset($sql);
if (isset($resultat)) {$les_produits = $resultat->fetchAll(PDO::FETCH_ASSOC);}
//$les_produits = $resultat->fetchAll(PDO::FETCH_ASSOC);
if (isset($sql)){
    echo "<pre>";
    //var_dump($les_produits);
    foreach ($les_produits as $key)
    {
        echo "<div>";
            echo "<table><tr>";
                echo "<td>Titre: </td>";
                echo "<td>".$key['titre']."</td>";
            echo '</tr>';
            echo "<tr>";
                echo "<td>Prix: </td>";
                echo "<td>".$key['prix']." €</td>";
            echo '</tr>';
            echo "<tr>";
                echo "<td>Résumé: </td>";
                echo "<td>".$key['description']."</td>";
            echo '</tr>';
            echo "<tr>";
                echo "<td>Genre: </td>";
                echo "<td>".$key['nom']."</td>";
            echo '</tr></table>';



            echo '<div>';
                echo "<img src='./".$key['url_image'].".jpeg'/>";
                echo"<form action='./catalogue.php' method='get'>";
                $totre = $key['titre'];
                //echo '<input name="toto" value="'.$key['titre'].'">';
                echo'<input type="submit" name="toto" value="'.$key['titre'].'" >';
                echo '</form>';

            echo '</div>';
            echo "<br>";
        echo "<br>";
        echo '</div>';
    }
    echo "<pre>";
} else {
    echo 'test -- $sql mort';

}


//suppression des variables liées à la recherche
unset($recherche);
unset($resultat);
unset($les_produits);


//echo $_SESSION['panier'] = $_GET['toto'];


if (isset($_GET['toto']) ){
//futur panier
echo $_SESSION['panier'] = $_GET['toto'];

}

;
?>
<?php include_once('footer.php'); ?>
</body>
</html>