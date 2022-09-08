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
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/Project-trip/Model/Database.php";
require($path_new);
$database = new Database();

$result_user = $database->get_user_all_information($_SESSION["id"])[0];

echo "<pre>";
print_r($result_user);
echo "</pre>";

/*
get user information

$result_user["id"]
$result_user["type"]
$result_user["nom"]
$result_user["prenom"]
$result_user["age"]
$result_user["sexe"]
$result_user["pseudo"]
$result_user["mot_de_passe"]
$result_user["email"]
$result_user["telephone"]
$result_user["pays"]
$result_user["adresse"]
*/
?>

<?php
//view
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/Project-trip/View/page/page_account.php";
include($path_new);
?>

<?php
//form post
?>