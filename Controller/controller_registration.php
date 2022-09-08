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
$path_new = $path . "/Project-trip/View/page/page_registration.php";
include($path_new);
?>

<?php
//form post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //registration
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/Project-trip/Model/Database.php";
    require($path_new);
    $database = new Database();

    $request_test_name = $database->get_user_information("nom", "nom", $_POST["inscription_name"]);
    $request_test_mail = $database->get_user_information("email", "email", $_POST["inscription_email"]);

    if ($request_test_name == [] && $request_test_mail == []) {
        if ($_POST["inscription_mot_de_passe"] == $_POST["inscription_mot_de_passe_verification"]) {
            $type = "c";
            $inscription_name = $_POST['inscription_name'];
            $inscription_prenom = $_POST['inscription_prenom'];
            $inscription_age = $_POST['inscription_age'];
            $inscription_sexe = $_POST['inscription_sexe'];
            $inscription_adresse = $_POST['inscription_adresse'];
            $inscription_pays = $_POST['inscription_pays'];
            $inscription_pseudo = $_POST['inscription_pseudo'];
            $inscription_email = $_POST['inscription_email'];
            $inscription_telephone = $_POST['inscription_telephone'];

            $password_before_hash = $_POST["inscription_mot_de_passe"];
            $password_after_hash = password_hash($password_before_hash, PASSWORD_DEFAULT);

            $database->insert_user($type, $inscription_name, $inscription_prenom, $inscription_age, $inscription_sexe, $inscription_pseudo, $password_after_hash, $inscription_email, $inscription_telephone, $inscription_pays, $inscription_adresse);

            $_SESSION["type"] = $database->get_user_information("type", "nom", $_POST["inscription_name"])[0]["type"];
            $_SESSION["id"] = $database->get_user_information("id", "nom", $_POST["inscription_name"])[0]["name"];
            $_SESSION["pseudo"] = $database->get_user_information("pseudo", "pseudo", $_POST["inscription_pseudo"])[0]["pseudo"];

            echo ("<script>location.href = '/Project-trip/Controller/controller_main.php';</script>");
            exit();
        }
    }

    echo ("<script>location.href = '/Project-trip/Controller/controller_registration.php';</script>");
    exit();
}
?>