<?php
//check session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<?php
//class
?>

<?php
//code
ini_set('max_execution_time', '300');
set_time_limit(300);

$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/Project-trip/Model/Api.php";
require($path_new);
$api = new Api();

$voyage_lieu_depart = $_SESSION["voyage_lieu_depart"];
$voyage_lieu_arrive = $_SESSION["voyage_lieu_arrive"];
$voyage_date_aller = $_SESSION["voyage_date_aller"];
$voyage_date_retour = $_SESSION["voyage_date_retour"];
$voyage_nombre_personne_adulte = $_SESSION["voyage_nombre_personne_adulte"];
$voyage_nombre_personne_enfant = $_SESSION["voyage_nombre_personne_enfant"];
$voyage_nombre_chambre = $_SESSION["voyage_nombre_chambre"];
$voyage_hotel_class = $_SESSION["voyage_hotel_class"];

$_SESSION["voyage_lieu_depart"] = null;
$_SESSION["voyage_lieu_arrive"] = null;
$_SESSION["voyage_date_aller"] = null;
$_SESSION["voyage_date_retour"] = null;
$_SESSION["voyage_nombre_personne_adulte"] = null;
$_SESSION["voyage_nombre_personne_enfant"] = null;
$_SESSION["voyage_nombre_chambre"] = null;
$_SESSION["voyage_hotel_class"] = null;

//----------------------------------------api call
/*
//trip advisor
$result_hotel = "";
$result_hotel = $api->api_call_travel_advisor($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre, $voyage_hotel_class);

//fork
$result_restaurant = "";
$result_restaurant = $api->api_call_the_fork_the_spoon($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre);

//priceline
$result_fly = "";
$result_fly = $api->api_call_priceline($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre);
*/

//----------------------------------------backup call
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/Project-trip/BACKUP_API_CALL_PHP.php";
include($path_new);

$result_hotel = get_api_call_backup_hotel();
$result_restaurant = get_api_call_backup_restaurant();
$result_fly = get_api_call_backup_fly();
?>

<?php
//view
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/Project-trip/View/page/page_result.php";
include($path_new);
?>

<?php
//form post
?>