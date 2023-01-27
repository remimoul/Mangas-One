<?php
if(!isset($_SESSION)) {
    session_start();
}
?>


<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangas One - Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script src="main.js" defer></script>

</head>

<body class="light">
<?php require_once ('header.php'); ?>

<br><br><br>

<div style="text-align : center;">
    <h1> BIENVENUE SUR MANGAS ONE </h1>
    <p>Le meilleure site d'achat de produit d'univers de Manga de toute la coding Factory Esiee-it</p>
    <br><br>
    <p>Coding Team : James , Myles , Rémi</p>
    <p>*************************************************************************** <p>
    <p>*************************************************************************** <p>
    <br><br>
</div>
    <div style="margin-left: 15vw;">
        <?php require_once('./catalogue.php');?>
    </div>

</body>

<?php require_once('footer.php'); ?>
</html>