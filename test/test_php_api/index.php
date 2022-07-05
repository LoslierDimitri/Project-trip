<?php

$service_api = "https://www.boredapi.com/api/activity/";
//$service_api = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita";

$service_url = $service_api;
$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$curl_response = curl_exec($curl);
curl_close($curl);
$json_objekat = json_decode($curl_response);

print_r($json_objekat);

if (file_put_contents("data.json", $curl_response))
    echo "JSON file created successfully...";
else 
    echo "Oops! Error creating json file...";


?>