<?php
require "api_call.php";

//$api_call_string = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita";
$api_call_string = "https://www.boredapi.com/api/activity/";

api_call($api_call_string, "data_bored_api");
?>