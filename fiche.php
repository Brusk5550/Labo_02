<?php
  require_once("fonctions_mediatheque.php");
  session_start();
  $_SESSION['fiche']=true;
  try {
    $db=connexion();
		$i=0;
		$j=0;
		$id=$_GET['id'];
		$genres="No gender";
		$titre="No title";
		$resume="No syno";
		$annee="No date";
		$poster="No pictures";
		$duree="No lenght";
    $realisateur="No real OG";
    $acteurs="No acteurs";
		$info=info_films($db, $id);
    $genres=info_genre($db, $id);
    $acteurs=info_acteur($db, $id);
    if (isset($info['0'])) {
      $titre=$info['0']['films_titre'];
      $resume=$info['0']['films_resume'];
      $annee=$info['0']['films_annee'];
      $poster=$info['0']['films_affiche'];
      $duree=$info['0']['films_duree'];
      $realisateur=$info['0']['real_nom'];
    }
  } catch (Exception $e) {
    die("Erreur fatale : ".$err -> getmessage()."<form><input type='button' value='retour' onclick='history.go(-1)'></form>");
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style\normalize.css">
  <link rel="stylesheet" href="style\style-mediatheque.css">
  <link rel="stylesheet" href="style\fiche.css">
  <!--Titre du film-->
  <title><?php echo $titre; ?></title>
</head>
<body>

  <header>
    <a href="mediatheque.php"><img src="img/title.png" alt="Logo"></a>
    <form action="recherche.php" method="post">
      <label for="recherche">Rechercher : </label>
      <input type="text" name="action" id="recherche_id">
    </form>
  </header>

  <h1><?php echo $titre; ?></h1>
  <div class="fiche">

    <!--Affiche du film-->
    <img src="img/BD_films/<?php echo $poster; ?>" alt="No picture" class="fiche-image">

    <div class="fiche-infos">

      <!--Syno-->
      <div class="syno">
        <h3>Synopsis</h3>
        <p><?php echo $resume; ?></p>
      </div>

      <!--Genre-->
      <div class="genre">
        <h3>Genre</h3>
        <p>
          <?php 
            foreach ($genres as $key => $tab_genre) {
              foreach ($tab_genre as $genre) {
                echo "<span>".$genre."</span>\n\t\t";
              }
            }
          echo "\n"
          ?>
        </p>
      </div>

      <!--Réalisateur-->
      <div class="real">
        <h3>Réalisateur</h3>
        <p><?php echo $realisateur; ?></p>
      </div>

      <!--Acteur-->
      <div class="acteurs">
        <h3>Acteurs/Actrices</h3>
        <p>
          <?php 
            foreach ($acteurs as $key => $tab_acteurs) {
              foreach ($tab_acteurs as $acteur) {
                echo "<span>".$acteur."</span>\n\t\t";
              }
            }
          echo "\n"
          ?>
        </p>
      </div>

      <!--Année-->
      <div class="annee">
        <h3>Années</h3>
        <p><?php echo $annee; ?></p>
      </div>
   
      <!--Durée-->
      <div class="duree">
        <h3>Durée</h3>
        <p><?php echo intdiv($duree, 60)."H".($duree%60); ?></p>
      </div>

    </div>


    <!--Debug-->
    <?php 
      #echo var_dump($info);
      #echo var_dump($genres);
    ?>

  </div>

  
</body>
</html>
