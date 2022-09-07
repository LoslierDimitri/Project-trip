<?php
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/Model/Database.php";
require($path_new);
$database = new Database();


$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/Model/Api.php";
require($path_new);
$api = new Api();

$voyage_lieu_depart = "bordeaux";
$voyage_lieu_arrive = "paris";
$voyage_date_aller = "2022-11-11";
$voyage_date_retour = "2022-12-12";
$voyage_nombre_personne_adulte = 2;
$voyage_nombre_personne_enfant = 2;
$voyage_nombre_chambre = 2;
$voyage_hotel_class = 3;
//-----------------------------------------------------------------------------
//trip advisor
$result_hotel = "";
//$result_hotel = $api->api_call_travel_advisor($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre, $voyage_hotel_class);

//-----------------------------------------------------------------------------
//fork
$result_restaurant = "";
//$result_restaurant = $api->api_call_the_fork_the_spoon($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre);

//-----------------------------------------------------------------------------
//priceline
$result_fly = "";
//$result_fly = $api->api_call_priceline($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre, $voyage_hotel_class);

/*
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/BACKUP_API_CALL_PHP.php";
include($path_new);

$result_hotel = get_api_call_backup_hotel();
$result_restaurant = get_api_call_backup_restaurant();
$result_fly = get_api_call_backup_fly();

echo "<pre>";
print_r($result_hotel);
echo "</pre>";

echo "<pre>";
print_r($result_restaurant);
echo "</pre>";

echo "<pre>";
print_r($result_fly);
echo "</pre>";
*/






if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["test_a"])) {
        print_r($_POST["test_a"]);
    }
    if (isset($_POST["test_b"])) {
        print_r($_POST["test_b"]);
    }

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
}


?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="checkbox" name="test_a[]" value="test_a_1">
    <label for="">test_a_1</label><br>
    <input type="checkbox" name="test_a[]" value="test_a_2">
    <label for="">test_a_2</label><br>

    <input type="checkbox" name="test_b[]" value="<?php
                                                    $val = "10";
                                                    echo $val; ?>">
    <label for="">test_b_1</label><br>
    <input type="checkbox" name="test_b[]" value="test_b_2">
    <label for="">test_b_2</label><br>

    <button type="submit">submit</button>
</form>

<?php








































// $result = json_encode($result);

// echo "<pre>";
// print_r($result);
// echo "</pre>";































/*

$file = file_get_contents("BACKUP_API_CALL.txt");
$result = json_encode($file, JSON_FORCE_OBJECT);
// $result = $file;

echo "<pre>";
print_r($result);
echo "</pre>";



$file = file_get_contents("TEST_FILE.json");
$result = json_decode($file);

echo "<pre>";
print_r($result);
echo "</pre>";

die();

//status
echo $result->getAirFlightDepartures->results->status;

//number of travel
echo $result->getAirFlightDepartures->results->result->itinerary_count;

//fly
echo $result->getAirFlightDepartures->results->result->itinerary_data[0];

//price
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->price_details->baseline_total_fare;

//airline
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->airline->name;
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->airline->logo;

//departure
//airport name
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->airport->name;

//date, time
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->datetime->date_display;
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->datetime->date;
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->datetime->time_24h;

//arrival
//airport name
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->airport->name;

//date, time
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->datetime->date_display;
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->datetime->date;
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->datetime->time_24h;

//fly type
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->flight_data->flight_0->info->aircraft;

//duration
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->flight_data->flight_0->info->duration;

























die();
echo "<pre>";
print_r($result->getAirAutoComplete->results->getSolr->results->data->airport_data->airport_0->iata);
echo "</pre>";

echo $result->getAirAutoComplete->results->status;
echo $result->getAirAutoComplete->results->getSolr->results->data->airport_data->airport_0->iata;








die();































$file = file_get_contents("TEST_FILE.json");
$result = json_decode($file);

$restaurant_nom = $result->data[1]->name . "<br>";
$restaurant_adresse = $result->data[1]->address->street . "<br>";
$restaurant_image = $result->data[1]->mainPhoto->source . "<br>";;
// $restaurant_type = $result->data[1]->;
$restaurant_prix = $result->data[1]->priceRange . "<br>";;
$restaurant_note = $result->data[1]->aggregateRatings->tripadvisor->ratingValue;

echo $restaurant_nom;
echo $restaurant_adresse;
echo $restaurant_image;
// echo $restaurant_type;
echo $restaurant_prix;
echo $restaurant_note;

echo "<pre>";
print_r($result->data[1]);
echo "</pre>";



die();
// $file = file_get_contents("TEST_FILE.json");
// $result = json_decode($file);

// $hotel_nom = $result->data[0]->name;
// $hotel_image = $result->data[0]->photo->images->original->url;
// $hotel_note = $result->data[0]->rating;
// $hotel_adresse = $result->data[0]->address;
// $hotel_classe = $result->data[0]->hotel_class;
// $hotel_telephone = $result->data[0]->phone;
// $hotel_prix = $result->data[0]->price;

// echo "<pre>";
// print_r($hotel_nom);
// echo "</pre>";
// echo "<pre>";
// print_r($hotel_image);
// echo "</pre>"; 
// echo "<pre>";
// print_r($hotel_note);
// echo "</pre>"; 
// echo "<pre>";
// print_r($hotel_adresse);
// echo "</pre>"; 
// echo "<pre>";
// print_r($hotel_classe);
// echo "</pre>"; 
// echo "<pre>";
// print_r($hotel_telephone);
// echo "</pre>"; 
// echo "<pre>";
// print_r($hotel_prix);
// echo "</pre>";  
*/