<?php
session_start();
$pdo = require_once './data/database.php';
$title = "Inscription";
$error = "";
// $formValue = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    // $formValue = [
    //     'nom' => $nom,
    //     'prenom' => $prenom,
    //     'age' => $age,
    //     'adresse' => $adresse,
    //     'mail' => $mail,
    //     'telephone' => $telephone,
    //     'password' => $password,
    //     'password_confirm' => $passwordConfirm
    // ];



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
        $stmtCreate = $pdo->prepare('INSERT INTO users VALUES (DEFAULT, :type, :nom, :prenom, :age, :sexe, :pseudo, :mot_de_passe, :email, :telephone, :pays, :adresse)');
        $stmtCreate->bindValue(':type', 'C');
        $stmtCreate->bindValue(':nom', $inscription_name);
        $stmtCreate->bindValue(':prenom', $inscription_prenom);
        $stmtCreate->bindValue(':age', $inscription_age);
        $stmtCreate->bindValue(':sexe', $inscription_sexe);
        $stmtCreate->bindValue(':pseudo', $inscription_pseudo);
        $stmtCreate->bindValue(':mot_de_passe', $inscription_mot_de_passe);
        $stmtCreate->bindValue(':email', $inscription_email);
        $stmtCreate->bindValue(':telephone', $inscription_telephone);
        $stmtCreate->bindValue(':pays', $inscription_pays);
        $stmtCreate->bindValue(':adresse', $inscription_adresse);
        $stmtCreate->execute();
        header('Location: /project-trip');
    }
}


?>