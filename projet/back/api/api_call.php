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

function api_call($string, $name) {
//$service_api = "https://www.boredapi.com/api/activity/";
//$service_api = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita";
$service_api = $string;

$data_path = "../../back/data/" . $name . ".json";

echo "call to api: [" , $service_api , "]... <br>";

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
    echo "call to api: [" , $service_api , "] done <br>";

    echo "<pre>";
    print_r($json_objekat);
    echo "</pre>";
}
else {
    echo "Error on JSON file <br>";
}
}

?>
