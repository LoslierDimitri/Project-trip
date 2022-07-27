<?php
/*
recupere info du formulaire de recherche
envoie les info sur result_format.php

ne retourne rien
*/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function search($search_type, $voyage_region, $voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_formule) {
    require ("result_format.php");
    require ("result_send.php");

    require ("../../back/api/api_call.php");
    require ("../../back/database/database_connect.php");
    require ("../../back/database/database_disconnect.php");
    require ("../../back/database/database_request.php");

    //recherche api
    api_call_travel_advisor($voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_formule);

    //recherche bdd
    if (isset($_SESSION['pseudo']) && isset($_SESSION["mot_de_passe"])) {
    $connection = database_connect();

    $user_nom = database_select_where($connection, "nom", "pseudo", $_SESSION["pseudo"]);
    $user_prenom = database_select_where($connection, "prenom", "pseudo", $_SESSION["pseudo"]);
    $user_age = database_select_where($connection, "age", "pseudo", $_SESSION["pseudo"]);
    $user_sexe = database_select_where($connection, "sexe", "pseudo", $_SESSION["pseudo"]);
    $user_mail = database_select_where($connection, "email", "pseudo", $_SESSION["pseudo"]);

    echo $user_nom[0]["nom"] . "<br>";
    echo $user_prenom[0]["prenom"] . "<br>";
    echo $user_age[0]["age"] . "<br>";
    echo $user_sexe[0]["sexe"] . "<br>";
    echo $user_mail[0]["email"] . "<br>";

    $connection = database_disconnect();
    }

    //affinage recherche

    //creation liste des info

    //envoie des info a formatter
    result_format();

    //envoie des info sur le front
    result_send();
}