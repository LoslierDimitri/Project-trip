<?php
session_start();
$pdo = require_once './data/database.php';
$title = "Connexion";
$error = "";
// $formValue = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connexion_pseudo = $_POST['connexion_pseudo'];
    $connexion_mot_de_passe = $_POST['connexion_mot_de_passe'];

    if (!$connexion_pseudo || !$passwordNotHashed) {
        $error = 'Champ à renseigner';
        }
    if ($connexion_pseudo) {
        $stmt = $pdo->prepare('SELECT mot_de_passe FROM users WHERE pseudo = :pseudo'); 
        $stmt->bindValue(':pseudo', $connexion_pseudo);
        $stmt->execute();
        $passwordcheck = $stmt->fetch();
        if (password_verify($connexion_mot_de_passe, $passwordcheck['mot_de_passe'])) {
            $_SESSION['user']=$connexion_pseudo;
            header('Location: /project-trip');
        } else {
            $error = 'Pseudo ou mot de passe incorrect';
        }
    }
}


?>