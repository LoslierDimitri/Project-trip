<?php
/*
recupere les info de result_format.php
envoie des info vers le front

ne retourne rien
*/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require ("result_format.php");

$result = result_format();

function result_send() {

}

?>