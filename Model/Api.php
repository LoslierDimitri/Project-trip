<?php
/*
how to use this file
in your file where you need to call a database request:

------------------------------------------------------------------
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/Model/Api.php";
require($path_new);
$api = new Api();
------------------------------------------------------------------

to call a request you do:
------------------------------------------------------------------
$api->api_call_travel_advisor();
------------------------------------------------------------------
*/

/*
api used

travel advisor
https://rapidapi.com/apidojo/api/travel-advisor/
locations/search (Deprecating)
hotels/list (Deprecated)
hotels/get-details (Deprecated)

the fork the spoon
https://rapidapi.com/apidojo/api/the-fork-the-spoon/
locations/v2/auto-complete
locations/v2/list
restaurants/v2/list

priceline
https://rapidapi.com/tipsters/api/priceline-com-provider/pricing

*/

class Hotel_information
{
    public $hotel_name;
    public $hotel_address;
    public $hotel_image;
    public $hotel_rate;
    public $hotel_class;
    public $hotel_phone;
    public $hotel_price;

    public function __construct($name, $address, $image, $rate, $class, $phone, $price)
    {
        $this->hotel_name = $name;
        $this->hotel_address = $address;
        $this->hotel_image = $image;
        $this->hotel_rate = $rate;
        $this->hotel_class = $class;
        $this->hotel_phone = $phone;
        $this->hotel_price = $price;
    }
}

class Restaurant_information
{
    public $restaurant_name;
    public $restaurant_address;
    public $restaurant_image;
    public $restaurant_price;
    public $restaurant_rate;

    public function __construct($name, $address, $image, $price, $rate)
    {
        $this->restaurant_name = $name;
        $this->restaurant_address = $address;
        $this->restaurant_image = $image;
        $this->restaurant_price = $price;
        $this->restaurant_rate = $rate;
    }
}

class Fly_information
{
    public $fly_price;
    public $fly_airline_name;
    public $fly_airline_logo;
    public $fly_airport_departure_name;
    public $fly_airport_departure_date_display;
    public $fly_airport_departure_date;
    public $fly_airport_departure_time;
    public $fly_airport_arrival_name;
    public $fly_airport_arrival_date_display;
    public $fly_airport_arrival_date;
    public $fly_airport_arrival_time;
    public $fly_aircraft_type;
    public $fly_duration;

    public function __construct(
        $fly_price,
        $fly_airline_name,
        $fly_airline_logo,
        $fly_airport_departure_name,
        $fly_airport_departure_date_display,
        $fly_airport_departure_date,
        $fly_airport_departure_time,
        $fly_airport_arrival_name,
        $fly_airport_arrival_date_display,
        $fly_airport_arrival_date,
        $fly_airport_arrival_time,
        $fly_aircraft_type,
        $fly_duration
    ) {
        $this->fly_price = $fly_price;
        $this->fly_airline_name = $fly_airline_name;
        $this->fly_airline_logo = $fly_airline_logo;
        $this->fly_airport_departure_name = $fly_airport_departure_name;
        $this->fly_airport_departure_date_display = $fly_airport_departure_date_display;
        $this->fly_airport_departure_date = $fly_airport_departure_date;
        $this->fly_airport_departure_time = $fly_airport_departure_time;
        $this->fly_airport_arrival_name = $fly_airport_arrival_name;
        $this->fly_airport_arrival_date_display = $fly_airport_arrival_date_display;
        $this->fly_airport_arrival_date = $fly_airport_arrival_date;
        $this->fly_airport_arrival_time = $fly_airport_arrival_time;
        $this->fly_aircraft_type = $fly_aircraft_type;
        $this->fly_duration = $fly_duration;
    }
}

class Api
{
    //api key
    private $key = "X-RapidAPI-Key: dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a";
    private $api_number_of_hotel = 10;
    private $api_number_of_fly_departure_arrival = 5;
    private $api_number_of_fly_arrival_departure = 5;

    /*
    --------------------------------------------------------------------------------------------------------------
    travel advisor
    used to find hotel and informations about them

    return a table of hotel with differents informations
    structure:
    $result[ID]->hotel_name;
    $result[ID]->hotel_address;
    $result[ID]->hotel_image;
    $result[ID]->hotel_rate;
    $result[ID]->hotel_class;
    $result[ID]->hotel_phone;
    $result[ID]->hotel_price;
    */
    public function api_call_travel_advisor($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre, $voyage_hotel_class)
    {
        $return_result = "";

        //------------------------------------------
        //call to get location_id
        //locations/search (Deprecating)
        $location_id = "";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/locations/search?query=" . $voyage_lieu_arrive . "&limit=30&offset=0&units=km&currency=USD&sort=relevance&lang=en_US",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            return;
        }

        $result = json_decode($response);

        if(isset($result->data)){
        for ($i = 0; $i < count($result->data); $i++) {
            if (isset($result->data[$i]->result_type)) {
                if ($result->data[$i]->result_type == "geos") {
                    if (isset($result->data[$i]->result_object->location_id)) {
                        $location_id = $result->data[$i]->result_object->location_id;
                    }
                }
            }
        }
    }

        //------------------------------------------
        //call to get a list of hotel
        //hotels/list (Deprecated)
        $location_id_hotel = [];

        //calculate number of nights
        $voyage_nombre_nuit = 0;
        $date_aller = new DateTime($voyage_date_aller);
        $date_retour = new DateTime($voyage_date_retour);
        $date_interval = $date_aller->diff($date_retour);
        $voyage_nombre_nuit = $date_interval->days;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/hotels/list?location_id=" . $location_id . "&adults=" . $voyage_nombre_personne_adulte . "&rooms=" . $voyage_nombre_chambre . "&nights=" . $voyage_nombre_nuit . "&offset=0&hotel_class=" . $voyage_hotel_class . "&currency=USD&order=asc&limit=30&sort=recommended&lang=en_US",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            return;
        }

        $result = json_decode($response);

        if (isset($result->data)) {
            for ($i = 0; $i < count($result->data); $i++) {
                if (isset($result->data[$i])) {
                    if ($result->data[$i]) {
                        if (isset($result->data[$i]->location_id)) {
                            $location_id_hotel[$i] = $result->data[$i]->location_id;
                        }
                    }
                }
            }
        }

        //------------------------------------------
        //call to get detail for hotel
        //hotels/get-details (Deprecated)
        $hotel_information = [];
        $hotel_list = [];

        for ($i = 0; $i < $this->api_number_of_hotel /*count($location_id_hotel)*/; $i++) {
            $hotel_information = [];

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/hotels/get-details?location_id=" . $location_id_hotel[$i] . "&adults=" . $voyage_nombre_personne_adulte . "&lang=en_US&currency=USD&nights=" . $voyage_nombre_nuit . "&rooms=" . $voyage_nombre_chambre . "",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
                    $this->key,
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            }

            $result = json_decode($response);

            for ($x = 0; $x < 7; $x++) {
                $hotel_information[$x] = "";
            }

            if (isset($result->data[0]->name)) {
                $hotel_information[0] = $result->data[0]->name;
            }
            if (isset($result->data[0]->address)) {
                $hotel_information[1] = $result->data[0]->address;
            }
            if (isset($result->data[0]->photo->images->original->url)) {
                $hotel_information[2] = $result->data[0]->photo->images->original->url;
            }
            if (isset($result->data[0]->rating)) {
                $hotel_information[3] = $result->data[0]->rating;
            }
            if (isset($result->data[0]->hotel_class)) {
                $hotel_information[4] = $result->data[0]->hotel_class;
            }
            if (isset($result->data[0]->phone)) {
                $hotel_information[5] = $result->data[0]->phone;
            }
            if (isset($result->data[0]->price)) {
                $hotel_information[6] = $result->data[0]->price;
            }

            $hotel_list[$i] = new Hotel_information($hotel_information[0], $hotel_information[1], $hotel_information[2], $hotel_information[3], $hotel_information[4], $hotel_information[5], $hotel_information[6]);
        }

        $return_result = $hotel_list;

        return $return_result;
    }

    /*
    --------------------------------------------------------------------------------------------------------------
    the fork the spoon
    used to find restaurant and informations about them

    return a table of restaurant with differents informations
    structure:
    $result[ID]->restaurant_name;
    $result[ID]->restaurant_address;
    $result[ID]->restaurant_image;
    $result[ID]->restaurant_price;
    $result[ID]->restaurant_rate;
    */
    public function api_call_the_fork_the_spoon($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre)
    {
        $return_result = "";

        //------------------------------------------
        //call to get location_id google
        //locations/v2/auto-complete
        $location_id_google = "";

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
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $result = json_decode($response);

        if (isset($result->data->geolocation[0]->id->id)) {
            $location_id_google = $result->data->geolocation[0]->id->id;
        }

        //------------------------------------------
        //call to get location_id
        //locations/v2/list
        $location_id = "";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://the-fork-the-spoon.p.rapidapi.com/locations/v2/list?google_place_id=" . $location_id_google . "&geo_ref=false&geo_text=" . $voyage_lieu_arrive . "&geo_type=locality",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: the-fork-the-spoon.p.rapidapi.com",
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $result = json_decode($response);

        if (isset($result->id_city)) {
            $location_id = $result->id_city;
        }

        //------------------------------------------
        //call to get a list of restaurant
        //restaurants/v2/list
        $restaurant_list = [];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://the-fork-the-spoon.p.rapidapi.com/restaurants/v2/list?queryPlaceValueCityId=" . $location_id . "&pageSize=20&pageNumber=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: the-fork-the-spoon.p.rapidapi.com",
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $result = json_decode($response);

        //get restaurant information
        for ($i = 0; $i < count($result->data); $i++) {
            $restaurant_nom = "";
            $restaurant_adresse = "";
            $restaurant_image = "";
            $restaurant_prix = "";
            $restaurant_note = "";

            if (isset($result->data[$i]->name)) {
                $restaurant_nom = $result->data[$i]->name;
            }
            if (isset($result->data[$i]->address->street)) {
                $restaurant_adresse = $result->data[$i]->address->street;
            }
            if (isset($result->data[$i]->mainPhoto->source)) {
                $restaurant_image = $result->data[$i]->mainPhoto->source;
            }
            if (isset($result->data[$i]->priceRange)) {
                $restaurant_prix = $result->data[$i]->priceRange;
            }
            if (isset($result->data[$i]->aggregateRatings->tripadvisor->ratingValue)) {
                $restaurant_note = $result->data[$i]->aggregateRatings->tripadvisor->ratingValue;
            }

            $restaurant_list[$i] = new Restaurant_information($restaurant_nom, $restaurant_adresse, $restaurant_image, $restaurant_prix, $restaurant_note);
        }

        $return_result = $restaurant_list;

        return $return_result;
    }

    /*
    --------------------------------------------------------------------------------------------------------------
    priceline
    used to find fly and informations about them

    return a table of fly with differents informations
    structure:
    $result[0] to get fly departure arrival
    $result[1] to get fly arrival departure

    $result[CODE]->[ID] to get a fly

    $result[CODE]->[ID]->fly_price;
    $result[CODE]->[ID]->fly_airline_name;
    $result[CODE]->[ID]->fly_airline_logo;
    $result[CODE]->[ID]->fly_airport_departure_name;
    $result[CODE]->[ID]->fly_airport_departure_date_display;
    $result[CODE]->[ID]->fly_airport_departure_date;
    $result[CODE]->[ID]->fly_airport_departure_time;
    $result[CODE]->[ID]->fly_airport_arrival_name;
    $result[CODE]->[ID]->fly_airport_arrival_date_display;
    $result[CODE]->[ID]->fly_airport_arrival_date;
    $result[CODE]->[ID]->fly_airport_arrival_time;
    $result[CODE]->[ID]->fly_aircraft_type;
    $result[CODE]->[ID]->fly_duration;
    */
    public function api_call_priceline($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre)
    {
        $return_result = "";

        $fly_list = [];

        //------------------------------------------
        //call to get airport id
        //Auto complete
        $airport_id_departure = "";
        $airport_id_arrival = "";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/autoComplete?string=" . $voyage_lieu_depart . "&pois=true&cities=true&airports=true&regions=true&hotels=true",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $result = json_decode($response);

        if (isset($result->getAirAutoComplete->results->status)) {
            if ($result->getAirAutoComplete->results->status == "Success") {
                if (isset($result->getAirAutoComplete->results->getSolr->results->data->airport_data->airport_0->iata)) {
                    $airport_id_departure = $result->getAirAutoComplete->results->getSolr->results->data->airport_data->airport_0->iata;
                }
            }
        }

        //------------------------------------------
        //call to get fly departure arrival
        //Search (departures, one way)
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/autoComplete?string=" . $voyage_lieu_arrive . "&pois=true&cities=true&airports=true&regions=true&hotels=true",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $result = json_decode($response);

        if (isset($result->getAirAutoComplete->results->status)) {
            if ($result->getAirAutoComplete->results->status == "Success") {
                if (isset($result->getAirAutoComplete->results->getSolr->results->data->airport_data->airport_0->iata)) {
                    $airport_id_arrival = $result->getAirAutoComplete->results->getSolr->results->data->airport_data->airport_0->iata;
                }
            }
        }

        //------------------------------------------
        //call to get fly arrival departure
        //Search (departures, one way)
        $fly_list_departure_arrival = [];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/departures?sid=iSiX639&departure_date=" . $voyage_date_aller . "&adults=" . $voyage_nombre_personne_adulte . "&children=" . $voyage_nombre_personne_enfant . "&origin_airport_code=" . $airport_id_departure . "&destination_airport_code=" . $airport_id_arrival . "",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $result = json_decode($response);

        if ($result->getAirFlightDepartures->results->status == "Success") {
            for ($i = 0; $i < min($this->api_number_of_fly_departure_arrival, $result->getAirFlightDepartures->results->result->itinerary_count); $i++) {
                $fly_price = "";
                $fly_airline_name = "";
                $fly_airline_logo = "";
                $fly_airport_departure_name = "";
                $fly_airport_departure_date_display = "";
                $fly_airport_departure_date = "";
                $fly_airport_departure_time = "";
                $fly_airport_arrival_name = "";
                $fly_airport_arrival_date_display = "";
                $fly_airport_arrival_date = "";
                $fly_airport_arrival_time = "";
                $fly_aircraft_type = "";
                $fly_duration = "";

                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->price_details->baseline_total_fare)) {
                    $fly_price = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->price_details->baseline_total_fare;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->airline->name)) {
                    $fly_airline_name = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->airline->name;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->airline->logo)) {
                    $fly_airline_logo = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->airline->logo;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->airport->name)) {
                    $fly_airport_departure_name = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->airport->name;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->datetime->date_display)) {
                    $fly_airport_departure_date_display = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->datetime->date_display;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->datetime->date)) {
                    $fly_airport_departure_date = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->datetime->date;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->datetime->time_24h)) {
                    $fly_airport_departure_time = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->datetime->time_24h;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->airport->name)) {
                    $fly_airport_arrival_name = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->airport->name;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->datetime->date_display)) {
                    $fly_airport_arrival_date_display = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->datetime->date_display;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->datetime->date)) {
                    $fly_airport_arrival_date = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->datetime->date;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->datetime->time_24h)) {
                    $fly_airport_arrival_time = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->datetime->time_24h;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->flight_data->flight_0->info->aircraft)) {
                    $fly_aircraft_type = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->flight_data->flight_0->info->aircraft;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->flight_data->flight_0->info->duration)) {
                    $fly_duration = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->flight_data->flight_0->info->duration;
                }

                $fly_list_departure_arrival[$i] = new Fly_information(
                    $fly_price,
                    $fly_airline_name,
                    $fly_airline_logo,
                    $fly_airport_departure_name,
                    $fly_airport_departure_date_display,
                    $fly_airport_departure_date,
                    $fly_airport_departure_time,
                    $fly_airport_arrival_name,
                    $fly_airport_arrival_date_display,
                    $fly_airport_arrival_date,
                    $fly_airport_arrival_time,
                    $fly_aircraft_type,
                    $fly_duration
                );
            }
        }

        $fly_list[0] = $fly_list_departure_arrival;

        //------------------------------------------
        //call to get fly departure arrival
        //Search (departures, one way)
        $fly_list_arrival_departure = [];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://priceline-com-provider.p.rapidapi.com/v2/flight/departures?sid=iSiX639&departure_date=" . $voyage_date_retour . "&adults=" . $voyage_nombre_personne_adulte . "&children=" . $voyage_nombre_personne_enfant . "&origin_airport_code=" . $airport_id_arrival . "&destination_airport_code=" . $airport_id_departure . "",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: priceline-com-provider.p.rapidapi.com",
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $result = json_decode($response);

        if ($result->getAirFlightDepartures->results->status == "Success") {
            for ($i = 0; $i < min($this->api_number_of_fly_arrival_departure, $result->getAirFlightDepartures->results->result->itinerary_count); $i++) {
                $fly_price = "";
                $fly_airline_name = "";
                $fly_airline_logo = "";
                $fly_airport_departure_name = "";
                $fly_airport_departure_date_display = "";
                $fly_airport_departure_date = "";
                $fly_airport_departure_time = "";
                $fly_airport_arrival_name = "";
                $fly_airport_arrival_date_display = "";
                $fly_airport_arrival_date = "";
                $fly_airport_arrival_time = "";
                $fly_aircraft_type = "";
                $fly_duration = "";

                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->price_details->baseline_total_fare)) {
                    $fly_price = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->price_details->baseline_total_fare;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->airline->name)) {
                    $fly_airline_name = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->airline->name;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->airline->logo)) {
                    $fly_airline_logo = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->airline->logo;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->airport->name)) {
                    $fly_airport_departure_name = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->airport->name;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->datetime->date_display)) {
                    $fly_airport_departure_date_display = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->datetime->date_display;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->datetime->date)) {
                    $fly_airport_departure_date = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->datetime->date;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->datetime->time_24h)) {
                    $fly_airport_departure_time = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->departure->datetime->time_24h;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->airport->name)) {
                    $fly_airport_arrival_name = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->airport->name;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->datetime->date_display)) {
                    $fly_airport_arrival_date_display = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->datetime->date_display;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->datetime->date)) {
                    $fly_airport_arrival_date = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->datetime->date;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->datetime->time_24h)) {
                    $fly_airport_arrival_time = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->arrival->datetime->time_24h;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->flight_data->flight_0->info->aircraft)) {
                    $fly_aircraft_type = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->flight_data->flight_0->info->aircraft;
                }
                if (isset($result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->flight_data->flight_0->info->duration)) {
                    $fly_duration = $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . $i}->slice_data->slice_0->flight_data->flight_0->info->duration;
                }

                $fly_list_arrival_departure[$i] = new Fly_information(
                    $fly_price,
                    $fly_airline_name,
                    $fly_airline_logo,
                    $fly_airport_departure_name,
                    $fly_airport_departure_date_display,
                    $fly_airport_departure_date,
                    $fly_airport_departure_time,
                    $fly_airport_arrival_name,
                    $fly_airport_arrival_date_display,
                    $fly_airport_arrival_date,
                    $fly_airport_arrival_time,
                    $fly_aircraft_type,
                    $fly_duration
                );
            }
        }

        $fly_list[1] = $fly_list_arrival_departure;

        $return_result = $fly_list;
        return $return_result;
    }
}
