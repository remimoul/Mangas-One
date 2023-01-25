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
//if ($mysqli->connect_error) {
//    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
//}


//préparer la requête d'insertion SQL
    $statement = $mysqli->prepare("INSERT INTO mangas_one.produit (titre,description,categorie,prix) VALUES(?,?,?,?)");


//Associer les valeurs et exécuter la requête d'insertion
    $statement->bind_param("ssidd", $titre, $description, $categorie, $prix);


//if($statement->execute()){
//    print "Salut " . $name . "!, votre adresse e-mail est ". $email;
//}else{
//    print $mysqli->error;
//}

?>