<?php



function get_regions($name, $images, $descriptions, $prix){
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/project_trip_redone/Model/Database.php";
    require_once($path_new);
    $database = new Database();
    
    $result_region_name = $database->get_regions_information($name);


    return $result_region_name;
}

function get_informations($panel, $informations, $i){
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/project_trip_redone/Model/Database.php";
    require_once($path_new);
    $database = new Database();

    if($panel == "specialities"){
        if($informations == "noms"){
            $result_specialities_name = $database->get_specialities_information('noms', $i);
            return $result_specialities_name;
        }
        if($informations == "images"){
            $result_specialities_images = $database->get_specialities_information('images', $i);
            return $result_specialities_images;
        }
        if($informations == "descriptions"){
            $result_specialities_descriptions = $database->get_specialities_information('descriptions', $i);
            return $result_specialities_descriptions;
        }
    }

    if($panel == "visits"){
        if($informations == "noms"){
            $result_visits_name = $database->get_visits_information('noms', $i);
            return $result_visits_name;
        }
        if($informations == "images"){
            $result_visits_images = $database->get_visits_information('images', $i);
            return $result_visits_images;
        }
        if($informations == "descriptions"){
            $result_visits_descriptions = $database->get_visits_information('descriptions', $i);
            return $result_visits_descriptions;
        }
    }




}
?>