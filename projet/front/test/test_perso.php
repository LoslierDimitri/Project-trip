<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="date" name="date_send_1" id="date_send_1" placeholder="date">
    <input type="date" name="date_send_2" id="date_send_2" placeholder="date">
    <button type="submit">Envoyer</button>
</form>

<?php
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
?>