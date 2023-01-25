
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangas One - Page webmaster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script src="main.js" defer></script>
</head>
<body class="light">
<?php require_once('header.php'); ?>

<?php
$titre = $_POST["titre"];
$description = $_POST["description"];
$categorie = $_POST["categorie"];
$prix = $_POST["prix"];
$dateh = $_POST["dateh"];

$host = "localhost";
$username = "mylesjamesremi";
$password = "mjr";
$database = "mangas_one.produit";


//Ouvrir une nouvelle connexion au serveur MySQL
$mysqli = new mysqli("localhost", "mylesjamesremi", "mjr", "mangas_one");

////Afficher toute erreur de connexion
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}


//préparer la requête d'insertion SQL
$statement = $mysqli->prepare("INSERT INTO mangas_one.produit (titre,description,categorie,prix) VALUES(?,?,?,?)");


//Associer les valeurs et exécuter la requête d'insertion
$statement->bind_param("ssid", $titre, $description, $categorie, $prix);


if($statement->execute()){
    print "Votre article a bien été ajouter !</br>";
    echo "</br>";
}else{
    print $mysqli->error;
}

?>
<button type="button" class="btn btn-success"><a id="colorbutton" href="./webmaster.php">Ajouter nouveau Produit ?</a></button>

</body>

</html>
