<?php
/*
recupere info du formulaire d inscription
appel a database_request.php pour une requete insert
se connecte

ne retourne rien
*/

require ("../../back/database/database_connect.php");
require ("../../back/database/database_disconnect.php");
require ("../../back/database/database_request.php");

function registration() {
$connection = database_connect();

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    $passwordNotHashed = $_POST['inscription_mot_de_passe'];
    $inscription_mot_de_passe = password_hash($passwordNotHashed, PASSWORD_DEFAULT);
    $inscription_mot_de_passe_verification = $_POST['inscription_mot_de_passe_verification'];

    if (!$inscription_name || !$inscription_prenom || !$inscription_age || !$inscription_adresse || !$inscription_pays || !$inscription_pseudo || !$inscription_email || !$inscription_telephone || !$passwordNotHashed || !$inscription_mot_de_passe_verification) {
        $error = 'Champ à renseigner';
        if (!$inscription_name) {
            $error .= '<br>Nom';
        }
        if (!$inscription_prenom) {
            $error .= '<br>Prénom';
        }
        if (!$inscription_age) {
            $error .= '<br>Age';
        }
        if (!$inscription_adresse) {
            $error .= '<br>Adresse';
        }
        if (!$inscription_pays) {
            $error .= '<br>Pays';
        }
        if (!$inscription_pseudo) {
            $error .= '<br>Pseudo';
        }
        if (!$inscription_email) {
            $error .= '<br>Email';
        }
        if (!$inscription_telephone) {
            $error .= '<br>Téléphone';
        }
        if (!$passwordNotHashed) {
            $error .= '<br>Mot de passe';
        }
        if (!$inscription_mot_de_passe_verification) {
            $error .= '<br>Confirmation du mot de passe';
        }
        }
    if ($passwordNotHashed != $inscription_mot_de_passe_verification) {
        $error = 'Les mots de passe ne correspondent pas';
    }

    if (!$error) {
        $inscription_pseudo_test = database_select_where($connection, "pseudo", "pseudo", $inscription_pseudo);
        
        $inscription_pseudo_test = $inscription_pseudo_test[0]["pseudo"];
         echo $inscription_pseudo . " " . $inscription_pseudo_test;


        if ($inscription_pseudo != $inscription_pseudo_test) {
            database_insert($connection, $type, $inscription_name, $inscription_prenom, $inscription_age, $inscription_sexe, $inscription_pseudo, $inscription_mot_de_passe, $inscription_email, $inscription_telephone, $inscription_pays, $inscription_adresse);
        }
        // die();
    }
}

$connection = database_disconnect();

}

?>