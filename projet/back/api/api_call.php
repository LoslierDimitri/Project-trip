<<<<<<< Updated upstream
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
https://rapidapi.com/tipsters/api/priceline-com-provider/pricing

very limited
https://rapidapi.com/ptwebsolution/api/worldwide-restaurants/
https://rapidapi.com/rapapp11/api/restaurants13/pricing
*/

/*
api key
dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a
*/


//deprecated
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

function api_call_travel_advisor($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_formule, $voyage_nombre_chambre)
{
    $api_call_travel_advisor_result_hotel_path = "../../back/data/result_search/";
    $api_call_travel_advisor_result_hotel_name = "result_search_hotel.json";
    $api_call_travel_advisor_result_hotel_json = [];


    $API_KEY = "X-RapidAPI-Key: dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a";


    //call api location_id
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    //get location id of location near choice
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
            $API_KEY
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
    $number_of_night = (int)$diff_minutes / 60 / 24;
    $number_of_night = $number_of_night - 1;
    //echo $number_of_night . "days";

    //call api
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    if ($voyage_formule == "voyage_formule_gastronomique") {
        $sort = "recommended";
    } else {
        $sort = "price";
    }

    //get location id of hotel
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/hotels/list?location_id=" . $location_id . "&adults=" . $voyage_nombre_personne_adulte . "&rooms=" . $voyage_nombre_chambre . "&nights=" . $number_of_night . "&offset=0&currency=USD&order=asc&limit=30&sort=" . $sort . "&lang=en_US",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
            $API_KEY
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

    $file = file_get_contents("../../back/data/api_call_travel_advisor_hotel.json");
    $file_decode = json_decode($file);
    $file_array = (array) $file_decode;

    for ($i = 0; $i < 5; $i++) {
        $result_hotel_location_id = $file_decode->data[$i]->location_id;
        // $result_hotel_nom = $file_decode->data[$i]->name;
        // $result_hotel_adresse = "";
        // $result_hotel_prix = $file_decode->data[$i]->price;
        // $result_hotel_score = $file_decode->data[$i]->rating;
        // $result_hotel_autour = (array)$file_decode->data[$i]->neighborhood_info;
        // $result_hotel_autour_location_id = array();
        // $result_hotel_autour_nom = array();
        // for ($j = 0; $j < count($result_hotel_autour); $j++) {
        //     array_push($result_hotel_autour_location_id, $result_hotel_autour[$j]->location_id);
        //     array_push($result_hotel_autour_nom, $result_hotel_autour[$j]->name);
        // }
        // $result_hotel_option = "";



        // echo "recap: <br>";
        // echo "hotel nom: [" . $result_hotel_nom . "]<br>";
        // echo "hotel adresse: [" . $result_hotel_adresse . "]<br>";
        // echo "hotel prix: [" . $result_hotel_prix . "]<br>";
        // echo "hotel score: [" . $result_hotel_score . "]<br>";
        // // echo "<pre>";
        // // var_dump(print_r($result_hotel_autour));
        // // echo "</pre><br>";
        // for ($j = 0; $j < count($result_hotel_autour); $j++) {
        //     echo "hotel autour[" . $j . "]: id: [" . $result_hotel_autour_location_id[$j] ."]<br>";
        //     echo "hotel autour[" . $j . "]: nom: [" . $result_hotel_autour_nom[$j] ."]<br>";
        // }
        // //print_r("hotel autour: [" . $result_hotel_autour . "]<br>");
        // echo "hotel option: [" . $result_hotel_option . "]<br>";
        // echo "----------------------<br>";
        // echo "----------------------<br>";
        // echo "----------------------<br>";
        // echo "----------------------<br>";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        //get hotel detail
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/hotels/get-details?location_id=" . $result_hotel_location_id . "&checkin=" . $voyage_date_aller . "&adults=" . $voyage_nombre_personne_adulte . "&lang=en_US&currency=EUR&nights=" . $number_of_night . "",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
                $API_KEY
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
        // } else {
        //     echo $response;
        // }

        $data_path_hotel_detail = "../../back/data/api_call_travel_advisor_hotel_detail_" . $i . ".json";
        if (file_put_contents($data_path_hotel_detail, $response)) {
            echo "JSON file created successfully <br>";
            echo "JSON file sent to: [", $data_path_hotel_detail, "] <br>";
            //echo "call to api: [", $service_api, "] done <br>";

            // echo "<pre>";
            // print_r($json_objekat);
            // echo "</pre>";
        } else {
            echo "Error on JSON file <br>";
        }

        $tab_file = (array) [];
        for ($i = 0; $i < 5; $i++) {
            array_push($tab_file, json_decode(file_get_contents("../../back/data/api_call_travel_advisor_hotel_detail_" . $i . ".json")));
        }

        for ($i = 0; $i < 5; $i++) {
            $result_hotel_nom_detail = $tab_file[$i]->data[0]->name;
            $result_hotel_addresse_detail = $tab_file[$i]->data[0]->address;
            $result_hotel_score_detail = $tab_file[$i]->data[0]->rating;
            $result_hotel_image_detail = $tab_file[$i]->data[0]->photo->images->medium->url;
            $result_hotel_chambre_detail_available = $tab_file[$i]->data[0]->hac_offers->availability;
            $result_hotel_chambre_detail = array();
            for ($j = 0; $j < 5; $j++) {
                if ($result_hotel_chambre_detail_available == "available") {
                    array_push($result_hotel_chambre_detail, $tab_file[$i]->data[0]->hac_offers->offers[$j]->display_price_int);
                }
            }

            // echo "----------------------<br>";
            // echo "hotel nom: [" . $result_hotel_nom_detail . "] <br>";
            // echo "hotel adresse: [" . $result_hotel_addresse_detail . "] <br>";
            // echo "hotel note: [" . $result_hotel_score_detail . "] <br>";
            // echo "hotel image: [" . $result_hotel_image_detail . "] <br>";
            // // echo '<img src="' . $result_hotel_image_detail . '" alt=""><br>';
            // echo "hotel chambre avaiable: [" . $result_hotel_chambre_detail_available . "] <br>";
            // for ($j = 0; $j < 5; $j++) {
            //     if ($result_hotel_chambre_detail_available == "available") {
            //         echo "hotel chambre [" . $j . "]: [" . $result_hotel_chambre_detail[$j] . "] <br>";
            //     }
            // }

            // echo "<br>";

            $hotel_array = [];
            array_push($hotel_array, $result_hotel_nom_detail);
            array_push($hotel_array, $result_hotel_addresse_detail);
            array_push($hotel_array, $result_hotel_score_detail);
            array_push($hotel_array, $result_hotel_image_detail);
            array_push($hotel_array, $result_hotel_chambre_detail_available);
            array_push($hotel_array, $result_hotel_chambre_detail);

            // $api_call_travel_advisor_result_hotel_json = [];
            array_push($api_call_travel_advisor_result_hotel_json, $hotel_array);
        }


        // echo "<pre>";
        // print_r($api_call_travel_advisor_result_hotel_json);
        // echo "</pre>";

        echo "filepath: " . $api_call_travel_advisor_result_hotel_path . $api_call_travel_advisor_result_hotel_name;

        $file = fopen($api_call_travel_advisor_result_hotel_path . $api_call_travel_advisor_result_hotel_name, "wa+");
        fwrite($file, json_encode($api_call_travel_advisor_result_hotel_json));
        fclose($file);
    }




    // $location_id

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

    // $curl = curl_init();

    // curl_setopt_array($curl, [
    //     CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/restaurants/list?location_id=".$location_id."&restaurant_tagcategory=10591&restaurant_tagcategory_standalone=10591&currency=EUR&lunit=km&limit=30&open_now=false&lang=en_US",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "GET",
    //     CURLOPT_HTTPHEADER => [
    //         "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
    //         $API_KEY
    //     ],
    // ]);

    // $response = curl_exec($curl);
    // $err = curl_error($curl);

    // curl_close($curl);

    // if ($err) {
    //     echo "cURL Error #:" . $err;
    // } else {
    //     echo $response;
    // }

    // $data_path_restaurant = "../../back/data/api_call_travel_advisor_restaurant.json";
    // if (file_put_contents($data_path_restaurant, $response)) {
    //     echo "JSON file created successfully <br>";
    //     echo "JSON file sent to: [", $data_path_restaurant, "] <br>";
    //     //echo "call to api: [", $service_api, "] done <br>";

    //     // echo "<pre>";
    //     // print_r($json_objekat);
    //     // echo "</pre>";
    // } else {
    //     echo "Error on JSON file <br>";
    // }
}



























function api_call_the_fork_the_spoon($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_formule, $voyage_nombre_chambre)
{
    $api_call_the_fork_the_spoon_result_restaurant_path = "../../back/data/result_search/";
    $api_call_the_fork_the_spoon_result_restaurant_name = "result_search_restaurant.json";
    $api_call_the_fork_the_spoon_result_restaurant_json = [];

    /*
    api call location with voyage_lieu_arrive
    get location_id

    api call restaurant with location_id
    get restaurant

    api call restaurant detail with restaurant_location_id
    get restaurant detail
    */

    $API_KEY = "X-RapidAPI-Key: dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a";

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //api call location
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://the-fork-the-spoon.p.rapidapi.com/locations/v2/auto-complete?text=" . $voyage_lieu_arrive . "",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: the-fork-the-spoon.p.rapidapi.com",
            $API_KEY
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $data_path_location_id = "../../back/data/api_call_the_fork_the_spoon_location_id.json";
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

    $file = file_get_contents("../../back/data/api_call_the_fork_the_spoon_location_id.json");
    $file_decode = json_decode($file);
    $google_place_id = $file_decode->data->geolocation[0]->id->id;
    $google_place_geo_text = $file_decode->data->geolocation[0]->name->text;
    $google_place_geo_type = $file_decode->data->geolocation[0]->id->type;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://the-fork-the-spoon.p.rapidapi.com/locations/v2/list?google_place_id=" . $google_place_id . "&geo_ref=false&geo_text=" . $google_place_geo_text . "&geo_type=" . $google_place_geo_type . "",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: the-fork-the-spoon.p.rapidapi.com",
            $API_KEY
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $data_path_location_id = "../../back/data/api_call_the_fork_the_spoon_location_id_google.json";
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

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get location_id
    $file = file_get_contents("../../back/data/api_call_the_fork_the_spoon_location_id_google.json");
    $file_decode = json_decode($file);
    $file_array = (array) $file_decode;

    $location_id = $file_decode->id_city;

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //api call restaurant with location_id
    if ($voyage_formule == "voyage_formule_gastronomique") {
        $sort_type = "quality";
    } else {
        $sort_type = "price";
    }

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://the-fork-the-spoon.p.rapidapi.com/restaurants/v2/list?queryPlaceValueCityId=" . $location_id . "&pageSize=10&pageNumber=1&sort=" . $sort_type . "",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: the-fork-the-spoon.p.rapidapi.com",
            $API_KEY
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $data_path = "../../back/data/api_call_the_fork_the_spoon_restaurant.json";
    if (file_put_contents($data_path, $response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path, "] <br>";
        //echo "call to api: [", $service_api, "] done <br>";

        // echo "<pre>";
        // print_r($json_objekat);
        // echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get restaurant_location_id

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //api call restaurant detail with restaurant_location_id

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get restaurant detail
    $file = file_get_contents("../../back/data/api_call_the_fork_the_spoon_restaurant.json");
    $file_decode = json_decode($file);
    $file_array = (array) $file_decode;

    for ($i = 0; $i < count($file_decode->data); $i++) {

        $result_restaurant_nom = "";
        $result_restaurant_cuisine = "";
        $result_restaurant_adresse = "";
        $result_restaurant_note = "";
        $result_restaurant_photo = "";

        $result_restaurant_nom = $file_decode->data[$i]->name;
        if (isset($file_decode->data[$i]->servesCuisine)) {
            $result_restaurant_cuisine = $file_decode->data[$i]->servesCuisine;
        }
        $result_restaurant_adresse = $file_decode->data[$i]->address->street . ", " . $file_decode->data[$i]->address->postalCode . ", " . $file_decode->data[$i]->address->locality . ", " . $file_decode->data[$i]->address->country;
        $result_restaurant_note = $file_decode->data[$i]->aggregateRatings->tripadvisor->ratingValue;
        $result_restaurant_photo = $file_decode->data[$i]->mainPhotoSrc;

        // // nom
        // echo "<pre>";
        // print_r("nom: " . $file_decode->data[$i]->name);
        // echo "</pre>";

        // // cuisine
        // echo "<pre>";
        // print_r("cuisine: " . $file_decode->data[$i]->servesCuisine);
        // echo "</pre>";

        // // addresse
        // echo "<pre>";
        // print_r("adresse: " . $file_decode->data[$i]->address->street . ", " . $file_decode->data[$i]->address->postalCode . ", " . $file_decode->data[$i]->address->locality . ", " . $file_decode->data[$i]->address->country);
        // echo "</pre>";

        // // note
        // echo "<pre>";
        // print_r("note: " . $file_decode->data[$i]->aggregateRatings->tripadvisor->ratingValue);
        // echo "</pre>";

        // // photo
        // echo "<pre>";
        // print_r("photo: " . $file_decode->data[$i]->mainPhotoSrc);
        // echo "</pre>";

        // // echo '<img src="'.$file_decode->data[$i]->mainPhotoSrc.'" alt="">';

        // echo "----------------------------<br>";
        // echo "<br>";$hotel_array = [];

        $restaurant_array = [];
        array_push($restaurant_array, $result_restaurant_nom);
        array_push($restaurant_array, $result_restaurant_cuisine);
        array_push($restaurant_array, $result_restaurant_adresse);
        array_push($restaurant_array, $result_restaurant_note);
        array_push($restaurant_array, $result_restaurant_photo);

        array_push($api_call_the_fork_the_spoon_result_restaurant_json, $restaurant_array);
    }

    echo "filepath: " . $api_call_the_fork_the_spoon_result_restaurant_path . $api_call_the_fork_the_spoon_result_restaurant_name;

    $file = fopen($api_call_the_fork_the_spoon_result_restaurant_path . $api_call_the_fork_the_spoon_result_restaurant_name, "wa+");
    fwrite($file, json_encode($api_call_the_fork_the_spoon_result_restaurant_json));
    fclose($file);
}





























//deprecated
function api_call_flytrips($API_KEY_1, $API_KEY_2, $search_type, $voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_formule, $voyage_nombre_chambre)
{

    /*
    search country code
    search airport code
    search departure with country code and airport code
    get departure
    search arrival with country code and airport code
    get arrival

    compare arrival and departure numflight

    select flight
    */

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //search coutry code
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://flytrips.p.rapidapi.com/api/v1/country/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: flytrips.p.rapidapi.com",
            $API_KEY_1
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $data_path = "../../back/data/api_call_flytrip_country.json";
    if (file_put_contents($data_path, $response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path, "] <br>";
        //echo "call to api: [", $service_api, "] done <br>";

        // echo "<pre>";
        // print_r($json_objekat);
        // echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get country code
    $region = $search_type;

    $file = file_get_contents("../../back/data/api_call_flytrip_country.json");
    $file_decode = json_decode($file);
    $file_array = (array) $file_decode;

    $result_country_nom_send = "";
    $result_country_code_send = "";

    for ($i = 0; $i < count($file_decode); $i++) {
        $result_coutry_nom = "";
        $result_country_code = "";

        $result_coutry_nom = $file_decode[$i]->name;
        $result_country_code = $file_decode[$i]->code;

        if ($result_coutry_nom == $region) {
            $result_country_nom_send = $result_coutry_nom;
            $result_country_code_send = $result_country_code;
        }
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //search airport code
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://flytrips.p.rapidapi.com/api/v1/airport/FR",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: flytrips.p.rapidapi.com",
            $API_KEY_1
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $data_path = "../../back/data/api_call_flytrip_airport.json";
    if (file_put_contents($data_path, $response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path, "] <br>";
        //echo "call to api: [", $service_api, "] done <br>";

        // echo "<pre>";
        // print_r($json_objekat);
        // echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }





    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    // set our url with curl_setopt()
    curl_setopt($curl, CURLOPT_URL, "https://api.aviationstack.com/v1/routes?access_key = " . $API_KEY_2 . "");

    // return the transfer as a string, also with setopt()
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    // curl_exec() executes the started curl session
    // $output contains the output string
    $response = curl_exec($curl);

    // close curl resource to free up system resources
    // (deletes the variable made by curl_init)
    curl_close($curl);

    echo "<pre>";
    print_r($response);
    echo "</pre>";





    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get airport code

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //search departure with country code and airport code

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get departure

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //search arrival with country code and airport code

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get arrival

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //compare departure and arrival

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //select flight

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //format
}













//deprecated
function api_call_sncf($API_KEY_3, $search_type, $voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_formule, $voyage_nombre_chambre)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    // set our url with curl_setopt()
    curl_setopt($curl, CURLOPT_URL, "https://api.sncf.com/v1/coverage/sncf/journeys?from=admin:fr:75056&to=admin:fr:69123&datetime=20220803T091414" . "&" . $API_KEY_3);

    // return the transfer as a string, also with setopt()
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    // curl_exec() executes the started curl session
    // $output contains the output string
    $response = curl_exec($curl);

    // close curl resource to free up system resources
    // (deletes the variable made by curl_init)
    curl_close($curl);

    echo "<pre>";
    print_r($response);
    echo "</pre>";
}


























function api_call_priceline($API_KEY_1, $search_type, $voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_formule, $voyage_nombre_chambre)
{
    //get departure airport code
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v1/flights/locations?name=" . $voyage_lieu_depart . "",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
            $API_KEY_1
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }
    $data_path = "../../back/data/api_call_priceline_airport_code_departure.json";
    if (file_put_contents($data_path, $response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path, "] <br>";
        //echo "call to api: [", $service_api, "] done <br>";

        // echo "<pre>";
        // print_r($json_objekat);
        // echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }

    $file = file_get_contents("../../back/data/api_call_priceline_airport_code_departure.json");
    $file_decode = json_decode($file);
    $airport_code_departure = $file_decode[0]->id;

    //get arrival airport code
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v1/flights/locations?name=" . $voyage_lieu_arrive . "",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
            $API_KEY_1
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }
    $data_path = "../../back/data/api_call_priceline_airport_code_arrival.json";
    if (file_put_contents($data_path, $response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path, "] <br>";
        //echo "call to api: [", $service_api, "] done <br>";

        // echo "<pre>";
        // print_r($json_objekat);
        // echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }

    $file = file_get_contents("../../back/data/api_call_priceline_airport_code_arrival.json");
    $file_decode = json_decode($file);
    $airport_code_arrival = $file_decode[0]->id;

    //get flight departure-arrival
    if ($voyage_formule == "voyage_formule_gastronomique") {
        $sort_type = "premium";
    } else {
        $sort_type = "economy";
    }

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        // CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/departures?sid=iSiX639&departure_date=" . $voyage_date_aller . "&adults=" . $voyage_nombre_personne_adulte . "&origin_city_id=".$voyage_lieu_depart."&cabin_class=" . $sort_type . "&children=" . $voyage_nombre_personne_enfant . "&destination_city_id=".$voyage_lieu_arrive."",
        CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/departures?sid=iSiX639&departure_date=" . $voyage_date_aller . "&adults=" . $voyage_nombre_personne_adulte . "&cabin_class=economy&children=" . $voyage_nombre_personne_enfant . "&origin_airport_code=" . $airport_code_departure . "&destination_airport_code=" . $airport_code_arrival . "",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
            $API_KEY_1
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $json_decode = json_decode($response);

    $data_path = "../../back/data/api_call_priceline_departure_arrival.json";
    if (file_put_contents($data_path, $response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path, "] <br>";
        //echo "call to api: [", $service_api, "] done <br>";

        // echo "<pre>";
        // print_r($json_objekat);
        // echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }

    //get flight arrival-departure
    if ($voyage_formule == "voyage_formule_gastronomique") {
        $sort_type = "premium";
    } else {
        $sort_type = "economy";
    }

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        // CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/departures?sid=iSiX639&departure_date=" . $voyage_date_aller . "&adults=" . $voyage_nombre_personne_adulte . "&origin_city_id=".$voyage_lieu_depart."&cabin_class=" . $sort_type . "&children=" . $voyage_nombre_personne_enfant . "&destination_city_id=".$voyage_lieu_arrive."",
        CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/departures?sid=iSiX639&departure_date=" . $voyage_date_retour . "&adults=" . $voyage_nombre_personne_adulte . "&cabin_class=economy&children=" . $voyage_nombre_personne_enfant . "&origin_airport_code=" . $airport_code_arrival . "&destination_airport_code=" . $airport_code_departure . "",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
            $API_KEY_1
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $json_decode = json_decode($response);

    $data_path = "../../back/data/api_call_priceline_arrival_departure.json";
    if (file_put_contents($data_path, $response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path, "] <br>";
        //echo "call to api: [", $service_api, "] done <br>";

        // echo "<pre>";
        // print_r($json_objekat);
        // echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }

    $file_departure_arrival = file_get_contents("../../back/data/api_call_priceline_departure_arrival.json");
    $file_decode_departure_arrival = json_decode($file_departure_arrival);
    $travel_departure_arrival_array_json = [];

    if (isset($file_decode_departure_arrival->getAirFlightDepartures->error->status) == false) {
        for ($i = 0; $i < $file_decode_departure_arrival->getAirFlightDepartures->results->result->itinerary_count; $i++) {
            $result_itinerary = $file_decode_departure_arrival->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i};

            $result_itinerary_departure_city = $result_itinerary->slice_data->slice_0->departure->airport->name;
            $result_itinerary_arrival_city = $result_itinerary->slice_data->slice_0->arrival->airport->name;
            $result_itinerary_departure_airport = $result_itinerary->baggage_carrier->departure;
            $result_itinerary_arrival_airport = $result_itinerary->baggage_carrier->arrival;
            $result_itinerary_departure_date = $result_itinerary->slice_data->slice_0->departure->datetime->date;
            $result_itinerary_departure_hour = $result_itinerary->slice_data->slice_0->departure->datetime->time_24h;
            $result_itinerary_arrival_date = $result_itinerary->slice_data->slice_0->arrival->datetime->date;
            $result_itinerary_arrival_hour = $result_itinerary->slice_data->slice_0->arrival->datetime->time_24h;

            $result_itinerary_adult_number = "";
            $result_itinerary_child_number = "";
            $result_itinerary_infant_number = "";
            $result_itinerary_price = $result_itinerary->price_details->display_total_fare;
            $result_itinerary_price_currency = $result_itinerary->price_details->baseline_currency;

            $result_itinerary_fly_type = $result_itinerary->slice_data->slice_0->flight_data->flight_0->info->cabin_class;
            $result_itinerary_fly_time = $result_itinerary->slice_data->slice_0->flight_data->flight_0->info->duration;
            $result_itinerary_fly_company = $result_itinerary->baggage_carrier->airline;
            $result_itinerary_fly_bagage = "";

            // echo "<pre>";
            // print_r($result_itinerary);
            // echo "</pre>";

            $travel_departure_arrival_array = [];
            array_push($travel_departure_arrival_array, $result_itinerary_departure_city);
            array_push($travel_departure_arrival_array, $result_itinerary_arrival_city);
            array_push($travel_departure_arrival_array, $result_itinerary_departure_airport);
            array_push($travel_departure_arrival_array, $result_itinerary_arrival_airport);
            array_push($travel_departure_arrival_array, $result_itinerary_departure_date);
            array_push($travel_departure_arrival_array, $result_itinerary_departure_hour);
            array_push($travel_departure_arrival_array, $result_itinerary_arrival_date);
            array_push($travel_departure_arrival_array, $result_itinerary_arrival_hour);

            array_push($travel_departure_arrival_array, $result_itinerary_adult_number);
            array_push($travel_departure_arrival_array, $result_itinerary_child_number);
            array_push($travel_departure_arrival_array, $result_itinerary_infant_number);
            array_push($travel_departure_arrival_array, $result_itinerary_price);
            array_push($travel_departure_arrival_array, $result_itinerary_price_currency);

            array_push($travel_departure_arrival_array, $result_itinerary_fly_type);
            array_push($travel_departure_arrival_array, $result_itinerary_fly_time);
            array_push($travel_departure_arrival_array, $result_itinerary_fly_company);
            array_push($travel_departure_arrival_array, $result_itinerary_fly_bagage);

            array_push($travel_departure_arrival_array_json, $travel_departure_arrival_array);
        }
    }
    $travel_departure_arrival_array_json_path = "../../back/data/result_search/";
    $travel_departure_arrival_array_json_name = "travel_departure_arrival_array_json.json";
    echo "filepath: " . $travel_departure_arrival_array_json_path . $travel_departure_arrival_array_json_name;

    $file = fopen($travel_departure_arrival_array_json_path . $travel_departure_arrival_array_json_name, "wa+");
    fwrite($file, json_encode($travel_departure_arrival_array_json));
    fclose($file);

    //////////////////////////////////////////////////////
    $file_arrival_departure = file_get_contents("../../back/data/api_call_priceline_arrival_departure.json");
    $file_decode_arrival_departure = json_decode($file_arrival_departure);
    $travel_arrival_departure_array_json = [];

    if (isset($file_decode_arrival_departure->getAirFlightDepartures->error->status) == false) {
        for ($i = 0; $i < $file_decode_arrival_departure->getAirFlightDepartures->results->result->itinerary_count; $i++) {
            $result_itinerary = $file_decode_arrival_departure->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i};

            $result_itinerary_departure_city = $result_itinerary->slice_data->slice_0->departure->airport->name;
            $result_itinerary_arrival_city = $result_itinerary->slice_data->slice_0->arrival->airport->name;
            $result_itinerary_departure_airport = $result_itinerary->baggage_carrier->departure;
            $result_itinerary_arrival_airport = $result_itinerary->baggage_carrier->arrival;
            $result_itinerary_departure_date = $result_itinerary->slice_data->slice_0->departure->datetime->date;
            $result_itinerary_departure_hour = $result_itinerary->slice_data->slice_0->departure->datetime->time_24h;
            $result_itinerary_arrival_date = $result_itinerary->slice_data->slice_0->arrival->datetime->date;
            $result_itinerary_arrival_hour = $result_itinerary->slice_data->slice_0->arrival->datetime->time_24h;

            $result_itinerary_adult_number = "";
            $result_itinerary_child_number = "";
            $result_itinerary_infant_number = "";
            $result_itinerary_price = $result_itinerary->price_details->display_total_fare;
            $result_itinerary_price_currency = $result_itinerary->price_details->baseline_currency;

            $result_itinerary_fly_type = $result_itinerary->slice_data->slice_0->flight_data->flight_0->info->cabin_class;
            $result_itinerary_fly_time = $result_itinerary->slice_data->slice_0->flight_data->flight_0->info->duration;
            $result_itinerary_fly_company = $result_itinerary->baggage_carrier->airline;
            $result_itinerary_fly_bagage = "";

            // echo "<pre>";
            // print_r($result_itinerary);
            // echo "</pre>";

            $travel_arrival_departure_array = [];
            array_push($travel_arrival_departure_array, $result_itinerary_departure_city);
            array_push($travel_arrival_departure_array, $result_itinerary_arrival_city);
            array_push($travel_arrival_departure_array, $result_itinerary_departure_airport);
            array_push($travel_arrival_departure_array, $result_itinerary_arrival_airport);
            array_push($travel_arrival_departure_array, $result_itinerary_departure_date);
            array_push($travel_arrival_departure_array, $result_itinerary_departure_hour);
            array_push($travel_arrival_departure_array, $result_itinerary_arrival_date);
            array_push($travel_arrival_departure_array, $result_itinerary_arrival_hour);

            array_push($travel_arrival_departure_array, $result_itinerary_adult_number);
            array_push($travel_arrival_departure_array, $result_itinerary_child_number);
            array_push($travel_arrival_departure_array, $result_itinerary_infant_number);
            array_push($travel_arrival_departure_array, $result_itinerary_price);
            array_push($travel_arrival_departure_array, $result_itinerary_price_currency);

            array_push($travel_arrival_departure_array, $result_itinerary_fly_type);
            array_push($travel_arrival_departure_array, $result_itinerary_fly_time);
            array_push($travel_arrival_departure_array, $result_itinerary_fly_company);
            array_push($travel_arrival_departure_array, $result_itinerary_fly_bagage);

            array_push($travel_arrival_departure_array_json, $travel_arrival_departure_array);
        }
    }
    $travel_arrival_departure_array_json_path = "../../back/data/result_search/";
    $travel_arrival_departure_array_json_name = "travel_arrival_departure_array_json.json";
    echo "filepath: " . $travel_arrival_departure_array_json_path . $travel_arrival_departure_array_json_name;

    $file = fopen($travel_arrival_departure_array_json_path . $travel_arrival_departure_array_json_name, "wa+");
    fwrite($file, json_encode($travel_arrival_departure_array_json));
    fclose($file);
}





























//deprecated
function api_call_booking()
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


function api_call_format()
{
    $file_hotel = file_get_contents("../../back/data/result_search/result_search_hotel.json");
    $file_hotel_decode = json_decode($file_hotel);
    $file_hotel_array_json = [];

    $file_restaurant = file_get_contents("../../back/data/result_search/result_search_restaurant.json");
    $file_restaurant_decode = json_decode($file_restaurant);
    $file_restaurant_decode_array_json = [];

    $file_departure_arrival = file_get_contents("../../back/data/result_search/travel_departure_arrival_array_json.json");
    $file_departure_arrival_decode = json_decode($file_departure_arrival);
    $file_departure_arrival_decode_array_json = [];

    $file_arrival_departure = file_get_contents("../../back/data/result_search/travel_departure_arrival_array_json.json");
    $file_arrival_departure_decode = json_decode($file_arrival_departure);
    $file_arrival_departure_decode_array_json = [];

    $result_search_array_json = [];
    array_push($result_search_array_json, $file_hotel_decode);
    array_push($result_search_array_json, $file_restaurant_decode);
    array_push($result_search_array_json, $file_departure_arrival_decode);
    array_push($result_search_array_json, $file_arrival_departure_decode);

    $result_search_path = "../../back/data/result_search/";
    $result_search_name = "result_search_format.json";
    echo "filepath: " . $result_search_path . $result_search_name;

    $file = fopen($result_search_path . $result_search_name, "wa+");
    fwrite($file, json_encode($result_search_array_json));
    fclose($file);
}
=======
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

/*
api key
dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a
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

function api_call_travel_advisor($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_formule, $voyage_nombre_chambre)
{
    $api_call_travel_advisor_result_hotel_path = "../../back/data/result_search/";
    $api_call_travel_advisor_result_hotel_name = "result_search_hotel.json";
    $api_call_travel_advisor_result_hotel_json = [];


    $API_KEY = "X-RapidAPI-Key: dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a";


    //call api location_id
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    //get location id of location near choice
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
            $API_KEY
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
    $number_of_night = (int)$diff_minutes / 60 / 24;
    $number_of_night = $number_of_night - 1;
    //echo $number_of_night . "days";

    //call api
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    if ($voyage_formule == "voyage_formule_gastronomique") {
        $sort = "recommended";
    } else {
        $sort = "price";
    }

    //get location id of hotel
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/hotels/list?location_id=" . $location_id . "&adults=" . $voyage_nombre_personne_adulte . "&rooms=" . $voyage_nombre_chambre . "&nights=" . $number_of_night . "&offset=0&currency=USD&order=asc&limit=30&sort=" . $sort . "&lang=en_US",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
            $API_KEY
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

    $file = file_get_contents("../../back/data/api_call_travel_advisor_hotel.json");
    $file_decode = json_decode($file);
    $file_array = (array) $file_decode;

    for ($i = 0; $i < 5; $i++) {
        $result_hotel_location_id = $file_decode->data[$i]->location_id;
        // $result_hotel_nom = $file_decode->data[$i]->name;
        // $result_hotel_adresse = "";
        // $result_hotel_prix = $file_decode->data[$i]->price;
        // $result_hotel_score = $file_decode->data[$i]->rating;
        // $result_hotel_autour = (array)$file_decode->data[$i]->neighborhood_info;
        // $result_hotel_autour_location_id = array();
        // $result_hotel_autour_nom = array();
        // for ($j = 0; $j < count($result_hotel_autour); $j++) {
        //     array_push($result_hotel_autour_location_id, $result_hotel_autour[$j]->location_id);
        //     array_push($result_hotel_autour_nom, $result_hotel_autour[$j]->name);
        // }
        // $result_hotel_option = "";



        // echo "recap: <br>";
        // echo "hotel nom: [" . $result_hotel_nom . "]<br>";
        // echo "hotel adresse: [" . $result_hotel_adresse . "]<br>";
        // echo "hotel prix: [" . $result_hotel_prix . "]<br>";
        // echo "hotel score: [" . $result_hotel_score . "]<br>";
        // // echo "<pre>";
        // // var_dump(print_r($result_hotel_autour));
        // // echo "</pre><br>";
        // for ($j = 0; $j < count($result_hotel_autour); $j++) {
        //     echo "hotel autour[" . $j . "]: id: [" . $result_hotel_autour_location_id[$j] ."]<br>";
        //     echo "hotel autour[" . $j . "]: nom: [" . $result_hotel_autour_nom[$j] ."]<br>";
        // }
        // //print_r("hotel autour: [" . $result_hotel_autour . "]<br>");
        // echo "hotel option: [" . $result_hotel_option . "]<br>";
        // echo "----------------------<br>";
        // echo "----------------------<br>";
        // echo "----------------------<br>";
        // echo "----------------------<br>";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        //get hotel detail
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/hotels/get-details?location_id=" . $result_hotel_location_id . "&checkin=" . $voyage_date_aller . "&adults=" . $voyage_nombre_personne_adulte . "&lang=en_US&currency=EUR&nights=" . $number_of_night . "",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
                $API_KEY
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
        // } else {
        //     echo $response;
        // }

        $data_path_hotel_detail = "../../back/data/api_call_travel_advisor_hotel_detail_" . $i . ".json";
        if (file_put_contents($data_path_hotel_detail, $response)) {
            echo "JSON file created successfully <br>";
            echo "JSON file sent to: [", $data_path_hotel_detail, "] <br>";
            //echo "call to api: [", $service_api, "] done <br>";

            // echo "<pre>";
            // print_r($json_objekat);
            // echo "</pre>";
        } else {
            echo "Error on JSON file <br>";
        }

        $tab_file = (array) [];
        for ($i = 0; $i < 5; $i++) {
            array_push($tab_file, json_decode(file_get_contents("../../back/data/api_call_travel_advisor_hotel_detail_" . $i . ".json")));
        }

        for ($i = 0; $i < 5; $i++) {
            $result_hotel_nom_detail = $tab_file[$i]->data[0]->name;
            $result_hotel_addresse_detail = $tab_file[$i]->data[0]->address;
            $result_hotel_score_detail = $tab_file[$i]->data[0]->rating;
            $result_hotel_image_detail = $tab_file[$i]->data[0]->photo->images->medium->url;
            $result_hotel_chambre_detail_available = $tab_file[$i]->data[0]->hac_offers->availability;
            $result_hotel_chambre_detail = array();
            for ($j = 0; $j < 5; $j++) {
                if ($result_hotel_chambre_detail_available == "available") {
                    array_push($result_hotel_chambre_detail, $tab_file[$i]->data[0]->hac_offers->offers[$j]->display_price_int);
                }
            }

            // echo "----------------------<br>";
            // echo "hotel nom: [" . $result_hotel_nom_detail . "] <br>";
            // echo "hotel adresse: [" . $result_hotel_addresse_detail . "] <br>";
            // echo "hotel note: [" . $result_hotel_score_detail . "] <br>";
            // echo "hotel image: [" . $result_hotel_image_detail . "] <br>";
            // // echo '<img src="' . $result_hotel_image_detail . '" alt=""><br>';
            // echo "hotel chambre avaiable: [" . $result_hotel_chambre_detail_available . "] <br>";
            // for ($j = 0; $j < 5; $j++) {
            //     if ($result_hotel_chambre_detail_available == "available") {
            //         echo "hotel chambre [" . $j . "]: [" . $result_hotel_chambre_detail[$j] . "] <br>";
            //     }
            // }

            // echo "<br>";

            $hotel_array = [];
            array_push($hotel_array, $result_hotel_nom_detail);
            array_push($hotel_array, $result_hotel_addresse_detail);
            array_push($hotel_array, $result_hotel_score_detail);
            array_push($hotel_array, $result_hotel_image_detail);
            array_push($hotel_array, $result_hotel_chambre_detail_available);
            array_push($hotel_array, $result_hotel_chambre_detail);

            // $api_call_travel_advisor_result_hotel_json = [];
            array_push($api_call_travel_advisor_result_hotel_json, $hotel_array);
        }


        // echo "<pre>";
        // print_r($api_call_travel_advisor_result_hotel_json);
        // echo "</pre>";

        echo "filepath: " . $api_call_travel_advisor_result_hotel_path . $api_call_travel_advisor_result_hotel_name;

        $file = fopen($api_call_travel_advisor_result_hotel_path . $api_call_travel_advisor_result_hotel_name, "wa+");
        fwrite($file, json_encode($api_call_travel_advisor_result_hotel_json));
        fclose($file);
    }




    // $location_id

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

    // $curl = curl_init();

    // curl_setopt_array($curl, [
    //     CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/restaurants/list?location_id=".$location_id."&restaurant_tagcategory=10591&restaurant_tagcategory_standalone=10591&currency=EUR&lunit=km&limit=30&open_now=false&lang=en_US",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "GET",
    //     CURLOPT_HTTPHEADER => [
    //         "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
    //         $API_KEY
    //     ],
    // ]);

    // $response = curl_exec($curl);
    // $err = curl_error($curl);

    // curl_close($curl);

    // if ($err) {
    //     echo "cURL Error #:" . $err;
    // } else {
    //     echo $response;
    // }

    // $data_path_restaurant = "../../back/data/api_call_travel_advisor_restaurant.json";
    // if (file_put_contents($data_path_restaurant, $response)) {
    //     echo "JSON file created successfully <br>";
    //     echo "JSON file sent to: [", $data_path_restaurant, "] <br>";
    //     //echo "call to api: [", $service_api, "] done <br>";

    //     // echo "<pre>";
    //     // print_r($json_objekat);
    //     // echo "</pre>";
    // } else {
    //     echo "Error on JSON file <br>";
    // }
}



























function api_call_the_fork_the_spoon($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_formule, $voyage_nombre_chambre)
{
    $api_call_the_fork_the_spoon_result_restaurant_path = "../../back/data/result_search/";
    $api_call_the_fork_the_spoon_result_restaurant_name = "result_search_restaurant.json";
    $api_call_the_fork_the_spoon_result_restaurant_json = [];

    /*
    api call location with voyage_lieu_arrive
    get location_id

    api call restaurant with location_id
    get restaurant

    api call restaurant detail with restaurant_location_id
    get restaurant detail
    */

    $API_KEY = "X-RapidAPI-Key: dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a";

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //api call location
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://the-fork-the-spoon.p.rapidapi.com/locations/v2/auto-complete?text=" . $voyage_lieu_arrive . "",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: the-fork-the-spoon.p.rapidapi.com",
            $API_KEY
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $data_path_location_id = "../../back/data/api_call_the_fork_the_spoon_location_id.json";
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

    $file = file_get_contents("../../back/data/api_call_the_fork_the_spoon_location_id.json");
    $file_decode = json_decode($file);
    $google_place_id = $file_decode->data->geolocation[0]->id->id;
    $google_place_geo_text = $file_decode->data->geolocation[0]->name->text;
    $google_place_geo_type = $file_decode->data->geolocation[0]->id->type;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://the-fork-the-spoon.p.rapidapi.com/locations/v2/list?google_place_id=" . $google_place_id . "&geo_ref=false&geo_text=" . $google_place_geo_text . "&geo_type=" . $google_place_geo_type . "",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: the-fork-the-spoon.p.rapidapi.com",
            $API_KEY
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $data_path_location_id = "../../back/data/api_call_the_fork_the_spoon_location_id_google.json";
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

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get location_id
    $file = file_get_contents("../../back/data/api_call_the_fork_the_spoon_location_id_google.json");
    $file_decode = json_decode($file);
    $file_array = (array) $file_decode;

    $location_id = $file_decode->id_city;

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //api call restaurant with location_id
    if ($voyage_formule == "voyage_formule_gastronomique") {
        $sort_type = "quality";
    } else {
        $sort_type = "price";
    }

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://the-fork-the-spoon.p.rapidapi.com/restaurants/v2/list?queryPlaceValueCityId=" . $location_id . "&pageSize=10&pageNumber=1&sort=" . $sort_type . "",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: the-fork-the-spoon.p.rapidapi.com",
            $API_KEY
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $data_path = "../../back/data/api_call_the_fork_the_spoon_restaurant.json";
    if (file_put_contents($data_path, $response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path, "] <br>";
        //echo "call to api: [", $service_api, "] done <br>";

        // echo "<pre>";
        // print_r($json_objekat);
        // echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get restaurant_location_id

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //api call restaurant detail with restaurant_location_id

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get restaurant detail
    $file = file_get_contents("../../back/data/api_call_the_fork_the_spoon_restaurant.json");
    $file_decode = json_decode($file);
    $file_array = (array) $file_decode;

    for ($i = 0; $i < count($file_decode->data); $i++) {

        $result_restaurant_nom = "";
        $result_restaurant_cuisine = "";
        $result_restaurant_adresse = "";
        $result_restaurant_note = "";
        $result_restaurant_photo = "";

        $result_restaurant_nom = $file_decode->data[$i]->name;
        if (isset($file_decode->data[$i]->servesCuisine)) {
            $result_restaurant_cuisine = $file_decode->data[$i]->servesCuisine;
        }
        $result_restaurant_adresse = $file_decode->data[$i]->address->street . ", " . $file_decode->data[$i]->address->postalCode . ", " . $file_decode->data[$i]->address->locality . ", " . $file_decode->data[$i]->address->country;
        $result_restaurant_note = $file_decode->data[$i]->aggregateRatings->tripadvisor->ratingValue;
        $result_restaurant_photo = $file_decode->data[$i]->mainPhotoSrc;

        // // nom
        // echo "<pre>";
        // print_r("nom: " . $file_decode->data[$i]->name);
        // echo "</pre>";

        // // cuisine
        // echo "<pre>";
        // print_r("cuisine: " . $file_decode->data[$i]->servesCuisine);
        // echo "</pre>";

        // // addresse
        // echo "<pre>";
        // print_r("adresse: " . $file_decode->data[$i]->address->street . ", " . $file_decode->data[$i]->address->postalCode . ", " . $file_decode->data[$i]->address->locality . ", " . $file_decode->data[$i]->address->country);
        // echo "</pre>";

        // // note
        // echo "<pre>";
        // print_r("note: " . $file_decode->data[$i]->aggregateRatings->tripadvisor->ratingValue);
        // echo "</pre>";

        // // photo
        // echo "<pre>";
        // print_r("photo: " . $file_decode->data[$i]->mainPhotoSrc);
        // echo "</pre>";

        // // echo '<img src="'.$file_decode->data[$i]->mainPhotoSrc.'" alt="">';

        // echo "----------------------------<br>";
        // echo "<br>";$hotel_array = [];

        $restaurant_array = [];
        array_push($restaurant_array, $result_restaurant_nom);
        array_push($restaurant_array, $result_restaurant_cuisine);
        array_push($restaurant_array, $result_restaurant_adresse);
        array_push($restaurant_array, $result_restaurant_note);
        array_push($restaurant_array, $result_restaurant_photo);

        array_push($api_call_the_fork_the_spoon_result_restaurant_json, $restaurant_array);
    }

    echo "filepath: " . $api_call_the_fork_the_spoon_result_restaurant_path . $api_call_the_fork_the_spoon_result_restaurant_name;

    $file = fopen($api_call_the_fork_the_spoon_result_restaurant_path . $api_call_the_fork_the_spoon_result_restaurant_name, "wa+");
    fwrite($file, json_encode($api_call_the_fork_the_spoon_result_restaurant_json));
    fclose($file);
}






























function api_call_flytrips($search_type, $voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_formule, $voyage_nombre_chambre)
{
    $API_KEY = "X-RapidAPI-Key: dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a";
    /*
    search country code
    search airport code
    search departure with country code and airport code
    get departure
    search arrival with country code and airport code
    get arrival

    compare arrival and departure numflight

    select flight
    */

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //search coutry code
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://flytrips.p.rapidapi.com/api/v1/country/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: flytrips.p.rapidapi.com",
            $API_KEY
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $data_path = "../../back/data/api_call_flytrip_country.json";
    if (file_put_contents($data_path, $response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path, "] <br>";
        //echo "call to api: [", $service_api, "] done <br>";

        // echo "<pre>";
        // print_r($json_objekat);
        // echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get country code
    $region = $search_type;

    $file = file_get_contents("../../back/data/api_call_flytrip_country.json");
    $file_decode = json_decode($file);
    $file_array = (array) $file_decode;

    $result_country_nom_send = "";
    $result_country_code_send = "";

    for ($i = 0; $i < count($file_decode); $i++) {
        $result_coutry_nom = "";
        $result_country_code = "";

        $result_coutry_nom = $file_decode[$i]->name;
        $result_country_code = $file_decode[$i]->code;

        if ($result_coutry_nom == $region) {
            $result_country_nom_send = $result_coutry_nom;
            $result_country_code_send = $result_country_code;
        }
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //search airport code
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://flytrips.p.rapidapi.com/api/v1/airport/FR",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: flytrips.p.rapidapi.com",
            $API_KEY
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $data_path = "../../back/data/api_call_flytrip_airport.json";
    if (file_put_contents($data_path, $response)) {
        echo "JSON file created successfully <br>";
        echo "JSON file sent to: [", $data_path, "] <br>";
        //echo "call to api: [", $service_api, "] done <br>";

        // echo "<pre>";
        // print_r($json_objekat);
        // echo "</pre>";
    } else {
        echo "Error on JSON file <br>";
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get airport code

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //search departure with country code and airport code

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get departure

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //search arrival with country code and airport code

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //get arrival

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //compare departure and arrival

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //select flight

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //format
}
































function api_call_booking()
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
>>>>>>> Stashed changes
