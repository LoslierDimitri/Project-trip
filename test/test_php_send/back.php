<?php
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_fname = $_POST['fname'];
    $data_lname = $_POST['lname'];
    $data_age = $_POST["age"];

    if (!$data_fname || !$data_lname) {
        $error = 'Champ à renseigner';
    }

    $data = [$data_fname, $data_lname, $data_age];

    if (!$error) {
        return $data;
    }

    
}
?>