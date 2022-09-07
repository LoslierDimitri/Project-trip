<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page account</title>
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
$path_new = $path . "/Project-trip/View/component/footer.php";
include($path_new);
?>
    
</body>
</html>