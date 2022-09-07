<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/Project-trip/View/css/navbar.css">
    <link rel="stylesheet" href="/Project-trip/View/css/footer.css">
    <link rel="stylesheet" href="/Project-trip/View/css/page_result.css">
    <title>Page result</title>
</head>

<body>

    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/Project-trip/View/component/navbar.php";
    include($path_new);
    ?>

    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/Project-trip/View/component/all_controller.php";
    include($path_new);
    ?>
    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/Project-trip/View/component/form_result.php";
    include($path_new);
    ?>

    <?php
    /*
    get result from api call

    result hotel
    $result_hotel[ID]->hotel_name
    $result_hotel[ID]->hotel_address
    $result_hotel[ID]->hotel_image
    $result_hotel[ID]->hotel_rate
    $result_hotel[ID]->hotel_class
    $result_hotel[ID]->hotel_phone
    $result_hotel[ID]->hotel_price

    result restaurant
    $result_restaurant[ID]->restaurant_name
    $result_restaurant[ID]->restaurant_address
    $result_restaurant[ID]->restaurant_image
    $result_restaurant[ID]->restaurant_price
    $result_restaurant[ID]->restaurant_rate

    result fly
    fly departure arrival
    $result_fly[0][ID]->fly_price
    $result_fly[0][ID]->fly_airline_name
    $result_fly[0][ID]->fly_airline_logo
    $result_fly[0][ID]->fly_airport_departure_name
    $result_fly[0][ID]->fly_airport_departure_date_display
    $result_fly[0][ID]->fly_airport_departure_date
    $result_fly[0][ID]->fly_airport_departure_time
    $result_fly[0][ID]->fly_airport_arrival_name
    $result_fly[0][ID]->fly_airport_arrival_date_dislay
    $result_fly[0][ID]->fly_airport_arrival_date
    $result_fly[0][ID]->fly_airport_arrival_time
    $result_fly[0][ID]->fly_aircraft_type
    $result_fly[0][ID]->fly_duration

    fly arrival departure
    $result_fly[1][ID]->fly_price
    $result_fly[1][ID]->fly_airline_name
    $result_fly[1][ID]->fly_airline_logo
    $result_fly[1][ID]->fly_airport_departure_name
    $result_fly[1][ID]->fly_airport_departure_date_display
    $result_fly[1][ID]->fly_airport_departure_date
    $result_fly[1][ID]->fly_airport_departure_time
    $result_fly[1][ID]->fly_airport_arrival_name
    $result_fly[1][ID]->fly_airport_arrival_date_dislay
    $result_fly[1][ID]->fly_airport_arrival_date
    $result_fly[1][ID]->fly_airport_arrival_time
    $result_fly[1][ID]->fly_aircraft_type
    $result_fly[1][ID]->fly_duration
    */

    /*
    get result from api call backup

    result hotel
    $result_hotel[ID]->hotel_name
    $result_hotel[ID]->hotel_address
    $result_hotel[ID]->hotel_image
    $result_hotel[ID]->hotel_rate
    $result_hotel[ID]->hotel_class
    $result_hotel[ID]->hotel_phone
    $result_hotel[ID]->hotel_price

    result restaurant
    $result_restaurant[ID]->restaurant_name
    $result_restaurant[ID]->restaurant_address
    $result_restaurant[ID]->restaurant_image
    $result_restaurant[ID]->restaurant_price
    $result_restaurant[ID]->restaurant_rate

    result fly
    fly departure arrival
    $result_fly[0][ID]->fly_price
    $result_fly[0][ID]->fly_airline_name
    $result_fly[0][ID]->fly_airline_logo
    $result_fly[0][ID]->fly_airport_departure_name
    $result_fly[0][ID]->fly_airport_departure_date_display
    $result_fly[0][ID]->fly_airport_departure_date
    $result_fly[0][ID]->fly_airport_departure_time
    $result_fly[0][ID]->fly_airport_arrival_name
    $result_fly[0][ID]->fly_airport_arrival_date_dislay
    $result_fly[0][ID]->fly_airport_arrival_date
    $result_fly[0][ID]->fly_airport_arrival_time
    $result_fly[0][ID]->fly_aircraft_type
    $result_fly[0][ID]->fly_duration

    fly arrival departure
    $result_fly[1][ID]->fly_price
    $result_fly[1][ID]->fly_airline_name
    $result_fly[1][ID]->fly_airline_logo
    $result_fly[1][ID]->fly_airport_departure_name
    $result_fly[1][ID]->fly_airport_departure_date_display
    $result_fly[1][ID]->fly_airport_departure_date
    $result_fly[1][ID]->fly_airport_departure_time
    $result_fly[1][ID]->fly_airport_arrival_name
    $result_fly[1][ID]->fly_airport_arrival_date_dislay
    $result_fly[1][ID]->fly_airport_arrival_date
    $result_fly[1][ID]->fly_airport_arrival_time
    $result_fly[1][ID]->fly_aircraft_type
    $result_fly[1][ID]->fly_duration
    */
    // echo "<pre>";
    // print_r($result_hotel);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($result_restaurant);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($result_fly);
    // echo "</pre>";
    /*
    ?>

    <section>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <?php
            for ($i = 0; $i < count($result_hotel); $i++) {
            ?>

                <input type="checkbox" id="result_hotel" name="" value="">
                <label for="result_hotel">
                    <div>
                        <?php
                        if (isset($result_hotel[$i]->hotel_name)) {
                            $result_hotel[$i]->hotel_name;
                        }
                        ?>
                    </div>
                    <div>
                        <?php
                        if (isset($result_class[$i]->hotel_class)){
                            $result_class[$i]->hotel_class;
                        }
                        ?>
                    </div>
                    <div>
                        <?php
                        if (isset($result_hotel[$i]->hotel_rate)){
                            $result_hotel[$i]->hotel_rate;
                        }
                        ?>
                    </div>
                    <div>
                        <img src="/project_trip_redone/View/png/Pointer.png" alt="">
                        <?php
                        if (isset($result_hotel[$i]->hotel_address)){
                            $result_hotel[$i]->hotel_address;
                        }
                        ?>
                    </div>
                    <div>
                        <?php
                        if (isset($result_hotel[$i]->hotel_phone)){
                            $result_hotel[$i]->hotel_phone;
                        }
                        ?>
                    </div>
                    <div>
                        <?php
                        if (isset($result_hotel[$i]->hotel_price)){
                            $result_hotel[$i]->hotel_price;
                        }
                        ?>
                    </div>
                    <div>
                        <?php
                        if (isset($result_hotel[$i]->hotel_image)){
                            $result_hotel[$i]->hotel_image;
                        }
                        ?>
                    </div>

                </label>
            <?php
            }
            ?>
        </form>
    </section>
*/
?>
    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/Project-trip/View/component/footer.php";
    include($path_new);
    ?>

</body>

</html>