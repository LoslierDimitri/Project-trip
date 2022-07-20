<?php
/*
recupere info du formulaire de modification
appel a database_request.php pour une requete update

ne retourne rien
*/

require ("../../back/database/database_connect.php");
require ("../../back/database/database_disconnect.php");
require ("../../back/database/database_request.php");

function modification() {
$connection = database_connect();

//change with user
// $id = 1;

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modification_name = $_POST['modification_name'];
    $modification_value = $_POST['modification_value'];

    if (!$error) {
        database_update($connection, $modification_name, $modification_value);
    }
}

$connection = database_disconnect();

}

?>