<?php
include ("test_include.php");
?>

<?php
require "../../back/api/api_call.php";

$api_call_string = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Museum%20of%20Contemporary%20Art%20Australia&inputtype=textquery&fields=formatted_address%2Cname%2Crating%2Copening_hours%2Cgeometry&key=YOUR_API_KEY";
//$api_call_string = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita";
//$api_call_string = "https://www.boredapi.com/api/activity/";

api_call($api_call_string, "test_data_api");
?>

