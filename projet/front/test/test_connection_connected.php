<?php

// session_start();

// echo "connected with pseudo: [" . $_SESSION['pseudo'] . "] <br>";
// echo "connected with mot_do_passe: [" . $_SESSION['mot_de_passe'] . "] <br>";

// echo $_SESSION["pseudo"];

if (isset($_SESSION['pseudo']) && isset($_SESSION['mot_de_passe'])) {

	// On teste pour voir si nos variables ont bien été enregistrées
	echo '<html>';
	echo '<head>';
	echo '<title>Page de notre section membre</title>';
	echo '</head>';

	echo '<body>';
	echo 'Votre login est '.$_SESSION['pseudo'].' et votre mot de passe est '.$_SESSION['mot_de_passe'].'.';
	echo '<br />';

	// On affiche un lien pour fermer notre session
	echo '<a href="./test_connection_deconnection.php">Déconnection</a>';
}
else {
	echo 'Les variables ne sont pas déclarées.';
}

?>

<?php
include ("test_include.php");
?>