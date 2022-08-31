<?php
// $file = file_get_contents("./projet/back/data/result_search/result_search_format.json");
// $file_decode = json_decode($file);

// print_array($file_decode[1][0][0]);
?>

<?php
require("./projet/back/database/database_connect.php");
require("./projet/back/database/database_disconnect.php");
require("./projet/back/database/database_request.php");
$connection = database_connect();
$result_specialities_name = database_get_specialities_information($connection, "noms", 13);
$connection = database_disconnect();
if ($result_specialities_name != []) {
    print_array($result_specialities_name[0]["noms"]);
}
// echo($result);
?>

<?php
function print_array($x_array)
{
    echo ("<pre>");
    print_r($x_array);
    echo ("</pre>");
}

function add($a, $b)
{
    return ($a + $b);
}
?>



<?php
/*
get hotel
    $file_decode[0]

get specific hotel
    $file_decode[0][ID]

get hotel information
name
address
trip advisor rate
image
availability
prices
    $file_decode[0][ID][INFORMATION]

get hotel prices
    $file_decode[0][ID][5][PRICE]

*****************************************
get restaurant
    $file_decode[1]

get specific restaurant
    $file_decode[1][ID]

get restaurant information
name
type
address
tripadvisor rate
image
    $file_decode[1][ID][INFORMATION]

*****************************************
get fly departure
    $file_decode[2]

get specific fly
    $file_decode[2][ID]

get fly information
airport departure
airport arrival
airport arrival code
airport departure code
departure date
departure hour
arrival date
arrival hour
adult number
child number
infant number
price
price currency
fly type
fly time
fly company
fly bagage
    $file_decode[2][ID][INFORMATION]

*/
?>