<?php
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangas One - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script src="main.js" defer></script>


</head>
<body class="light">
<?php require_once ('header.php');
require_once('db_connect.php');
if(isset($_SESSION)) {
    $_SESSION = array();//Ecrase tableau de session
    session_unset(); //Detruit toutes les variables de la session en cours
    session_destroy();//Destruit la session en cours
    };

echo '<h1>DECONNEXION</h1>';
echo '<p class="p1">  Votre session est déconnectée <br/> Vous allez être redirigés vers la page d\'accueil.</p>';
echo '<meta http-equiv="refresh" content="8;url=http://localhost:8888/Mangas-one/index.php">';
?>

</body>

<?php require_once('footer.php'); ?>
</html>
