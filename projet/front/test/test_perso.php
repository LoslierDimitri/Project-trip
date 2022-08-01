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



$tab_file = (array) [];
for ($i = 0; $i < 5; $i++) {
    array_push($tab_file, json_decode(file_get_contents("../../back/data/api_call_travel_advisor_hotel_detail_" . $i . ".json")));
}

for ($i = 0; $i < 5; $i++) {
    $result_hotel_nom_detail = $tab_file[$i]->data[0]->name;
    $result_hotel_addresse_detail = $tab_file[$i]->data[0]->address;
    $result_hotel_score_detail = $tab_file[$i]->data[0]->rating;
    $result_hotel_image_detail = $tab_file[$i]->data[0]->photo->images->medium->url;
    $result_hotel_chambre_detail = array();
    for ($j = 0; $j < 5; $j++) {
        if ($tab_file[$i]->data[0]->hac_offers->availability != "unconfirmed") {
            array_push($result_hotel_chambre_detail, $tab_file[$i]->data[0]->hac_offers->offers[$j]->display_price_int);
        }
    }

    echo "hotel nom: [" . $result_hotel_nom_detail . "] <br>";
    echo "hotel adresse: [" . $result_hotel_addresse_detail . "] <br>";
    echo "hotel note: [" . $result_hotel_score_detail . "] <br>";
    echo "hotel image: [" . $result_hotel_image_detail . "] <br>";
    // echo '<img src="' . $result_hotel_image_detail . '" alt=""><br>';
    for ($j = 0; $j < 5; $j++) {
        if ($tab_file[$i]->data[0]->hac_offers->availability != "unconfirmed") {
            echo "hotel chambre [" . $j . "]: [" . $result_hotel_chambre_detail[$j] . "] <br>";
        }
    }

    echo "<br>";
    echo "----------------------<br>";
}
// echo "----------------------<br>";
// for ($i = 0; $i < 5; $i++) {
//     echo "<pre>";
//     print_r($tab_file[$i]);
//     echo "</pre>";
//     echo "----------------------<br>";
// }



?>

<img src="" alt="">