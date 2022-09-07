<?php
//check session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<?php
//class
?>

<?php
//code
?>

<?php
//view
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/View/page/page_result_user.php";
include($path_new);
?>

<?php
//form post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result_user_hotel = $_POST["result_user_hotel"];
    $result_user_restaurant = $_POST["result_user_restaurant"];
    $result_user_fly_departure_arrival = $_POST["result_user_fly_departure_arrival"];
    $result_user_fly_arrival_departure = $_POST["result_user_fly_arrival_departure"];

    echo "<pre>";
    print_r($result_user_hotel);
    print_r($result_user_restaurant);
    print_r($result_user_fly_departure_arrival);
    print_r($result_user_fly_arrival_departure);
    echo "</pre>";
    // $result_hidden = $_POST["test"];
    // print_r($result_hidden);

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
}
?>