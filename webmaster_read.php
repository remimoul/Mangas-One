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
    <title>Mangas One - Page webmaster read</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script src="main.js" defer></script>
    <body class="light">

</head>
<body class="d-flex flex-column min-vh-100">



<?php
echo "LECTURE BASE DE DONNEES <br><br>";
require_once('db_connect.php');
require_once('header.php');


if (isset($_SESSION['email_utilisateur']) AND $_SESSION['email_utilisateur'] == 'webmaster@gmail.com'){


$notIsset_produit = !isset($_GET['titre']) . !isset($_GET['prix']) . !isset($_GET['date']);
if ($notIsset_produit){
    // INITIALISATION DES $_GET
    $_GET['titre'] = $_GET['prix'] = $_GET['description'] = $_GET['date'] = 0;
    ?>

    <!-- SECTION FORMULAIRE PRODUIT-->
    <section id="webmaster-section" class="vh-100" style="background-color: #b8baba;">

    <form action="" method="GET">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-9">


            <h1 class="text-white mb-4">INSCRIPTION NOUVEAU PRODUIT</h1>

            <div class="card" style="border-radius: 15px;">
              <div class="card-body">

                <!-- TITRE -->
                <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Titre</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input type="text" class="form-control form-control-lg" name="titre" placeholder="obligatoire" required/>
                  </div>
                </div>

                <!-- PRIX -->
                <hr class="mx-n3">
                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Prix</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input name="prix" type="text" class="form-control form-control-lg"   placeholder="obligatoire" required/>
                  </div>
                </div>

                <!--DESCRIPTION-->
                <hr class="mx-n3">
                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Description</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <textarea name="description" class="form-control" rows="5"  placeholder="Je suis la super description"></textarea>
                  </div>
                </div>

                <!--DATE-->
                <hr class="mx-n3">
                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Date</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input name="date" class="form-control-lg" type="date" required/>
                  </div>
                </div>

                <!--PHOTO-->
                <hr class="mx-n3">
                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Charger une photo</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input name="image" class="form-control form-control-lg" id="formFileLg" type="file"/>
                    <div class="small text-muted mt-2">Charger une image, maximum 50 MB</div>
                  </div>
                </div>

                <!--CATEGORIE-->
                <hr class="mx-n3">
                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Catégorie</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input name="categorie"  class="form-control form-control-lg" type="number" min=1 max=3/>
                  </div>
                </div>

                <hr class="mx-n3">
                <div class="px-5 py-4">
                  <button type="submit" class="btn btn-primary btn-lg">Envoyer</button>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    <form>


<?php
} else{

    // function VALID_DONNEES($donnees)
    // {
    //     $donnees = trim($donnees);
    //     $donnees = stripslashes($donnees);
    //     $donnees = htmlspecialchars($donnees);
    //     $donnees = strip_tags($donnees);
    //     return $donnees;
    // }



// RECUPERATION DES REPONSES FORMULAIRES
// $titre_produit = VALID_DONNEES($_GET['titre']);
// $prix_produit = VALID_DONNEES($_GET['prix']);
// $description_produit = VALID_DONNEES($_GET['description']);
// $date_produit = VALID_DONNEES($_GET['date']);

$titre_produit = $_GET['titre'];
$prix_produit = $_GET['prix'];
$description_produit = $_GET['description'];
$date_produit = $_GET['date'];
$image_produit = $_GET['image'];
$categorie_produit = $_GET['categorie'];


//test reception
echo "produit : ". $titre_produit ."<br>";
echo "prix : ". $prix_produit ."<br>";
echo "description : ". $description_produit ."<br>";
echo "date : ". $date_produit ."<br>";
echo "image : ". $image_produit ."<br>";
echo "catégorie : ". $categorie_produit ."<br>";


//préparer la requête d'insertion SQL
// $statement = $dbh->prepare("INSERT INTO mangas_one.produit (titre,prix,description,date,url_image,id_genre) VALUES(?,?,?,?,?,?)");
$statement = $dbh->prepare("INSERT INTO mangas_one.produit (titre,prix,description,date,url_image,id_genre) VALUES(:titre, :prix, :description, :date, :image, :categorie)");



//Associer les valeurs et exécuter la requête d'insertion
$statement->bindParam(':titre', $titre_produit, PDO::PARAM_STR);
$statement->bindParam(':prix', $prix_produit, PDO::PARAM_STR);
$statement->bindParam(':description', $description_produit, PDO::PARAM_STR);
$statement->bindParam(':date', $date_produit, PDO::PARAM_INT);
$statement->bindParam(':image', $image_produit, PDO::PARAM_STR);
$statement->bindParam(':categorie', $categorie_produit, PDO::PARAM_INT);

if($statement->execute()){
    print "Votre article a été ajouter !";
    $statement->closeCursor();
}else{
    print $mysqli->error;
}

?>
<!-- PROPOSITION D'UN NOUVEAU FORMULAIRE -->
<div class="text-end">
    <button  type="button" class="btn btn-secondary"><a id="colorbutton" href="./webmaster.php"> Inscrire un nouveau produit</a>
</div>

<?php
}; // END if (isset($isset_produit)){
?>
</section>

<?php include_once('footer.php'); ?>
<?php }; // if ($isset_utilisateur AND $_SESSION['email_utilisateur'] == 'webmaster@gmail.com' ?>

</body>
</html>