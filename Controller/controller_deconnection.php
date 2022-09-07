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
session_destroy();
header('location: /Project-trip/Controller/controller_main.php');
exit;
?>

<?php
//view
?>

<?php
//form post
?>