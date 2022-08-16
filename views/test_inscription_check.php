<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require ("../../back/form/form_registration.php");

    registration();

    header("Location: test_connection.php");
}
?>