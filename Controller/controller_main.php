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
?>

<?php
//view
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/View/page/page_main.php";
include($path_new);
?>

<?php
//form post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //search
    $voyage_lieu_depart = $_POST["voyage_lieu_depart"];
    $voyage_lieu_arrive = $_POST["voyage_lieu_arrive"];
    $voyage_date_aller = $_POST["voyage_date_aller"];
    $voyage_date_retour = $_POST["voyage_date_retour"];
    $voyage_nombre_personne_adulte = $_POST["voyage_nombre_personne_adulte"];
    $voyage_nombre_personne_enfant = $_POST["voyage_nombre_personne_enfant"];
    $voyage_nombre_chambre = $_POST["voyage_nombre_chambre"];
    $voyage_hotel_class = 3;

    $_SESSION["voyage_lieu_depart"] = $voyage_lieu_depart;
    $_SESSION["voyage_lieu_arrive"] = $voyage_lieu_arrive;
    $_SESSION["voyage_date_aller"] = $voyage_date_aller;
    $_SESSION["voyage_date_retour"] = $voyage_date_retour;
    $_SESSION["voyage_nombre_personne_adulte"] = $voyage_nombre_personne_adulte;
    $_SESSION["voyage_nombre_personne_enfant"] = $voyage_nombre_personne_enfant;
    $_SESSION["voyage_nombre_chambre"] = $voyage_nombre_chambre;
    $_SESSION["voyage_hotel_class"] = $voyage_hotel_class;

    echo ("<script>location.href = '/project_trip_redone/Controller/controller_result.php';</script>");
    exit();
}
?>