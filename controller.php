
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

<section  id="webmaster-section" class="vh-100" style="background-color: #b8baba;">

    <form action="controller.php" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control form-control-lg" name="titre" placeholder="obligatoire"/>
                                </div>
                            </div>

                            <!-- PRIX -->
                            <hr class="mx-n3">
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Prix</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input name="prix" type="text" class="form-control form-control-lg"   placeholder="obligatoire"/>
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
                                    <input name="dateh" class="form-control-lg" type="date"/>
                                </div>
                            </div>

                            <!--PHOTO-->

                            <hr class="mx-n3">
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Charger une photo</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input name="photo" class="form-control form-control-lg" id="formFileLg" type="file" accept="image/jpeg"/>

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
                                    <input name="id_genre"  class="form-control form-control-lg" type="number" min=1 max=3/>
                                </div>
                            </div>

                            <hr class="mx-n3">
                            <div class="px-5 py-4">
                                <button name="submit" type="submit" class="btn btn-primary btn-lg">Envoyer</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>


    <?php
$titre = $_POST["titre"];
$description = $_POST["description"];
$id_genre = $_POST["id_genre"];
$prix = $_POST["prix"];
$dateh = $_POST["dateh"];
$photo =$_POST["photo"];
//$host = "localhost";
//$username = "mylesjamesremi";
//$password = "mjr";
//$database = "mangas_one.produit";
    $targetDir = "./image/";
    $fileName = basename($_FILES["photo"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    if(isset($_POST["submit"]) && !empty($_FILES["photo"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');}
    if(in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
//Ouvrir une nouvelle connexion au serveur MySQL
            $mysqli = new mysqli("localhost", "mylesjamesremi", "mjr", "mangas_one");
        }}
////Afficher toute erreur de connexion
//if ($mysqli->connect_error) {
//    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
//}


//préparer la requête d'insertion SQL
            $statement = $mysqli->prepare("INSERT INTO mangas_one.produit (titre,description,id_genre,prix,url_image) VALUES(?,?,?,?,?)");


//Associer les valeurs et exécuter la requête d'insertion
            $statement->bind_param("ssidi", $titre, $description, $id_genre, $prix, $photo);


            if ($statement->execute()) {
                print "Votre article a bien été ajouter !</br>";
                echo "</br>";
            } else {
                print $mysqli->error;
            }

?>

</section>
<button type="button" class="btn btn-success"><a id="colorbutton" href="./webmaster.php">Ajouter nouveau Produit ?</a></button>
</body>

</html>
