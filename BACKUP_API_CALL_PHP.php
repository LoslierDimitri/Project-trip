<?php
/*
this file is used to get a backup for api call

how to use this file
include this:
----------------------------------------------
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/BACKUP_API_CALL_PHP.php";
include($path_new);

$result_hotel = get_api_call_backup_hotel();
$result_restaurant = get_api_call_backup_restaurant();
$result_fly = get_api_call_backup_fly();
----------------------------------------------
*/

class Hotel_information_backup
{
    public $hotel_name;
    public $hotel_address;
    public $hotel_image;
    public $hotel_rate;
    public $hotel_class;
    public $hotel_phone;
    public $hotel_price;

    public function __construct(
        $name,
        $address,
        $image,
        $rate,
        $class,
        $phone,
        $price
    ) {
        $this->hotel_name = $name;
        $this->hotel_address = $address;
        $this->hotel_image = $image;
        $this->hotel_rate = $rate;
        $this->hotel_class = $class;
        $this->hotel_phone = $phone;
        $this->hotel_price = $price;
    }
}

class Restaurant_information_backup
{
    public $restaurant_name;
    public $restaurant_address;
    public $restaurant_image;
    public $restaurant_price;
    public $restaurant_rate;

    public function __construct(
        $name,
        $address,
        $image,
        $price,
        $rate
    ) {
        $this->restaurant_name = $name;
        $this->restaurant_address = $address;
        $this->restaurant_image = $image;
        $this->restaurant_price = $price;
        $this->restaurant_rate = $rate;
    }
}

class Fly_information_backup
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

/*
function to get a backup of api call
*/
//---------------------------------------------------------------------------------------------
function get_api_call_backup_hotel()
{
    $result_api_call_backup_hotel = [];

    $result_api_call_backup_hotel[0] = new Hotel_information_backup(
        "Hotel de la Paix Tour Eiffel",
        "19 rue du Gros Caillou 07 Arr., 75007 Paris France",
        "https://media-cdn.tripadvisor.com/media/photo-s/23/af/6e/73/exterior-view.jpg",
        "4.5",
        "3.0",
        "01133145518617",
        "$67 - $276"
    );
    $result_api_call_backup_hotel[1] = new Hotel_information_backup(
        "Hotel Astoria - Astotel",
        "42 rue de Moscou 8th Arr., 75008 Paris France",
        "https://media-cdn.tripadvisor.com/media/photo-o/21/72/60/68/hotel-facade.jpg",
        "4.5",
        "3.0",
        "01133142936353",
        "$132 - $260"
    );
    $result_api_call_backup_hotel[2] = new Hotel_information_backup(
        "Passy Eiffel Hotel",
        "10 rue de Passy, 75016 Paris France",
        "https://media-cdn.tripadvisor.com/media/photo-m/1280/13/5e/96/06/salon-hotel-passy-eiffel.jpg",
        "4.5",
        "3.0",
        "01133186761066",
        "$149 - $224"
    );
    $result_api_call_backup_hotel[3] = new Hotel_information_backup(
        "Hotel La Comtesse",
        "29 avenue de Tourville, 75007 Paris France",
        "https://media-cdn.tripadvisor.com/media/photo-o/22/8c/dc/04/450741-guest-room.jpg",
        "4.5",
        "3.0",
        "+33 1 45 51 29 29",
        "$264 - $413"
    );
    $result_api_call_backup_hotel[4] = new Hotel_information_backup(
        "Citadines Tour Eiffel Paris",
        "132 boulevard de Grenelle 15th Arr., 75015 Paris France",
        "https://media-cdn.tripadvisor.com/media/photo-m/1280/25/21/e0/60/studio-with-eiffel-tower.jpg",
        "4.5",
        "3.0",
        "+33 1 53 95 60 00",
        "$166 - $329"
    );
    $result_api_call_backup_hotel[5] = new Hotel_information_backup(
        "Hotel 34B - Astotel",
        "34 Rue Bergere, 75009 Paris France",
        "https://media-cdn.tripadvisor.com/media/photo-o/1d/b0/22/94/hotel-facade.jpg",
        "5.0",
        "3.0",
        "01133147703434",
        "$152 - $266"
    );
    $result_api_call_backup_hotel[6] = new Hotel_information_backup(
        "Hotel Malte - Astotel",
        "63 rue de Richelieu, 75002 Paris France",
        "https://media-cdn.tripadvisor.com/media/photo-w/22/63/02/6e/outside-view.jpg",
        "5.0",
        "4.0",
        "01133144589494",
        "$225 - $411"
    );
    $result_api_call_backup_hotel[7] = new Hotel_information_backup(
        "citizenM Paris Gare de Lyon Hotel",
        "8 rue Van Gogh, 75012 Paris France",
        "https://media-cdn.tripadvisor.com/media/photo-w/25/3b/7a/5d/paris-gare-de-lyon-building.jpg",
        "4.5",
        "3.0",
        "+33 1 86 65 07 40",
        "$117 - $236"
    );
    $result_api_call_backup_hotel[8] = new Hotel_information_backup(
        "Hotel Le 46",
        "46 rue Brunel, 75017 Paris France",
        "https://media-cdn.tripadvisor.com/media/photo-o/09/44/a3/10/villa-brunel.jpg",
        "4.0",
        "3.0",
        "01133145747451",
        "$114 - $246"
    );
    $result_api_call_backup_hotel[9] = new Hotel_information_backup(
        "Hotel Rose Bourbon",
        "53 rue de l Eglise, 75015 Paris France",
        "https://media-cdn.tripadvisor.com/media/photo-m/1280/13/5f/46/b7/chambre-double-classique.jpg",
        "4.5",
        "3.0",
        "+33 1 45 57 35 80",
        "$121 - $350"
    );

    return $result_api_call_backup_hotel;
}

//---------------------------------------------------------------------------------------------
function get_api_call_backup_restaurant()
{
    $result_api_call_backup_restaurant = [];

    $result_api_call_backup_restaurant[0] = new Restaurant_information_backup(
        "Basilic & Co Paris Voltaire",
        "58 Boulevard Voltaire",
        "https://res.cloudinary.com/tf-lab/image/upload/restaurant/d0d1ec11-f28e-44e7-9907-6d7d451a481c/2ab18b80-4359-4777-a315-144ef16baa51.png",
        "25",
        "5"
    );
    $result_api_call_backup_restaurant[1] = new Restaurant_information_backup(
        "L'Echoppe de Paris -Charonne",
        "16, rue Léon Frot",
        "https://res.cloudinary.com/tf-lab/image/upload/restaurant/d6875a03-553b-486b-81d4-d652c3dcbd0c/037ddbb2-ed49-4645-bacd-2ec4b56f8c2b.jpg",
        "27",
        "4.5"
    );
    $result_api_call_backup_restaurant[2] = new Restaurant_information_backup(
        "Ao Izakaya",
        "12 Rue de Caumartin",
        "https://res.cloudinary.com/tf-lab/image/upload/restaurant/c86285f4-60a5-46cb-8542-5e205bd4a6df/fb91a397-e338-42da-bc5c-4aa3f860e352.jpg",
        "59",
        "4.5"
    );
    $result_api_call_backup_restaurant[3] = new Restaurant_information_backup(
        "Atelier Ramey",
        "23 Rue Ramey",
        "https://res.cloudinary.com/tf-lab/image/upload/restaurant/96c23d52-f189-4c83-b326-4aa2072a9a80/a5d528ae-18d1-4425-b682-8688caadb1ba.jpg",
        "46",
        "4.5"
    );
    $result_api_call_backup_restaurant[4] = new Restaurant_information_backup(
        "Yasmin",
        "71-73, Passage Brady",
        "https://res.cloudinary.com/tf-lab/image/upload/restaurant/4a166511-c354-4807-8517-4ec82472a383/486537a5-8aab-45c6-a2e8-ec66dbcc570d.jpg",
        "29",
        "4"
    );
    $result_api_call_backup_restaurant[5] = new Restaurant_information_backup(
        "Papilla",
        "9 Rue Soufflot",
        "https://res.cloudinary.com/tf-lab/image/upload/restaurant/e583cbbf-a833-429e-bdb2-335273de8524/b10a0761-3307-400a-b50a-fed343b1b8aa.jpg",
        "25",
        "4.5"
    );
    $result_api_call_backup_restaurant[6] = new Restaurant_information_backup(
        "Salento Montmartre",
        "48 Rue Condorcet",
        "https://res.cloudinary.com/tf-lab/image/upload/restaurant/2906273b-d4f4-42e7-bec7-79e737d80c45/c660d891-556b-45c7-9372-59d24791b344.jpg",
        "34",
        "4.5"
    );
    $result_api_call_backup_restaurant[7] = new Restaurant_information_backup(
        "O'Riz Blanc",
        "1-3 Rue Louis Bonnet",
        "https://res.cloudinary.com/tf-lab/image/upload/restaurant/a32f57b6-113c-4ca1-8199-9041bfd9b222/c15c37ed-ea0a-4369-a5b9-5a668dd92b77.jpg",
        "22",
        "4.5"
    );
    $result_api_call_backup_restaurant[8] = new Restaurant_information_backup(
        "Koï Daguerre",
        "98 Rue Daguerre",
        "https://res.cloudinary.com/tf-lab/image/upload/restaurant/748beb73-78f8-4d4d-959c-58f9928ca79a/e176c620-6c5f-4c97-9f3e-ea3418ff4bbc.jpg",
        "28",
        "4.5"
    );
    $result_api_call_backup_restaurant[9] = new Restaurant_information_backup(
        "La Couvée",
        "32 Rue Véron",
        "https://res.cloudinary.com/tf-lab/image/upload/restaurant/18bc070d-82ef-44a7-ab32-6fbcc7328540/56604072-24c0-4732-bdbf-659c0b00baac.jpg",
        "35",
        "5"
    );

    return $result_api_call_backup_restaurant;
}

//---------------------------------------------------------------------------------------------
function get_api_call_backup_fly()
{
    $result_api_call_backup_fly = [];
    $result_api_call_backup_fly_departure_arrival = [];
    $result_api_call_backup_fly_arrival_departure = [];

    $result_api_call_backup_fly_departure_arrival[0] = new Fly_information_backup(
        "291.9",
        "Iberia",
        "https://secure.rezserver.com/public/media/img/air_logos2/IB.png",
        "Merignac Airport",
        "Monday, October 3rd, 2022",
        "2022-10-03",
        "09:15",
        "Charles De Gaulle (Roissy) Airport",
        "Tuesday, October 4th, 2022",
        "2022-10-04",
        "10:20",
        "Canadair Bombardier Regional Jet 1000",
        "00:01:25"
    );
    $result_api_call_backup_fly_departure_arrival[1] = new Fly_information_backup(
        "291.9",
        "Iberia",
        "https://secure.rezserver.com/public/media/img/air_logos2/IB.png",
        "Merignac Airport",
        "Monday, October 3rd, 2022",
        "2022-10-03",
        "13:20",
        "Charles De Gaulle (Roissy) Airport",
        "Tuesday, October 4th, 2022",
        "2022-10-04",
        "10:20",
        "Canadair Bombardier Regional Jet 1000",
        "00:01:25"
    );
    $result_api_call_backup_fly_departure_arrival[2] = new Fly_information_backup(
        "291.9",
        "Iberia",
        "https://secure.rezserver.com/public/media/img/air_logos2/IB.png",
        "Merignac Airport",
        "Monday, October 3rd, 2022",
        "2022-10-03",
        "18:15",
        "Charles De Gaulle (Roissy) Airport",
        "Tuesday, October 4th, 2022",
        "2022-10-04",
        "10:20",
        "Canadair Bombardier Regional Jet 1000",
        "00:01:25"
    );
    $result_api_call_backup_fly_departure_arrival[3] = new Fly_information_backup(
        "357.9",
        "Iberia",
        "https://secure.rezserver.com/public/media/img/air_logos2/IB.png",
        "Merignac Airport",
        "Monday, October 3rd, 2022",
        "2022-10-03",
        "18:15",
        "Charles De Gaulle (Roissy) Airport",
        "Monday, October 3rd, 2022",
        "2022-10-03",
        "23:10",
        "Canadair Bombardier Regional Jet 1000",
        "00:01:25"
    );
    $result_api_call_backup_fly_departure_arrival[4] = new Fly_information_backup(
        "474.9",
        "Iberia",
        "https://secure.rezserver.com/public/media/img/air_logos2/IB.png",
        "Merignac Airport",
        "Monday, October 3rd, 2022",
        "2022-10-03",
        "22:45",
        "Charles De Gaulle (Roissy) Airport",
        "Tuesday, October 4th, 2022",
        "2022-10-04",
        "09:15",
        "Airbus A320",
        "00:01:14"
    );

    //---------------------------------------------------------------------------------------------
    $result_api_call_backup_fly_arrival_departure[0] = new Fly_information_backup(
        "490.5",
        "Lufthansa",
        "https://secure.rezserver.com/public/media/img/air_logos2/LH.png",
        "Charles De Gaulle (Roissy) Airport",
        "Friday, October 7th, 2022",
        "2022-10-07",
        "07:30",
        "Merignac Airport",
        "Friday, October 7th, 2022",
        "2022-10-07",
        "17:50",
        "Airbus A320neo",
        "00:01:15"
    );
    $result_api_call_backup_fly_arrival_departure[1] = new Fly_information_backup(
        "490.5",
        "Lufthansa",
        "https://secure.rezserver.com/public/media/img/air_logos2/LH.png",
        "Charles De Gaulle (Roissy) Airport",
        "Friday, October 7th, 2022",
        "2022-10-07",
        "09:25",
        "Merignac Airport",
        "Friday, October 7th, 2022",
        "2022-10-07",
        "17:50",
        "Airbus A321",
        "00:01:15"
    );
    $result_api_call_backup_fly_arrival_departure[2] = new Fly_information_backup(
        "545.1",
        "Iberia",
        "https://secure.rezserver.com/public/media/img/air_logos2/IB.png",
        "Charles De Gaulle (Roissy) Airport",
        "Friday, October 7th, 2022",
        "2022-10-07",
        "07:25",
        "Merignac Airport",
        "Friday, October 7th, 2022",
        "2022-10-07",
        "12:50",
        "Airbus A321",
        "00:02:15"
    );
    $result_api_call_backup_fly_arrival_departure[3] = new Fly_information_backup(
        "576.9",
        "Lufthansa",
        "https://secure.rezserver.com/public/media/img/air_logos2/LH.png",
        "Charles De Gaulle (Roissy) Airport",
        "Friday, October 7th, 2022",
        "2022-10-07",
        "14:25",
        "Merignac Airport",
        "Saturday, October 8th, 2022",
        "2022-10-08",
        "12:35",
        "Airbus A321",
        "00:01:10"
    );
    $result_api_call_backup_fly_arrival_departure[4] = new Fly_information_backup(
        "590.1",
        "Aer Lingus",
        "https://secure.rezserver.com/public/media/img/air_logos2/EI.png",
        "Charles De Gaulle (Roissy) Airport",
        "Friday, October 7th, 2022",
        "2022-10-07",
        "17:30",
        "Merignac Airport",
        "Saturday, October 8th, 2022",
        "2022-10-08",
        "16:35",
        "Airbus A320",
        "00:01:45"
    );

    $result_api_call_backup_fly[0] = $result_api_call_backup_fly_departure_arrival;
    $result_api_call_backup_fly[1] = $result_api_call_backup_fly_arrival_departure;

    return $result_api_call_backup_fly;
}