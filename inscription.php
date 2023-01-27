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
echo "<h1>INSCRIPTION </h1><br><br>";
?>

<?php

            $_ISSET = isset($_POST['email']) . isset($_POST['password']);
            $_NO_EMPTY = !empty($_POST['email']) . !empty($_POST['password']);


            if ($_ISSET && $_NO_EMPTY) {
                $_VALID_PASS = $_POST['password'] === $_POST['password_beta'];

                $nom_post = htmlspecialchars($_POST['nom']);
                $prenom_post = htmlspecialchars($_POST['prenom']);
                $email_post = htmlspecialchars($_POST['email']);
                $mot_de_passe_post = htmlspecialchars($_POST['password_beta']);
                $mot_de_passe_beta_post = htmlspecialchars($_POST['password']);


                if ($_VALID_PASS) {
                    /***** REQUETE SQL -> Valider l'unicité du nom avec un compteur COUNT() ***********/
                    $dbh =new PDO(DB_DSN, DB_USER, DB_PASSWORD);;
                    $requete_count_email = $dbh->prepare('SELECT COUNT(email) FROM utilisateur WHERE email= :email ');
                    $requete_count_email->execute(array('email' => $_POST['email']));
                    $resulat_count_email = $requete_count_email->fetchcolumn();
                    /*echo '<br /><p class="p1"> Affichage test : Grâce à la requête SQL COUNT(), nous savons que ce nom revient ' . $resulat_count_email . ' fois . </p><br />';*/
                    $requete_count_email->closeCursor();

                    if ($resulat_count_email == 0) {
                        /***** REQUETE SQL -> Créer les données mdp et nom ***********/
                        $requete_new_utilisateur = $dbh->prepare("INSERT INTO utilisateur(nom,prenom,email,mot_de_passe) VALUES('$nom_post', '$prenom_post','$email_post', '$mot_de_passe_post')");
                        $requete_new_utilisateur->execute();
                        $requete_new_utilisateur->closeCursor();

                        /***** REQUETE SQL -> Message de confirmation d'inscription à l'utilisateur ***********/
                        $requete_message_utilisateur = $dbh->prepare("SELECT DISTINCT nom, prenom, email, mot_de_passe FROM utilisateur WHERE email= '$email_post' AND mot_de_passe= '$mot_de_passe_post'");
                        $requete_message_utilisateur->execute();
                        $resultat_Rqt = $requete_message_utilisateur->fetchAll();

                            foreach ($resultat_Rqt as $key) {
                                // Ouverture de la session id $_SESSION['email_utilisateur']
                                $_SESSION['email_utilisateur'] = $key['email'];
                                // Présentation des données du compte
                                echo "Votre compte a été créé ! <br><br>";
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
                                echo '<meta http-equiv="refresh" content="4; url=http://localhost:8888/Mangas-one/index.php">';
                            };

                    } else {
                        echo '<p class="p1">Cet email " ' . $email_post . ' " est indisponible, veuillez en choisir un nouveau. </p><br />';
                        echo '<meta http-equiv="refresh" content="4;url=http://localhost:8888/Mangas-one/inscription.php">';
                    }; // END if ($resulat_count_email == 0)


                    /***************************************************
                    | suppression des variables $_SESSION temporaire   |
                     **************************************************/
                    unset($_POST['email']);
                    unset($_POST['password']);
                } else {
                    echo '<p class="p1"> Vos deux mots de passe ne sont pas identiques</p>';
                    echo '<meta http-equiv="refresh" content="4;url=http://localhost:8888/Mangas-one/inscription.php">';
                }; // END if ($_VALID)

            } else { ?>


<section class="imageform">
<form action="./inscription.php" method="POST" id="inscription_formulaire">
<!--         style="background-image: url('https://images.alphacoders.com/605/605592.png');">-->
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Crée votre compte</h2>

                            <form>

                                <div class="form-outline mb-4">
                                    <input type="text" name="nom" id="nom" class="form-control form-control-lg" />
                                    <label class="form-label" for="nom">Votre Nom</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" name="prenom" id="prenom" class="form-control form-control-lg" />
                                    <label class="form-label" for="prenom">Votre prenom</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" name="email" id="email_Form" class="form-control form-control-lg" placeholder="name@example.com" />
                                    <label class="form-label" for="email_Form">Votre Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password_beta" id="password_beta_Form" class="form-control form-control-lg" placeholder="Password Beta" />
                                    <label class="form-label" for="password_beta_Form">Mot de passe</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password"  name="password" id="password_Form" class="form-control form-control-lg" placeholder="Password"/>
                                    <label class="form-label" for="password_Form">Retapez votre mot de passe </label>
                                </div>


                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Inscription</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Vous avez deja un compte? <a href="./connexion.php" class="fw-bold text-body"><u>Connectez-Vous</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } // END if ($_ISSET && $_NO_EMPTY) ?>


</body>

<?php require_once('footer.php'); ?>
</html>