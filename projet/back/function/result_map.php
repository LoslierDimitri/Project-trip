<?php

require("./projet/back/database/database_connect.php");
require("./projet/back/database/database_disconnect.php");
require("./projet/back/database/database_request.php");

function get_regions($name){
    $connection = database_connect();
    $result_region_name = database_get_region_information($connection, $name);
    $connection = database_disconnect();

    return $result_region_name;
}

function get_informations($panel, $informations, $i){
    $connection = database_connect();
    if($panel == "specialities"){
        if($informations == "noms"){
            $result_specialities_name = database_get_specialities_information($connection, 'noms', $i);
            return $result_specialities_name;
        }
        if($informations == "images"){
            $result_specialities_images = database_get_specialities_information($connection, 'images', $i);
            return $result_specialities_images;
        }
        if($informations == "descriptions"){
            $result_specialities_descriptions = database_get_specialities_information($connection, 'descriptions', $i);
            return $result_specialities_descriptions;
        }
    }

    if($panel == "visits"){
        if($informations == "noms"){
            $result_visits_name = database_get_visits_information($connection, 'noms', $i);
            return $result_visits_name;
        }
        if($informations == "images"){
            $result_visits_images = database_get_visits_information($connection, 'images', $i);
            return $result_visits_images;
        }
        if($informations == "descriptions"){
            $result_visits_descriptions = database_get_visits_information($connection, 'descriptions', $i);
            return $result_visits_descriptions;
        }
    }

    $connection = database_disconnect();


}
?>