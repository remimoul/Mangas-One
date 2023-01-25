<?php
if(!isset($_SESSION)) {
    session_start();
}


?>

<!-- Webmaster.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangas One - Page webmaster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100">
<?php include_once('header.php'); ?>


<?php
echo "I am page webmaster";


    try {
                $bdd = new PDO('mysql:host=localhost;dbname=mariagenormandie', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $bdd->exec("set names utf8"); // pour forcer UTF8 sur la réponse serveur
            } catch (Exception $e) {
                die('Erreur : pas de connexion à la base' . $e->getmessage());
            }
            // include("http://localhost/www_sitenweb_com/mariageennormandie/dbgate.php"); //-> test externalisation connexion à SQL
            $nom_post = $_SESSION['nom_post'];
            $mdp_post = $_SESSION['mdp_post'];
            
            /***** REQUETE SQL -> Sélectionner les données mdp et nom ***********/
            $requete = $bdd->prepare('SELECT DISTINCT Nom, mdp FROM partenaires WHERE Nom= :nom AND mdp= :mdp');
            $requete->execute(array('nom' => $nom_post/*NOM_POST*/, 'mdp' => $mdp_post/*MDP_POST*/));
            $requete_sql_nom = '';
            $requete_sql_mdp = '';
            while ($requete_fetch = $requete->fetch()) {
                $requete_sql_nom = $requete_fetch['Nom'];
                $requete_sql_mdp = $requete_fetch['mdp'];
                echo '<br /> <p class="p1"> Identifiant :' . $requete_sql_nom . '  password :' . $requete_sql_mdp . ' </p><br />';
            }
            $requete->closeCursor();


?>


</body>

<?php include_once('footer.php'); ?>
</html>