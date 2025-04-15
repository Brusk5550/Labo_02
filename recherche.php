<?php 
	require_once ("fonctions_mediatheque.php");
	session_start();
	if (!isset($_SESSION['numéro_page']) || ($_POST['action']!="Suivant" && $_POST['action']!="Précédent"))
	{
		$_SESSION["numéro_page"]=0;
	}
// echo $_SESSION['recherche']; //  On va devoir stocker la recherche à opérer.




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Recherche de films : </h1>
	<form action="recherche.php" method="post">
	<div>
		<h2>Genres (16)</h2>
			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Aventure</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Biopic</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Comédie</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Drame</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Espionage</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Fantastique</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Guerre</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Historique</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Horreur</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Peplum</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Policier</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Romance</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Science-fiction</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Thriller</label>
</p>

			<p>
   <input type="checkbox" name="newsletter" 	value="oui" id="newsletter">
   <label for="newsletter">Western</label>
</p>

	</div>
	<div>
		<h2>Réalisateurs (26)</h2>
		<p>
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Christopher Nolan</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">David Fincher</label>
		</p>
		<p>
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Martin Scorsese</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Quentin Tarantino</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Zack Snyder</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Clint Eastwood</label>
		</p>
		<p> <input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Edgar Wright</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Darren Aronofsky</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Andrew Niccol</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Andy&Lana Wachowski</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Joseph Kosi</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">J.J. Abrams</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Marc Webb</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Matthew Vaughn</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Bryan Singer</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">David O. Russell</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Nicolas Winding Refn</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Derek Cianfrance</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Sam Mendes</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Tony Kaye</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Alan Parker</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Francis Lawrence</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Michel Gondry</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Frank Darabont</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Tim burton</label>
		</p>
		<p> 
			<input type="checkbox" name="newsletter" value="oui" id="">
			<label for="newsletter">Martin Campbell
		</p>
	</div>
	<div>

<!--  Même principe pourles sept cent milles acteurs...  -->

		<h2>Acteurs (129)</h2>
<p>Aaron Eckhart
	Abbie Cornish
	Albert Finney
	Alec Baldwin
	Amy Adams
	Andrew Garfield 
	Anette Bening
	Angelina Jolie
	Anne Hathaway
	Bee Vang
	Ben Affleck
	Ben Kingsley
	Ben Whishaw
	Benedict Cumberbatch
	Benicio del Toro
	Bérénice Marlohe
	Brad Pitt
	Bradley Cooper
	Cameron Diaz
	Carey Mulligan
	Carrie-Anne Moss
	Cate Blanchett
	Charlie Sheen
	Chris Pine
	Christian Bale
	Christoph Waltz
	Christopher Plummer
	Christopher Walken
	Cillian Murphy 
	Claire Danes
	Clint Eastwood
	Cristina Ricci
	Daniel Craig
	Daniel Day-Lewis
	Diane Krüger
	Edward Furlong
	Edward Norton
	Ellen Page
	Emily Browning
	Emma Stone
	Ethan Hawke
	Eva Green
	Eva Mendes
	Ewan McGregor
	Freddy Highmore
	Gabriel Byrne
	Gary Oldman
	Geena Davis
	Gerard Butler
	Guy Pearce
	Halle Berry
	Heath Ledger
	Helena Bonham Carter
	Henry Cavill
	Hilary Swank
	Hugh Jackman
	Hugo Weaving
	Jack Nicholson
	Jackie Earle Haley
	James McAvoy
	Jamie Foxx
	Javier Bardem
	Jeffrey Dean Morgan 
	Jena Malone
    Jennifer Lawrence
	Jesse Eisenberg
	Jessica Lange
	Jim Carrey
	John Malkovich
	John Travolta
	Johnny Depp
	Jonah Hill
	Joseph Gordon-Levitt 
	Jude Law
	Judi Dench
	Justin Timberlake
	Kate Winslet
	Keanu Reeves
	Kevin Bacon
	Kevin Spacey
	Kirsten Dunst
	Laura Linney
	Laurence Fishburne
    Lena Headey
	Leonardo Di Caprio
	Liam Neeson
	Maggie Gyllenhaal
	Malin Ackerman
	Margot Robbie
	Marion Cotillard
	Mark Ruffalo
	Matt Damon
	Matthew McConaughey
	Mélanie Laurent
	Michael Caine
	Michael Douglas
	Michael Fassbender
	Michael Shannon
	Micheal Keaton
	Michelle Peifer
	Michelle Pfeiffer
	Mila Kunis
	Morgan Freeman
	Nathalie Portman
	Nick Frost
	Olga Kurylenko
	Patrick Wilson
	Rebecca Hall
	Reese Witherspoon
	Rhys Ifans
	Robert de Niro
	Robert Pattinson
	Rooney Mara
	Rosamund Pike
	Ryan Gosling
	Samuel L. Jackson
	Scarlett Johansson
	Sean Penn
	Simon Pegg
	Thora Birch
	Tim Robbins
	Tom Cruise
	Tom Hanks
	Tom Hardy
	Uma Thurman
	Vincent Cassel
	Will Smith
	Winona Ryder
	Zachary Quinto
</p>
	</div>
	<button type="submit" name="action" value="rechercher">Rechercher</button>
	</form>
</body>
</html>