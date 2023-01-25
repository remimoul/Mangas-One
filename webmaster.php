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
    <title>Mangas One - Page webmaster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script src="main.js" defer></script>
</head>
<body class="light">
<?php require_once('header.php'); ?>


<?php
echo "PAGE WEBMASTER <br><br>";
require_once('db_connect.php');

<<<<<<< HEAD


//$sql = "INSERT INTO mangas_one.produit (titre, prix, description, date, url_image, id_genre) VALUES
//($titre, '25', 'Le jeune TaraTata décide de voyager pour faire découvrir sa musique','1998', 'image/image1', '1')";
//$dbh =new PDO ('mysql:host=localhost; dbname=mangas_one','root', '');;
//$create_product = $dbh->query($sql);
=======
>>>>>>> 7aecb2bd582c77e2a4194d487ca643bf8fd8f1c0

$notIsset_produit = !isset($_GET['titre']) . !isset($_GET['prix']) . !isset($_GET['date']);
if ($notIsset_produit){
    // INITIALISATION DES $_GET
    $_GET['titre'] = $_GET['prix'] = $_GET['description'] = $_GET['date'] = 0;
    ?>

<!-- SECTION FORMULAIRE PRODUIT-->
<section class="vh-100" style="background-color: #2779e2;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
<<<<<<< HEAD

            <h1 class="text-white mb-4">INSCRIPTION NOUVEAU PRODUIT</h1>

=======
        <h1>NOUVEAU PRODUIT</h1>
>>>>>>> 7aecb2bd582c77e2a4194d487ca643bf8fd8f1c0
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">Titre</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input name="titre" type="text" class="form-control form-control-lg"  />
              </div>
            </div>
            <hr class="mx-n3">
            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Description</h6>

              </div>
              <div class="col-md-9 pe-5">

                <textarea name="description" type="text" rows="5" class="form-control"></textarea>

              </div>

                <hr class="mx-n3">

                <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">

                        <h6 class="mb-0">Catégorie</h6>

                    </div>
                    <div class="col-md-9 pe-5">

                        <input name="categorie" type="text" class="form-control form-control-lg" />

                    </div>

            </div>
                <!-- PRIX -->
                <hr class="mx-n3">
                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Prix</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input type="float" class="form-control form-control-lg" name="prix"  placeholder="obligatoire" required/>
                    <!-- <input type="number" class="form-control form-control-lg" name="prix" pattern="/^[0-9]*\.[0-9][0-9]$/"  placeholder="obligatoire" required/> -->
                    <!-- <input type="number" class="form-control form-control-lg" name="prix"  step="0.01" placeholder="obligatoire" required/> -->
                  </div>
                </div>

                <!--DESCRIPTION-->
                <hr class="mx-n3">
                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Description</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <textarea class="form-control" rows="3" name="description" placeholder="Je suis la super description"></textarea>
                  </div>
                </div>
            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Prix</h6>

              </div>
              <div class="col-md-9 pe-5">

                  <input name="prix" type="text" class="form-control form-control-lg" />

              </div>
            </div>

                <hr class="mx-n3">
                <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">

                        <h6 class="mb-0">Date</h6>

                    </div>
                    <div class="col-md-9 pe-5">

                        <input name="dateh" type="date" class="form-control form-control-lg" />

                    </div>
                </div>

                <!--DATE-->
                <hr class="mx-n3">
                      <div class="row align-items-center py-3">
                        <div class="col-md-3 ps-5">
                          <h6 class="mb-0">Date</h6>
                        </div>
                        <div class="col-md-9 pe-5">
                          <input class="form-control-lg" name="date" type="number" min="1900" max="2099" step="1" value="2015" required/>
                        </div>
                      </div>


                <!--PHOTO-->
                <hr class="mx-n3">
                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Charger une photo</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input class="form-control form-control-lg" id="formFileLg" type="file"/>
                    <div class="small text-muted mt-2">Charger une image, maximum 50 MB</div>

                  </div>
                </div>


            <hr class="mx-n3">

            <div class="px-5 py-4">
              <button type="submit" class="btn btn-primary btn-lg">Send application</button>
            </div>

          </div>
        </div>
      </div>
    <form>


<?php
} else{

    function VALID_DONNEES($donnees)
    {
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        $donnees = strip_tags($donnees);
        return $donnees;
    }



// RECUPERATION DES REPONSES FORMULAIRES
// $titre_produit = VALID_DONNEES($_GET['titre']);
// $prix_produit = VALID_DONNEES($_GET['prix']);
// $description_produit = VALID_DONNEES($_GET['description']);
// $date_produit = VALID_DONNEES($_GET['date']);

$titre_produit = $_GET['titre'];
$prix_produit = $_GET['prix'];
$description_produit = $_GET['description'];
$date_produit = $_GET['date'];


//test reception
echo "produit : ". $titre_produit ."<br>";
echo "prix : ". $prix_produit ."<br>";
echo "description : ". $description_produit ."<br>";
echo "date : ". $date_produit ."<br>";



// ENVOI DES DONNEES A LA BASE MySQL
// TEST Créer un produit
// titre, prix, description, date, url_image, id_genre
// $sql = "INSERT INTO produit (id, titre, prix, description, date, url_image, id_genre) VALUES
// (' ',$titre_produit, $prix_produit, $description_produit, $date_produit, 'image/image1', 1)";


// $sql = ("INSERT INTO `produit` (`id`, `titre`, `prix`, `description`, `date`, `url_image`, `id_genre`) VALUES (NULL, 'hhhhh', '12', 'ghjkghjg', '2000', NULL, '1')");
$sql = ('INSERT INTO `produit` (`id`, `titre`, `prix`, `description`, `date`, `url_image`, `id_genre`) VALUES (NULL, "$titre_produit", "$prix_produit", "$description_produit", "$date_produit", NULL, 1)');

// $create_product = $dbh->query($sql);
echo $sql;
$dbh->query($sql);


//TEST de la table
// $lecture_produit = "SELECT * FROM produit";
// $lecture = $dbh->query($lecture_produit);

// foreach ($lecture as $key) {
//     echo $key['id'];
//     echo "<br>";
//     echo $key['titre'];
//     echo "<br>";
//     echo $key['prix'];
//     echo "<br>";
//     echo $key['description'];
//     echo "<br>";
//     echo "<br>";
// }
// echo "<pre>";
// var_dump($lecture);
// echo "<pre>";

// INITIALISATION DES $_GET
// $_GET['titre'] = $_GET['prix'] = $_GET['description'] = $_GET['date'] = 0;



?>
<!-- PROPOSITION D'UN NOUVEAU FORMULAIRE -->
<div class="text-end">
    <button  type="button" class="btn btn-secondary"><a id="colorbutton" href="./webmaster.php"> Inscrire un nouveau produit</a>
</div>




</body>
<<<<<<< HEAD
<?php include_once('footer.php'); ?>
=======
>>>>>>> 7aecb2bd582c77e2a4194d487ca643bf8fd8f1c0

</html>