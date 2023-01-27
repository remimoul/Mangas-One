<?php
if(!isset($_SESSION)) {
    session_start();
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangas One - Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script src="main.js" defer></script>

</head>
<body class="light">
<?php
require_once ('header.php');
require_once('db_connect.php');
echo "<h1>INFORMATIONS DU COMPTE </h1><br><br>";

if ($isset_utilisateur){
    $email = $_SESSION['email_utilisateur'];
/***** REQUETE SQL -> Lecture info utilisateur ***********/
$requete_message_utilisateur = $dbh->prepare("SELECT DISTINCT nom, prenom, email, mot_de_passe FROM utilisateur WHERE email= '$email'");
$requete_message_utilisateur->execute();
$resultat_Rqt = $requete_message_utilisateur->fetchAll();

    foreach ($resultat_Rqt as $key) {
        // Présentation des données du compte
        echo 'Nom : ' . $key['nom'] .' </br>';
        echo "<br>";
        echo 'Prenom : ' . $key['prenom'] .' </br>';;
        echo "<br>";
        echo 'Email : ' . $key['email'] .' </br>';
        echo "<br>";
        echo 'Pass : ' . $key['mot_de_passe'] .' </br>' ;
        echo "<br>";
        echo "<br>";
        $requete_message_utilisateur->closeCursor();
    };
} else {
       echo '<p class="p1">  Vous n\'êtes pas connecté <br/> Vous allez être redirigés vers la page d\'accueil.</p>';
       echo '<meta http-equiv="refresh" content="5;url=http://localhost/Mangas-One/index.php">';
};

?>



</body>

<?php require_once('footer.php'); ?>
</html>