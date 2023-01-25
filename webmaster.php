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
    <link rel="stylesheet" href="style.css" />
    <script src="main.js" defer></script>
</head>
<body class="light">
<?php require_once('header.php'); ?>


<?php

require_once('db_connect.php');


?>


<!-- SECTION FORMULAIRE PRODUIT-->
<section>
    <form action="controller.php" method="post">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
        <h1>NOUVEAU PRODUIT</h1>
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

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Upload Image</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input class="form-control form-control-lg" id="formFileLg" type="file" />
                <div class="small text-muted mt-2">Télécharger image du nouveau produit. Max file
                  size 50 MB</div>

              </div>
            </div>

            <hr class="mx-n3">

            <div class="px-5 py-4">
              <button type="submit" class="btn btn-primary btn-lg" value="summit">Envoyer</button>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

    </form>


</body>

</html>