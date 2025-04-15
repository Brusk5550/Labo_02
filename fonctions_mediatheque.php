<?php 

	function connexion(){
		$ma_bdd= new PDO("mysql:dbname=mediatheque;host=localhost;port=3308", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $ma_bdd;
	}

	function affiche_films_tableaux($data_base, &$id, &$titre, &$resume, &$annee, &$poster, &$duree, &$realisateur, $page)		//  Récupère les données explicitement pour manipuler les variables et y implémenter les valeurs afin de les récupérer sur l'affichage de l'accueil. {On verra si on peut utiliser des bouts de code pour la recherche.}
	{
		$page++;
		$sql="select * from films ORDER BY films_annee desc, films_titre DESC LIMIT 4 OFFSET :page;";
		$intruction=$data_base -> prepare($sql);
		$intruction -> bindvalue('page', $page, PDO::PARAM_INT);
		$intruction -> execute();
		$intruction -> setfetchmode(PDO::FETCH_ASSOC);
		$tableau=$intruction -> fetchall();
		$i=0;
		foreach ($tableau as $lignes) {
			foreach ($lignes as $films) {
				if ($i%7==0){
				$id[$i/7]=$films;}	//  En mettant des modulos, on peut ranger les onfos en fonction des besoins.
				if ($i%7==1){
				$titre[($i-1)/7]=$films;}
				if ($i%7==2){
				$resume[($i-2)/7]=$films;}
				if ($i%7==3){
				$annee[($i-3)/7]=$films;}
				if ($i%7==4){
				$poster[($i-4)/7]=$films;}
				if ($i%7==5){
				$duree[($i-5)/7]=$films;}
				if ($i%7==6){
				$realisateur[($i-6)/7]=$films;}
				$i++;
			}
		}
	}

	function genre_films($data_base, $genre_ident)		//  Transformation du tableau des genres étrange en un truc plus simple à manipuler pour la recherche.
	{
		$sql="select distinct genres_nom from genres join films_genres on genres_id=fg_genres_id where genres_id in (select fg_genres_id from films_genres join films on films_id=fg_films_id where films_id=:genre_ident);";
		$intruction=$data_base -> prepare($sql);
		$intruction -> bindvalue('genre_ident', $genre_ident, PDO::PARAM_INT);
		$intruction -> execute();
		$intruction -> setfetchmode(PDO::FETCH_ASSOC);
		$tableau=$intruction -> fetchall();
		return $tableau;
	}

	function recherche($data_base, $realisateur, $genre, $acteur, $page)	//  Fonction en attente de son utilisation plus tardive. Elle sera modifiée fortement en appelant les options_* construites jusqu'ici.
	{
		$sql="select films_titre from films where films_real_id in (select real_id from realisateurs where real_nom=:realisateur) LIMIT 4 OFFSET :page;";
		$intruction=$data_base -> prepare($sql);
		$intruction -> bindvalue('realisateur', $realisateur, PDO::PARAM_STR);
		$intruction -> bindvalue('page', $page, PDO::PARAM_INT);
		$intruction -> execute();
		$intruction -> setfetchmode(PDO::FETCH_ASSOC);
		$tableau=$intruction -> fetchall();
		return $tableau;
	}

	function options_realisateurs($realisateur)		//  Construction pour le filtre des réalisateurs
	{
		$intruction="select films_titre from films where films_real_id in (select real_id from realisateurs where ";
		$i=0;
		while ($i<count($realisateur))
		{
			if ($i!=0)
			{
				$intruction.=" OR ";
			}
			$intruction.='real_nom="'.$realisateur[$i].'"';
			$i++;
		}
		$intruction.=");";
		return $intruction;
	}

	function options_genres($genre)		//  Construction pour le filtre des genres
	{
		$intruction="select distinct films_titre from films join films_genres on films_id=fg_films_id where films_id in (select fg_films_id from films_genres join genres on genres_id=fg_genres_id where ";
		$i=0;
		while ($i<count($genre))
		{
			if ($i!=0)
			{
				$intruction.=" OR ";
			}
			$intruction.='genres_nom="'.$genre[$i].'"';
			$i++;
		}
		$intruction.=");";
		return $intruction;
	}

	function options_acteurs($acteur)		//  Construction pour le filtre des acteurs
	{
		$intruction="select films_titre from films join films_acteurs on films_id=fa_films_id where fa_acteurs_id in (select acteurs_id from films_acteurs join acteurs where ";
				$i=0;
		while ($i<count($acteur))
		{
			if ($i!=0)
			{
				$intruction.=" OR ";
			}
			$intruction.='acteurs_nom="'.$acteur[$i].'"';
			$i++;
		}
		$intruction.=");";
		return $intruction;
	}

  //  function options_mot_clef($nom){}
  //  On peut chercher avec un like dans les synopsis et titres.


  function union_recherches($genres = [], $realisateur =[], $acteurs = []) {
    $query = "SELECT DISTINCT films.films_titre 
              FROM films 
              LEFT JOIN films_genres ON films.films_id = films_genres.fg_films_id 
              LEFT JOIN genres ON genres.genres_id = films_genres.fg_genres_id 
              LEFT JOIN films_acteurs ON films.films_id = films_acteurs.fa_films_id 
              LEFT JOIN acteurs ON acteurs.acteurs_id = films_acteurs.fa_acteurs_id 
              LEFT JOIN realisateurs ON realisateurs.real_id = films.films_real_id 
              WHERE 1=1;";

    if (!empty($genres)) {
      $genreChoix = [];
      foreach ($genres as $genre) {
        $genreChoix[] = 'genres.genres_nom = "' . $genre . '"';
      }
      $query .= " AND (" . implode(' OR ', $genreChoix) . ")";
    }

    if (!empty($realisateur)) {
      $realisateurchoix = [];
      foreach ($realisateur as $realisateur) {
        $realisateurChoix[] = 'realisateurs.real_nom = "' . $realisateur . '"';
      }
      $query .= " AND (" . implode(' OR ', $realisateurChoix) . ")";
    } 

    if (!empty($acteurs)) {
      $acteurChoix = [];
      foreach ($acteurs as $acteur) {
        $acteurChoix[] = 'acteurs.acteurs_nom = "' . $acteur . '"';
      }
      $query .= " AND (" . implode(' OR ', $acteurChoix) . ")";
    }

    $query .= ";";

    return $query;
  }



  function info_films($db,$id){
    $sql="SELECT DISTINCT films_titre, films_resume, films_annee, films_affiche, films_duree, real_nom FROM films 
              LEFT JOIN films_genres ON films.films_id = films_genres.fg_films_id 
              LEFT JOIN genres ON genres.genres_id = films_genres.fg_genres_id 
              LEFT JOIN films_acteurs ON films.films_id = films_acteurs.fa_films_id 
              LEFT JOIN acteurs ON acteurs.acteurs_id = films_acteurs.fa_acteurs_id 
              LEFT JOIN realisateurs ON realisateurs.real_id = films.films_real_id 
              WHERE 1=1 and films_id=:id;";
    $intruction=$db -> prepare($sql);
    $intruction -> bindvalue('id', $id, PDO::PARAM_INT);
    $intruction -> execute();
    $intruction -> setfetchmode(PDO::FETCH_ASSOC);
    $info_film=$intruction -> fetchall();
    return $info_film;
  }

  function info_genre($db, $id){
    $sql="select genres_nom from genres where genres_id in (select fg_genres_id from films_genres where fg_films_id = :id);";
    $intruction=$db -> prepare($sql);
    $intruction -> bindvalue('id', $id, PDO::PARAM_INT);
    $intruction -> execute();
    $intruction -> setfetchmode(PDO::FETCH_ASSOC);
    $genre_film=$intruction -> fetchall();
    return $genre_film;
  }

  function info_acteur($db, $id){
    $sql="select acteurs_nom from acteurs where acteurs_id in (select fa_acteurs_id from films_acteurs where fa_films_id = :id);";
    $intruction=$db -> prepare($sql);
    $intruction -> bindvalue('id', $id, PDO::PARAM_INT);
    $intruction -> execute();
    $intruction -> setfetchmode(PDO::FETCH_ASSOC);
    $acteurs_film=$intruction -> fetchall();
    return $acteurs_film;
  }


?>
