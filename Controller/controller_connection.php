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
$path_new = $path . "/Project-trip/View/page/page_connection.php";
include($path_new);
?>

<?php
//form post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //connection
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/Project-trip/Model/Database.php";
    require($path_new);
    $database = new Database();

    $result_name = $database->get_user_information("id", "pseudo", $_POST["connexion_pseudo"]);
    $result_password = $database->get_user_information("mot_de_passe", "id", $result_name[0]["id"]);

    if (($result_password[0]["mot_de_passe"] != []) && (password_verify($_POST["connexion_mot_de_passe"], $result_password[0]["mot_de_passe"]))) {
        $_SESSION["type"] = $database->get_user_information("type", "pseudo", $_POST["connexion_pseudo"])[0]["type"];
        $_SESSION["id"] = $database->get_user_information("id", "pseudo", $_POST["connexion_pseudo"])[0]["id"];
        $_SESSION["pseudo"] = $database->get_user_information("pseudo", "pseudo", $_POST["connexion_pseudo"])[0]["pseudo"];
        
        // echo ("<script>location.href = './';</script>");
        header("Location: login" );
        exit();
    }

    header("Location: login" );
    exit();
}
?>