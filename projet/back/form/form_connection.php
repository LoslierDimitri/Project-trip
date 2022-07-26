<?php
/*
recupere info du formulaire de connexion
appel a database_request.php pour une requete select
verification des information
se connecte

ne retourne rien
*/

function connection() {
    require ("../../back/database/database_connect.php");
    require ("../../back/database/database_disconnect.php");
    require ("../../back/database/database_request.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $connexion_pseudo = $_POST['connexion_pseudo'];
        $connexion_mot_de_passe = $_POST['connexion_mot_de_passe'];

        $connection = database_connect();
        $request_mot_de_passe = database_select_where($connection, "mot_de_passe", "pseudo", $connexion_pseudo);
        $connection = database_disconnect();

        $request_mot_de_passe = $request_mot_de_passe[0]["mot_de_passe"];

        if (password_verify($connexion_mot_de_passe, $request_mot_de_passe)) {
            session_start ();
            $_SESSION['pseudo'] = $_POST['connexion_pseudo'];
            $_SESSION['mot_de_passe'] = $_POST['connexion_mot_de_passe'];
        }
        
    }
}
?>