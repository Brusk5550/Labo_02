<?php 
	require_once ("fonctions_mediatheque.php");
	session_start();
	if (!isset($_POST['action']) || $_SESSION["numéro_page"]<0)
	{
		$_SESSION['numéro_page']=0;	//  Attention, variable globale qui pourrait entrer en compétition avec les pages dans le fichier résultat...
		echo "probleme";
	}
	else
	{
		if ($_POST['action']=="Précédent")
		{
			$_SESSION['numéro_page']-=4;
		}
		if ($_POST['action']=="Suivant")
		{
			$_SESSION['numéro_page']+=4;
		}
	}
	try
	{
		$data_base=connexion();
//		$affiches=affiche_films($data_base);	// un foreach dans un foreach nous rend une érie de 7 valeurs pourchaque film sous la forme 1-ID, 2-titre, 3-resumé, 4-annees, 5-affiche, 6-durree, 7-realID.
		$i=0;
		$j=0;
		$id=[];
		$genre=[];
		$titre=[];
		$resume=[];
		$annee=[];
		$poster=[];
		$duree=[];
		$realisateur=[];
		affiche_films_tableaux($data_base, $id, $titre, $resume, $annee, $poster, $duree, $realisateur, $_SESSION['numéro_page']);
		$genre=genre_films($data_base, $id);
	}
	catch (Exception $err)
	{
		die("Erreur fatale : ".$err -> getmessage()."<form><input type='button' value='retour' onclick='history.go(-1)'></form>");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style/style-mediatheque.css">
	<title>Document</title>
</head>
<body>
	
	<h1>Labo médiathèque PHP/SQL</h1>

	<header>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Modi delectus aliquam debitis placeat cum a architecto velit ullam itaque, nemo, harum. Hic, aliquid. Unde cupiditate nostrum ullam magni, eum molestias!</p>
		<p>Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Odio ad repudiandae expedita libero, maiores porro dicta consequatur quos.</p>

	</header>


	<form action="mediatheque.php" method="post">
<!-- 
	<input type="submit" name="action" value="Précédent" <?php //if(!isset($_POST['action']) || $_SESSION['numéro_page']==0){echo "disabled";} ?>>
 -->
	<button type="submit" name="action" value="Précédent" <?php if(!isset($_POST['action']) || $_SESSION['numéro_page']==0){echo "disabled";} ?>>Précédent</button>
	<button type="submit" name="action" value="Suivant">Suivant</button>	

	<?php 
/*		$i=0;
		while ($i<4)
		{
			$j=0;
			echo "<br>Film : ".$titre[$i].$resume[$i]."Date de parution : ".$annee[$i]."Durée : ".$duree[$i];
			foreach ($genre as $type) {
				foreach ($type as $sous_genre)
				{
					echo "$sous_genre ";
				}
			}
			echo "<br><br>";
			$i++;
		}*/
		$i=0;
		echo "<main>";
		while ($i<4){
			echo '<div class="media-card">';
			echo "$titre[$i]";
			echo '<img src="images/'.$poster[$i].'" alt="Poster de film.png">';
			echo $resume[$i];
			echo $annee[$i];
			echo $duree[$i];
			foreach ($genre as $type) 
			{
				foreach ($type as $sous_genre)
				{
					echo "$sous_genre ";
				}
			}
			$i++;
			echo '</div>';
		}
		echo "</main>";





	?>

	</form>


	<footer>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum, illo rerum aperiam, facilis nemo ad quidem eius earum unde? Earum error deserunt dolore optio, accusantium praesentium excepturi, quisquam, atque eligendi, neque distinctio vel.</p>
		<p>Lorem ipsum dolor, sit amet consectetur, adipisicing elit. Nobis provident, iste eos aperiam officiis quae reprehenderit maxime aliquam.</p>

	</footer>

</body>
</html>