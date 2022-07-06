<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test php form</title>
</head>
<body>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae minima illo sapiente dolores eaque ipsum, consectetur quisquam a deleniti quis excepturi dicta beatae facere distinctio eos incidunt, voluptates possimus ea!</p>

    <form action="result.php" method="POST">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname"><br>
        
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age"><br><br>
        
        <input type="submit" value="Submit">
      </form> 
</body>
</html>