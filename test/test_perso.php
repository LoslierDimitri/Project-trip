<<<<<<< Updated upstream
<!-- <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="date" name="date_send_1" id="date_send_1" placeholder="date">
    <input type="date" name="date_send_2" id="date_send_2" placeholder="date">
    <button type="submit">Envoyer</button>
</form> -->

<?php
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "post date_send_1: " . $_POST["date_send_1"] . "<br>";
    $date_1 = strtotime($_POST["date_send_1"]);
    $date_format_1_day = date('d', $date_1);
    $date_format_1_month = date('m', $date_1);
    $date_format_1_year = date('Y', $date_1);
    echo "date_1: day: [" . $date_format_1_day . "], month: [" . $date_format_1_month . "], year: [" . $date_format_1_year . "] <br>";

    echo "post date_send_2: " . $_POST["date_send_2"] . "<br>";
    $date_2 = strtotime($_POST["date_send_2"]);
    $date_format_2_day = date('d', $date_2);
    $date_format_2_month = date('m', $date_2);
    $date_format_2_year = date('Y', $date_2);
    echo "date_1: day: [" . $date_format_2_day . "], month: [" . $date_format_2_month . "], year: [" . $date_format_2_year . "] <br>";

    $from_time = strtotime($_POST["date_send_1"]);
    $to_time = strtotime($_POST["date_send_2"]);
    $diff_minutes = round(abs($from_time - $to_time) / 60, 2) . " minutes";
    echo $diff_minutes;
    $value =(int)$diff_minutes/60/24;
    echo $value . "days";
}
*/
?>

<?php
/*
a recup:
    nom
    addresse
    prix
    score
autour
option
*/
/*
$file = file_get_contents("../../back/data/api_call_travel_advisor_hotel.json");
$file_decode = json_decode($file);
$file_array = (array) $file_decode;

for ($i = 0; $i < 5; $i++) {

    // echo "<pre>";
    // print_r($file_decode->data[$i]);
    // echo "</pre> <br>";

    echo "----------------------<br>";
    $result_hotel_location_id = $file_decode->data[$i]->location_id;
    $result_hotel_nom = $file_decode->data[$i]->name;
    $result_hotel_adresse = "";
    $result_hotel_prix = $file_decode->data[$i]->price;
    $result_hotel_score = $file_decode->data[$i]->rating;
    $result_hotel_autour = (array)$file_decode->data[$i]->neighborhood_info;
    $result_hotel_autour_location_id = array();
    $result_hotel_autour_nom = array();
    for ($j = 0; $j < count($result_hotel_autour); $j++) {
        array_push($result_hotel_autour_location_id, $result_hotel_autour[$j]->location_id);
        array_push($result_hotel_autour_nom, $result_hotel_autour[$j]->name);
        // $result_hotel_autour_location_id = $result_hotel_autour[$j]->location_id;
        // $result_hotel_autour_nom = $result_hotel_autour[$j]->name;
    }
    $result_hotel_option = "";
    echo "recap: <br>";
    echo "hotel location id: [" . $result_hotel_location_id . "]<br>";
    echo "hotel nom: [" . $result_hotel_nom . "]<br>";
    echo "hotel adresse: [" . $result_hotel_adresse . "]<br>";
    echo "hotel prix: [" . $result_hotel_prix . "]<br>";
    echo "hotel score: [" . $result_hotel_score . "]<br>";
    // echo "<pre>";
    // var_dump(print_r($result_hotel_autour));
    // echo "</pre><br>";
    for ($j = 0; $j < count($result_hotel_autour); $j++) {
        echo "hotel autour[" . $j . "]: id: [" . $result_hotel_autour_location_id[$j] ."]<br>";
        echo "hotel autour[" . $j . "]: nom: [" . $result_hotel_autour_nom[$j] ."]<br>";
    }
    //print_r("hotel autour: [" . $result_hotel_autour . "]<br>");
    echo "hotel option: [" . $result_hotel_option . "]<br>";
    echo "----------------------<br>";
    echo "----------------------<br>";
    echo "----------------------<br>";
    echo "----------------------<br>";
}

echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";

// echo "<pre>";
// print_r($file);
// echo "</pre> <br>";
*/
?>

<?php
    /*
a recup:
    nom
    addresse
    prix
    score
autour
option
*/

    // $file = file_get_contents("../../back/data/api_call_travel_advisor_hotel_detail_0.json");
    // $file_decode = json_decode($file);
    // $file_array = (array) $file_decode;

    // $file = file_get_contents("../../back/data/api_call_travel_advisor_hotel.json");
    // $file_decode = json_decode($file);
    // $file_array = (array) $file_decode;

    /*
$api_call_travel_advisor_result_hotel_path = "../../back/data/result_search/";
$api_call_travel_advisor_result_hotel_name = "result_search_hotel.json";
$api_call_travel_advisor_result_hotel_json = [];


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

    echo "hotel nom: [" . $result_hotel_nom_detail . "] <br>";
    echo "hotel adresse: [" . $result_hotel_addresse_detail . "] <br>";
    echo "hotel note: [" . $result_hotel_score_detail . "] <br>";
    echo "hotel image: [" . $result_hotel_image_detail . "] <br>";
    echo '<img src="' . $result_hotel_image_detail . '" alt=""><br>';
    echo "hotel chambre avaiable: [" . $result_hotel_chambre_detail_available . "] <br>";
    for ($j = 0; $j < 5; $j++) {
        if ($result_hotel_chambre_detail_available == "available") {
            echo "hotel chambre [" . $j . "]: [" . $result_hotel_chambre_detail[$j] . "] <br>";
        }
    }

    echo "<br>";
    echo "----------------------<br>";

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
// echo "----------------------<br>";
// for ($i = 0; $i < 5; $i++) {
//     echo "<pre>";
//     print_r($tab_file[$i]);
//     echo "</pre>";
//     echo "----------------------<br>";
// }


// $hotel_array = [];
// array_push($hotel_array, $result_hotel_nom_detail);
// array_push($hotel_array, $result_hotel_addresse_detail);
// array_push($hotel_array, $result_hotel_score_detail);
// array_push($hotel_array, $result_hotel_image_detail);
// array_push($hotel_array, $result_hotel_chambre_detail_available);
// array_push($hotel_array, $result_hotel_chambre_detail);

// $api_call_travel_advisor_result_hotel_json = [];
// array_push($api_call_travel_advisor_result_hotel_json, $hotel_array);

// $api_call_travel_advisor_result_hotel_json = json_encode($api_call_travel_advisor_result_hotel_json);

echo "<pre>";
print_r($api_call_travel_advisor_result_hotel_json);
echo "</pre>";

echo "filepath: ".$api_call_travel_advisor_result_hotel_path . $api_call_travel_advisor_result_hotel_name;

$file = fopen($api_call_travel_advisor_result_hotel_path . $api_call_travel_advisor_result_hotel_name, "w");
fwrite($file, json_encode($api_call_travel_advisor_result_hotel_json));
fclose($file)
*/;
?>

<?php
// $file = file_get_contents("../../back/data/api_call_the_fork_the_spoon_location_id.json");
// $file_decode = json_decode($file);
// $file_array = (array) $file_decode;

// // $file_encode = json_encode($file);

// echo "<pre>";
// print_r($file_decode);
// echo "</pre>";

// //id
// echo "<pre>";
// print_r("location_id: ".$file_decode->data->geolocation[0]->id->id);
// echo "</pre>";

// //geo_text
// echo "<pre>";
// print_r("geo_text: ".$file_decode->data->geolocation[0]->name->text);
// echo "</pre>";

// //geo_type
// echo "<pre>";
// print_r("geo_type: ".$file_decode->data->geolocation[0]->id->type);
// echo "</pre>";

// $file = file_get_contents("../../back/data/api_call_the_fork_the_spoon_location_id_google.json");
// $file_decode = json_decode($file);
// $file_array = (array) $file_decode;

// echo "<pre>";
// print_r($file_decode);
// echo "</pre>";

// //id
// echo "<pre>";
// print_r("location_id: ".$file_decode->id_city);
// echo "</pre>";
?>

<?php
/*
a regarder
"servesCuisine": "French",
"name": "Le Reminet",
"address": {
                "street": "3, rue des Grands Degrés",
                "postalCode": "75005",
                "locality": "Paris",
                "country": "France"
            },
"aggregateRatings": {
                "thefork": {
                    "ratingValue": 9.1,
                    "reviewCount": 17322
                },
                "tripadvisor": {
                    "ratingValue": 4,
                    "reviewCount": 1456
                }
            },
"mainPhotoSrc": "https://res.cloudinary.com/tf-lab/image/upload/restaurant/739ec324-6b20-48d2-a8cb-d0c69b1c62b3/619557ba-2ba6-45bd-8019-7008f187f989.jpg",

*/
/*
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

    // nom
    echo "<pre>";
    print_r("nom: " . $result_restaurant_nom);
    echo "</pre>";

    // cuisine
    echo "<pre>";
    print_r("cuisine: " . $result_restaurant_cuisine);
    echo "</pre>";

    // addresse
    echo "<pre>";
    print_r("adresse: " . $result_restaurant_adresse);
    echo "</pre>";

    // note
    echo "<pre>";
    print_r("note: " . $result_restaurant_note);
    echo "</pre>";

    // photo
    echo "<pre>";
    print_r("photo: " . $result_restaurant_photo);
    echo "</pre>";

    // echo '<img src="'.$file_decode->data[$i]->mainPhotoSrc.'" alt="">';

    echo "----------------------------<br>";
    echo "<br>";
}

// echo "<pre>";
// print_r($file_decode);
// echo "</pre>";
*/
?>

<?php
/*
$region = "France";

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

    // //nom
    // echo "<pre>";
    // print_r("nom: " . $result_coutry_nom);
    // echo "</pre>";

    // //code
    // echo "<pre>";
    // print_r("code: " . $result_country_code);
    // echo "</pre>";

    // echo "----------------------------<br>";
    // echo "<br>";
}

//result
echo "<pre>";
print_r("nom: " . $result_country_nom_send);
echo "<br>";
print_r("code: " . $result_country_code_send);
echo "</pre>";

echo "<pre>";
print_r($file_decode);
echo "</pre>";
*/
?>

<?php
/*
$file = file_get_contents("../../back/data/api_call_flytrip_airport.json");
$file_decode = json_decode($file);
$file_array = (array) $file_decode;

$result_airport_nom_send = "";
$result_airport_code_send = "";

for ($i = 0; $i < count($file_decode); $i++) {
    if ($file_decode[$i]->scheduled_service != "no") {
        echo "<pre>";
        print_r("nom: " . $file_decode[$i]->name);
        echo "</pre>";
        echo "<pre>";
        print_r("code: " . $file_decode[$i]->ident);
        echo "</pre>";

        echo "----------------------------<br>";
        echo "<br>";
    }
}

// echo "<pre>";
// print_r($file_decode);
// echo "</pre>";
*/
?>

<?php
// $file = file_get_contents("../../back/data/api_call_flytrip_airport.json");
// $file_decode = json_decode($file);
// $file_array = (array) $file_decode;

// echo "<pre>";
// print_r($file_decode);
// echo "</pre>";


//$API_KEY_2 = "98872b5d1d217e2fe785f29e31b032a7";
/*
$curl = curl_init();

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

// set our url with curl_setopt()
curl_setopt($curl, CURLOPT_URL, "https://api.aviationstack.com/v1/flights?access_key = " . $API_KEY_2 . "");

// return the transfer as a string, also with setopt()
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// curl_exec() executes the started curl session
// $output contains the output string
$response = curl_exec($curl);

// close curl resource to free up system resources
// (deletes the variable made by curl_init)
curl_close($curl);
*/




/*

$API_KEY_3 = "03e5ab1b-1bc0-497c-9307-4572b3e5cffd";
/*
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

// set our url with curl_setopt()
curl_setopt($curl, CURLOPT_URL, "https://api.sncf.com/v1/coverage/sncf/journeys?from=admin:fr:75056&to=admin:fr:69123&datetime=20220803T091414&03e5ab1b-1bc0-497c-9307-4572b3e5cffd");

// return the transfer as a string, also with setopt()
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// curl_exec() executes the started curl session
// $output contains the output string
$response = curl_exec($curl);

// close curl resource to free up system resources
// (deletes the variable made by curl_init)
curl_close($curl);


// $service_url     = 'https://api.sncf.com/v1/coverage/sncf/journeys?from=admin:fr:75056&to=admin:fr:69123&datetime=20220803T091414&2bef594f-3493-47fc-9621-062cb4f25fe7';
$service_url     = "https://test.api.amadeus.com/v1/shopping/flight-destinations?origin=PAR&maxPrice=200 -H Authorization: Bearer BrS30l1KP7IEfd5KYik7lvjPyREgII9U";
$curl            = curl_init($service_url);
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl, CURLOPT_POST, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$curl_response   = curl_exec($curl);
curl_close($curl);
$json_objekat    = json_decode($curl_response);
// $quotes          = $json_objekat->contents->quotes;

echo "<pre>";
print_r($json_objekat);
echo "</pre>";
*/
?>

<?php
/*
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt_array($curl, [
    CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/departures?sid=iSiX639&departure_date=2022-10-10&adults=1&cabin_class=economy&children=2&origin_airport_code=BOD&destination_airport_code=CDG",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
        "X-RapidAPI-Key: dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
}

$json_decode = json_decode($response);

echo "<pre>";
print_r($json_decode);
echo "</pre>";
*/
?>
















<?php
/*
$file = file_get_contents("../../back/data/api_call_priceline_airport_code_departure.json");
$file_decode = json_decode($file);
$file_array = (array) $file_decode;

echo "<pre>";
print_r($file_decode);
echo "</pre>";

echo "<pre>";
print_r("aiirport code: " . $file_decode[0]->id);
echo "</pre>";

echo "---------------------------------- <br>";

$file = file_get_contents("../../back/data/api_call_priceline_airport_code_arrival.json");
$file_decode = json_decode($file);
$file_array = (array) $file_decode;

echo "<pre>";
print_r($file_decode);
echo "</pre>";

echo "<pre>";
print_r("aiirport code: " . $file_decode[0]->id);
echo "</pre>";

echo "---------------------------------- <br>";
*/
?>








<?php
/*
$file = file_get_contents("../../back/data/api_call_priceline_departure_arrival.json");
$file_decode = json_decode($file);
$file_array = (array) $file_decode;

// echo "<pre>";
// print_r($file_decode);
// echo "</pre>";

if (isset($file_decode->getAirFlightDepartures->error->status) == false) {
    if ($result_itinerary = $file_decode->getAirFlightDepartures->error->status != "Air.FlightDepartures: No itineraries available.") {
        for ($i = 0; $i < $file_decode->getAirFlightDepartures->results->result->itinerary_count; $i++) {
            $result_itinerary = $file_decode->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i};

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

            echo "<pre>";
            print_r("result_itinerary_departure_airport : " . $result_itinerary_departure_airport . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_arrival_airport : " . $result_itinerary_arrival_airport . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_departure_date : " . $result_itinerary_departure_date . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_departure_hour : " . $result_itinerary_departure_hour . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_arrival_date : " . $result_itinerary_arrival_date . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_arrival_hour : " . $result_itinerary_arrival_hour . "<br>");
            echo "</pre>";

            echo "<pre>";
            print_r("result_itinerary_adult_number : " . $result_itinerary_adult_number . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_child_number : " . $result_itinerary_child_number . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_infant_number : " . $result_itinerary_infant_number . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_price : " . $result_itinerary_price . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_price_currency : " . $result_itinerary_price_currency . "<br>");
            echo "</pre>";

            echo "<pre>";
            print_r("result_itinerary_fly_type : " . $result_itinerary_fly_type . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_fly_time : " . $result_itinerary_fly_time . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_fly_company : " . $result_itinerary_fly_company . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_fly_bagage : " . $result_itinerary_fly_bagage . "<br>");
            echo "</pre>";

            // echo "<pre>";
            // print_r($result_itinerary);
            // echo "</pre>";

            echo "---------------------------------- <br>";
        }
    }
}
// echo "<pre>";
// print_r($file_decode->getAirFlightDepartures->results->result->itinerary_data->itinerary_0);
// echo "</pre>";
echo "---------------------------------- <br>";
echo "---------------------------------- <br>";
echo "---------------------------------- <br>";
echo "---------------------------------- <br>";
echo "---------------------------------- <br>";
echo "---------------------------------- <br>";
echo "---------------------------------- <br>";

$file = file_get_contents("../../back/data/api_call_priceline_arrival_departure.json");
$file_decode = json_decode($file);
$file_array = (array) $file_decode;

// echo "<pre>";
// print_r($file_decode);
// echo "</pre>";

if (isset($file_decode->getAirFlightDepartures->error->status) == false) {
    if ($result_itinerary = $file_decode->getAirFlightDepartures->error->status != "Air.FlightDepartures: No itineraries available.") {
        for ($i = 0; $i < $file_decode->getAirFlightDepartures->results->result->itinerary_count; $i++) {
            $result_itinerary = $file_decode->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i};

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

            echo "<pre>";
            print_r("result_itinerary_departure_airport : " . $result_itinerary_departure_airport . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_arrival_airport : " . $result_itinerary_arrival_airport . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_departure_date : " . $result_itinerary_departure_date . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_departure_hour : " . $result_itinerary_departure_hour . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_arrival_date : " . $result_itinerary_arrival_date . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_arrival_hour : " . $result_itinerary_arrival_hour . "<br>");
            echo "</pre>";

            echo "<pre>";
            print_r("result_itinerary_adult_number : " . $result_itinerary_adult_number . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_child_number : " . $result_itinerary_child_number . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_infant_number : " . $result_itinerary_infant_number . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_price : " . $result_itinerary_price . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_price_currency : " . $result_itinerary_price_currency . "<br>");
            echo "</pre>";

            echo "<pre>";
            print_r("result_itinerary_fly_type : " . $result_itinerary_fly_type . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_fly_time : " . $result_itinerary_fly_time . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_fly_company : " . $result_itinerary_fly_company . "<br>");
            echo "</pre>";
            echo "<pre>";
            print_r("result_itinerary_fly_bagage : " . $result_itinerary_fly_bagage . "<br>");
            echo "</pre>";

            // echo "<pre>";
            // print_r($result_itinerary);
            // echo "</pre>";

            echo "---------------------------------- <br>";
        }
    }
}
// echo "<pre>";
// print_r($file_decode->getAirFlightDepartures->results->result->itinerary_data->itinerary_0);
// echo "</pre>";
*/
?>

<?php
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
=======
<!-- <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="date" name="date_send_1" id="date_send_1" placeholder="date">
    <input type="date" name="date_send_2" id="date_send_2" placeholder="date">
    <button type="submit">Envoyer</button>
</form> -->

<?php
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "post date_send_1: " . $_POST["date_send_1"] . "<br>";
    $date_1 = strtotime($_POST["date_send_1"]);
    $date_format_1_day = date('d', $date_1);
    $date_format_1_month = date('m', $date_1);
    $date_format_1_year = date('Y', $date_1);
    echo "date_1: day: [" . $date_format_1_day . "], month: [" . $date_format_1_month . "], year: [" . $date_format_1_year . "] <br>";

    echo "post date_send_2: " . $_POST["date_send_2"] . "<br>";
    $date_2 = strtotime($_POST["date_send_2"]);
    $date_format_2_day = date('d', $date_2);
    $date_format_2_month = date('m', $date_2);
    $date_format_2_year = date('Y', $date_2);
    echo "date_1: day: [" . $date_format_2_day . "], month: [" . $date_format_2_month . "], year: [" . $date_format_2_year . "] <br>";

    $from_time = strtotime($_POST["date_send_1"]);
    $to_time = strtotime($_POST["date_send_2"]);
    $diff_minutes = round(abs($from_time - $to_time) / 60, 2) . " minutes";
    echo $diff_minutes;
    $value =(int)$diff_minutes/60/24;
    echo $value . "days";
}
*/
?>

<?php
/*
a recup:
    nom
    addresse
    prix
    score
autour
option
*/
/*
$file = file_get_contents("../../back/data/api_call_travel_advisor_hotel.json");
$file_decode = json_decode($file);
$file_array = (array) $file_decode;

for ($i = 0; $i < 5; $i++) {

    // echo "<pre>";
    // print_r($file_decode->data[$i]);
    // echo "</pre> <br>";

    echo "----------------------<br>";
    $result_hotel_location_id = $file_decode->data[$i]->location_id;
    $result_hotel_nom = $file_decode->data[$i]->name;
    $result_hotel_adresse = "";
    $result_hotel_prix = $file_decode->data[$i]->price;
    $result_hotel_score = $file_decode->data[$i]->rating;
    $result_hotel_autour = (array)$file_decode->data[$i]->neighborhood_info;
    $result_hotel_autour_location_id = array();
    $result_hotel_autour_nom = array();
    for ($j = 0; $j < count($result_hotel_autour); $j++) {
        array_push($result_hotel_autour_location_id, $result_hotel_autour[$j]->location_id);
        array_push($result_hotel_autour_nom, $result_hotel_autour[$j]->name);
        // $result_hotel_autour_location_id = $result_hotel_autour[$j]->location_id;
        // $result_hotel_autour_nom = $result_hotel_autour[$j]->name;
    }
    $result_hotel_option = "";
    echo "recap: <br>";
    echo "hotel location id: [" . $result_hotel_location_id . "]<br>";
    echo "hotel nom: [" . $result_hotel_nom . "]<br>";
    echo "hotel adresse: [" . $result_hotel_adresse . "]<br>";
    echo "hotel prix: [" . $result_hotel_prix . "]<br>";
    echo "hotel score: [" . $result_hotel_score . "]<br>";
    // echo "<pre>";
    // var_dump(print_r($result_hotel_autour));
    // echo "</pre><br>";
    for ($j = 0; $j < count($result_hotel_autour); $j++) {
        echo "hotel autour[" . $j . "]: id: [" . $result_hotel_autour_location_id[$j] ."]<br>";
        echo "hotel autour[" . $j . "]: nom: [" . $result_hotel_autour_nom[$j] ."]<br>";
    }
    //print_r("hotel autour: [" . $result_hotel_autour . "]<br>");
    echo "hotel option: [" . $result_hotel_option . "]<br>";
    echo "----------------------<br>";
    echo "----------------------<br>";
    echo "----------------------<br>";
    echo "----------------------<br>";
}

echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";
echo "----------------------<br>";

// echo "<pre>";
// print_r($file);
// echo "</pre> <br>";
*/
?>

<?php
    /*
a recup:
    nom
    addresse
    prix
    score
autour
option
*/

    // $file = file_get_contents("../../back/data/api_call_travel_advisor_hotel_detail_0.json");
    // $file_decode = json_decode($file);
    // $file_array = (array) $file_decode;

    // $file = file_get_contents("../../back/data/api_call_travel_advisor_hotel.json");
    // $file_decode = json_decode($file);
    // $file_array = (array) $file_decode;

    /*
$api_call_travel_advisor_result_hotel_path = "../../back/data/result_search/";
$api_call_travel_advisor_result_hotel_name = "result_search_hotel.json";
$api_call_travel_advisor_result_hotel_json = [];


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

    echo "hotel nom: [" . $result_hotel_nom_detail . "] <br>";
    echo "hotel adresse: [" . $result_hotel_addresse_detail . "] <br>";
    echo "hotel note: [" . $result_hotel_score_detail . "] <br>";
    echo "hotel image: [" . $result_hotel_image_detail . "] <br>";
    echo '<img src="' . $result_hotel_image_detail . '" alt=""><br>';
    echo "hotel chambre avaiable: [" . $result_hotel_chambre_detail_available . "] <br>";
    for ($j = 0; $j < 5; $j++) {
        if ($result_hotel_chambre_detail_available == "available") {
            echo "hotel chambre [" . $j . "]: [" . $result_hotel_chambre_detail[$j] . "] <br>";
        }
    }

    echo "<br>";
    echo "----------------------<br>";

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
// echo "----------------------<br>";
// for ($i = 0; $i < 5; $i++) {
//     echo "<pre>";
//     print_r($tab_file[$i]);
//     echo "</pre>";
//     echo "----------------------<br>";
// }


// $hotel_array = [];
// array_push($hotel_array, $result_hotel_nom_detail);
// array_push($hotel_array, $result_hotel_addresse_detail);
// array_push($hotel_array, $result_hotel_score_detail);
// array_push($hotel_array, $result_hotel_image_detail);
// array_push($hotel_array, $result_hotel_chambre_detail_available);
// array_push($hotel_array, $result_hotel_chambre_detail);

// $api_call_travel_advisor_result_hotel_json = [];
// array_push($api_call_travel_advisor_result_hotel_json, $hotel_array);

// $api_call_travel_advisor_result_hotel_json = json_encode($api_call_travel_advisor_result_hotel_json);

echo "<pre>";
print_r($api_call_travel_advisor_result_hotel_json);
echo "</pre>";

echo "filepath: ".$api_call_travel_advisor_result_hotel_path . $api_call_travel_advisor_result_hotel_name;

$file = fopen($api_call_travel_advisor_result_hotel_path . $api_call_travel_advisor_result_hotel_name, "w");
fwrite($file, json_encode($api_call_travel_advisor_result_hotel_json));
fclose($file)
*/;
?>

<?php
// $file = file_get_contents("../../back/data/api_call_the_fork_the_spoon_location_id.json");
// $file_decode = json_decode($file);
// $file_array = (array) $file_decode;

// // $file_encode = json_encode($file);

// echo "<pre>";
// print_r($file_decode);
// echo "</pre>";

// //id
// echo "<pre>";
// print_r("location_id: ".$file_decode->data->geolocation[0]->id->id);
// echo "</pre>";

// //geo_text
// echo "<pre>";
// print_r("geo_text: ".$file_decode->data->geolocation[0]->name->text);
// echo "</pre>";

// //geo_type
// echo "<pre>";
// print_r("geo_type: ".$file_decode->data->geolocation[0]->id->type);
// echo "</pre>";

// $file = file_get_contents("../../back/data/api_call_the_fork_the_spoon_location_id_google.json");
// $file_decode = json_decode($file);
// $file_array = (array) $file_decode;

// echo "<pre>";
// print_r($file_decode);
// echo "</pre>";

// //id
// echo "<pre>";
// print_r("location_id: ".$file_decode->id_city);
// echo "</pre>";
?>

<?php
/*
a regarder
"servesCuisine": "French",
"name": "Le Reminet",
"address": {
                "street": "3, rue des Grands Degrés",
                "postalCode": "75005",
                "locality": "Paris",
                "country": "France"
            },
"aggregateRatings": {
                "thefork": {
                    "ratingValue": 9.1,
                    "reviewCount": 17322
                },
                "tripadvisor": {
                    "ratingValue": 4,
                    "reviewCount": 1456
                }
            },
"mainPhotoSrc": "https://res.cloudinary.com/tf-lab/image/upload/restaurant/739ec324-6b20-48d2-a8cb-d0c69b1c62b3/619557ba-2ba6-45bd-8019-7008f187f989.jpg",

*/
/*
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

    // nom
    echo "<pre>";
    print_r("nom: " . $result_restaurant_nom);
    echo "</pre>";

    // cuisine
    echo "<pre>";
    print_r("cuisine: " . $result_restaurant_cuisine);
    echo "</pre>";

    // addresse
    echo "<pre>";
    print_r("adresse: " . $result_restaurant_adresse);
    echo "</pre>";

    // note
    echo "<pre>";
    print_r("note: " . $result_restaurant_note);
    echo "</pre>";

    // photo
    echo "<pre>";
    print_r("photo: " . $result_restaurant_photo);
    echo "</pre>";

    // echo '<img src="'.$file_decode->data[$i]->mainPhotoSrc.'" alt="">';

    echo "----------------------------<br>";
    echo "<br>";
}

// echo "<pre>";
// print_r($file_decode);
// echo "</pre>";
*/
?>

<?php
/*
$region = "France";

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

    // //nom
    // echo "<pre>";
    // print_r("nom: " . $result_coutry_nom);
    // echo "</pre>";

    // //code
    // echo "<pre>";
    // print_r("code: " . $result_country_code);
    // echo "</pre>";

    // echo "----------------------------<br>";
    // echo "<br>";
}

//result
echo "<pre>";
print_r("nom: " . $result_country_nom_send);
echo "<br>";
print_r("code: " . $result_country_code_send);
echo "</pre>";

echo "<pre>";
print_r($file_decode);
echo "</pre>";
*/
?>

<?php
/*
$file = file_get_contents("../../back/data/api_call_flytrip_airport.json");
$file_decode = json_decode($file);
$file_array = (array) $file_decode;

$result_airport_nom_send = "";
$result_airport_code_send = "";

for ($i = 0; $i < count($file_decode); $i++) {
    if ($file_decode[$i]->scheduled_service != "no") {
        echo "<pre>";
        print_r("nom: " . $file_decode[$i]->name);
        echo "</pre>";
        echo "<pre>";
        print_r("code: " . $file_decode[$i]->ident);
        echo "</pre>";

        echo "----------------------------<br>";
        echo "<br>";
    }
}

// echo "<pre>";
// print_r($file_decode);
// echo "</pre>";
*/
?>

<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://localhost/ketan/all_user.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
echo $result;
>>>>>>> Stashed changes
?>