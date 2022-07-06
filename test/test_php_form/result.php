<?php
$data = require_once "back.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>result</title>
</head>
<body>
    <?php
        echo $data[0];
        echo $data[1];
        echo $data[2];

        echo "<br>";
        echo "you are " , $data[0], " ", $data[1], " and you are ", $data[2], " years old";
        echo "<br>";

        for ($i = 0; $i < count($data); $i++) {
            echo $data[$i];
            echo "<br>";
        }
    ?>
</body>
</html>