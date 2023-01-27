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
if ($isset_utilisateur AND $_SESSION['email_utilisateur'] == 'webmaster@gmail.com'){
?>



<label for="webmaster-select">Webmaster -- menu de maintenance base de données</label>
<form action="" method="GET" id="webmaster_menu_id">
  <select name="webmaster-select" id="webmaster-select" onchange="submit()">
    <option value="">--Choisissez une action--</option>
    <option name="webmaster-select" value="creer">Inscrire un produit</option>
    <option name="webmaster-select" value="lire">voir une table de la base</option>
    <option name="webmaster-select" value="modifier">modifier un produit</option>
    <option name="webmaster-select" value="supprimer">Supprimer un produit</option>
  </select>

  <!-- <input type="submit"> -->
</form>

<br><br>
<?php
if (isset($_GET['webmaster-select']) AND !empty($_GET['webmaster-select'])){
    switch ($_GET['webmaster-select']) {
      case "creer":
          include_once('./controller.php');
          break;
          case "lire":
            include_once('./webmaster_read.php');
            break;
          case "modifier":
              include_once('./webmaster_update.php');
          break;
          case "supprimer":
            include_once('./webmaster_delete.php');
      break;
    };
};
?>

<?php include_once('footer.php'); ?>
<?php }; // if ($isset_utilisateur AND $_SESSION['email_utilisateur'] == 'webmaster@gmail.com' ?>

</body>
</html>