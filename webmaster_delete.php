<?php
// AUthoriser seulement le login webmaster à ouvir cette page
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
    <title>Mangas One - Page webmaster suppression</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script src="main.js" defer></script>
    <body class="light">

</head>
<body class="d-flex flex-column min-vh-100">



<?php
echo "SUPPRESSION D'ELEMENTS BASE DE DONNEES<br><br>";
require_once('db_connect.php');
require_once('header.php');

if (isset($_SESSION['email_utilisateur']) AND $_SESSION['email_utilisateur'] == 'webmaster@gmail.com'){


if (!isset($_GET['titre'])){
    // INITIALISATION DES $_GET
    $_GET['titre'] = $_GET['prix'] = $_GET['description'] = $_GET['date'] = 0;
    ?>

    <!-- SUPPRIMER PRODUIT-->
    <section id="webmaster-section" class="vh-100" style="background-color: #b8baba;">

    <form action="./webmaster_delete.php" method="GET">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-9">


            <h1 class="text-white mb-4">SUPPRESSION D'ELEMENTS PRODUIT</h1>

            <div class="card" style="border-radius: 15px;">
              <div class="card-body">

                <!-- TITRE -->
                <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Titre</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input type="text" class="form-control form-control-lg" name="titre" placeholder="Inscrivez le titre du produit à effacer" required/>
                  </div>
                </div>


                <hr class="mx-n3">
                <div class="px-5 py-4">
                  <button type="submit" class="btn btn-primary btn-lg">Supprimer</button>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    <form>


<?php
} else{

$titre_produit = $_GET['titre'];

/***** REQUETE SQL -> Lecture info utilisateur ***********/
$requete_suppression_produit = $dbh->prepare("DELETE FROM produit WHERE titre= '$titre_produit'");

if($requete_suppression_produit->execute()){
    print "Votre article a été supprimé !";
    $requete_suppression_produit->closeCursor();
}else{
    print $mysqli->error;
}

?>
<!-- PROPOSITION D'UN NOUVEAU FORMULAIRE -->
<div class="text-end">
    <button  type="button" class="btn btn-secondary"><a id="colorbutton" href="./webmaster_delete.php"> Supprimer un autre produit</a>
</div>

<?php
}; // END if isset($_GET['titre']
?>
</section>

<?php include_once('footer.php'); ?>

<?php }; // if ($isset_utilisateur AND $_SESSION['email_utilisateur'] == 'webmaster@gmail.com' ?>
</body>
</html>