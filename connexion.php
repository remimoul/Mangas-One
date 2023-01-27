<?php
// Authoriser seulement le login webmaster à ouvir cette page
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
    <title>Mangas One - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script src="main.js" defer></script>

</head>

<body class="light">
<?php require_once ('header.php');
require_once('db_connect.php');
echo "<h1>CONNEXION </h1><br><br>";
?>

<?php
            /**
             * <!-- //////////  EXECUTION DE L'AUTHENTIFICATION //////////////////// -->
             * **/
            $_ISSET = isset($_POST['email']) . isset($_POST['password']);
            $_NO_EMPTY = !empty($_POST['email']) . !empty($_POST['password']);


            if ($_ISSET && $_NO_EMPTY) {
                $_SESSION['email_post'] = $_POST['email'] ;
                $_SESSION['mdp_post'] = $_POST['password'];

                $email_post = $_SESSION['email_post'];
                $mdp_post = $_SESSION['mdp_post'];

                /***** REQUETE SQL -> Sélectionner les données mdp et email ***********/
                $dbh =new PDO(DB_DSN, DB_USER, DB_PASSWORD);
                $requete = $dbh->prepare('SELECT DISTINCT email, mot_de_passe FROM utilisateur WHERE email= :email AND mot_de_passe= :mdp');
                $requete->execute(array('email' => $email_post, 'mdp' => $mdp_post));

                $requete_sql_email = '';
                $requete_sql_mdp = '';

                while ($requete_fetch = $requete->fetch()) {
                    $requete_sql_email = $requete_fetch['email'];
                    $requete_sql_mdp = $requete_fetch['mot_de_passe'];
                    echo '<br /> <p class="p1"> Identifiant :' . $requete_sql_email . '  password :' . $requete_sql_mdp . ' </p><br />';
                }

                $requete->closeCursor();

                /***** CONDITION IF PHP -> Déclaration des $_SESSION finales ***********/
                if (isset($_SESSION['email_post']) and isset($_SESSION['mdp_post'])) { // ce if évite un message d'erreur si la $requete->fetch() échoue
                    $_SESSION['email_sql'] = $requete_sql_email;
                    $_SESSION['mdp_sql'] = $requete_sql_mdp;


                    /***** REQUETE SQL -> Valider l'unicité du email avec un compteur COUNT() ***********/
                    $requete_count_email = $dbh->prepare('SELECT COUNT(email) FROM utilisateur WHERE email= :email ');
                    $requete_count_email->execute(array('email' => $_SESSION['email_post']));

                    $resultat_count_email = $requete_count_email->fetchcolumn();
                    echo '<br /> <p class="p1">Grâce à la requête SQL COUNT(), nous savons que ce email revient ' . $resultat_count_email . ' fois . </p><br />';

                    $requete_count_email->closeCursor();




                    if (isset($_SESSION['email_sql']) and !empty($_SESSION['email_sql'])) {
                        echo '</br> <p style="color:#efc850;"> Affichage test $_SESSION[\'email_post\'] :::: ' . $_SESSION['email_post'] . ' </p></br>';
                        echo '</br> <p style="color:#efc850;"> Affichage test $_SESSION[\'email_sql\'] :::: ' . $_SESSION['email_sql'] . ' </p></br>';


                        if ($_SESSION['email_sql'] == $_SESSION['email_post'] and  $_SESSION['mdp_sql'] == $_SESSION['mdp_post']) {

                            $_SESSION['email_utilisateur'] = $_SESSION['email_sql'];
                            $_SESSION['mdp_utilisateur'] = $_SESSION['mdp_sql'];

                            /***************************************************
                            | suppression des variables $_SESSION temporaire   |
                             **************************************************/
                            unset($_POST['email']);
                            unset($_POST['password']);
                            unset($_SESSION['email_post']);
                            unset($_SESSION['mdp_post']);
                            unset($_SESSION['email_sql']);
                            unset($_SESSION['mdp_sql']);


                            echo '<h1>Vérification de données</h1>';
                            echo '<meta http-equiv="refresh" content="8;url=http://localhost/Mangas-One/index.php">';

                        } else {
                            echo '<p class="p1"> ***Erreur 3*** Votre mot de passe et/ou identifiant est incorrect :::: affichage test ' . $_SESSION['email_post'] . '</p>';
                            echo '<p class="p1"> l\'identification a échoué. <br/> Vous allez être redirigés vers la page d\'identification.</p>';
                            echo '<meta http-equiv="refresh" content="2;url=http://localhost/Mangas-One/inscription.php">';

                        } // END - $_SESSION['email_sql'] == $_SESSION['email_post'] and  $_SESSION['mdp_sql'] == $_SESSION['mdp_post'])
                    } else {
                        echo '<p class="p1"> ***Erreur 2*** Votre mot de passe et/ou identifiant est incorrect</p>';
                        echo '<p class="p1"> l\'identification a échoué. <br/> Vous allez être redirigés vers la page d\'identification.</p>';
                        echo '<meta http-equiv="refresh" content="4;url=http://localhost/Mangas-One/inscription.php">';
                    } // END - isset($_SESSION['email_sql']) and !empty($_SESSION['email_sql']

                    $requete->closeCursor();
                } else {
                    echo '<p class="p1"> ***Erreur 1*** Votre mot de passe et/ou identifiant est incorrect</p>';
                    echo '<p class="p1"> l\'identification a échoué. <br/> Vous allez être redirigés vers la page d\'identification.</p>';
                    echo '<meta http-equiv="refresh" content="2;url=http://localhost/Mangas-One/inscription.php">';
                }; // END - isset($_SESSION['email_post']) and isset($_SESSION['mdp_post'])


            } else { ?>




<div class="container">
    <form action="./connexion.php" method="POST" id="connexion_formulaire">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Connectez-Vous ! </h5>
                        <form>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Adresse Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Mot de passe</label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                                <label class="form-check-label" for="rememberPasswordCheck">
                                    Remember password
                                </label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Connexion</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<?php } // END - if ($_ISSET && $_NO_EMPTY) ?>

</body>

<?php require_once('footer.php'); ?>
</html>
