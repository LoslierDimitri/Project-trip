<?php
/*
appel a api_call.php
appel a database_request.php avec un select
traitement des information de data.json et resultat de select
forme une liste de resultat sous le bon format

retourne la liste de resultat dans un fichier json
*/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function result_format()
{
    $file_hotel = file_get_contents("./projet/back/data/result_search/result_search_hotel.json");
    $file_hotel_decode = json_decode($file_hotel);
    $file_hotel_array_json = [];

    $file_restaurant = file_get_contents("./projet/back/data/result_search/result_search_restaurant.json");
    $file_restaurant_decode = json_decode($file_restaurant);
    $file_restaurant_decode_array_json = [];

    $file_departure_arrival = file_get_contents("./projet/back/data/result_search/travel_departure_arrival_array_json.json");
    $file_departure_arrival_decode = json_decode($file_departure_arrival);
    $file_departure_arrival_decode_array_json = [];

    $file_arrival_departure = file_get_contents("./projet/back/data/result_search/travel_departure_arrival_array_json.json");
    $file_arrival_departure_decode = json_decode($file_arrival_departure);
    $file_arrival_departure_decode_array_json = [];

    $result_search_array_json = [];
    array_push($result_search_array_json, $file_hotel_decode);
    array_push($result_search_array_json, $file_restaurant_decode);
    array_push($result_search_array_json, $file_departure_arrival_decode);
    array_push($result_search_array_json, $file_arrival_departure_decode);

    $result_search_path = "./projet/back/data/result_search/";
    $result_search_name = "result_search_format.json";
    echo "filepath: " . $result_search_path . $result_search_name;

    $file = fopen($result_search_path . $result_search_name, "wa+");
    fwrite($file, json_encode($result_search_array_json));
    fclose($file);
}