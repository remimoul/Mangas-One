<?php

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'bobby');
define('DB_PASSWORD', 'hello');
define('DB_NAME', 'mangas_one');
define('DB_DSN', 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port=3306;charset=UTF8');



try {
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            // $bdd = new PDO('mysql:host=localhost;dbname=mangas_one', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $bdd->exec("set names utf8"); // pour forcer UTF8 sur la réponse serveur
} catch (Exception $e) {
            die('Erreur : pas de connexion à la base' . $e->getmessage());
};

?>