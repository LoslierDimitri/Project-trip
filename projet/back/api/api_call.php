<?php
/*
appel aux api
fait une seule variable de reponse
fait un fichier data.json

ne retourne rien

-------------------------------------------------
how to use this file:

require "api_call.php";
require "../api/api_call.php";

api_call(<string url to api>, <string name of the file created>);
*/

/*
https://rapidapi.com/apidojo/api/travel-advisor/
https://rapidapi.com/ruben-jimenez-lancho-ruben-jimenez-lancho-default/api/flytrips/
https://rapidapi.com/tipsters/api/booking-com/pricing
https://rapidapi.com/apidojo/api/the-fork-the-spoon/pricing

very limited
https://rapidapi.com/ptwebsolution/api/worldwide-restaurants/
https://rapidapi.com/rapapp11/api/restaurants13/pricing
*/

function api_call($string, $name)
{
    //$service_api = "https://www.boredapi.com/api/activity/";
    //$service_api = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita";
    $service_api = $string;

    $data_path = "../../back/data/" . $name . ".json";

    echo "call to api: [", $service_api, "]... <br>";

    $service_url     = $service_api;
    $curl            = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $curl_response   = curl_exec($curl);
    curl_close($curl);
    $json_objekat    = json_decode($curl_response);
    // $quotes          = $json_objekat->contents->quotes;

    // foreach($quotes as $intKey=>$objQuote){
    //     echo $objQuote->title       . '<br>';
    //     echo $objQuote->author      . '<br>';
    //     echo $objQuote->quote       . '<br>';
    //     echo $objQuote->background  . '<br>';
    // }

    // print_r($json_objekat);

    if (file_put_contents($data_path, $curl_response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path, "] <br>";
        echo "call to api: [", $service_api, "] done <br>";

        echo "<pre>";
        print_r($json_objekat);
        echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }
}

function api_call_travel_advisor($voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_formule, $voyage_nombre_chambre)
{
    //call api location_id
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/locations/search?query=" . $voyage_lieu_arrive . "&limit=30&offset=0&units=km&location_id=1&currency=USD&sort=relevance&lang=en_US",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
            "X-RapidAPI-Key: dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $json_objekat = json_decode($response);
    $data_path_location_id = "../../back/data/api_call_travel_advisor_location_id.json";
    if (file_put_contents($data_path_location_id, $response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path_location_id, "] <br>";
        //echo "call to api: [", $service_api, "] done <br>";

        // echo "<pre>";
        // print_r($json_objekat);
        // echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }

    $test_location_id = file_get_contents("C:\Apache24\htdocs\Project-trip\projet\back\data\api_call_travel_advisor_location_id.json");
    $test_location_id_data = json_decode($test_location_id);
    //print_r($test_location_id_data);

    $test_location_id_data_array = (array) $test_location_id_data->data[0];
    //echo "location_id: " . $test_location_id_data_array['result_object']->location_id;
    $location_id = $test_location_id_data_array['result_object']->location_id;
    echo "location_id: " . $location_id . "<br>";

    // echo "<pre>";
    // print_r($json_objekat);
    // echo "</pre>";
    //---------------------------------------------------------

    //call api hotel
    //$service_api = $string;
    $data_path_hotel = "../../back/data/api_call_travel_advisor_hotel.json";
    //echo "call to api: [", $service_api, "][hotel]... <br>";

    //number of night
    $date_1 = strtotime($voyage_date_aller);
    $date_2 = strtotime($voyage_date_retour);
    $diff_minutes = round(abs($date_1 - $date_2) / 60, 2) . " minutes";
    //echo $diff_minutes;
    $number_of_night =(int)$diff_minutes/60/24;
    $number_of_night = $number_of_night - 1;
    //echo $number_of_night . "days";

    //call api
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/hotels/list?location_id=" . $location_id . "&adults=" . $voyage_nombre_personne_adulte . "&rooms=" . $voyage_nombre_chambre . "&nights=" . $number_of_night . "&offset=0&currency=USD&order=asc&limit=30&sort=recommended&lang=en_US",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
            "X-RapidAPI-Key: dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $json_objekat = json_decode($response);

    if (file_put_contents($data_path_hotel, $response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path_hotel, "] <br>";
        //echo "call to api: [", $service_api, "] done <br>";

        // echo "<pre>";
        // print_r($json_objekat);
        // echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }
    //---------------------------------------------------------
    /*
    //call api restaurant
    $service_api = $string;
    $data_path_restaurant = "../../back/data/api_call_travel_advisor_restaurant.json";
    echo "call to api: [", $service_api, "][restaurant]... <br>";

    //call api

    if (file_put_contents($data_path_restaurant, $curl_response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path_restaurant, "] <br>";
        echo "call to api: [", $service_api, "] done <br>";

        echo "<pre>";
        print_r($json_objekat);
        echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }
    */
}

function api_call_flytrips()
{
}

function api_call_booking()
{
}

function api_call_the_fork_the_spoon()
{
}

/*
ces fonctions servent de backup en cas d indisponnibilite d appel a l api
    plus d appel possible
    probleme de connexion

ils utilisent des fichier de projet/data/backup en json qui sont des appels stocke et ne doivent en aucun cas etre modifiee
ce sont des appel api fait a l avance et qui marchent pour la demonstration en cas de probleme uniquement

si plus d appel possible, utiliser backup ou faire une nouvelle cle d appel sur rapidapi: https://rapidapi.com/search/api
*/
function api_call_travel_advisor_backup($voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_formule)
{
}
