<?php
// AUthoriser seulement le login webmaster à ouvir cette page
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

<?php
require_once ('header.php');
echo "<h1>STORY LOG</h1><br><br>";
?>

<h3>OBJECTIF N°1</h3>
<p id="text_objectif">Le projet contient une base de données SQL composée de plusieurs tables. Chaque table possède une clé primaire. Certaines tables contiennent une clé étrangère.<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW"> Done. ----- Réalisé par James, Myles et Rémy. <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°2</h3>
<p id="text_objectif">
Un utilisateur peut ajouter, modifier ou supprimer des produits gérés par le site web.
<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW"> Done. ----- Réalisé par James.<p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°3</h3>
<p id="text_objectif">L’utilisateur peut rechercher des produits selon leur nom et/ou leur description. <p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">Done. ----- Réalisé par Myles. <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°4</h3>
<p id="text_objectif">’utilisateur peut rechercher des produits selon leur catégorie. <p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">Done. ----- Réalisé par Myles. <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°5</h3>
<p id="text_objectif">
L'utilisateur doit pouvoir choisir le thème d'affichage des pages web du site. Par exemple, cela peut-être un thème "dark" ou un thème "light".
<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">Done. ----- Réalisé par Rémy. <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°6</h3>
<p id="text_objectif">
Le projet permet de gérer au moins une information de type « DATE ». Dans une page du site, différentes informations seront affichées ou non selon la valeur de cette date. Par ailleurs, cette date pourra être modifiée dans une page du site.
<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">TODO. ----- La date est actualisée seulement à l'ajout produit dans la base. Réalisé par James. <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°7</h3>
<p id="text_objectif">
Une partie du projet est à accès restreint. Un utilisateur autorisé a la possibilité de se connecter pour accéder à cette partie du projet. Il peut également se déconnecter. Lorsqu’un utilisateur non autorisé essaye d’accéder directement à l’espace restreint, il est automatiquement redirigé vers une page en libre accès.<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">Done. ---- Seul l' administrateur peut gérer les produit. Réalisé par James.  <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°8</h3>
<p id="text_objectif">
Le site permet à l’utilisateur de gérer un « panier ». L’utilisateur peut ajouter des produits dans son panier, en supprimer, modifier des quantités ... et il voit le prix total de son panier.
<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">TODO ---- In progress. Rémy s'y colle. <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°9</h3>
<p id="text_objectif">
Les utilisateurs peuvent continuer leur visite avec leur panier, même après avoir fermé puis ré-ouvert leur navigateur web.
<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">TODO<p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°10</h3>
<p id="text_objectif">
Le site permet l’upload de fichiers. Ces fichiers peuvent être des images, des fichiers PDF ou autres.
<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">Done. ---- On peut uploder des images qui seront stockées dans le répertoire "image". Réalisé par Rémy. <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°11</h3>
<p id="text_objectif">
Le site contient plusieurs formulaires HTML utilisant des méthodes GET et au moins un formulaire utilisant une méthode POST.
<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">Done. ---- Les deux méthodes sont bien utilisées. Réalisé par toute l'équipe.<p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°12</h3>
<p id="text_objectif">
Le site contient au moins un formulaires HTML avancé avec une liste d’options, des case à cocher, des boutons radio et du texte sur plusieurs lignes.
<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">Done. ---- Sur plusieurs formulaires. Réalisé par toute l'équipe.<p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°13</h3>
<p id="text_objectif">
Un fichier « Changelog.txt » contient la description de chaque US réalisée et des US qui pourraient être réalisées ultérieurement.<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">Done. Réalisé par James. <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°14</h3>
<p id="text_objectif">
Le site met en œuvre un framework CSS front-end.<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">Done. ----- Utilisation de bootstrap. Réalisé par Rémy. <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°15</h3>
<p id="text_objectif"> <p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">TODO. C'était prévu....<p>
Un fichier PHP contient des fonctions qui sont utilisées dans plusieurs autres fichiers PHP. Certaines de ces fonctions retournent du code HTML.<p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°16</h3>
<p id="text_objectif">
Coder en respectant les bonnes pratiques : convention de nommage des fichiers, tous les fichiers sont en UTF-8, code HTML valide, code CSS valide.
<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">DONE. ---- Jocker. Snake-Camel case halloween avec option franglais! <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°17</h3>
<p id="text_objectif">
Coder en respectant les bonnes pratiques : absence de duplication de code, code PHP respectant des conventions de nommage et code PHP documenté.<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">TODO <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°18</h3>
<p id="text_objectif">
Le principe des sessions est mise en œuvre de manière pertinente sur quelques pages du projet.<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">Done. ---- Utilisé pour le webmaster et l'utilisateur. Réalisé par James. <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°19</h3>
<p id="text_objectif">
Coder en considérant tous les cas de figure. Par exemple, une recherche ne fournit pas obligatoirement une liste de produits.
<p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">Done. ----- Un message apparait lors d'une recherche vide.  <p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>



<h3>OBJECTIF N°20</h3>
<p id="text_objectif"> <p>
<br>
<h5>FLOW</h5>
<p id="text_FLOW">DONE ---- Myles <p>
Créer une réalisation de type « projet » sur vos profils LinkedIn afin de présenter votre projet de cette semaine de formation.
<p>
<p>*************************************************************************** <p>
<p>*************************************************************************** <p>
<br><br><br><br><br>





</body>

</html>