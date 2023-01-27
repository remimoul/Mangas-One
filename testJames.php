<?php
require_once('db_connect.php');
// $dbh = new PDO ('mysql:host=localhost; dbname=mangas_one','root', 'root');

// ***************************************************************************
// ***************************************************************************
//Make a selection
$query_user = $dbh->query('SELECT * FROM utilisateur');
// $query_user = $query_user->fetchALL();
// echo"<pre>";
// var_dump($query_user);
// echo"<pre>";

foreach ($query_user as $key) {
    echo $key['id'];
    echo "<br>";
    echo $key['prenom'];
    echo "<br>";
    echo $key['nom'];
    echo "<br>";
    echo $key['email'];
    echo "<br>";
    echo "<br>";


    // echo $key['id']; ./* " : ". $valueFinal .*/ "<br>";

    // foreach ($value as $keyChild/* => $valueFinal*/){

        //     echo $keyChild ./* " : ". $valueFinal .*/ "<br>";
        // }

        echo "<br><br><br>";
    }




// ***************************************************************************
// ***************************************************************************
//Create 'utilisateur'
// $create_user = $dbh->query("INSERT INTO `utilisateur` (`nom`, `prenom`, `email`, `mot_de_passe`, `client`) VALUES\
// ('Doe', 'John', 'johndoe@gmail.com', 'johndoe', 1)");
$create_user = $dbh->query("INSERT INTO `utilisateur` (`nom`, `prenom`, `email`, `mot_de_passe`, `client`) VALUES\
('Doe', 'John', 'johndoe@gmail.com', 'johndoe', 1)");






?>