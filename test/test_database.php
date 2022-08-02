<?php
include ("test_include.php");
?>

<?php
require ("../../back/database/database_connect.php");
require ("../../back/database/database_disconnect.php");
require ("../../back/database/database_request.php");

$connection = database_connect();

print_r( database_select($connection, "nom"));

database_insert($connection, "c", "epsilon_nom", "epsilon_prenom", 20, "f", "epsilon_pseudo", "epsilon_mdp", "epsilon@com", "0123456789", "belgique", "epsilon_addresse");
print_r( database_select($connection, "nom"));

database_update($connection, "nom", "lambda", "pseudo", "pseudo_2");
print_r( database_select($connection, "nom"));

$connection = database_disconnect();


?>

