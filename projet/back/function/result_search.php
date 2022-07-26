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

    //recherche api

    //recherche bdd

    //affinage recherche

    //creation liste des info

    //envoie des info a formatter
    result_format();

    //envoie des info sur le front
    result_send();
}
?>